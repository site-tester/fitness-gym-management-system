<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}} */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{asset('css/gym.css')}}"> --}}
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/css/gym.css'])

</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @include('layouts.navbar')
        <!-- ***** Header Area End ***** -->

        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('img/gym-video.mp4') }}" type="video/mp4" />
            </video>

            <div class="video-overlay header-text">
                <div class="caption">
                    <h6>work <em class="text-accent">harder</em>, get <em class="text-accent">stronger</em></h6>
                    <h2>easy with our <em>gym</em></h2>
                    <div class="main-button scroll-to-section">
                        <a href="#features">Become a member</a>
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
                            <h2>Choose <em>Program</em></h2>
                            <img src="{{ asset('img/line-dec.png') }}" alt="waves">
                            <p>{* BRAND* } gyms and fitness centers.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                    </div>
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
                            <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet
                                dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                            <div class="main-button scroll-to-section">
                                <a href="#our-classes">Become a member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Call to Action End ***** -->

        <!-- ***** Our Classes Start ***** -->
        <section class="section" id="our-classes">
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
        </section>
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
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>Expert <em>Trainers</em></h2>
                            <img src="{{ asset('img/line-dec.png') }}" alt="">
                            <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor,
                                ultricies fermentum massa consequat eu.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <img src="{{ asset('img/first-trainer.jpg') }}" alt="">
                            </div>
                            <div class="down-content">
                                <span>Strength Trainer</span>
                                <h4>Bret D. Bowers</h4>
                                <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free
                                    vegan church-key pour-over seitan flannel.</p>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <img src="{{ asset('img/second-trainer.jpg') }}" alt="">
                            </div>
                            <div class="down-content">
                                <span>Muscle Trainer</span>
                                <h4>Hector T. Daigl</h4>
                                <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free
                                    vegan church-key pour-over seitan flannel.</p>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <img src="{{ asset('img/third-trainer.jpg') }}" alt="">
                            </div>
                            <div class="down-content">
                                <span>Power Trainer</span>
                                <h4>Paul D. Newman</h4>
                                <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free
                                    vegan church-key pour-over seitan flannel.</p>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Testimonials Ends ***** -->

        <!-- ***** Contact Us Area Starts ***** -->
        <section class="section" id="contact-us">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div id="map">
                            <iframe src="https://maps.google.com/maps?e=UTF8&iwloc=&output=embed" width="100%"
                                height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="contact-form">
                            <form id="contact" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name"
                                                placeholder="Your Name*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject"
                                                placeholder="Subject">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Send
                                                Message</button>
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

        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; <a href="">2024 AJ DIA Fitness Gym</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


    @vite(['resources/js/scrollreveal.min.js', 'resources/js/jquery.counterup.min.js', 'resources/js/imgfix.min.js', 'resources/js/mixitup.js', 'resources/js/accordions.js', 'resources/js/custom.js'])
</body>

</html>
