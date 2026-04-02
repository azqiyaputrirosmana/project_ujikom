<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Gedung;
use App\Models\Lantai;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // KODE LAMA (TIDAK DIUBAH)
        $fasilitas = Fasilitas::all();
        $gedung = Gedung::all();
        $ruangan = Ruangan::all();

      

        return view('admin.index', compact(
            'fasilitas',
            'gedung',
            'ruangan',
        ));
    }

    public function profile()
    {
        $user = User::all();
        return view('layouts.admin.navbar');
    }
}
