<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kategori = Kategori::all();

        confirmDelete('Data ini akan dihapus secara permanen', 'Apa anda yakin?');
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|unique:kategoris,kategori',
        ],
    [
        'kategori' => 'Kategori harus diisi dan tidak boleh sama!',
    ]);

        $kategori = new Kategori();
        $kategori ->kategori = $request->kategori;
        $kategori->save();

        toast('Kategori berhasil ditambah', 'success')->position('bottom-end');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->kategori = $request->kategori;
        $kategori->save();

        toast('kategori berhasil diperbarui', type: 'success')->position('bottom-end');
        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        toast('kategori berhasil dihapus', type: 'success')->position('bottom-end');

        return redirect()->route('kategori.index');
    }
}
