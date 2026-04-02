<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Lantai;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
         $search = $request->input('search');

        $ruangan = Ruangan::where('nama_ruangan', 'like', "%{$search}%")->get();

        
        $kategori = Kategori::all();
        
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::with('gedung')->get()->unique('gedung_id');
        return view('welcome', compact('kategori', 'ruangan', 'fasilitas', 'lantai', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about(){
        return view('tentang');
    }
    
    public function filter($gedung_id)
    {
        $lantai = Lantai::where('gedung_id', $gedung_id)->get();
        $ruangan = Ruangan::whereIn('lantai_id', $lantai->pluck('id'))->latest()->get();
        $pilihGedung = Gedung::findOrFail($gedung_id);
        return view('ruangan', compact('lantai', 'ruangan', 'pilihGedung'));
    }

        
    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lokasi = Lantai::all();

        return view('detail.show', compact('ruangan', 'kategori', 'fasilitas', 'lokasi'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
