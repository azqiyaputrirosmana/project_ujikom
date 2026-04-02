<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\lantaiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RuanganController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/tentang', [FrontendController::class, 'about'])->name('tentang');

Route::get('/gedung/{id}', [FrontendController::class, 'filter'])->name('ruangan.filter');
Route::get('/{id}/detail', [FrontendController::class, 'show'])->name('detail.show');

Auth::routes();
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::prefix('dashboard')->middleware('auth', Admin::class)->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    
    Route::resource('kategori', KategoriController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('gedung', GedungController::class);
    Route::resource('lantai', lantaiController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('ruangan',RuanganController::class); 

    // ✅ TAMBAHAN (TIDAK MENGUBAH YANG LAIN)
    Route::delete('/foto/{id}', [RuanganController::class, 'destroyFoto'])->name('foto.destroy');
});