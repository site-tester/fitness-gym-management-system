@extends('layouts.app')

@section('title', 'Contact Us')


@section('content')

    <div>
        <div class="main-banner" id="top">
            <div class="d-flex justify-content-center align-items-center Fixed-parallax-background"
                style="height: 400px; background-image: url('/resources/img/423582406_868624681936263_6185503928828898119_n.jpg'); background-size: cover; background-position: center;">
            </div>

            <div class="video-overlay header-text h-100">
                <div class="caption">
                    <h2 style="font-size: 54px;">CONTACT US</h2>
                    <div class="main-button scroll-to-section"></div>
                </div>
            </div>
        </div>
        <section class="section" id="contact-us" style="margin-top: 1rem">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xs-12">
                        <div id="map"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.4476461010263!2d122.97227737383345!3d13.751857086639983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a21bff2e01627f%3A0x54cacae120905b92!2sDIA%20Bldg!5e0!3m2!1sen!2sph!4v1729691509895!5m2!1sen!2sph =embed"
                                width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="contact-form">
                            <form id="contact" action="{{ route('send.contact.us') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <fieldset><input type="text" id="name" name="name"
                                                placeholder="Your Name*" required=""></fieldset>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <fieldset><input type="text" id="email" name="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required=""></fieldset>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <fieldset><input type="text" id="subject" name="subject"
                                                placeholder="Subject"></fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea id="message" name="message" placeholder="Message" required="" rows="6"></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset><button type="submit" id="form-submit" class="main-button"
                                                >Send Message</button></fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container py-4 w-100 mb-2">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 mb-2">

                <div class="col col-md-4">
                    <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                        <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg"
                            style="background: white;font-family: Poppins, sans-serif;border-color: #212528;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-pin-map-fill"
                                style="color: var(--accent) !important;font-size: 50px;font-family: Poppins, sans-serif;border-color: #212528;">
                                <path fill-rule="evenodd"
                                    d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                            </svg>
                        </div>
                        <div class="px-3" >
                            <h4 style="color: var(--accent) !important;">Address</h4>
                            <p>DIA Building Basement Area, Tara, Sipocot, Philippines</p>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                        <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg"
                            style="background: white;font-family: Poppins, sans-serif;border-color: #212528;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                fill="none"
                                style="color: var(--accent) !important;font-size: 50px;font-family: Poppins, sans-serif;border-color: #212528;">
                                <path
                                    d="M22 12C22 10.6868 21.7413 9.38647 21.2388 8.1731C20.7362 6.95996 19.9997 5.85742 19.0711 4.92896C18.1425 4.00024 17.0401 3.26367 15.8268 2.76123C14.6136 2.25854 13.3132 2 12 2V4C13.0506 4 14.0909 4.20703 15.0615 4.60889C16.0321 5.01099 16.914 5.60034 17.6569 6.34326C18.3997 7.08594 18.989 7.96802 19.391 8.93848C19.7931 9.90918 20 10.9495 20 12H22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M2 10V5C2 4.44775 2.44772 4 3 4H8C8.55228 4 9 4.44775 9 5V9C9 9.55225 8.55228 10 8 10H6C6 14.4182 9.58173 18 14 18V16C14 15.4478 14.4477 15 15 15H19C19.5523 15 20 15.4478 20 16V21C20 21.5522 19.5523 22 19 22H14C7.37259 22 2 16.6274 2 10Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M17.5433 9.70386C17.8448 10.4319 18 11.2122 18 12H16.2C16.2 11.4485 16.0914 10.9023 15.8803 10.3928C15.6692 9.88306 15.3599 9.42017 14.9698 9.03027C14.5798 8.64014 14.1169 8.33081 13.6073 8.11963C13.0977 7.90869 12.5515 7.80005 12 7.80005V6C12.7879 6 13.5681 6.15527 14.2961 6.45679C15.024 6.7583 15.6855 7.2002 16.2426 7.75732C16.7998 8.31445 17.2418 8.97583 17.5433 9.70386Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div class="px-3"
                            style="font-family: Poppins, sans-serif;border-color: #212528;">
                            <h4 style="color: var(--accent) !important;">Phone</h4>
                            <p>0912-345-6789</p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="text-center d-flex flex-column align-items-center align-items-xl-center"
                        style="font-family: Poppins, sans-serif;border-color: #212528;">
                        <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg"
                            style="background: white;font-family: Poppins, sans-serif;border-color: #212528;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none"
                                style="color: var(--accent) !important;font-size: 50px;font-family: Poppins, sans-serif;border-color: #212528;">

                                <path
                                    d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div class="px-3">
                            <h4 style="color: var(--accent) !important;">Email</h4>
                            <p>ajdiafitness@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light border rounded border-light hero-photography jumbotron py-5 px-4 mb-3 text-center"
            style="padding-top: 70px;margin-top: 0px; background: url('/resources/img/423583148_868625718602826_376942488243513661_n.jpg'); background-size: cover;
  background-position: center;">
            <h1 class="hero-title text-white" style="font-weight: bold;">VISIT US ON FACEBOOK!</h1>
            <p class="hero-subtitle text-white">Stay connected! Visit us on Facebook for the latest from AJ DIA Fitness</p>
            <div>
                <a href="https://www.facebook.com/AJDIAFITNESS/?_rdc=1&amp;_rdr"
                    style="color: rgb(255,255,255);background: #e12c2c;font-size: 20px;border: 9px solid rgb(225,44,44);">CLICK
                    HERE
                </a>
            </div>
        </div>
    </div>

@endsection
