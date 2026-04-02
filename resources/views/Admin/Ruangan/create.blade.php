@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl container-p-y">

        <h4 class="fw-bold mb-4">Tambah Ruangan</h4>

        <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NAMA RUANGAN --}}
            <div class="mb-3">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" required>
            </div>

            {{-- KATEGORI --}}
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                    @endforeach
                </select>
            </div>

            {{-- LANTAI --}}
            <div class="mb-3">
                <label class="form-label">Lantai</label>
                <select name="lantai_id" class="form-control" required>
                    <option value="">-- Pilih Lantai --</option>
                    @foreach ($lantai as $l)
                        <option value="{{ $l->id }}">
                            Lantai {{ $l->lantai }} - {{ $l->gedung->nama_gedung }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- FASILITAS --}}
            <div class="mb-3">
                <label class="form-label">Fasilitas</label>
                <div class="row">
                    @foreach ($fasilitas as $f)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="fasilitas_id[]"
                                    value="{{ $f->id }}"
                                >
                                <label class="form-check-label">
                                    {{ $f->nama_fasilitas }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- GAMBAR UTAMA --}}
            <div class="mb-3">
                <label class="form-label">Gambar Utama</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>

            {{-- GALERI FOTO --}}
            <div class="mb-3">
                <label class="form-label">Galeri Foto (1-5 foto)</label>
                <input type="file" name="gambar_detail[]" class="form-control" multiple accept="image/*" required>
            </div>

            {{-- DENAH --}}
            <div class="mb-3">
                <label class="form-label">Denah Ruangan</label>
                <input type="file" name="denah" class="form-control" >
            </div>

            {{-- KETERANGAN --}}
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>
@endsection
