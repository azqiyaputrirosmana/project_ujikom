<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\FotoRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $query = Ruangan::with([
            'kategori',
            'lantai.gedung',
            'fasilitas',
            'fotoRuangans',
        ]);

        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->filled('lantai_id')) {
            $query->where('lantai_id', $request->lantai_id);
        }

        if ($request->filled('search')) {
            $query->where('nama_ruangan', 'like', '%' . $request->search . '%');
        }

        $ruangan = $query->latest()->paginate(10);

        return response()->json([
            'status' => true,
            'data'   => $ruangan,
        ]);
    }

    public function show($id)
    {
        $ruangan = Ruangan::with([
            'kategori',
            'lantai.gedung',
            'fasilitas',
            'fotoRuangans',
        ])->find($id);

        if (! $ruangan) {
            return response()->json([
                'status'  => false,
                'message' => 'Ruangan tidak ditemukan',
            ], 404);
        }

        $ruangan->gambar_url = $ruangan->gambar
            ? asset('storage/' . $ruangan->gambar)
            : null;

        $ruangan->denah_url = $ruangan->denah
            ? asset('storage/' . $ruangan->denah)
            : null;

        $ruangan->fotoRuangans->transform(function ($foto) {
            $foto->gambar_url = asset('storage/' . $foto->gambar);
            return $foto;
        });

        return response()->json([
            'status' => true,
            'data'   => $ruangan,
        ]);
    }

    public function byLantai($lantai_id)
    {
        $ruangan = Ruangan::with(['kategori', 'fasilitas', 'fotoRuangans'])
            ->where('lantai_id', $lantai_id)
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $ruangan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan'  => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'lantai_id'     => 'required|exists:lantai,id',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'denah'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fasilitas'     => 'nullable|array',
            'fasilitas.*'   => 'exists:fasilitas,id',
            'foto_galeri'   => 'nullable|array',
            'foto_galeri.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama_ruangan', 'kategori_id', 'lantai_id', 'deskripsi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ruangan/gambar', 'public');
        }

        if ($request->hasFile('denah')) {
            $data['denah'] = $request->file('denah')->store('ruangan/denah', 'public');
        }

        $ruangan = Ruangan::create($data);

        if ($request->filled('fasilitas')) {
            $ruangan->fasilitas()->sync($request->fasilitas);
        }

        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $foto) {
                $path = $foto->store('ruangan/galeri', 'public');
                FotoRuangan::create([
                    'ruangan_id' => $ruangan->id,
                    'gambar'     => $path,
                ]);
            }
        }

        return response()->json([
            'status'  => true,
            'message' => 'Ruangan berhasil ditambahkan',
            'data'    => $ruangan->load(['kategori', 'lantai.gedung', 'fasilitas', 'fotoRuangans']),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::find($id);

        if (! $ruangan) {
            return response()->json([
                'status'  => false,
                'message' => 'Ruangan tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'nama_ruangan'  => 'sometimes|string|max:255',
            'kategori_id'   => 'sometimes|exists:kategoris,id',
            'lantai_id'     => 'sometimes|exists:lantai,id',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'denah'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fasilitas'     => 'nullable|array',
            'fasilitas.*'   => 'exists:fasilitas,id',
            'foto_galeri'   => 'nullable|array',
            'foto_galeri.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama_ruangan', 'kategori_id', 'lantai_id', 'deskripsi');

        if ($request->hasFile('gambar')) {
            if ($ruangan->gambar) {
                Storage::disk('public')->delete($ruangan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ruangan/gambar', 'public');
        }

        if ($request->hasFile('denah')) {
            if ($ruangan->denah) {
                Storage::disk('public')->delete($ruangan->denah);
            }
            $data['denah'] = $request->file('denah')->store('ruangan/denah', 'public');
        }

        $ruangan->update($data);

        if ($request->filled('fasilitas')) {
            $ruangan->fasilitas()->sync($request->fasilitas);
        }

        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $foto) {
                $path = $foto->store('ruangan/galeri', 'public');
                FotoRuangan::create([
                    'ruangan_id' => $ruangan->id,
                    'gambar'     => $path,
                ]);
            }
        }

        return response()->json([
            'status'  => true,
            'message' => 'Ruangan berhasil diupdate',
            'data'    => $ruangan->load(['kategori', 'lantai.gedung', 'fasilitas', 'fotoRuangans']),
        ]);
    }

    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);

        if (! $ruangan) {
            return response()->json([
                'status'  => false,
                'message' => 'Ruangan tidak ditemukan',
            ], 404);
        }

        if ($ruangan->gambar) Storage::disk('public')->delete($ruangan->gambar);
        if ($ruangan->denah)  Storage::disk('public')->delete($ruangan->denah);

        foreach ($ruangan->fotoRuangans as $foto) {
            Storage::disk('public')->delete($foto->gambar);
        }

        $ruangan->fasilitas()->detach();
        $ruangan->fotoRuangans()->delete();
        $ruangan->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Ruangan berhasil dihapus',
        ]);
    }
}