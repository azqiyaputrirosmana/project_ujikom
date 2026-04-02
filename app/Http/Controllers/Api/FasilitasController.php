<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();

        return response()->json([
            'status' => true,
            'data'   => $fasilitas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255|unique:fasilitas,nama_fasilitas',
        ]);

        $fasilitas = Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Fasilitas berhasil ditambahkan',
            'data'    => $fasilitas,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);

        if (! $fasilitas) {
            return response()->json([
                'status'  => false,
                'message' => 'Fasilitas tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255|unique:fasilitas,nama_fasilitas,' . $id,
        ]);

        $fasilitas->update(['nama_fasilitas' => $request->nama_fasilitas]);

        return response()->json([
            'status'  => true,
            'message' => 'Fasilitas berhasil diupdate',
            'data'    => $fasilitas,
        ]);
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);

        if (! $fasilitas) {
            return response()->json([
                'status'  => false,
                'message' => 'Fasilitas tidak ditemukan',
            ], 404);
        }

        $fasilitas->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Fasilitas berhasil dihapus',
        ]);
    }
}