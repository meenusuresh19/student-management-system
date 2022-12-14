<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Student Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('resources/img/logo.jpg') }}">


        <!-- Bootstrap Css -->
        <link href="{{ asset('resources/assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('resources/assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('resources/assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="#" class="auth-logo">
                                    <img src="{{ asset('resources/img/logo.jpg') }}" height="60" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset('resources/img/logo.jpg') }}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <div class="p-3">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                                 <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" required autofocus placeholder="Email"id="email":value="old('email')"name="email">
                                </div>
                                    </div>
                                    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="password" required autocomplete="current-password" placeholder="Password"id="password"name="password">
                                    </div>
                                </div>

                                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('resources/assets/admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/js/app.js') }}"></script>

    </body>
</html>
