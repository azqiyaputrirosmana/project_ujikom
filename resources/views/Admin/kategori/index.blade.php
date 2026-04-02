@extends('layouts.admin')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col">
                  <div>
                    <a href="{{ route('kategori.create') }}"class="btn btn-info mb-3">Tambah Kategori</a>
                  </div>
                    <table class="table mt-3" id="dataKategori">
                      @include('sweetalert::alert')
                    <thead>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Aksi</th>
                    </thead>
                     <tbody>
                      @foreach ($kategori as $kat)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kat->kategori}}</td>
                        
                        <td><a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('kategori.destroy', $kat->id) }}" onsubmit="return confirmDelete(this);" method="post" style="display:inline;" >
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

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js')}} -->
    <script src="{{ asset('Admin/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('Admin/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('Admin/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('Admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('Admin/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('Admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('Admin/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('Admin/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
    @endsection

    @push('scripts')
      <!-- DataTables JS -->
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
          <script>
        $(document).ready(function () {
          $('#dataKategori').DataTable({
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

  