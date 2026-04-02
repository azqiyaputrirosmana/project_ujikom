<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{  asset('Front/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{  asset('Front/fonts/flaticon/font/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/aos.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{ asset('Front/css/style.css')}}">

	<title>SIG &mdash; Tentang</title>
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
				<a href="{{ route('front.index') }}" class="logo m-0 float-start">SI-PETA SEKOLAH<span class="text-primary">.</span> </a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-start">
					<li ><a href="{{ route('front.index') }}">Home</a></li>
					
					<li class="active"><a href="{{ route('tentang') }}">Tentang</a></li>
			
				</ul>

				

				<a href="#" class="burger ml-auto float-end site-menu-toggle light js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
					<span></span>
				</a>
				

			</div>
		</div>
	</nav>

    <div class="hero-2 overlay" style="background-image: url('{{ asset('front/Aula.jpg') }}');">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 mx-auto">
					<h1 class="mb-5"><span>Halaman</span> <span class="d-block">Tentang Peta Sekolah Interaktif</span></h1>

					

					<div class="intro-desc">
						<div class="line"></div>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div class="section sec-4">
		<div class="container">
			<div class="row border-bottom mb-5 pb-5 justify-content-between">
				<div class="col-lg-4 align-self-center mb-5">
					<h2 class="heading mb-4">Projek Peta Sekolah Interaktif</h2>
					<p>Aplikasi Peta Sekolah Interaktif (SI-PETA SEKOLAH) ini dibuat sebagai bentuk digitalisasi data ruangan dan fasilitas di lingkungan SMK Assalaam Bandung. Tujuannya adalah untuk memudahkan pengguna dalam mencari informasi tentang lokasi, fasilitas, dan detail tiap ruangan secara interaktif dan efisien.

                    </p>
                    <p>
                    Dengan menggunakan teknologi berbasis Laravel, aplikasi ini menyediakan tampilan yang interaktif, informatif, dan mudah digunakan baik oleh siswa, guru, maupun pihak sekolah.
                </p>
                <h3 class="mt-4">Fitur Utama</h3>
                <ul>
                    <li>Daftar dan detail ruangan.</li>
                    <li>Filter berdasarkan Gedung.</li>
                    <li>Menampilkan fasilitas per ruangan.</li>
                    <li>Visualisasi gambar ruangan dan denah sekolah.</li>
                </ul>
				</div>
				<div class="col-lg-7">
						<img src="{{ asset('front/Aula.jpg') }}" alt="Image" class="img-fluid">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.1812071498953!2d107.59187641270901!3d-6.9665028125599395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8deccecb6f1%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung%20(PUSAT%20KEUNGGULAN)!5e0!3m2!1sid!2sid!4v1752568930042!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" class="mt-4" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				
			</div>
			
		</div>
	</div>
</body>
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
</body>
</html>