<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kategori;
use App\Models\Lantai;
use App\Models\Ruangan;
use App\Models\FotoRuangan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::with([
            'kategori',
            'lantai',
            'fasilitas',
            'galeri'
        ])->get();

        $kategori = Kategori::all();
        $lantai = Lantai::all();
        $fasilitas = Fasilitas::all();

        return view('admin.ruangan.index', compact('ruangan', 'kategori', 'lantai', 'fasilitas'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::all();

        return view('admin.ruangan.create', compact('kategori', 'fasilitas', 'lantai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|unique:ruangans,nama_ruangan',
            'kategori_id' => 'required',
            'lantai_id' => 'required',
            'gambar' => 'required|image|max:5120',
            'denah' => 'nullable|image|max:5120',
            'gambar_detail' => 'required|array|min:1|max:5',
            'gambar_detail.*' => 'image|max:5120'
        ]);

        $data = $request->only([
            'nama_ruangan',
            'kategori_id',
            'deskripsi',
            'lantai_id'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        if ($request->hasFile('denah')) {
            $data['denah'] = $request->file('denah')->store('gambar_denah', 'public');
        }

        $ruangan = Ruangan::create($data);

        if ($request->has('fasilitas_id')) {
            $ruangan->fasilitas()->attach($request->fasilitas_id);
        }

        if ($request->hasFile('gambar_detail')) {
            foreach ($request->file('gambar_detail') as $foto) {
                $path = $foto->store('foto_ruangan', 'public');

                FotoRuangan::create([
                    'ruangan_id' => $ruangan->id,
                    'gambar' => $path
                ]);
            }
        }

        Alert::success('Sukses', 'Data Ruangan berhasil ditambahkan');
        return redirect()->route('ruangan.index');
    }

    public function show(string $id)
    {
        $ruangan = Ruangan::with(['galeri', 'fasilitas', 'kategori', 'lantai'])->findOrFail($id);
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $fasilitas_terpilih = $ruangan->fasilitas->pluck('id')->toArray();
        $lantai = Lantai::all();

        return view('admin.ruangan.show', compact(
            'ruangan',
            'kategori',
            'fasilitas',
            'lantai',
            'fasilitas_terpilih'
        ));
    }

    public function edit(string $id)
    {
        $ruangan = Ruangan::with(['fasilitas', 'galeri'])->findOrFail($id);
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $fasilitas_terpilih = $ruangan->fasilitas->pluck('id')->toArray();
        $lantai = Lantai::all();

        return view('admin.ruangan.edit', compact(
            'ruangan',
            'fasilitas',
            'fasilitas_terpilih',
            'kategori',
            'lantai'
        ));
    }

    public function update(Request $request, string $id)
    {
        $ruangan = Ruangan::with('galeri')->findOrFail($id);

        $request->validate([
            'nama_ruangan' => 'required',
            'kategori_id' => 'required',
            'lantai_id' => 'required',
            'gambar' => 'nullable|image|max:5120',
            'denah' => 'nullable|image|max:5120',
            'gambar_detail.*' => 'image|max:5120'
        ]);

        if ($request->hasFile('gambar_detail')) {
            $totalFoto = $ruangan->galeri->count() + count($request->file('gambar_detail'));

            if ($totalFoto > 5) {
                return back()
                    ->withErrors(['gambar_detail' => 'Total foto galeri maksimal 5'])
                    ->withInput();
            }
        }

        $data = $request->only([
            'nama_ruangan',
            'kategori_id',
            'deskripsi',
            'lantai_id'
        ]);

        if ($request->hasFile('gambar')) {
            if ($ruangan->gambar) {
                $ruangan->deleteImage();
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        if ($request->hasFile('denah')) {
            if ($ruangan->denah) {
                $ruangan->deleteDenah();
            }
            $data['denah'] = $request->file('denah')->store('gambar_denah', 'public');
        }

        $ruangan->update($data);
        $ruangan->fasilitas()->sync($request->fasilitas_id ?? []);

        if ($request->hasFile('gambar_detail')) {
            foreach ($request->file('gambar_detail') as $foto) {
                $path = $foto->store('foto_ruangan', 'public');

                FotoRuangan::create([
                    'ruangan_id' => $ruangan->id,
                    'gambar' => $path
                ]);
            }
        }

        toast('Ruangan berhasil diperbarui', 'success')->position('bottom-end');
        return redirect()->route('ruangan.index');
    }

    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->gambar) {
            Storage::disk('public')->delete($ruangan->gambar);
        }

        $ruangan->fasilitas()->detach();
        $ruangan->deleteImage();
        $ruangan->deleteDenah();
        $ruangan->delete();

        toast('Ruangan berhasil dihapus', 'success')->position('bottom-end');
        return back();
    }

    // ✅ FIX ERROR DI SINI (PALING PENTING)
    public function destroyFoto($id)
    {
        $foto = FotoRuangan::find($id);

        if (!$foto) {
            return back();
        }

        if ($foto->gambar && Storage::disk('public')->exists($foto->gambar)) {
            Storage::disk('public')->delete($foto->gambar);
        }

        $foto->delete();

        return back();
    }
}