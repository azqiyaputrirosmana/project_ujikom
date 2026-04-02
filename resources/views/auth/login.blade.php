@extends('layouts.app')

@section('content')

<!-- ================= TAMBAHAN STYLE (WARNA SAJA) ================= -->
<style>
    body {
        background: #dff0ff;
        min-height: 100vh;
        overflow: hidden;
    }

    /* wrapper tetap */
    .authentication-wrapper {
        position: relative;
    }

    /* CARD LOGIN JADI BIRU MUDA (BUKAN PUTIH) */
    .card {
        background: #eaf6ff !important;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        z-index: 2;
    }

    /* judul */
    .app-brand-text {
        color: #2563eb;
        font-size: 26px;
        letter-spacing: 2px;
    }

    label {
        color: #1e3a8a;
        font-weight: 500;
    }

    /* input */
    .form-control {
        background: #f4fbff;
        border: 1px solid #bfdbfe;
    }

    .form-control:focus {
        border-color: #60a5fa;
        box-shadow: 0 0 0 0.15rem rgba(96,165,250,.25);
    }

    /* BUTTON LOGIN JADI BIRU */
    .btn-primary {
        background: #60a5fa !important;
        border: none;
    }

    .btn-primary:hover {
        background: #3b82f6 !important;
    }

    /* emoji sekolah */
    .emoji {
        position: absolute;
        font-size: 26px;
        animation: float 15s linear infinite;
        opacity: 0.6;
        z-index: 1;
    }

    .emoji:nth-child(1) { left: 10%; animation-duration: 12s; }
    .emoji:nth-child(2) { left: 30%; animation-duration: 16s; }
    .emoji:nth-child(3) { left: 50%; animation-duration: 14s; }
    .emoji:nth-child(4) { left: 70%; animation-duration: 18s; }
    .emoji:nth-child(5) { left: 90%; animation-duration: 20s; }

    @keyframes float {
        from {
            bottom: -60px;
            transform: rotate(0deg);
        }
        to {
            bottom: 110%;
            transform: rotate(360deg);
        }
    }
</style>
<!-- =============================================================== -->

<!-- emoji (TAMBAHAN AMAN) -->
<div class="emoji">📚</div>
<div class="emoji">✏️</div>
<div class="emoji">🎒</div>
<div class="emoji">📝</div>
<div class="emoji">🏫</div>

<!-- ================= KODE ASLI KAMU (TIDAK DIUBAH) ================= -->
<div class="container">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">

          <div class="app-brand justify-content-center">
            <!-- Logo SVG mu di sini -->
            <span class="app-brand-text demo text-body fw-bolder">LOGIN</span>
          </div>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email">Email</label>
              <input id="email" type="email"
                     class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required autofocus>
              @error('email')
                <div style="color: red; margin-top: 10px;">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input id="password" type="password"
                     class="form-control @error('password') is-invalid @enderror"
                     name="password" required>
              @error('password')
                <div style="color: red; margin-top: 10px;">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-primary d-grid w-100">
                Login
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- ================= END KODE ASLI ================= -->

@endsection
@extends('layouts.app')

@section('content')

<!-- ================= TAMBAHAN STYLE (WARNA SAJA) ================= -->
<style>
    body {
        background: #dff0ff;
        min-height: 100vh;
        overflow: hidden;
    }

    /* wrapper tetap */
    .authentication-wrapper {
        position: relative;
    }

    /* CARD LOGIN JADI BIRU MUDA (BUKAN PUTIH) */
    .card {
        background: #eaf6ff !important;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        z-index: 2;
    }

    /* judul */
    .app-brand-text {
        color: #2563eb;
        font-size: 26px;
        letter-spacing: 2px;
    }

    label {
        color: #1e3a8a;
        font-weight: 500;
    }

    /* input */
    .form-control {
        background: #f4fbff;
        border: 1px solid #bfdbfe;
    }

    .form-control:focus {
        border-color: #60a5fa;
        box-shadow: 0 0 0 0.15rem rgba(96,165,250,.25);
    }

    /* BUTTON LOGIN JADI BIRU */
    .btn-primary {
        background: #60a5fa !important;
        border: none;
    }

    .btn-primary:hover {
        background: #3b82f6 !important;
    }

    /* emoji sekolah */
    .emoji {
        position: absolute;
        font-size: 26px;
        animation: float 15s linear infinite;
        opacity: 0.6;
        z-index: 1;
    }

    .emoji:nth-child(1) { left: 10%; animation-duration: 12s; }
    .emoji:nth-child(2) { left: 30%; animation-duration: 16s; }
    .emoji:nth-child(3) { left: 50%; animation-duration: 14s; }
    .emoji:nth-child(4) { left: 70%; animation-duration: 18s; }
    .emoji:nth-child(5) { left: 90%; animation-duration: 20s; }

    @keyframes float {
        from {
            bottom: -60px;
            transform: rotate(0deg);
        }
        to {
            bottom: 110%;
            transform: rotate(360deg);
        }
    }
</style>
<!-- =============================================================== -->

<!-- emoji (TAMBAHAN AMAN) -->
<div class="emoji">📚</div>
<div class="emoji">✏️</div>
<div class="emoji">🎒</div>
<div class="emoji">📝</div>
<div class="emoji">🏫</div>

<!-- ================= KODE ASLI KAMU (TIDAK DIUBAH) ================= -->
<div class="container">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">

          <div class="app-brand justify-content-center">
            <!-- Logo SVG mu di sini -->
            <span class="app-brand-text demo text-body fw-bolder">LOGIN</span>
          </div>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email">Email</label>
              <input id="email" type="email"
                     class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required autofocus>
              @error('email')
                <div style="color: red; margin-top: 10px;">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input id="password" type="password"
                     class="form-control @error('password') is-invalid @enderror"
                     name="password" required>
              @error('password')
                <div style="color: red; margin-top: 10px;">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-primary d-grid w-100">
                Login
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- ================= END KODE ASLI ================= -->

@endsection
