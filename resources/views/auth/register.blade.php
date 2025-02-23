@extends('layouts.app')

@section('css')
    <style>
        .btn-register {
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

        .btn-register:hover {
            background-color: #f9735b;
            color: var(--accent);
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="container register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-5">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                    <div class="card-body px-md-5 mx-md-5">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ asset('/resources/img/Logo.jpg') }}" alt="" width="200">
                            <p class="my-5 h4">Register</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="row g-3">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label ">{{ __('Full Name') }}</label>

                                <div class="col">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Full name" value="{{ old('name') }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                                <div class="col">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email address" value="{{ old('email') }}" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <span class="input-group-text btn border-secondary-subtle"><i id="togglePassword"
                                            class="bi bi-eye"></i></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col input-group">
                                    <input id="password-confirm" type="password" class="form-control password_confirm"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <span class="input-group-text btn border-secondary-subtle"><i
                                            id="togglePasswordConfirmation" class="bi bi-eye"></i></span>
                                </div>
                            </div> --}}

                            <!-- Password Field -->
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                <div class="col input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required autocomplete="new-password">
                                    <span class="input-group-text btn border-secondary-subtle">
                                        <i id="togglePassword" class="bi bi-eye"></i>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col offset-md-4 ps-3 pe-2">
                                        <div class="row justify-content-center align-items-center g-2 py-1 ps-2 password-requirements"
                                            style="font-size: small">
                                            <div class="col-6 char-length"><i class="bi bi-x-square-fill text-danger"></i> 8
                                                characters long</div>
                                            <div class="col-6 uppercase"><i class="bi bi-x-square-fill text-danger"></i> One
                                                Uppercase letter</div>
                                            <div class="col-6 lowercase"><i class="bi bi-x-square-fill text-danger"></i> One
                                                Lowercase letter</div>
                                            <div class="col-6 number"><i class="bi bi-x-square-fill text-danger"></i> One
                                                Number
                                            </div>
                                            <div class="col special-char"><i class="bi bi-x-square-fill text-danger"></i>
                                                One
                                                Special character</div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- Confirm Password Field -->
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col input-group">
                                    <input id="password-confirm" type="password" class="form-control password_confirm"
                                        placeholder="Confirm Password" name="password_confirmation" required
                                        autocomplete="new-password">
                                    <span class="input-group-text btn border-secondary-subtle">
                                        <i id="togglePasswordConfirmation" class="bi bi-eye"></i>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col offset-md-4 ps-3 pe-2">
                                        <div class="row justify-content-center align-items-center g-2 py-1 ps-2"
                                            style="font-size: small">
                                            <div class="col password-confirm-check">
                                                <i class="bi bi-x-square-fill text-danger"></i>
                                                Password Match
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn-register">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     // Toggle Password Visibility for Password Field
        //     $("#togglePassword").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
        //     $("#togglePassword").click(function() {
        //         const passwordInput = $("#password"); // Fix: Target correct ID
        //         const type = passwordInput.attr("type");

        //         if (type === "password") {
        //             passwordInput.attr("type", "text");
        //             $("#togglePassword").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
        //         } else {
        //             passwordInput.attr("type", "password");
        //             $("#togglePassword").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
        //         }
        //     });

        //     // Toggle Password Visibility for Confirm Password Field
        //     $("#togglePasswordConfirmation").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
        //     $("#togglePasswordConfirmation").click(function() {
        //         const passwordInput = $("#password-confirm"); // Fix: Target correct ID
        //         const type = passwordInput.attr("type");

        //         if (type === "password") {
        //             passwordInput.attr("type", "text");
        //             $("#togglePasswordConfirmation").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
        //         } else {
        //             passwordInput.attr("type", "password");
        //             $("#togglePasswordConfirmation").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
        //         }
        //     });
        // });
        // $(document).ready(function() {
        //     function validatePassword() {
        //         const password = $("#password").val();

        //         // Define rules
        //         const lengthCheck = password.length >= 8;
        //         const uppercaseCheck = /[A-Z]/.test(password);
        //         const lowercaseCheck = /[a-z]/.test(password);
        //         const numberCheck = /\d/.test(password);
        //         const specialCharCheck = /[@$!%*?&]/.test(password);

        //         // Function to update validation icons
        //         function updateValidation(selector, isValid) {
        //             const icon = $(selector);
        //             if (isValid) {
        //                 icon.removeClass("bi-x-square-fill text-danger")
        //                     .addClass("bi-check-square-fill text-success");
        //             } else {
        //                 icon.removeClass("bi-check-square-fill text-success")
        //                     .addClass("bi-x-square-fill text-danger");
        //             }
        //         }

        //         // Update validation indicators
        //         updateValidation(".length-check i", lengthCheck);
        //         updateValidation(".uppercase-check i", uppercaseCheck);
        //         updateValidation(".lowercase-check i", lowercaseCheck);
        //         updateValidation(".number-check i", numberCheck);
        //         updateValidation(".special-char-check i", specialCharCheck);

        //         // Return overall validation result
        //         return lengthCheck && uppercaseCheck && lowercaseCheck && numberCheck && specialCharCheck;
        //     }

        //     function validatePasswordMatch() {
        //         const password = $("#password").val();
        //         const confirmPassword = $("#password-confirm").val();
        //         const confirmPasswordError = $("#confirm-password-error");

        //         if (password !== confirmPassword) {
        //             confirmPasswordError.text("Passwords do not match.");
        //             return false;
        //         } else {
        //             confirmPasswordError.text("");
        //             return true;
        //         }
        //     }

        //     // Event listeners for real-time validation
        //     $("#password").on("input", function() {
        //         validatePassword();
        //         validatePasswordMatch();
        //     });

        //     $("#password-confirm").on("input", function() {
        //         validatePasswordMatch();
        //     });

        //     // Toggle Password Visibility
        //     $("#togglePassword").click(function() {
        //         const passwordInput = $("#password");
        //         const type = passwordInput.attr("type") === "password" ? "text" : "password";
        //         passwordInput.attr("type", type);
        //         $(this).toggleClass("bi-eye bi-eye-slash");
        //     });

        //     $("#togglePasswordConfirmation").click(function() {
        //         const confirmPasswordInput = $("#password-confirm");
        //         const type = confirmPasswordInput.attr("type") === "password" ? "text" : "password";
        //         confirmPasswordInput.attr("type", type);
        //         $(this).toggleClass("bi-eye bi-eye-slash");
        //     });
        // });
        $(document).ready(function() {
            function validatePassword() {
                const password = $("#password").val();

                // Password strength regex
                const hasLowercase = /[a-z]/.test(password);
                const hasUppercase = /[A-Z]/.test(password);
                const hasNumber = /\d/.test(password);
                const hasSpecialChar = /[@$!%*?&]/.test(password);
                const hasMinLength = password.length >= 8;

                updateValidationIcon(".password-requirements .char-length", hasMinLength);
                updateValidationIcon(".password-requirements .uppercase", hasUppercase);
                updateValidationIcon(".password-requirements .lowercase", hasLowercase);
                updateValidationIcon(".password-requirements .number", hasNumber);
                updateValidationIcon(".password-requirements .special-char", hasSpecialChar);

                return hasLowercase && hasUppercase && hasNumber && hasSpecialChar && hasMinLength;
            }

            function validatePasswordMatch() {
                const password = $("#password").val();
                const confirmPassword = $("#password-confirm").val();

                const isMatch = password === confirmPassword && password !== "";
                updateValidationIcon(".password-confirm-check", isMatch);
                return isMatch;
            }

            function updateValidationIcon(selector, isValid) {
                const icon = $(selector).find("i");
                if (isValid) {
                    icon.removeClass("bi-x-square-fill text-danger").addClass("bi-check-square-fill text-success");
                } else {
                    icon.removeClass("bi-check-square-fill text-success").addClass("bi-x-square-fill text-danger");
                }
            }

            // Event listeners for real-time validation
            $("#password").on("input", function() {
                validatePassword();
                validatePasswordMatch();
            });

            $("#password-confirm").on("input", function() {
                validatePasswordMatch();
            });

            // Toggle Password Visibility
            $("#togglePassword").click(function() {
                const passwordInput = $("#password");
                const type = passwordInput.attr("type") === "password" ? "text" : "password";
                passwordInput.attr("type", type);
                $(this).toggleClass("bi-eye bi-eye-slash");
            });

            $("#togglePasswordConfirmation").click(function() {
                const confirmPasswordInput = $("#password-confirm");
                const type = confirmPasswordInput.attr("type") === "password" ? "text" : "password";
                confirmPasswordInput.attr("type", type);
                $(this).toggleClass("bi-eye bi-eye-slash");
            });
        });
    </script>
@endsection
