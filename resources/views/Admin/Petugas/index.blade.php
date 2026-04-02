@extends('layouts.admin')


@section('content')
  <div class="content-wrapper">
            <!-- Content -->

            @include('sweetalert::alert')
            
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col">
                  <div>
                    <a
                      href="{{ route('petugas.create') }}" class="btn btn-info mb-3">Tambah Petugas</a
                    >
                  </div>
                  <table class="table mt-3" id="dataPetugas">
                    <thead>
                      <th>No</th>
                      <th>Nama Petugas</th>
                      <th>Email</th>
                      <th>Peran</th>
                      <th>Aksi</th>
                    </thead>
                     <tbody>
                      @foreach ($petugas as $user)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if ($user->role == 1)
                        {{ "Admin" }}
                        @else
                        {{ "Petugas" }}
                        @endif </td>
                        <td><a href="{{ route('petugas.edit', $user->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('petugas.show', $user->id) }}" class="btn btn-warning">Detail</a>
                        <form action="{{ route('petugas.destroy', $user->id) }}" onsubmit="return confirmDelete(this);" method="post" style="display:inline;" >
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger ">Hapus</button>

                        </form>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                      

                    
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            
            <!-- / Footer -->

           
     

@endsection
          <!-- Content wrapper -->
          

      @push('scripts')
      <!-- DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
  $(document).ready(function () {
    $('#dataPetugas').DataTable({
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

