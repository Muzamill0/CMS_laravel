<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        {{-- Bootstrap icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="auth-bg-basic d-flex align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-transparent shadow-none border-0">
                                <div class="card-body">
                                    <div class="py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back</h5>
                                            <p class="text-muted mt-2">Sign in to continue</p>
                                            @include('partials.alert')
                                        </div>
                                        <form class="mt-4 pt-2" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="input-email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                                                <label for="input-email">Email</label>
                                                <div class="form-floating-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                                @error('email')
                                                <p class="text-muted">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control" id="password-input" placeholder="Enter Password">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"  id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="password-input">Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                                @error('password')
                                                <p class="text-muted">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <div class="float-end">
                                                    <a href="" class="text-muted text-decoration-underline font-size-14">Forgot your password?</a>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <input class="btn btn-primary w-100" type="submit" value="Log In">
                                            </div>

                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>

    </body>
</html>
