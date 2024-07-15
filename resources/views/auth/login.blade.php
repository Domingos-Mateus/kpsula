<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    <style>
        div.container-scroller {
            background-color: #121212 !important; /* Dark background for the whole page */
            color: #e0e0e0; /* Light text color for readability */
        }

        .auth-form-light {
            background-color: #333333; /* Darker background for the form */
            color: #e0e0e0; /* Light text color */
        }

        .form-control {
            background-color: #2a2a2a; /* Dark background for input fields */
            color: #ffffff; /* White text color */
            border: 1px solid #444; /* Slightly lighter border for visibility */
        }

        .btn-gradient-primary {
            background: linear-gradient(45deg, #6a5acd, #00bcd4); /* Stylish gradient for button */
            border: none; /* No border */
        }

        a {
            color: #9a9cff; /* Light purple color for links for better visibility */
        }

        a:hover {
            color: #d6d6ff; /* Lighter purple on hover */
        }

        .form-check-label {
            color: #aaa; /* Grey text for less emphasis items */
        }

        .fundo-preto{
            background-color: black !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth fundo-preto">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5 fundo-preto">
                            <div class="brand-logo">
                                <img src="/imagens/logo/logo.jpg" style="width: 300px; height: 100px;">
                            </div>
                            <h4>Olá, podemos começar?</h4>
                            <h6 class="font-weight-light">Faça o login para continuar.</h6>
                            <x-validation-errors class="mb-4" />
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <x-input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{ __('Log in') }}</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" id="remember_me" name="remember" class="form-check-input"> {{ __('Keep me signed in') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="auth-link text-primary">{{ __('Forgot your password?') }}</a>
                                    @endif
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Não tem uma conta? <a href="{{ route('register') }}" class="text-primary">Crie</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
</body>

</html>
