@extends('layouts.app')

@section('title', 'Booking')

@section('css')
    <style>
        /* General */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #00011c;
        }

        p {
            margin-bottom: 24px;
            line-height: 1.9;
        }

        label {
            font-size: 16px;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #00011c;
        }

        /* /* FORMS */

        #qbox-container {
            background: url(../img/corona.png);
            background-repeat: repeat;
            position: relative;
            /* padding: 62px; */
            min-height: 630px;
            box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -webkit-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -moz-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
        }

        #steps-container {
            margin: auto;
            min-height: 420px;
            /* display: flex; */
            vertical-align: middle;
            align-items: center;
        }

        .step {
            display: none;
        }

        .step h4 {
            margin: 0 0 26px 0;
            padding: 0;
            position: relative;
            font-weight: 500;
            font-size: 23px;
            font-size: 1.4375rem;
            line-height: 1.6;
        }

        button#prev-btn,
        button#next-btn,
        button#submit-btn {
            font-size: 17px;
            font-weight: bold;
            position: relative;
            width: 130px;
            height: 50px;
            background: #DC3545;
            margin: 0 auto;
            margin-top: 40px;
            overflow: hidden;
            z-index: 1;
            cursor: pointer;
            transition: color .3s;
            text-align: center;
            color: #fff;
            border: 0;
            -webkit-border-bottom-right-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-bottomright: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        button#prev-btn:after,
        button#next-btn:after,
        button#submit-btn:after {
            position: absolute;
            top: 90%;
            left: 0;
            width: 100%;
            height: 100%;
            background: #cc0616;
            content: "";
            z-index: -2;
            transition: transform .3s;
        }

        button#prev-btn:hover::after,
        button#next-btn:hover::after,
        button#submit-btn:hover::after {
            transform: translateY(-80%);
            transition: transform .3s;
        }

        .progress {
            border-radius: 0px !important;
        }

        .q-box__question {
            padding-left: 50px;
            padding-right: 50px;
        }

        .q__question {
            position: relative;
        }

        .q__question:not(:last-child) {
            margin-bottom: 10px;
        }

        .question__input {
            position: absolute;
            left: -9999px;
        }

        .question__label {
            position: relative;
            display: block;
            line-height: 40px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            padding: 5px 20px 5px 50px;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
        }

        .question__label:hover {
            border-color: #DC3545;
        }

        .question__label:before,
        .question__label:after {
            position: absolute;
            content: "";
        }

        .question__label:before {
            top: 12px;
            left: 10px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: inset 0 0 0 1px #ced4da;
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .question__input:checked+.question__label:before {
            background-color: #DC3545;
            box-shadow: 0 0 0 0;
        }

        .question__input:checked+.question__label:after {
            top: 22px;
            left: 18px;
            width: 10px;
            height: 5px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transform: rotate(-45deg);
        }

        .form-check-input:checked,
        .form-check-input:focus {
            background-color: #DC3545 !important;
            outline: none !important;
            border: none !important;
        }

        input:focus {
            outline: none;
        }

        #input-container {
            display: inline-block;
            box-shadow: none !important;
            margin-top: 36px !important;
        }

        label.form-check-label.radio-lb {
            margin-right: 15px;
        }

        #q-box__buttons {
            text-align: center;
        }

        input[type="text"],
        input[type="email"] {
            padding: 8px 14px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border: 1px solid #DC3545;
            border-radius: 5px;
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none !important;
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .form-check-input:checked[type=radio],
        .form-check-input:checked[type=radio]:hover,
        .form-check-input:checked[type=radio]:focus,
        .form-check-input:checked[type=radio]:active {
            border: none !important;
            -webkit-outline: 0px !important;
            box-shadow: none !important;
        }

        .form-check-input:focus,
        input[type="radio"]:hover {
            box-shadow: none;
            cursor: pointer !important;
        }

        #success {
            display: none;
        }

        #success h4 {
            color: #DC3545;
        }

        .back-link {
            font-weight: 700;
            color: #DC3545;
            text-decoration: none;
            font-size: 18px;
        }

        .back-link:hover {
            color: #82000a;
        }

        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active,
        a.ui-button:active,
        .ui-button:active,
        .ui-button.ui-state-active:hover {
            border: 1px solid #82000a;
            background: #DC3545;
            font-weight: normal;
            color: #ffffff;
        }

        */
    </style>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row shadow mt-5 mx-auto w-50 p-0 border border-danger">
            <div class="col-7 px-0 overflow-hidden">
                <img src="{{ asset('img/Logo.jpg') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-5 px-0 border-start border-danger border-2">
                <div class="rounded-0 ">
                    <div class="progress mx-1 mt-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                            class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                            style="width: 0%"></div>
                    </div>
                    <div class="border-bottom">
                        <h1 class="ms-4 py-3">Let's Start</h1>
                    </div>

                    <div id="qbox-container">
                        <form id="bookingForm" method="post" action="{{ 'book.now.post' }}">
                            @csrf
                            <div id="steps-container">
                                {{-- Step 1 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h4 class="ms-4 py-1" style="margin-bottom: 0px">Select Services</h4>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="mb-3">
                                                <label for="ServCategory" class="form-label">Service Category <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="service_category" id="ServCategory">
                                                    <option selected>Select One</option>
                                                    <option value="basic">Basic</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="ServName" class="form-label">Service Name <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="service_name" id="ServName">
                                                    <option selected>Select One</option>
                                                    <option value="basic training">Basic Training</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- Step 2 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h4 class="ms-4 py-1" style="margin-bottom: 0px">Choose Date & Time</h4>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Date <span
                                                        class="text-danger">*</span></label>
                                                <div id="datepicker"></div>
                                                <input class="form-control" type="text" id="selected-date" value=""
                                                    name="selected_date" hidden>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formTime" class="form-label">Time <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="time" name="formTime" id="formTime">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Step 3 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h4 class="ms-4 py-1" style="margin-bottom: 0px">Your Information</h4>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="mb-3">
                                                <label for="FormName" class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="FormName" name="name"
                                                    placeholder="{{ $profile->user->name }}">
                                                <input type="hidden" name="hidden_name" value="{{ $profile->user->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="FormEmail" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="FormEmail" name="email"
                                                    placeholder="{{ $profile->user->email }}">
                                                <input type="hidden" name="hidden_email"
                                                    value="{{ $profile->user->email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact_number" class="form-label">Contact Number <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="phone" name="phone"
                                                    placeholder="{{ $profile->phone }}" aria-describedby="helpId">
                                                <small id="helpId" class="form-text text-muted">eg.
                                                    09123456789</small>
                                                <input type="hidden" name="hidden_phone" value="{{ $profile->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Step 4 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h4 class="ms-4 py-1" style="margin-bottom: 0px">Reservation Summary</h4>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="border border-secondary p-2">
                                                <div class="d-flex justify-content-between">
                                                    <span><strong>Service Name</strong></span>
                                                    <span>₱ ###</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Sub-total</span>
                                                    <span>₱###</span>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <h6><strong>Total Amount</strong></h6>
                                                    <h6><strong>₱###</strong></h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="border-bottom mb-3">
                                        <h4 class="ms-4 py-1" style="margin-bottom: 0px">Payment Method</h4>
                                    </div>
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="q_1_yes"
                                            name="payment_method" type="radio" value="walk-in">
                                        <label class="form-check-label question__label" for="q_1_yes">Pay on
                                            Arrival</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="q_1_no"
                                            name="payment_method" type="radio" value="online payment">
                                        <label class="form-check-label question__label" for="q_1_no">Online
                                            Banking/E-Wallet <br>
                                            <p><small>
                                                    Make your payment directly using online banking or an e-wallet. An email
                                                    will be sent with payment details.
                                                </small>
                                            </p>
                                        </label>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="mt-1">
                                        <div class="closing-text p-5 text-center">
                                            <h4>You are about to submit your Booking</h4>
                                            <p>Please review all the details carefully.</p>
                                            <p>Click the Submit button to proceed.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="success">
                                    <div class="mt-5 p-5">
                                        <h4 class="fw-bold">Congratulations!</h4>
                                        <h5>Booking Successful</h5>
                                        <p>Please adhere to the gym's rules and regulations during your visit. For
                                            cancellations or inquiries, feel free to contact us. Enjoy your workout!</p>
                                        <a class="back-link" href="">Go back from the beginning ➜</a>
                                    </div>
                                </div>
                            </div>
                            <div id="q-box__buttons">
                                <button id="prev-btn" type="button">Previous</button>
                                <button id="next-btn" type="button">Next</button>
                                <button id="submit-btn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $("#datepicker").datepicker({
                    onSelect: function(dateText) {
                        $("#selected-date").val(dateText);
                    }
                });
            });

            let $steps = $('.step');
            let $prevBtn = $('#prev-btn');
            let $nextBtn = $('#next-btn');
            let $submitBtn = $('#submit-btn');
            let $form = $('form').first();
            let $preloader = $('#preloader-wrapper');
            let $bodyElement = $('body');
            let $successDiv = $('#success');

            let current_step = 0;
            let stepCount = 4;

            $steps.eq(current_step).addClass('d-block');
            if (current_step === 0) {
                $prevBtn.addClass('d-none');
                $submitBtn.addClass('d-none');
                $nextBtn.addClass('d-inline-block');
            }

            const progress = (value) => {
                $('.progress-bar').first().css('width', `${value}%`);
            };

            $nextBtn.on('click', function() {
                current_step++;
                let previous_step = current_step - 1;

                if (current_step > 0 && current_step <= stepCount) {
                    $prevBtn.removeClass('d-none').addClass('d-inline-block');
                    $steps.eq(current_step).removeClass('d-none').addClass('d-block');
                    $steps.eq(previous_step).removeClass('d-block').addClass('d-none');

                    if (current_step === stepCount) {
                        $submitBtn.removeClass('d-none').addClass('d-inline-block');
                        $nextBtn.removeClass('d-inline-block').addClass('d-none');
                    }
                } else if (current_step > stepCount) {
                    // $form.on('submit', function() {
                    //     return true;
                    // });
                }

                progress((100 / stepCount) * current_step);
            });

            $prevBtn.on('click', function() {
                if (current_step > 0) {
                    current_step--;
                    let previous_step = current_step + 1;

                    $steps.eq(current_step).removeClass('d-none').addClass('d-block');
                    $steps.eq(previous_step).removeClass('d-block').addClass('d-none');

                    if (current_step < stepCount) {
                        $submitBtn.removeClass('d-inline-block').addClass('d-none');
                        $nextBtn.removeClass('d-none').addClass('d-inline-block');
                        $prevBtn.removeClass('d-none').addClass('d-inline-block');
                    }

                    if (current_step === 0) {
                        $prevBtn.removeClass('d-inline-block').addClass('d-none');
                    }
                }

                progress((100 / stepCount) * current_step);
            });

            $submitBtn.on('click', function(e) {
                e.preventDefault();
                const formData = $('#bookingForm').serialize();
                console.log(formData);

                $.ajax({
                    url: '/booking', // Change to your form action URL
                    method: 'POST',
                    data: formData,

                    success: function(response) {
                        if (response.redirect_url) {
                            window.location.href = response
                                .redirect_url; // Redirect if URL is provided
                        } else {
                            alert(
                                'Success, but no redirect URL provided. Check server response.'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', {
                            status: status,
                            error: error,
                            response: xhr.responseText
                        });
                    }
                });
            });
        });
    </script>


@endsection