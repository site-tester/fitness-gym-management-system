@extends('layouts.app')

@section('css')
    <style>
        .btn-login {
            display: inline-block;
            font-size: 13px;
            padding: 11px 17px;
            background-color: var(--accent);
            color: #fff;
            text-align: center;
            font-weight: 400;
            letter-spacing: 0px;
            text-transform: uppercase;
            transition: all .3s;
            height: auto;
            line-height: 20px;
            border: none;
        }

        .btn-login:hover {
            background-color: #f9735b;
            color: var(--accent);
            opacity: 1;
        }

        .gsi-material-button {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -webkit-appearance: none;
            background-color: WHITE;
            background-image: none;
            border: 1px solid #747775;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #1f1f1f;
            cursor: pointer;
            font-family: 'Roboto', arial, sans-serif;
            font-size: 14px;
            height: 40px;
            letter-spacing: 0.25px;
            outline: none;
            overflow: hidden;
            padding: 0 12px;
            position: relative;
            text-align: center;
            -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
            transition: background-color .218s, border-color .218s, box-shadow .218s;
            vertical-align: middle;
            white-space: nowrap;
            /* width: auto; */
            max-width: 400px;
            min-width: min-content;
        }

        .gsi-material-button .gsi-material-button-icon {
            height: 20px;
            margin-right: 12px;
            min-width: 20px;
            width: 20px;
        }

        .gsi-material-button .gsi-material-button-content-wrapper {
            -webkit-align-items: center;
            align-items: center;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            height: 100%;
            justify-content: center;
            position: relative;
            width: 100%;
        }

        .gsi-material-button .gsi-material-button-contents {
            -webkit-flex-grow: 1;
            flex-grow: 1;
            font-family: 'Roboto', arial, sans-serif;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: top;
        }

        .gsi-material-button .gsi-material-button-state {
            -webkit-transition: opacity .218s;
            transition: opacity .218s;
            bottom: 0;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0;
        }

        .gsi-material-button:disabled {
            cursor: default;
            background-color: #ffffff61;
            border-color: #1f1f1f1f;
        }

        .gsi-material-button:disabled .gsi-material-button-contents {
            opacity: 38%;
        }

        .gsi-material-button:disabled .gsi-material-button-icon {
            opacity: 38%;
        }

        .gsi-material-button:not(:disabled):active .gsi-material-button-state,
        .gsi-material-button:not(:disabled):focus .gsi-material-button-state {
            background-color: #303030;
            opacity: 12%;
        }

        .gsi-material-button:not(:disabled):hover {
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        }

        .gsi-material-button:not(:disabled):hover .gsi-material-button-state {
            background-color: #303030;
            opacity: 8%;
        }
    </style>
@endsection

@section('content')
    <div class="container login  mt-5">
        <div class="row justify-content-center m-auto">
            <div class="col col-md-8">
                <div class="card mb-5" style="min-height: 400px">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    <div class="card-body row ">
                        <div class="d-none d-md-block col-md-6 text-center align-content-center">
                            <div class=" h3 mb-3">
                                {{-- Fitness Gym Management System --}}

                            </div>
                            <div class=" mb-3">
                                <img src="{{ asset('/resources/img/Logo.jpg') }}" alt="" width="200px">
                            </div>
                            <div class="login-address mb-3">
                                <p class="h5 px-3" style="font-size: small"><i class="bi bi-geo-alt-fill text-accent"></i>
                                    DIA Building Basement Area, Tara, Sipocot, Philippines</p>
                            </div>

                        </div>
                        <div class="col col-md-6 py-5 ps-3 pe-3 pe-md-5">
                            <div class="h3 mb-5">Login to your account</div>
                            <form class="" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3 mx-0 mx-md-0 d-flex justify-content-center">
                                    <a class="gsi-material-button mb-3 me-2 me-md-0" href="{{ route('google.login') }}">
                                        <div class="gsi-material-button-state"></div>
                                        <div class="gsi-material-button-content-wrapper">
                                            <div class="gsi-material-button-icon text-primary">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                                    <path fill="#EA4335"
                                                        d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                                                    </path>
                                                    <path fill="#4285F4"
                                                        d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                                                    </path>
                                                    <path fill="#FBBC05"
                                                        d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                                                    </path>
                                                    <path fill="#34A853"
                                                        d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                                                    </path>
                                                    <path fill="none" d="M0 0h48v48H0z"></path>
                                                </svg>
                                            </div>
                                            <span class="gsi-material-button-contents">Login with Google</span>
                                            <span style="display: none;">Login with Google</span>
                                        </div>
                                    </a>

                                    <a class="gsi-material-button" href="{{ route('facebook.login') }}">
                                        <div class="gsi-material-button-state"></div>
                                        <div class="gsi-material-button-content-wrapper">
                                            <i class="bi bi-facebook text-primary me-2 fs-4 " aria-hidden="true"></i>
                                            <span class="gsi-material-button-contents">Login with Facebook</span>
                                            <span style="display: none;">Login with Facebook</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="row mb-2">
                                    <p class="text-center">OR</p>
                                </div>

                                <div class="row mb-3">
                                    {{-- <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                                    <div class="col input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-person-fill"></i></span>
                                        <input id="email" type="email"
                                            class="form-control rounded-end @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">

                                    <div class="col input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-shield-lock"></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                        <span class="input-group-text btn border-secondary-subtle"><i id="togglePassword"
                                                class="bi bi-eye"></i></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 justify-content-center">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    {{-- offset-md-4 --}}
                                    <div class="col text-center ">
                                        <button type="submit" class="btn-login w-100">
                                            <i class="bi bi-box-arrow-in-right"></i>
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
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            //  Toggle  Password Start
            $("#togglePassword").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
            $("#togglePassword").click(function() {
                const passwordInput = $("#password");
                const type = passwordInput.attr("type");

                if (type === "password") {
                    passwordInput.attr("type", "text");
                    $("#togglePassword").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
                } else {
                    passwordInput.attr("type", "password");
                    $("#togglePassword").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
                }
            });
            //  Toggle  Password End

        });
    </script>
@endsection
