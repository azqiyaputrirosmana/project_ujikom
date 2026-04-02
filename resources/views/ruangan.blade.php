<!-- /*
* Template Name: Archiark
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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

	<title>SIG &mdash; Filter Gedung</title>
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
				<a href="index.html" class="logo m-0 float-start">SIG<span class="text-primary">.</span> </a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-start">
					<li class="active"><a href="index.html">Home</a></li>
					
					<li><a href="{{ route('tentang') }}">Tentang</a></li>
			
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
					<h1 class="mb-5"><span>Selamat Datang di</span> <span class="d-block">Sistem Informasi</span> <span class="d-block">Geografis</span></h1>

					

					<div class="intro-desc">
						<div class="line"></div>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	
	


	<div class="section sec-5">
		<div class="container">
			<div class="row">
                
				<div class="col-lg-12">
					<h2 class="heading">Ruangan di Gedung {{$pilihGedung->nama_gedung}}</h2>
				</div>
				
			</div>

			
			

			<div class="row g-4">
				@if ($ruangan->isEmpty())
					<h5 class="text-secondary" align="center">{{ "Ruangan di gedung ini belum ada" }}</h5>
				@else
				 @foreach ($ruangan as $ruang)
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="single-portfolio">
								<a href="{{route('detail.show', $ruang->id)}}">
									<img src="{{asset('storage/'. $ruang->gambar)}}" alt="Image" height="260px" style="max-height:265px" class="img-fluid d-flex justify-content-center">
									<div class="contents">
										<h3>{{ $ruang->nama_ruangan }}</h3>
										<div class="cat">{{ $ruang->kategori->nama_kategori }}</div>
									</div>
								</a>
							</div>
						</div>
				@endforeach
				
				@endif
       
			<a href="{{ route('front.index') }}" class="btn btn-outline-dark  " >
                    ← Kembali
                </a>
			</div>
		</div>
	</div>
	

	

	


	<!-- Preloader -->
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
