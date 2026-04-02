<!-- /*
* Template Name: Archiark
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/aos.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/style.css')}}">

	<title>SIG — Detail Ruangan</title>
</head>
<body>

<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close">
			<span class="icofont-close js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
	<div class="container">
		<div class="site-navigation">
			<a href="{{ route('front.index') }}" class="logo m-0 float-start text-dark">
				Beranda /<span class="text-primary"> Detail</span>
			</a>

			<a href="#" class="burger ml-auto float-end site-menu-toggle dark js-menu-toggle d-inline-block d-lg-none">
				<span></span>
			</a>
			<ul class="site-menu float-end d-none d-md-block">
				<li>
					<a href="#" class="d-flex align-items-center text-white h2 fw-bold">
						<span class="icon-phone me-2"></span>
						<span>+ 2 292 4392 327</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="section sec-3">
	<div class="container">

		<div class="row mb-3 justify-content-between">

			<div class="col-lg-5">
				<img src="{{ asset('storage/'.$ruangan->gambar) }}"
					 class="img-fluid"
					 style="max-height:300px;object-fit:cover;"
					 alt="">

				<h4 class="mt-2">{{ $ruangan->nama_ruangan }}</h4>
				<h6>{{ $ruangan->kategori->kategori }}</h6>

				<p class="text-dark">Fasilitas</p>
				<ol>
					@foreach ($ruangan->fasilitas as $fas)
						<li>{{ $fas->nama_fasilitas }}</li>
					@endforeach
				</ol>

				<span class="text-dark">Lokasi</span>
				<p>
					Lantai {{ $ruangan->lantai->lantai }}
					Gedung {{ $ruangan->lantai->gedung->nama_gedung }}
				</p>

				<span class="text-dark">Deskripsi</span>
				<p>{{ $ruangan->deskripsi }}</p>
			</div>

			<div class="col-lg-6">
				<img src="{{ asset('storage/'.$ruangan->denah) }}"
					 alt="Denah {{ $ruangan->nama_ruangan }}"
					 class="img-fluid">
				<p align="center">
					<i>Denah lokasi ruangan {{ $ruangan->nama_ruangan }}</i>
				</p>
			</div>

		</div>

		{{-- ===================== --}}
		{{-- GALERI FOTO RUANGAN --}}
		{{-- ===================== --}}
		<div class="row mt-4">
			<h5 class="mb-3">Foto Ruangan</h5>

			{{-- FOTO UTAMA --}}
			@if($ruangan->gambar)
				<div class="col-md-3 col-sm-4 col-6 mb-3">
					<a href="{{ asset('storage/'.$ruangan->gambar) }}" class="glightbox">
						<img
							src="{{ asset('storage/'.$ruangan->gambar) }}"
							class="img-fluid rounded"
							style="height:180px;object-fit:cover;">
					</a>
				</div>
			@endif

			{{-- FOTO GALERI --}}
			@foreach ($ruangan->fotoRuangans as $foto)
				<div class="col-md-3 col-sm-4 col-6 mb-3 text-center">

					<a href="{{ asset('storage/'.$foto->gambar) }}" class="glightbox">
						<img
							src="{{ asset('storage/'.$foto->gambar) }}"
							class="img-fluid rounded"
							style="height:180px;object-fit:cover;">
					</a>

					<!-- TAMBAHAN: TOMBOL HAPUS -->
					<form action="{{ route('foto.destroy', $foto->id) }}" method="POST" class="mt-2">
						@csrf
						@method('DELETE')

						<button type="submit" class="btn btn-danger btn-sm"
							onclick="return confirm('Yakin hapus foto ini?')">
							Hapus
						</button>
					</form>

				</div>
			@endforeach
		</div>

		<a href="{{ route('front.index') }}" class="btn btn-outline-dark btn-sm mt-4">
			← Kembali
		</a>

	</div>
</div>

<div id="overlayer"></div>
<div class="loader">
	<div class="spinner-border" role="status">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>

<script src="{{ asset('Front/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('Front/js/tiny-slider.js')}}"></script>
<script src="{{ asset('Front/js/aos.js')}}"></script>
<script src="{{ asset('Front/js/glightbox.min.js')}}"></script>
<script src="{{ asset('Front/js/navbar.js')}}"></script>
<script src="{{ asset('Front/js/counter.js')}}"></script>
<script src="{{ asset('Front/js/custom.js')}}"></script>

<script>
	const lightbox = GLightbox();
</script>

</body>
</html>