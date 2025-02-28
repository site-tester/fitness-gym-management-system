@extends('layouts.app')

@section('title', 'Booking Success')

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
            /* background: url(../storage/img/Logo.jpg);
            background-repeat: repeat; */
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
        <div class="row shadow mt-5 mx-auto w-75 p-0 border border-danger">
            <div class="col-5 px-0 overflow-hidden">
                <img src="{{ asset('/resources/img/Logo.jpg') }}" alt="" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div class="col-7 px-0 border-start border-danger border-2">
                <div class="rounded-0 ">
                    <div class="progress mx-1 mt-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                            class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                            style="width: 0%"></div>
                    </div>
                    <div id="qbox-container">
                        <div id="steps-container">
                            <div>
                                <div class="mt-5 p-1 p-md-5 pt-md-1">
                                    <div class="text-center px-3 mb-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24" style="transform: scale(.7);">
                                            <path
                                                d="M11.798,10.814l.279,.188c.466-.334,5.858-3.846,6-7.478,0-1.944-1.458-3.525-3.25-3.525-1.156,0-2.174,.659-2.75,1.648-.576-.989-1.594-1.648-2.75-1.648-1.792,0-3.25,1.581-3.25,3.525,0,3.395,5.487,7.132,5.721,7.29ZM9.327,1c1.241,0,2.25,1.133,2.25,2.525h1c0-1.392,1.01-2.525,2.25-2.525s2.25,1.133,2.25,2.525c0,2.239-3.38,5.111-5,6.266-1.621-1.155-5-4.027-5-6.266,0-1.392,1.009-2.525,2.25-2.525Zm14.673,16h-1v-4h-3v-2h-4v6H8v-6H4v2H1v4H0v1H1v4h3v2h4v-6h8v6h4v-2h3v-4h1v-1ZM2,21v-7h2v7H2Zm5,2h-2V12h2v11Zm12,0h-2V12h2v11Zm3-2h-2v-7h2v7Z" />
                                        </svg>

                                    </div>
                                    <h4 class="fw-bold text-danger text-center" style="font-size: 1.5vw;">Congratulations!</h4>
                                    <h5 class="text-center">Booking Successful</h5>
                                    <p class="text-center">Please adhere to the gym's rules and regulations during your visit. For
                                        cancellations or inquiries, feel free to contact us. Enjoy your workout!</p>
                                    <a class="back-link text-center" href="/book-now">Go back from the beginning ➜</a>
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


@endsection
