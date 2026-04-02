<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('Admin/') }}"
  data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Edit Ruangan</title>

  <link rel="stylesheet" href="{{ asset('Admin/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('Admin/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('Admin/css/demo.css') }}" />
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('layouts.admin.sidebar')

      <div class="layout-page">
        @include('layouts.admin.navbar')

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col">

                <h2>Edit Data Ruangan</h2>

                {{-- ERROR VALIDASI --}}
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form
                  action="{{ route('ruangan.update', $ruangan->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                >
                  @csrf
                  @method('PUT')

                  {{-- NAMA RUANGAN --}}
                  <label class="mt-2">Nama Ruangan</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nama_ruangan"
                    value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                  >

                  {{-- KATEGORI --}}
                  <label class="mt-2">Kategori</label>
                  <select name="kategori_id" class="form-select">
                    @foreach ($kategori as $kat)
                      <option
                        value="{{ $kat->id }}"
                        {{ $kat->id == $ruangan->kategori_id ? 'selected' : '' }}
                      >
                        {{ $kat->kategori }}
                      </option>
                    @endforeach
                  </select>

                  {{-- LOKASI --}}
                  <label class="mt-2">Lokasi</label>
                  <select name="lantai_id" class="form-select">
                    @foreach ($lantai as $lokasi)
                      <option
                        value="{{ $lokasi->id }}"
                        {{ $lokasi->id == $ruangan->lantai_id ? 'selected' : '' }}
                      >
                        Lantai {{ $lokasi->lantai }}
                        - {{ $lokasi->gedung->nama_gedung }}
                      </option>
                    @endforeach
                  </select>

                  {{-- FASILITAS --}}
                  <label class="mt-2">Fasilitas</label><br>
                  @foreach ($fasilitas as $fas)
                    <input
                      type="checkbox"
                      name="fasilitas_id[]"
                      value="{{ $fas->id }}"
                      {{ in_array($fas->id, $fasilitas_terpilih) ? 'checked' : '' }}
                    >
                    {{ $fas->nama_fasilitas }} <br>
                  @endforeach

                  {{-- DESKRIPSI --}}
                  <label class="mt-2">Deskripsi</label>
                  <textarea
                    name="deskripsi"
                    class="form-control"
                  >{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>

                  {{-- GAMBAR UTAMA --}}
                  <label class="mt-3">Gambar Utama</label><br>
                  @if ($ruangan->gambar)
                    <img
                      src="{{ asset('storage/' . $ruangan->gambar) }}"
                      width="120"
                      class="mb-2"
                      alt="Gambar Utama"
                    >
                  @endif
                  <input
                    type="file"
                    class="form-control"
                    name="gambar"
                  >

                  {{-- GALERI FOTO RUANGAN --}}
                  <label class="mt-3">Galeri Foto Ruangan</label><br>

                  @if ($ruangan->galeri && $ruangan->galeri->count())
                    <div class="d-flex flex-wrap gap-2 mb-2">
                      @foreach ($ruangan->galeri as $foto)
                        <img
                          src="{{ asset('storage/' . $foto->gambar) }}"
                          width="80"
                          height="60"
                          style="object-fit: cover; border-radius: 4px;"
                          alt="Foto Galeri"
                        >
                      @endforeach
                    </div>
                  @endif

                  <input
                    type="file"
                    class="form-control"
                    name="gambar_detail[]"
                    multiple
                    accept="image/*"
                  >
                  <small class="text-muted">
                    Upload untuk menambah foto galeri (boleh lebih dari satu, maksimal total 5)
                  </small>

                  {{-- DENAH --}}
                  <label class="mt-3">Denah</label><br>
                  @if ($ruangan->denah)
                    <img
                      src="{{ asset('storage/' . $ruangan->denah) }}"
                      width="120"
                      class="mb-2"
                      alt="Denah Ruangan"
                    >
                  @endif
                  <input
                    type="file"
                    class="form-control"
                    name="denah"
                  >

                  {{-- BUTTON --}}
                  <button class="btn btn-success mt-3">Update</button>
                  <a
                    href="{{ route('ruangan.index') }}"
                    class="btn btn-info mt-3"
                  >
                    Batal
                  </a>

                </form>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
