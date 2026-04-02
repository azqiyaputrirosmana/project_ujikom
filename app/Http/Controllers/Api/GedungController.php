<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
        $gedung = Gedung::with(['lantai.ruangans.kategori'])->get();

        return response()->json([
            'status' => true,
            'data'   => $gedung,
        ]);
    }

    public function show($id)
    {
        $gedung = Gedung::with([
            'lantai.ruangans.kategori',
            'lantai.ruangans.fasilitas',
            'lantai.ruangans.fotoRuangans',
        ])->find($id);

        if (! $gedung) {
            return response()->json([
                'status'  => false,
                'message' => 'Gedung tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data'   => $gedung,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
        ]);

        $gedung = Gedung::create([
            'nama_gedung' => $request->nama_gedung,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Gedung berhasil ditambahkan',
            'data'    => $gedung,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $gedung = Gedung::find($id);

        if (! $gedung) {
            return response()->json([
                'status'  => false,
                'message' => 'Gedung tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'nama_gedung' => 'required|string|max:255',
        ]);

        $gedung->update(['nama_gedung' => $request->nama_gedung]);

        return response()->json([
            'status'  => true,
            'message' => 'Gedung berhasil diupdate',
            'data'    => $gedung,
        ]);
    }

    public function destroy($id)
    {
        $gedung = Gedung::find($id);

        if (! $gedung) {
            return response()->json([
                'status'  => false,
                'message' => 'Gedung tidak ditemukan',
            ], 404);
        }

        $gedung->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Gedung berhasil dihapus',
        ]);
    }
}