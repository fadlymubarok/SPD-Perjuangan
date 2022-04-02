<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register - Spd perjuangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/admin-page/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/admin-page/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/admin-page/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/admin-page/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/admin-page/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/admin-page/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/register" class="h1 text-light">
                        Register
                    </a>
                </div>
                <div class="login-form">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 morder">Sign Up</button>
                        <div class="register-link m-t-15 text-center pt-2 mt-3 border-top">
                            <p>Already have account ? <a href="/login"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/admin-page/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/admin-page/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/admin-page/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/admin-page/assets/js/main.js"></script>


</body>

</html>