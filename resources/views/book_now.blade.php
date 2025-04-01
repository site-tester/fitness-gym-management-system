@extends('layouts.app')

@section('title', 'Book Now')

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
            position: relative;
            height: 90%;
        }

        #steps-container {
            margin: auto;
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
            padding: 5px 20px 0px 50px;
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
            position: absolute;
            /* Fix the buttons to the bottom */
            bottom: 0;
            /* Place them at the bottom */
            left: 0;
            /* Align to the left */
            width: 100%;
            /* Make it span the width of the container */
            text-align: center;
            /* Add some padding for spacing */
            /* add a white background to avoid transparent issues */
            display: flex;
            /* flex for the buttons */
            justify-content: center;
            /* center the buttons */
            gap: 10px;
            /* add a gap between the buttons */
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
    <div class="container-fluid pt-1" style=" min-height: 75vh;">
        <div class="row shadow mx-auto w-75 p-0  border border-danger" style="min-height: 713px;">
            <div class="col-3 px-0 overflow-hidden d-sm-none d-md-block" style="min-height: 713px;">
                <img src="{{ asset('/resources/img/Logo.jpg') }}" alt=""
                    style="width:100% ; height: 100%; object-fit: contain;">
            </div>
            <div class="col-12 col-md-9 px-0 border-start border-danger border-2" style="min-height: 713px;">
                <div class="rounded-0 h-100">
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                            class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                            style="width: 0%"></div>
                    </div>
                    <div class="border-bottom">
                        <h2 class="ms-4 py-1 mb-0">Let's Start</h2>
                    </div>

                    <div id="qbox-container">
                        <form id="bookingForm" method="post" action="{{ 'book.now.post' }}">
                            @csrf
                            <div id="steps-container">
                                {{-- Step 1 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h5 class="ms-4 py-1" style="margin-bottom: 0px">Select Services</h5>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            {{-- <div class="mb-3">
                                                <label for="ServCategory" class="form-label">Service Category <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="service_category" id="ServCategory">
                                                    <option selected>--Select Category--</option>
                                                    @foreach ($serviceCategories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                            <div class="row">
                                                <!-- Service Name -->
                                                <div class="col mb-3">
                                                    <label for="service_name" class="form-label">Service Name <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="service_name" id="service_name">
                                                        <option selected disabled>-- Select Service --</option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Student">Student</option>
                                                    </select>
                                                </div>

                                                <!-- Service Duration -->
                                                <div class="col mb-3">
                                                    <label for="service_duration" class="form-label">Service Duration <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="service_duration"
                                                        id="service_duration" disabled>
                                                        <option selected disabled>-- Select Duration --</option>
                                                        <option value="Monthly">Monthly</option>
                                                        <option value="Day">Daily</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- Below id the service description --}}
                                        <div class="mt-2 mx-5 px-3 py-3 border ">
                                            <div id="servDescription">
                                                <p class="text-center mb-0">Select a service to view its details.</p>
                                            </div>
                                        </div>

                                        <input id="ServName" type="hidden" name="ServName">
                                        <input id="ServDuration" type="hidden" name="ServDuration">

                                    </div>
                                </div>

                                {{-- Step 2 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h5 class="ms-4 py-1" style="margin-bottom: 0px">Choose Date</h5>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="mb-3">
                                                {{-- <label for="" class="form-label col-12">Date <span
                                                        class="text-danger">*</span></label> --}}
                                                <div id="datepicker" style="display: flex; justify-content: center;"></div>
                                                <input class="form-control w-auto" type="text" id="selected-date"
                                                    value="" name="selected_date" hidden>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="formTime" class="form-label">Time <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="time" name="formTime" id="formTime">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                {{-- Step 3 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h5 class="ms-4 py-1" style="margin-bottom: 0px">Your Information</h5>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="FormName" class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="FormName" name="name"
                                                        placeholder="{{ $profile->name }}"
                                                        value="{{ $profile->name ?? '' }}">
                                                    <input type="hidden" name="hidden_name" value="{{ $profile->name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="FormEmail" class="form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="FormEmail"
                                                        name="email" placeholder="{{ $profile->email }}"
                                                        value="{{ $profile->email ?? '' }}">
                                                    <input type="hidden" name="hidden_email"
                                                        value="{{ $profile->email }}">
                                                </div>
                                                <div class="col">
                                                    <label for="contact_number" class="form-label">Contact Number <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="phone"
                                                        name="phone" placeholder="Enter Contact Number"
                                                        aria-describedby="helpId">
                                                    <small id="helpId" class="form-text text-muted">eg.
                                                        09123456789</small>
                                                    <input type="hidden" name="hidden_phone"
                                                        value="{{ $profile->phone ?? null }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Step 4 --}}
                                <div class="step">
                                    <div class="border-bottom mb-3">
                                        <h5 class="ms-4 py-1" style="margin-bottom: 0px">Amount</h5>
                                    </div>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <div class="border border-secondary p-2">
                                                <div class="d-flex justify-content-between">
                                                    <span><strong id="summaryServName">Service Name</strong></span>
                                                    <span id="summaryServPrice">₱ ###</span>
                                                    <input id="ServPrice" type="hidden" name="service_price"
                                                        value="">
                                                </div>
                                                {{-- <div class="d-flex justify-content-between">
                                                    <span>Sub-total</span>
                                                    <span id="summarySubTotal">₱###</span>
                                                </div> --}}
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <h6><strong>Total Amount</strong></h6>
                                                    <h6><strong id="summaryTotal">₱###</strong></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom mb-3">
                                        <h5 class="ms-4 py-1" style="margin-bottom: 0px">Payment Method</h5>
                                    </div>
                                    @foreach ($paymentMethods as $paymentMethod)
                                        <div class="q-box__question">
                                            <input checked class="form-check-input question__input"
                                                id="q_1_no_{{ $paymentMethod->id }}" name="payment_method" type="radio"
                                                value="{{ $paymentMethod->id }}">
                                            <label class="form-check-label question__label"
                                                for="q_1_no_{{ $paymentMethod->id }}">
                                                {{ $paymentMethod->name }}
                                                <br>
                                                <p>
                                                    <small>
                                                        {{ $paymentMethod->description }}
                                                    </small>
                                                </p>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="step ">
                                    <div class="mt-1 ">
                                        <div class="closing-text pt-1 px-5 text-center">
                                            <div class="">
                                                <h4>You are about to Book.</h4>
                                                <p>Please review all the details carefully. <br> Click the Submit button to
                                                    proceed.</p>
                                            </div>
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
                            <div id="q-box__buttons" class="pb-sm-4">
                                <button id="prev-btn" type="button">Previous</button>
                                <button id="next-btn" type="button">Next</button>
                                <button id="submit-btn" type="submit">
                                    <span id="spinner" class="spinner-border spinner-border-sm d-none"
                                        aria-hidden="true"></span>
                                    Submit
                                </button>
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

            let prices = {
                "Regular": {
                    "Monthly": 1500,
                    "Day": 150
                },
                "Student": {
                    "Monthly": 1000,
                    "Day": 100
                }
            };

            $("#service_name").change(function() {
                $("#service_duration").prop("disabled", false); // Enable duration select
                $("#service_duration").prop("selectedIndex", 0);
                $("#servDescription").html(
                    '<p class="text-center mb-0">Select a duration to view the price.</p>');
            });

            $("#service_duration").change(function() {
                let service = $("#service_name").val();
                let duration = $(this).val();
                let price = prices[service][duration];

                // Update service description
                let summary = `
                    <h5 class="text-center">${service} - ${duration}</h5>
                    <p class="text-center text-success fw-bold mb-0">Price: ₱${price}</p>
                `;
                $("#servDescription").html(summary);

                $("#ServName").val(service);
                $("#summaryServName").text(service);
                $("#ServDuration").val(duration);
                $("#ServPrice").val(price);
                $("#summaryServPrice").text(price);
                // $("#summarySubTotal").text(price);
                $("#summaryTotal").text(price);
            });

            // $('#service_name').on('change', function() {
            //     var categoryId = $(this).val();
            //     var $serviceDropdown = $('#service_duration');

            //     $serviceDropdown.empty();
            //     $serviceDropdown.append('<option value="">-- Select Service --</option>');

            //     if (categoryId) {
            //         $.ajax({
            //             url: '/services/' + categoryId,
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(data) {
            //                 $.each(data, function(key, service) {
            //                     $serviceDropdown.append('<option value="' + service.id +
            //                         '">' + service.name + '</option>');
            //                 });
            //             },
            //             error: function() {
            //                 alert('Error fetching services.');
            //             }
            //         });
            //     }
            // });

            // $('#ServName').on('change', function() {
            //     var serviceId = $(this).val();

            //     if (serviceId) {
            //         $.ajax({
            //             url: '/service/details/' + serviceId,
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(data) {
            //                 $('#servDescription').html(`
        //                     <h5 class="mb-1">Details</h5>
        //                     <div class="ms-2">
        //                     <h6><strong>Service:</strong> ${data.name}</h6>
        //                         <p class="mb-0"><strong>Trainer:</strong> ${data.trainer}</p>
        //                         <p><strong>Price:</strong> ₱${data.price}</p>
        //                     </div>
        //                 `);
            //                 $('#summaryServName').text(data.name);
            //                 $('#summaryServPrice').text(`₱${data.price}`);
            //                 $('#summarySubTotal').text(`₱${data.price}`);
            //                 $('#summaryTotal').text(`₱${data.price}`);

            //                 if (data.amenities && data.amenities.length > 0) {
            //                     let amenitiesList = '<h6>Amenities Included:</h6><ul>';
            //                     data.amenities.forEach(function(amenity) {
            //                         amenitiesList += `<li>${amenity.name}</li>`;
            //                     });
            //                     amenitiesList += '</ul>';
            //                     $('#amenitiesList').html(
            //                         amenitiesList
            //                     ); // Add the amenities to a div with ID 'amenitiesList'
            //                 } else {
            //                     $('#amenitiesList').html(
            //                         '<p>No amenities available for this service.</p>');
            //                 }
            //             },
            //             error: function() {
            //                 $('#servDescription').html(
            //                     '<p class="text-danger">Error fetching service details.</p>'
            //                 );
            //                 $('#amenitiesList').html(
            //                     '<p class="text-danger">Error fetching amenities.</p>');
            //             }
            //         });
            //     } else {
            //         $('#servDescription').html('<p>Select a service to view its details.</p>');
            //         $('#summaryServName').text('Service Name');
            //         $('#summaryServPrice').text('₱ ###');
            //         $('#summarySubTotal').text('₱###');
            //         $('#summaryTotal').text('₱###');
            //     }
            // });

            $(function() {
                $("#datepicker").datepicker({
                    minDate: 0,
                    defaultDate: new Date(),
                    onSelect: function(dateText) {
                        $("#selected-date").val(dateText);
                    },

                });

                let today = $.datepicker.formatDate('mm/dd/yy', new Date());
                $("#selected-date").val(today);
                $("#datepicker").datepicker("setDate", new Date());
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
                let paymentMethod = $('input[name="payment_method"]:checked').val();

                console.log(formData);

                let button = $("#submit-btn");
                let spinner = $("#spinner");

                // Show the spinner
                spinner.removeClass("d-none");
                button.addClass("disabled");

                if (paymentMethod == 2) {
                    // AJAX for PayPal (or other method)
                    $.ajax({
                        url: '/paypal-checkout', // Change to your PayPal checkout URL
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.redirect_url) {
                                localStorage.setItem('reservation_id', response.reservation_id);
                                window.location.href = response
                                .redirect_url; // Redirect to PayPal
                            } else {
                                alert(
                                    'PayPal Success, but no redirect URL provided. Check server response.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('PayPal AJAX Error:', {
                                status: status,
                                error: error,
                                response: xhr.responseText
                            });
                        }
                    });

                } else {
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
                }
            });
        });
    </script>


@endsection
