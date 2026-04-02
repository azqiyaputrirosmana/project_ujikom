@extends('layouts.admin')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<div class="content-wrapper">
    <div class="container-xxl container-p-y">

        <a href="{{ route('ruangan.create') }}" class="btn btn-info mb-3">
            Tambah Ruangan
        </a>

        <table class="table table-bordered" id="dataRuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Fasilitas</th>
                    <th>Gambar</th>
                    <th>Galeri</th>
                    <th>Denah</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ruangan as $ruang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $ruang->nama_ruangan }}</td>

                        <td>
                            {{ $ruang->kategori->kategori ?? '-' }}
                        </td>

                        <td>
                            Lantai {{ $ruang->lantai->lantai ?? '-' }}
                            - {{ $ruang->lantai->gedung->nama_gedung ?? '-' }}
                        </td>

                        {{-- FASILITAS --}}
                        <td>
                            @if ($ruang->fasilitas->count())
                                <ul class="mb-0 ps-3">
                                    @foreach ($ruang->fasilitas as $fas)
                                        <li>{{ $fas->nama_fasilitas }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        {{-- GAMBAR UTAMA --}}
                        <td>
                            @if ($ruang->gambar)
                                <img src="{{ asset('storage/' . $ruang->gambar) }}" width="50" alt="Gambar Utama">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        {{-- GALERI (Perbaikan: tampilkan foto galeri dengan rapi max 5 foto) --}}
                        <td>
                            @if ($ruang->galeri->count())
                                <div class="d-flex flex-wrap">
                                    @foreach ($ruang->galeri as $foto)
                                        <img
                                            src="{{ asset('storage/' . $foto->gambar) }}"
                                            width="40"
                                            height="40"
                                            class="me-1 mb-1 rounded"
                                            alt="Foto Galeri Ruangan"
                                            style="object-fit: cover; border: 1px solid #ddd;"
                                        >
                                    @endforeach
                                </div>
                            @else
                                <span class="text-muted">Kosong</span>
                            @endif
                        </td>

                        {{-- DENAH --}}
                        <td>
                            @if ($ruang->denah)
                                <img src="{{ asset('storage/' . $ruang->denah) }}" width="50" alt="Denah Ruangan">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td>
                            <a href="{{ route('ruangan.show', $ruang->id) }}" class="btn btn-warning btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('ruangan.edit', $ruang->id) }}" class="btn btn-success btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('ruangan.destroy', $ruang->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="confirmDelete(event,this)"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$('#dataRuangan').DataTable({
    responsive: true,
    autoWidth: false,
    scrollX: true
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event, form) {
    event.preventDefault();
    Swal.fire({
        title: 'Yakin mau hapus?',
        text: 'Data tidak akan bisa kembali',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>
@endpush
