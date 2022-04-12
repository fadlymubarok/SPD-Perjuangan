<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Spd perjuangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/admin-page/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/admin-page/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/admin-page/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/admin-page/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/admin-page/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/admin-page/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/petugas/login" class="h1 text-light">
                        Login
                    </a>
                </div>
                <div class="login-form">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">Email/Password is invalid</div>
                    @endif
                    <form action="/petugas/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        </label>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 morder">Sign In</button>
                        <div class="login-link m-t-15 text-center pt-2 mt-3 border-top">
                            <p>Don't have account ? <a href="/petugas/register" class="text-danger"> Sign Up Here</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/admin-page/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../assets/admin-page/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/admin-page/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/admin-page/assets/js/main.js"></script>


</body>

</html>