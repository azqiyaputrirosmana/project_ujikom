@extends('layouts.admin')

@section('content')



            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col">
                  <div class="buy-now">
          <a
        href="{{ route('lantai.create') }}"
        class="btn btn-info mb-2"
        >Tambah lantai</a
      >
    </div>
                  <table>
                    <table class="table mt-3" id="dataLantai">
                    <thead>
                      <th>No</th>
                      <th>Lantai</th>
                      <th>Nama Gedung</th>
                      <th>Aksi</th>
                    </thead>
                     <tbody>
                      @foreach ($lantai as $lokasi)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lokasi->lantai}}</td>
                        <td>{{ $lokasi->gedung->nama_gedung }}</td>
                        
                        <td><a href="{{ route('lantai.edit', $lokasi->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('lantai.destroy', $lokasi->id) }}" onsubmit="return confirmDelete(this);" method="post" style="display:inline;" >
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger ">Hapus</button>

                        </form>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                      

                    
                  </table>
                  </table>
                </div>
              </div>
            </div>
            @endsection
            <!-- / Content -->

            @push('scripts')
      <!-- DataTables JS -->
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
          <script>
        $(document).ready(function () {
          $('#dataLantai').DataTable({
            responsive: true,
            autoWidth: false
          });
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(form) {
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
    return false;
}
</script>

@endpush
