<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoRuangan extends Model
{
    protected $fillable = [
        'ruangan_id',
        'gambar'
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}

