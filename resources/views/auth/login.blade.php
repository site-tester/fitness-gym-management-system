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
                            <div class="font-monospace h3 fst-italic mb-3">
                                Fitness Gym Management System
                            </div>
                            <div class="logo mb-3">
                                <img src="{{ asset('img/Logo.jpg') }}" alt="" width="200px">
                            </div>
                            <div class="login-address mb-3">
                                <p class="h5 px-3"><i class="bi bi-geo-alt-fill text-accent"></i> DIA Building Basement Area, Tara, Sipocot, Philippines</p>
                            </div>

                        </div>
                        <div class="col col-md-6 py-5 ps-3 pe-5">
                            <form class="mt-md-5" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="h3 mb-3">Login</div>
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

                                    {{-- <div class="col">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                </div>

                                <div class="row mb-2">
                                    {{-- <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                    <div class="col input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi bi-shield-lock"></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                        <span class="input-group-text btn border-secondary-subtle"
                                            ><i id="togglePassword"
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
