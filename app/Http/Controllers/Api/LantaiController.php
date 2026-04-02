<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lantai;
use Illuminate\Http\Request;

class LantaiController extends Controller
{
    public function byGedung($gedung_id)
    {
        $lantai = Lantai::with('ruangans.kategori')
            ->where('gedung_id', $gedung_id)
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $lantai,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lantai'    => 'required|string|max:100',
            'gedung_id' => 'required|exists:gedung,id',
        ]);

        $lantai = Lantai::create([
            'lantai'    => $request->lantai,
            'gedung_id' => $request->gedung_id,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Lantai berhasil ditambahkan',
            'data'    => $lantai->load('gedung'),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $lantai = Lantai::find($id);

        if (! $lantai) {
            return response()->json([
                'status'  => false,
                'message' => 'Lantai tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'lantai'    => 'sometimes|string|max:100',
            'gedung_id' => 'sometimes|exists:gedung,id',
        ]);

        $lantai->update($request->only('lantai', 'gedung_id'));

        return response()->json([
            'status'  => true,
            'message' => 'Lantai berhasil diupdate',
            'data'    => $lantai->load('gedung'),
        ]);
    }

    public function destroy($id)
    {
        $lantai = Lantai::find($id);

        if (! $lantai) {
            return response()->json([
                'status'  => false,
                'message' => 'Lantai tidak ditemukan',
            ], 404);
        }

        $lantai->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Lantai berhasil dihapus',
        ]);
    }
}