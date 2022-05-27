<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <!-- my style -->
    <style>
        #nav {
            background-color: rgba(42, 62, 41, 75%);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom border-dark py-0" id="nav">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request()->is('/') ? 'active' : '' }}" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Keuangan desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pertanyaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Event</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil Desa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil Pemerintah Desa</a></li>
                            <li><a class="dropdown-item" href="#">Profil BPD</a></li>
                            <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex justify-content-between" style="width: 125px;">
                    <div class="ml-4">
                        <img src="assets/user-page/img/facebook.png" alt="facebook icon" width="30px" height="30px">
                    </div>
                    <div class="ml-4">
                        <img src="assets/user-page/img/whatsapp.png" alt="whatsapp icon" width="30px" height="30px">
                    </div>
                    <div class="ml-4">
                        <img src="assets/user-page/img/instagram.png" alt="instagram icon" width="30px" height="30px">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark" id="nav">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-between" style="width: 250px;">
                    <div class="d-flex mr-2">
                        <img src="{{ asset('../storage/logo/'. $profile->picture)}}" alt="{{ $profile->picture }}" width="60px" height="60px">
                    </div>
                    <div class="d-block">
                        <h5 class="mb-0 text-light">{{ $profile->name }}</h5>
                        <p class="text-light">{{ $profile->address }}</p>
                    </div>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>