@extends('layouts.app')

@section('title', 'Homepage')

@section('css')

    <style>
        .feature-item .left-icon img {
            width: 60px;
        }
        .feature-item {
            margin-bottom: 30px;
        }
    </style>

@endsection

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('public/img/gym-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>work <em class="text-accent">harder</em>, get <em class="text-accent">stronger</em></h6>
                <h2>easy with <em
                        style="
                    font-family: var(--bs-font-sans-serif) !important; font-weight: 900;
                    font-style: normal; text-shadow:1px 1px 2px #fff, /* Light shadow for highlight */ -1px -1px
                            2px #000; Dark shadow for depth
                    ">AJ
                        DIA</em></h2>
                <div class="main-button
                        scroll-to-section">
                    <a href="{{ route('register') }}">Become a member</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Services</em></h2>
                        <img src="{{ asset('public/img/line-dec.png') }}" alt="waves">
                    </div>
                </div>

                <ul class="features-items row align-items-center justify-content-center  w-100 w-md-75 mx-auto">
                    @foreach ($services as $service)
                        <li class="feature-item col-12 col-md-6 d-flex">
                            <div class="d-flex align-items-center w-100">
                                <div class="left-icon">
                                    <img src="{{ asset('public/img/features-first-icon.png') }}"
                                        style="background-color: #ed563b; cursor: default;">
                                </div>
                                <div class="right-content">
                                    <h4 class="align-self-center">{{ $service->name }}</h4>
                                    {{-- <div>
                                    <p>{{ $service->description }}</p>
                                    <p>Inclusions:
                                        @foreach ($service->amenities as $amenity)
                                            {!! $amenity->class !!} {{ $amenity->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div> --}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>


                {{-- <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus voluptatum,
                                    molestiae maxime voluptas explicabo nam harum ullam dolorum, quidem sit
                                    praesentium ea illo inventore aut nisi expedita. Earum, deleniti cum!</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>New Gym Training</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum commodi minima,
                                    modi labore sint aspernatur, nesciunt iure, deserunt at eius perferendis! Iste
                                    ea iusto incidunt eligendi consequatur quidem consequuntur expedita.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum eveniet
                                    corporis ullam repellendus nam nobis distinctio magni porro adipisci, illum
                                    facilis ratione explicabo, ea delectus, quod sequi nemo architecto officia?</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>Advanced Muscle Course</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod praesentium nemo
                                    eligendi magnam quam quaerat sed voluptatem, reprehenderit voluptatibus
                                    voluptate, totam excepturi veniam reiciendis rerum ducimus ullam quos
                                    aspernatur. Consequatur.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, neque dicta
                                    quas reiciendis sit tempora? Doloremque quasi mollitia amet sed placeat sit
                                    laboriosam tempore! Corrupti ullam deserunt sunt eaque. Itaque.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('img/features-first-icon.png') }}" alt="gym training">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora porro atque
                                    nostrum quos ut, corrupti in iste totam adipisci maiores consequatur numquam id
                                    veniam voluptatum odit, quam ea maxime eveniet.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p>Unlock your fitness potential with a membership at AJ DIA Fitness Gym! Whether you're a beginner
                            or a seasoned athlete, we have everything you need to reach your goals</p>
                        <div class="main-button scroll-to-section">
                            <a href="{{ route('register') }}">Become a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    {{-- <section class="section" id="our-classes">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Our <em>Classes</em></h2>
                    <img src="{{ asset('img/line-dec.png') }}" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor,
                        ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><img src="{{ asset('img/tabs-first-icon.png') }}"
                                alt="">First
                            Training Class</a></li>
                    <li><a href='#tabs-2'><img src="{{ asset('img/tabs-first-icon.png') }}"
                                alt="">Second
                            Training Class</a></a></li>
                    <li><a href='#tabs-3'><img src="{{ asset('img/tabs-first-icon.png') }}"
                                alt="">Third
                            Training Class</a></a></li>
                    <li><a href='#tabs-4'><img src="{{ asset('img/tabs-first-icon.png') }}"
                                alt="">Fourth
                            Training Class</a></a></li>
                    <div class="main-rounded-button"><a href="#">View All Schedules</a></div>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="{{ asset('img/training-image-01.jpg') }}" alt="First Class">
                        <h4>First Training Class</h4>
                        <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui
                            eleifend hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem
                            fermentum sem tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet,
                            molestie nunc ut, accumsan diam.</p>
                        <div class="main-button">
                            <a href="#">View Schedule</a>
                        </div>
                    </article>
                    <article id='tabs-2'>
                        <img src="{{ asset('img/training-image-02.jpg') }}" alt="Second Training">
                        <h4>Second Training Class</h4>
                        <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam
                            tortor a velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus.
                            Nam tellus nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar
                            eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus.</p>
                        <div class="main-button">
                            <a href="#">View Schedule</a>
                        </div>
                    </article>
                    <article id='tabs-3'>
                        <img src="{{ asset('img/training-image-03.jpg') }}" alt="Third Class">
                        <h4>Third Training Class</h4>
                        <p>Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere
                            sit amet. Aliquam pharetra, augue vel cursus porta, nisi tortor vulputate sapien, id
                            scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper
                            vel, accumsan a neque.</p>
                        <div class="main-button">
                            <a href="#">View Schedule</a>
                        </div>
                    </article>
                    <article id='tabs-4'>
                        <img src="{{ asset('img/training-image-04.jpg') }}" alt="Fourth Training">
                        <h4>Fourth Training Class</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas. Aenean ultrices elementum odio ac tempus. Etiam eleifend orci lectus, eget
                            venenatis ipsum commodo et.</p>
                        <div class="main-button">
                            <a href="#">View Schedule</a>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section> --}}
    <!-- ***** Our Classes End ***** -->

    {{-- <section class="section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Classes <em>Schedule</em></h2>
                    <img src="{{asset('imgline-dec.png" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor,
                        ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="filters">
                    <ul class="schedule-filter">
                        <li class="active" data-tsfilter="monday">Monday</li>
                        <li data-tsfilter="tuesday">Tuesday</li>
                        <li data-tsfilter="wednesday">Wednesday</li>
                        <li data-tsfilter="thursday">Thursday</li>
                        <li data-tsfilter="friday">Friday</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <div class="schedule-table filtering">
                    <table>
                        <tbody>
                            <tr>
                                <td class="day-time">Fitness Class</td>
                                <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                <td>William G. Stewart</td>
                            </tr>
                            <tr>
                                <td class="day-time">Muscle Training</td>
                                <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                <td class="thursday friday ts-item" data-tsmeta="thursday"
                                    data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Paul D. Newman</td>
                            </tr>
                            <tr>
                                <td class="day-time">Body Building</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                <td>Boyd C. Harris</td>
                            </tr>
                            <tr>
                                <td class="day-time">Yoga Training Class</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Hector T. Daigle</td>
                            </tr>
                            <tr>
                                <td class="day-time">Advanced Training</td>
                                <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                <td>Bret D. Bowers</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- ***** Testimonials Starts ***** -->
    @if ($trainers->isNotEmpty())
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>Expert <em>Trainers</em></h2>
                            <img src="{{ asset('public/img/line-dec.png') }}" alt="" style="cursor: default;">
                            <p>Get to know your trainer! Have questions? Feel free to reach out to your trainer for
                                inquiries about training plans, nutrition guidance, or fitness assessments.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($trainers as $trainer)
                        <div class="col-lg-4">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="/storage/app/public/{{ $trainer->trainerDetails->profile_picture }}"
                                        alt="">
                                </div>
                                <div class="down-content">
                                    <span>{{ ucwords($trainer->trainerDetails->trainer_type) }}</span>
                                    <h4>{{ $trainer->name }}</h4>
                                    <p>{{ $trainer->trainerDetails->bio }}</p>
                                    <ul class="social-icons">
                                        @if ($trainer->trainerDetails->facebook_link)
                                            <li><a href="{{ $trainer->trainerDetails->facebook_link }}"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if ($trainer->trainerDetails->twitter_link)
                                            <li><a href="{{ $trainer->trainerDetails->twitter_link }}"><i
                                                        class="fa fa-twitter"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- ***** Testimonials Ends ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.4476461010263!2d122.97227737383345!3d13.751857086639983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a21bff2e01627f%3A0x54cacae120905b92!2sDIA%20Bldg!5e0!3m2!1sen!2sph!4v1729691509895!5m2!1sen!2sph=embed"
                            width="100%" height="530px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="{{ route('send.contact.us') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name*"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Your Email*" required="">
                                    </fieldset>
                                </div>
                                {{-- <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text" id="subject" placeholder="Subject">
                                    </fieldset>
                                </div> --}}
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Feedback" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send
                                            Feedback</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

@endsection
