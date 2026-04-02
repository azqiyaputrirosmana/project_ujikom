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

  <title>SIG - Detail Ruangan</title>

  <link rel="stylesheet" href="{{ asset('Admin/vendor/css/core.css')}}" />
  <link rel="stylesheet" href="{{ asset('Admin/vendor/css/theme-default.css')}}" />
  <link rel="stylesheet" href="{{ asset('Admin/css/demo.css')}}" />
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

              <h2>Detail Ruangan</h2>

              <form class="form">

                {{-- NAMA RUANGAN --}}
                <label class="mt-2">Nama Ruangan</label>
                <input
                  type="text"
                  class="form-control"
                  disabled
                  value="{{ $ruangan->nama_ruangan }}"
                >

                {{-- KATEGORI --}}
                <label class="mt-2">Kategori</label>
                <select class="form-select" disabled>
                  @foreach ($kategori as $kat)
                    <option {{ $kat->id == $ruangan->kategori_id ? 'selected' : '' }}>
                      {{ $kat->kategori }}
                    </option>
                  @endforeach
                </select>

                {{-- LOKASI --}}
                <label class="mt-2">Lokasi</label>
                <select class="form-select" disabled>
                  @foreach ($lantai as $lokasi)
                    <option {{ $lokasi->id == $ruangan->lantai_id ? 'selected' : '' }}>
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
                    disabled
                    {{ in_array($fas->id, $fasilitas_terpilih) ? 'checked' : '' }}
                  >
                  {{ $fas->nama_fasilitas }} <br>
                @endforeach

                {{-- DESKRIPSI --}}
                <label class="mt-2">Deskripsi</label>
                <textarea class="form-control" disabled>{{ $ruangan->deskripsi }}</textarea>

                {{-- GAMBAR UTAMA --}}
                <label class="mt-3">Gambar Utama</label><br>
                @if($ruangan->gambar)
                  <img
                    src="{{ asset('storage/' . $ruangan->gambar) }}"
                    width="300"
                    class="mb-2"
                    alt="Gambar Utama Ruangan"
                  >
                @else
                  <p class="text-muted">Tidak Ada</p>
                @endif

                {{-- GALERI FOTO RUANGAN --}}
                <label class="mt-4">Galeri Foto Ruangan</label>
                <div class="row mt-2">
                  @forelse ($ruangan->galeri as $foto)
                    <div class="col-md-3 mb-3">
                      <img
                        src="{{ asset('storage/' . $foto->gambar) }}"
                        class="img-fluid rounded shadow"
                        style="height:150px; object-fit:cover;"
                        alt="Foto Galeri Ruangan"
                      >
                    </div>
                  @empty
                    <p class="text-muted">Belum ada foto tambahan</p>
                  @endforelse
                </div>

                {{-- DENAH --}}
                <label class="mt-3">Denah</label><br>
                @if($ruangan->denah)
                  <img
                    src="{{ asset('storage/' . $ruangan->denah) }}"
                    width="300"
                    class="mb-2"
                    alt="Denah Ruangan"
                  >
                @else
                  <p class="text-muted">Tidak Ada</p>
                @endif

                <br>
                <a
                  href="{{ route('ruangan.index') }}"
                  class="btn btn-primary mt-3"
                >
                  Kembali
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
