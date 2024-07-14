<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
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
                            <img src="/assets/logo/logo.png" alt="logo" style="width: 300px; height: 100px;">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
                                        <label class="form-check-label text-muted" for="terms">
                                            I agree to the <a href="{{ route('terms.show') }}" target="_blank" class="text-primary">Terms of Service</a> and
                                            <a href="{{ route('policy.show') }}" target="_blank" class="text-primary">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
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
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/misc.js"></script>
<!-- endinject -->
</body>
</html>
