<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';

    protected $fillable = [
        'nama_ruangan',
        'kategori_id',
        'deskripsi',
        'gambar',
        'lantai_id',
        'denah'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function lantai()
    {
        return $this->belongsTo(Lantai::class, 'lantai_id');
    }

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_ruangan');
    }

    // ✅ KODE LAMA (TIDAK DIUBAH)
    public function fotoRuangans()
    {
        return $this->hasMany(FotoRuangan::class);
    }

    // ✅ TAMBAHAN UNTUK GALERI DI INDEX
    public function galeri()
    {
        return $this->hasMany(FotoRuangan::class, 'ruangan_id');
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('storage/' . $this->gambar))) {
            return unlink(public_path('storage/' . $this->gambar));
        }
    }

    public function deleteDenah()
    {
        if ($this->denah && file_exists(public_path('storage/' . $this->denah))) {
            return unlink(public_path('storage/' . $this->denah));
        }
    }
}
