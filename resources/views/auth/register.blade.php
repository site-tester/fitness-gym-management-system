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

        .strikethrough-container {
            position: relative;
            display: flex;
            /* Use flexbox for easier alignment */
            align-items: center;
            /* Vertically center the text */
            justify-content: center;
            /* Horizontally center the text */
        }

        .strikethrough-container::before,
        .strikethrough-container::after {
            content: "";
            position: absolute;
            top: 50%;
            /* Position the line at the vertical center */
            width: 40%;
            /* Adjust the width of the lines */
            height: 1px;
            background-color: red;
            /* Adjust the color of the line */
        }

        .strikethrough-container::before {
            left: 0;
            transform: translateY(-50%);
            /* Adjust for perfect vertical centering */
        }

        .strikethrough-container::after {
            right: 0;
            transform: translateY(-50%);
            /* Adjust for perfect vertical centering */
        }

        .strikethrough-container h6 {
            margin: 0 1em;
            /* add some space between the text and the line */
            white-space: nowrap;
            /*prevent the text from wrapping */
        }
    </style>
@endsection

@section('content')
    <div class="container register">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card ps-md-0 p-5" style="margin-bottom: 50px;">
                    <div class="card-body pe-md-5 me-md-1">
                        <div class="row">
                            <div class="col-5 text-center d-none d-md-block d-flex justify-content-center align-items-center"
                                style="display: flex; align-items: center; justify-content: center;">
                                <div
                                    style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                                    <img class="img-fluid" src="{{ asset('/resources/img/Logo.jpg') }}" alt=""
                                        style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <form method="POST" action="{{ route('register') }}" class="col-12 g-3">
                                        @csrf
                                        <div class="h3 mb-3 text-center">Register an Account</div>
                                        <div class="row mb-3 mx-0 mx-md-0 d-flex justify-content-center">
                                            <div class="h5">
                                                <p class="text-center">Register using social networks</p>
                                            </div>
                                            <div class="col-6 d-flex align-content-center justify-content-center">
                                                <a class="text-primary rounded-circle" href="{{ route('google.login') }}">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 48 48" width="30" height="30"
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
                                                </a>
                                            </div>

                                            {{-- <div class="col-6 d-flex align-content-center justify-content-start">
                                                <a class="text-primary rounded-circle" href="{{ route('facebook.login') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                                    </svg>
                                                </a>
                                            </div> --}}
                                        </div>

                                        <div
                                            class="col-12 d-flex justify-content-center align-items-center mb-3 strikethrough-container text-center">
                                            <p class="text-center">OR</p>
                                        </div>
                                        {{-- <div
                                            class="col-12 d-flex justify-content-center align-items-center my-5 strikethrough-container text-center">
                                            <h6>or</h6>
                                        </div> --}}

                                        <div class="row mb-3">
                                            <label for="name"
                                                class="col-md-5 col-form-label ">{{ __('Full Name') }}</label>

                                            <div class="col">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Full name" value="{{ old('name') }}" required
                                                    autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-5 col-form-label ">{{ __('Email Address') }}</label>

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

                                        <!-- Password Field -->
                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-5 col-form-label">{{ __('Password') }}</label>
                                            <div class="col input-group">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="new-password">
                                                <span class="input-group-text btn border-secondary-subtle">
                                                    <i id="togglePassword" class="bi bi-eye"></i>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col offset-md-4 ps-3 pe-2">
                                                    <div class="row justify-content-center align-items-center g-2 py-1 ps-2 password-requirements"
                                                        style="font-size: small">
                                                        <div class="col-6 char-length"><i
                                                                class="bi bi-x-square-fill text-danger"></i> 8
                                                            characters long</div>
                                                        <div class="col-6 uppercase"><i
                                                                class="bi bi-x-square-fill text-danger"></i>
                                                            One
                                                            Uppercase letter</div>
                                                        <div class="col-6 lowercase"><i
                                                                class="bi bi-x-square-fill text-danger"></i>
                                                            One
                                                            Lowercase letter</div>
                                                        <div class="col-6 number"><i
                                                                class="bi bi-x-square-fill text-danger"></i>
                                                            One
                                                            Number
                                                        </div>
                                                        <div class="col special-char"><i
                                                                class="bi bi-x-square-fill text-danger"></i>
                                                            One
                                                            Special character</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <!-- Confirm Password Field -->
                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="col-md-5 col-form-label">{{ __('Confirm Password') }}</label>
                                            <div class="col input-group">
                                                <input id="password-confirm" type="password"
                                                    class="form-control password_confirm" placeholder="Confirm Password"
                                                    name="password_confirmation" required autocomplete="new-password">
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

                                        <div class="row mb-0 mt-4">
                                            <div class="col text-center">
                                                <button type="submit" class="btn-register">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- <div
                                        class="col-12 d-flex justify-content-center align-items-center my-5 strikethrough-container text-center">
                                        <h6>or</h6>
                                    </div>


                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <div class="row mb-3 mx-0 mx-md-0 d-flex justify-content-center">
                                            <a class="gsi-material-button mb-3" href="{{ route('google.login') }}">
                                                <div class="gsi-material-button-state"></div>
                                                <div class="gsi-material-button-content-wrapper">
                                                    <div class="gsi-material-button-icon text-primary">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            style="display: block;">
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
                                                    <span class="gsi-material-button-contents">Register using Google</span>
                                                    <span style="display: none;">Register using Google</span>
                                                </div>
                                            </a>

                                            <a class="gsi-material-button" href="{{ route('facebook.login') }}">
                                                <div class="gsi-material-button-state"></div>
                                                <div class="gsi-material-button-content-wrapper">
                                                    <i class="bi bi-facebook text-primary me-2 fs-4 " aria-hidden="true"></i>
                                                    <span class="gsi-material-button-contents">Register using Facebook</span>
                                                    <span style="display: none;">Register using Facebook</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
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
        // $(document).ready(function() {
        //     function validatePassword() {
        //         const password = $("#password").val();

        //         // Password strength regex
        //         const hasLowercase = /[a-z]/.test(password);
        //         const hasUppercase = /[A-Z]/.test(password);
        //         const hasNumber = /\d/.test(password);
        //         const hasSpecialChar = /[@$!%*?&]/.test(password);
        //         const hasMinLength = password.length >= 8;

        //         updateValidationIcon(".password-requirements .char-length", hasMinLength);
        //         updateValidationIcon(".password-requirements .uppercase", hasUppercase);
        //         updateValidationIcon(".password-requirements .lowercase", hasLowercase);
        //         updateValidationIcon(".password-requirements .number", hasNumber);
        //         updateValidationIcon(".password-requirements .special-char", hasSpecialChar);

        //         return hasLowercase && hasUppercase && hasNumber && hasSpecialChar && hasMinLength;
        //     }

        //     function validatePasswordMatch() {
        //         const password = $("#password").val();
        //         const confirmPassword = $("#password-confirm").val();

        //         const isMatch = password === confirmPassword && password !== "";
        //         updateValidationIcon(".password-confirm-check", isMatch);
        //         return isMatch;
        //     }

        //     function updateValidationIcon(selector, isValid) {
        //         const icon = $(selector).find("i");
        //         if (isValid) {
        //             icon.removeClass("bi-x-square-fill text-danger").addClass("bi-check-square-fill text-success");
        //         } else {
        //             icon.removeClass("bi-check-square-fill text-success").addClass("bi-x-square-fill text-danger");
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

        // $(document).ready(function() {
        //     // Initially hide the password requirements and confirmation check
        //     $(".password-requirements, .password-confirm-check").hide();

        //     function validatePassword() {
        //         const password = $("#password").val();

        //         // Password strength regex
        //         const hasLowercase = /[a-z]/.test(password);
        //         const hasUppercase = /[A-Z]/.test(password);
        //         const hasNumber = /\d/.test(password);
        //         const hasSpecialChar = /[@$!%*?&]/.test(password);
        //         const hasMinLength = password.length >= 8;

        //         updateValidationIcon(".password-requirements .char-length", hasMinLength);
        //         updateValidationIcon(".password-requirements .uppercase", hasUppercase);
        //         updateValidationIcon(".password-requirements .lowercase", hasLowercase);
        //         updateValidationIcon(".password-requirements .number", hasNumber);
        //         updateValidationIcon(".password-requirements .special-char", hasSpecialChar);

        //         return hasLowercase && hasUppercase && hasNumber && hasSpecialChar && hasMinLength;
        //     }

        //     function validatePasswordMatch() {
        //         const password = $("#password").val();
        //         const confirmPassword = $("#password-confirm").val();

        //         const isMatch = password === confirmPassword && password !== "";
        //         updateValidationIcon(".password-confirm-check", isMatch);
        //         return isMatch;
        //     }

        //     function updateValidationIcon(selector, isValid) {
        //         const icon = $(selector).find("i");
        //         if (isValid) {
        //             icon.removeClass("bi-x-square-fill text-danger").addClass("bi-check-square-fill text-success");
        //         } else {
        //             icon.removeClass("bi-check-square-fill text-success").addClass("bi-x-square-fill text-danger");
        //         }
        //     }

        //     // Show password requirements when typing in the password field
        //     $("#password").on("input", function() {
        //         if ($(this).val().length > 0) {
        //             $(".password-requirements").fadeIn();
        //         } else {
        //             $(".password-requirements").fadeOut();
        //         }
        //         validatePassword();
        //         validatePasswordMatch();
        //     });

        //     // Show password confirmation check only when typing in confirm password field
        //     $("#password-confirm").on("input", function() {
        //         if ($(this).val().length > 0) {
        //             $(".password-confirm-check").fadeIn();
        //         } else {
        //             $(".password-confirm-check").fadeOut();
        //         }
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
            // Initially hide the password requirements and confirmation check
            $(".password-requirements, .password-confirm-check").hide();

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
                icon.removeClass("bi-check-square-fill text-success bi-x-square-fill text-danger");
                if (isValid) {
                    icon.addClass("bi-check-square-fill text-success");
                } else {
                    icon.addClass("bi-x-square-fill text-danger");
                }
            }

            // Show/hide password requirements on focus/blur of password field
            $("#password").on("focus", function() {
                $(".password-requirements").fadeIn();
                validatePassword(); // Initial validation on focus
            }).on("blur", function() {
                // Only hide if the password field is empty or all requirements are met
                if ($(this).val().length === 0 || validatePassword()) {
                    $(".password-requirements").fadeOut();
                }
            }).on("input", validatePassword).on("input", validatePasswordMatch); // Validate on input as well

            // Show/hide password confirmation check on focus/blur of confirm password field
            $("#password-confirm").on("focus", function() {
                if ($("#password").val().length > 0) {
                    $(".password-confirm-check").fadeIn();
                }
                validatePasswordMatch(); // Initial validation on focus
            }).on("blur", function() {
                // Only hide if the confirm password field is empty or it matches the password
                if ($(this).val().length === 0 || validatePasswordMatch()) {
                    $(".password-confirm-check").fadeOut();
                }
            }).on("input", validatePasswordMatch);

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
