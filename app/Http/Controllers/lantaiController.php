<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Lantai;
use Illuminate\Http\Request;

class lantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lantai = Lantai::all();
        return view('admin.lantai.index', compact('lantai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lantai = Lantai::all();
        $gedung = Gedung::all();
        return view('admin.lantai.create', compact('lantai', 'gedung'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lantai'=> 'required|max:3',
            'gedung_id' => 'required'
        ],
        [
            'lantai' => 'inputkan lantai maksimal 3',
            'gedung_id' => 'pilih salah satu gedung',
        ]
        );
        $lantai = new Lantai();
        $lantai->lantai = $request->lantai;
        $lantai->gedung_id = $request->gedung_id;
        $lantai->save();
        toast('Data lantai berhasil ditambahkan', 'success');
        return redirect()->route('lantai.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        return view('admin.lantai.show', compact('lantai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $gedung = Gedung::all();
        return view('admin.lantai.edit', compact('lantai', 'gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate( [
            'lantai' => 'required|max:3',
            'gedung_id' => 'required',
        ],
        [
            'lantai' => 'lantai tidak ada',
            'gedung_id' => 'Pilih gedung terlebih dahulu',
        ]
        );
        $lantai = Lantai::findOrFail($id);
        $lantai->lantai = $request->lantai;
        $lantai->gedung_id = $request->gedung_id;
        $lantai->save();
        toast('Data lantai berhasil diperbarui', 'success');
        return redirect()->route('lantai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $lantai->delete();
        toast('Lantai berhasil dihapus', 'success')->position('bottom-end');
        return redirect()->route('lantai.index', compact('lantai'));
    }
}
