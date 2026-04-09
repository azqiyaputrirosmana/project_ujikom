<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Front/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('Front/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('Front/css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('Front/css/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('Front/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Front/css/style.css')}}">

    <title>SIG — Website Sistem Informasi Geografis</title>

    <style>
        /* ================= TAMBAHAN ESTETIK ================= */

        body {
            background: linear-gradient(180deg, #eaf6ff, #f4fbff);
            position: relative;
            overflow-x: hidden;
        }

        .floating-emoji {
            position: fixed;
            font-size: 24px;
            opacity: 0.35;
            animation: floatEmoji 18s linear infinite;
            z-index: 0;
            pointer-events: none;
        }

        @keyframes floatEmoji {
            0% { transform: translateY(110vh) rotate(0deg); }
            100% { transform: translateY(-120vh) rotate(360deg); }
        }

        /* ====== SEARCH ESTETIC (TAMBAHAN SAJA) ====== */

        .sec-5 .form-control {
            border-radius: 12px;
            border: 2px solid #b7dbff;
            padding: 10px 14px;
            font-size: 15px;
            transition: all .3s ease;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.08);
        }

        .sec-5 .form-control:focus {
            border-color: #4da3ff;
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .sec-5 button[type="submit"] {
            background: linear-gradient(135deg, #4da3ff, #2b7bff) !important;
            color: #fff !important;
            border-radius: 12px !important;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.35);
            transition: all .3s ease;
        }

        .sec-5 button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 35px rgba(0, 123, 255, 0.45);
            background: linear-gradient(135deg, #2b7bff, #1a5fd0) !important;
        }

        .simple-slider {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
        }
        .simple-slider::-webkit-scrollbar { display: none; }
        .simple-slider img {
            height: 230px;
            border-radius: 15px;
            flex-shrink: 0;
        }

        .hero-slider {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .hero-slide.active { opacity: 1; }

        /* ====== TOMBOL LOGIN BIRU CUSTOM ====== */
        .btn-login-nav {
            background-color: #3b82f6 !important;
            color: #ffffff !important;
            padding: 8px 25px !important;
            border-radius: 30px !important; /* Membuat bulat sempurna sampingnya */
            font-weight: bold !important;
            transition: 0.3s all ease !important;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3) !important;
            display: inline-block !important;
            margin-left: 15px !important;
            line-height: 1 !important;
            border: none !important;
        }

        .btn-login-nav:hover {
            background-color: #2563eb !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4) !important;
            color: #ffffff !important;
        }

        /* Penyesuaian agar teks menu lain tidak berantakan */
        .site-navigation .site-menu > li > a {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body>

<span class="floating-emoji" style="left:5%; animation-delay:0s;">🏫</span>
<span class="floating-emoji" style="left:20%; animation-delay:6s;">📚</span>
<span class="floating-emoji" style="left:40%; animation-delay:3s;">🎒</span>
<span class="floating-emoji" style="left:65%; animation-delay:9s;">📝</span>
<span class="floating-emoji" style="left:85%; animation-delay:1s;">📐</span>

<nav class="site-nav">
    <div class="container-lg-1">
        <div class="site-navigation">
            <a href="{{ route('front.index') }}" class="logo m-0 float-start ms-3">
                SI-PETA SEKOLAH<span class="text-primary">.</span>
            </a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-start">
                <li class="active"><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('tentang') }}">Tentang</a></li>
                <li><a href="{{ route('login') }}" class="btn-login-nav">Login</a></li>
            </ul>

            <ul class="site-menu float-end d-none d-md-block">
                <li>
                    <a href="https://www.google.com/maps/place/SMK+Assalaam+Bandung"
                       class="d-flex align-items-center text-white h2 fw-bold">
                        <span class="icon-loc"></span>
                        <span>
                            Jl. Situ Tarate Jl. Cibaduyut, Cangkuang Kulon,
                            Kec. Dayeuhkolot, Kabupaten Bandung,
                            Jawa Barat 40265
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero-2 overlay position-relative"
    style="background-image: url('{{ asset('Front/logo.hitam.jpg') }}');">

    <div class="hero-slider">
        <div class="hero-slide active" style="background-image:url('{{ asset('Front/smk.jpg') }}')"></div>
        <div class="hero-slide" style="background-image:url('{{ asset('Front/sakola.jpg') }}')"></div>
        <div class="hero-slide" style="background-image:url('{{ asset('Front/rpl1.jpg') }}')"></div>
    </div>

    <div class="container position-relative" style="z-index:2;">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-5 text-white fw-bold">
                    <span>Selamat Datang di</span>
                    <span class="d-block">Peta Sekolah</span>
                    <span class="d-block">Interaktif 🏫🧑‍🏫</span>
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="section bg-light">
    <div class="container">
        <h2 class="heading text-center mb-4">Galeri Sekolah</h2>
        <div class="simple-slider">
            <img src="{{ asset('Front/rpl.jpg') }}">
            <img src="{{ asset('Front/tkr.jpg') }}">
            <img src="{{ asset('Front/tsm.jpeg') }}">
            <img src="{{ asset('Front/t brsama.JPG') }}">
            <img src="{{ asset('Front/kunjin.jpg') }}">
            <img src="{{ asset('Front/musikalisasi.jpg') }}">
        </div>
    </div>
</div>

<div class="section sec-5">
    <div class="container">
        <div class="row mb-5 d-flex justify-content-between align-items-center">
            <div class="col-lg-8">
                <h2 class="heading">Ruangan</h2>
            </div>

            <div class="col-lg-3">
                <form method="GET" action="{{ route('front.index') }}">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari ruangan..."
                           class="form-control">
            </div>

            <div class="col-lg-1">
                    <button type="submit"
                        style="width:100%;height:38px;background:black;color:white;border:none;border-radius:5px;">
                        Cari
                    </button>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($ruangan as $ruang)
            <div class="col">
                <div class="single-portfolio">
                    <a href="{{ route('detail.show', $ruang->id) }}">
                        <img src="{{ asset('storage/'.$ruang->gambar) }}"
                             class="img-fluid"
                             style="height:260px;object-fit:cover;">
                        <div class="contents">
                            <h3>{{ $ruang->nama_ruangan }}</h3>
                            <div class="cat">{{ $ruang->kategori->nama_kategori }}</div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    const heroSlides = document.querySelectorAll('.hero-slide');
    let heroIndex = 0;

    setInterval(() => {
        heroSlides[heroIndex].classList.remove('active');
        heroIndex = (heroIndex + 1) % heroSlides.length;
        heroSlides[heroIndex].classList.add('active');
    }, 4000);
</script>

</body>
</html>