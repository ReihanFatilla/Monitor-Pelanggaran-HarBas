<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/before-login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <section class="home" id="home">
        <div class="scope d-flex">

            <div class="left">
                <div class="left-container ">
                    <div class="logo d-flex align-items-center">
                        <img class="img-fluid logo-gambar" src="{{asset ('images/logo_harbas.png') }}" alt="">
                        <p class="logo-text text-center">SMK Harapan Bangsa</p>
                    </div>
                    <div class="left-description">
                        <!-- <img src="{{asset ('images/rectangle.svg') }}" class="left-image" alt=""> -->
                        <div class="left-border">
                            <p class="left-description-text text-center">SMK Harapan Bangsa didirikan dibawah naungan
                                Yayasan Reste Nur Insani yang merupakan institusi pendidikan formal mempunyai visi misi
                                dan strategi baru dalam proses pembelajaran.</p>
                        </div>
                    </div>
                </div>
                <!-- INI GUA GATAU TARO LUAR APA DALEM -->
                <!-- <p>SMK <br> Harapan</p> -->
            </div>

            <div class="right">
                <div class="right-container">
                    <p class="right-judul text-center">Web<br>Pencatatan pelanggaran</p>
                    <div class="right-title d-flex justify-content-center align-items-center flex-column">
                        <!-- <img src="{{asset ('images/rectangle-blue.svg') }}" class="img-fluid" alt=""> -->
                        <div class="right-border">
                            <img src="{{asset ('images/notes.svg') }}" class="img-fluid right-image-description" alt="">
                            <p class="text-center right-text-description">LOG IN<br>OR<br>SIGN UP</p>
                        </div>
                        <a href="/login" class="right-button"><span class="right-button-text">GET STARTED</span></a>
                    </div>
                    <!-- INI GUA GATAU TARO LUAR APA DALEM -->
                    <!-- <p class="right-bg">Bangsa</p> -->
                </div>
            </div>

        </div>
    </section>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Monitor Pelanggaran App -->
    <script src="{{ asset('js/web.js') }}"></script>
</body>

</html>
