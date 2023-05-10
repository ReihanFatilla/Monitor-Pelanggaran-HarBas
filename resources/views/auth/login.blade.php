<!DOCTYPE html>
<html lang="id">
<!-- Head -->

<head>
    <!-- <title>Key Login Form Flat Responsive Widget Template :: W3layouts</title> -->
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords"
        content="Web Pencatatan Pelanggaran SMK Harapan Bangsa Yang Di Buat Oleh SISWA SMK IDN Boarding School Yang Bernama Galang Davian Pradana, Muhammad Reihan Fathila, Aldimas Fajar Kurniawan">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css" media="all">

    <!-- ORIGINAL -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

</head>
<!-- //Head -->
<!-- Body -->

<body>

    <section class="main">
        <div class="layer">

            <div class="bottom-grid">
                <div class="logo d-flex align-items-center">
                    <img class="img-fluid logo-gambar" src="{{asset ('images/logo_harbas.png') }}" alt="">
                    <p class="logo-text text-center">SMK Harapan Bangsa</p>
                </div>
                <div class="links">
                    <ul class="links-unordered-list">
                        <li class="active">
                            <a href="/login" class="">Login</a>
                        </li>
                        <!-- <li class="">
						<a href="#" class="">About Us</a>
					</li> -->
                        <li class="">
                            <a href="/register" class="">Register</a>
                        </li>
                        <!-- <li class="">
						<a href="#" class="">Contact</a>
					</li> -->
                    </ul>
                </div>
            </div>
            <div class="content-w3ls">
                <div class="text-center icon">
                    <!-- <img class="img-fluid logo-icon" src="{{asset ('images/logo_harbas.png') }}" alt=""> -->
                    <!-- <i class="bi bi-person-fill logo-icon"></i> -->
                    <span class="fas fa-user logo-icon"></span>
                </div>
                <div class="content-bottom">
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="field-group">
                            <span class="fas fa-user" name="email" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input name="email" id="email" type="email" value="{{ old('email') }}"
                                    placeholder="{{ __('Email Address') }}" class="@error('email') is-invalid @enderror"
                                    required autocomplete="off">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="field-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input name="password" id="password" type="Password" class="@error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="wthree-field">
                            <button type="submit" class="btn">{{ __('Get Started') }}</button>
                        </div>
                        <ul class="list-login">
                            <li class="switch-agileits">
                                <label class="switch">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="slider round" for="remember"></span>
                                    {{ __('keep logged in') }}
                                </label>
                            </li>
                            <li>
                                @if (Route::has('password.request'))
                                    <a class="text-right" href="{{ route('password.request') }}">
                                        {{ __('forgot password?') }}
                                    </a>
                                @endif
                            </li>
                            <li class="clearfix"></li>
                        </ul>
                        <ul class="list-login-bottom">
                            <li class="">
                                <a href="/register" class="">Create Account</a>
                            </li>
                            <li class="">
                                <a href="#" class="text-right">Need Help?</a>
                            </li>
                            <li class="clearfix"></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="bottom-grid1">
                <div class="links">
                    <ul class="links-unordered-list">
                        <li class="">
                            <a href="#" class="">About Us</a>
                        </li>
                        <li class="">
                            <a href="#" class="">Privacy Policy</a>
                        </li>
                        <li class="">
                            <a href="#" class="">Terms of Use</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright">
                    <p>© 2023 Key. All rights reserved | Design by
                        <a href="">Galang Davian Pradana</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>
<!-- //Body -->

</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/08571edf80.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="login" id="login">
        <div class="login-container">

            <nav class="d-flex justify-content-between">

                <div class="logo d-flex align-items-center">
                    <img class="img-fluid logo-gambar" src="{{asset ('images/logo_harbas.png') }}" alt="">
                    <p class="logo-text text-center">SMK Harapan Bangsa</p>
                </div>

                <div class="d-flex align-items-center nav-right">
                    <a class="mx-4" href="">Login</a>
                    <a class="" href="">Register</a>
                </div>

            </nav>

            <div class="form">
                <div class="form-content">
                    <div class="avatar">
                    <i class="fa-solid fa-user p-1"></i>
                    </div>
                    <div class="sigin">
                        <form action="#">

                            <div class="username d-flex justfiy-content-center align-items-center">
                                <i class="fa-solid fa-user p-1 "></i>
                                <input type="text" name="" id="" placeholder="Username">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html> -->

@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
