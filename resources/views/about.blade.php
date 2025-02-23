@extends('layouts.app')

@section('title', 'About')


@section('content')
    <div>
        <div class="main-banner" id="top">
            <div class="d-flex justify-content-center align-items-center Fixed-parallax-background" style="height: 350px;background: url(/resources/img/423584374_868624935269571_8955187234334423439_n.jpg);"></div>
            <div class="video-overlay header-text h-100">
                <div class="caption mt-5">
                    <h1 class="hero-title text-white" style="font-weight: bold;font-size: 50px;">ABOUT US</h1>

                    <p class="hero-subtitle text-secondary" style="font-size: 15px;">Empowering You to Unleash Your Ultimate Potential.</p>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="card border-0">
                <div class="card-body" style="border-radius: 0px;">
                    <h4 class="card-title" style="text-align: center;font-size: 40px;font-weight: bold;color: var(--accent) !important;text-shadow: 2px 2px rgb(129,34,34);">OUR STORY</h4>
                    <h6 class="text-muted card-subtitle mb-2" style="text-align: center;">HISTORY</h6>
                    <hr style="border-style: solid;opacity: 1;color: rgb(0,0,0);">
                    <p class="card-text px-5" style="text-align: justify;">AJ DIA Fitness Gym, located in Dia Building Basement Area Zone 1 Tara Sipooct Camarines Sur, was established in 2018 by Allan Joshua Dia. The idea of starting the gym was inspired by Allan Joshua's close bond with his father, as both were passionate about fitness and regularly visited gyms in Naga City. However, when the gym they frequented closed down, they saw an opportunity to bring fitness closer to their community.<br><br>At the time, Sipocot lacked a dedicated fitness center, and most residents who wanted to work out had limited options, often traveling to nearby cities like Naga. Seeing this gap, Allan Joshua and his father decided to build their own gym to cater to the local population. They envisioned a place where everyone in the community could have access to quality fitness facility, especially since the only other option was the public gym, which offered limited services. <br><br>This passion project, born from a father-son hobby, has grown into a cornerstone of fitness in the region, providing residents with a space to work towards their fitness goals without having to leave town.<br><br><br></p>
                </div>
            </div>
        </div>
        <footer style="padding-top: 0px;">
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class=" p-4 p-md-5 mt-4">
                                    <h2 class="fw-bold mb-3" style="color: var(--accent) !important;">WHO WE ARE</h2>
                                    <p class="mb-4" style="text-align: justify;">AJ DIA Fitness Gym is an establishment made for everyone who wish to better themselves physically and mentally. We believe in more than just workouts; we believe in building a community dedicated to strength, wellness, and personal growth. Join us on a journey to transform your body and mind, where every rep brings you closer to your best self!<br><br></p>
                                </div>
                            </div>
                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;background: #bb3030;"><img class="w-100 h-100 fit-cover" src="{{ asset('/resources/img/423582406_868624681936263_6185503928828898119_n.jpg')}}"></div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 style="text-align: center;font-weight: bold;color:  var(--accent) !important;font-size: 50px;">WE OFFER</h1>
                </div>
            </div>
            <div class="carousel slide" data-bs-ride="false" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <section class="text-white py-4 py-xl-5">
                            <div class="container-fluid px-0">
                                <div class="border border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: linear-gradient(rgba(99,20,20,0.2), rgba(99,20,20,0.2)), url(/resources/img/423583148_868625718602826_376942488243513661_n.jpg) center / cover;">
                                    <div class="row">
                                        <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                                            <div>
                                                <h1 class="text-uppercase fw-bold mb-3">PROGRAMS</h1><a href="{{route('contact.us')}}" class="text-white fs-5 me-2 py-2 px-4" type="button" style="background: #e12c2c;">CONTACT US</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="carousel-item">
                        <section class="text-white py-4 py-xl-5">
                            <div class="container">
                                <div class="border border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: linear-gradient(rgba(99,20,20,0.2), rgba(99,20,20,0.2)), url(&quot;assets/img/425443917_868625335269531_2790859811413262728_n.jpg&quot;) center / cover;">
                                    <div class="row">
                                        <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                                            <div>
                                                <h1 class="text-uppercase fw-bold mb-3">PROMO&nbsp;</h1><button class="btn btn-primary fs-5 me-2 py-2 px-4" type="button" style="border-radius: 50px;background: #e12c2c;">LEARNMORE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="carousel-item">
                        <section class="text-white py-4 py-xl-5">
                            <div class="container">
                                <div class="border border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: radial-gradient(rgba(99,20,20,0.2), rgba(99,20,20,0.2)), url(&quot;assets/img/425515362_868624715269593_5481593597838287722_n.jpg&quot;) center / cover;">
                                    <div class="row">
                                        <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                                            <div>
                                                <h1 class="text-uppercase fw-bold mb-3">SERVICES</h1><button class="btn btn-primary fs-5 me-2 py-2 px-4" type="button" style="background: rgb(225,44,44);font-size: 14px;">LEARN MORE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
