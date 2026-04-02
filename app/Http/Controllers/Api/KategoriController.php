<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::withCount('ruangan')->get();

        return response()->json([
            'status' => true,
            'data'   => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255|unique:kategoris,kategori',
        ]);

        $kategori = Kategori::create([
            'kategori' => $request->kategori,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Kategori berhasil ditambahkan',
            'data'    => $kategori,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        if (! $kategori) {
            return response()->json([
                'status'  => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'kategori' => 'required|string|max:255|unique:kategoris,kategori,' . $id,
        ]);

        $kategori->update(['kategori' => $request->kategori]);

        return response()->json([
            'status'  => true,
            'message' => 'Kategori berhasil diupdate',
            'data'    => $kategori,
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (! $kategori) {
            return response()->json([
                'status'  => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        $kategori->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}