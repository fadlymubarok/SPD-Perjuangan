<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Themify icons -->
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/themify-icons/css/themify-icons.css">

    <link rel="icon" href="{{ url('storage/logo/' . $profile->picture) }}">

    <title>{{ $title }} - {{ $profile->name }}</title>

    <!-- my style -->
    <style>
        html, body { height: 100%; }

        body > footer {
            position: sticky;
            top: 100vh;
        }

        #nav {
            background-color: rgba(42, 62, 41, 75%);
        }

        .hero img {
            object-fit: cover;
            max-height: 28rem;
            filter: brightness(50%);
        }
        .hero .title-main {
            transform: scale(1);
			transition: .3s ease;
        }
        .hero .title-main:hover {
            transform: scale(1.03);
        }

        .news-list .news-item {
            display: block;
            transform: scale(1);
			transition: .3s ease;
        }
        .news-list .news-item:hover {
            transform: scale(1.03);
        }
        .news .card:hover {
            background-color: #eee;
            transition: .3s ease;
        }
        .news-item img {
            height: auto;
            aspect-ratio: 1/1;
            object-fit: cover;
        }

        .the-news img {
            height: auto;
            max-height: 400px;
        }

        .pict-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            box-sizing: border-box;
        }
        .pict-item img {
            height: auto;
            object-fit: cover;
        }
    </style>
    @yield('style')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark border-bottom border-dark py-1" id="nav">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#">Home</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is(['/'], ['news*']) ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('keuangan*') ? 'active' : '' }}" href="/keuangan">Keuangan desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('pertanyaan') ? 'active' : '' }}" href="/pertanyaan">Pertanyaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('event*') ? 'active' : '' }}" href="/event">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request()->is(['pemerintahan'], ['bpd'], ['prestasi']) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil Desa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pemerintahan">Profil Pemerintah Desa</a></li>
                            <li><a class="dropdown-item" href="/bpd">Profil BPD</a></li>
                            <li><a class="dropdown-item" href="/prestasi">Prestasi</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex justify-content-between my-1" style="width: 125px;">
                    <div class="ml-4">

                        <img src="../../assets/user-page/img/facebook.png" alt="facebook icon" width="30px" height="30px">
                    </div>
                    <div class="ml-4">
                        <img src="../../assets/user-page/img/whatsapp.png" alt="whatsapp icon" width="30px" height="30px">
                    </div>
                    <div class="ml-4">
                        <img src="../../assets/user-page/img/instagram.png" alt="instagram icon" width="30px" height="30px">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark" id="nav">
        <div class="container-fluid">
            <div class=" navbar-collapse" id="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-between">
                    <div class="d-flex mr-2">
                        <img src="{{ asset('../storage/logo/'. $profile->picture)}}" alt="{{ $profile->picture }}" width="60px" height="60px">
                    </div>
                    <div class="d-block" style="margin-left: 10px;">
                        <h5 class="mb-0 text-light">{{ $profile->name }}</h5>
                        <p class="text-light">{{ $profile->address }}</p>
                    </div>
                </ul>
                @yield('form')
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    <footer class="footer mt-5 bg-light">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-dark bg-dark py-4">
                <div class="container text-secondary">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <small>&copy; 2022 Website Desa Ciburial – Kec. Cimenyan Kab. Bandung</small>
                        </li>
                        <li class="nav-item">
                            <small>Sejak 28 Oktober 2009</small>
                        </li>
                        <li class="nav-item">
                            <small>Didayai dengan OpenSID & Wordpress</small>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    @yield('js')
</body>

</html>