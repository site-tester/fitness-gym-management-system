<nav class="navbar navbar-expand-lg sticky-top bg-white">
    <div class="container">
        <a href="/" class="logo">
            <img class="img m-auto w-100 h-100" src="{{ asset('public/img/Logo.jpg') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('landing') }}"
                        class="nav-link  {{ Route::currentRouteName() === 'landing' ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workout') }}"
                        class="nav-link  {{ Route::currentRouteName() === 'workout' ? 'active' : '' }}">
                        Workouts
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about.us') }}"
                        class="nav-link {{ Route::currentRouteName() === 'about.us' ? 'active' : '' }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.us') }}"
                        class="nav-link {{ Route::currentRouteName() === 'contact.us' ? 'active' : '' }}">
                        Contact
                    </a>
            </ul>
            <div class="d-flex">
                @guest
                    <div class="guest ms-1 row">
                        <li class="main-button col ps-0">
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="main-button col ps-0">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="dropbtn btn rounded fw-bold dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img
                                src="{{ asset('/resources/img/profile_red.png') }} " alt=""
                                style="width:33px; pointer-events: none;"></button>
                        {{-- <button onclick="myFunction()" class="dropbtn rounded fw-bold"><img src="{{ asset('/img/profile_red.png') }} " alt="" style="width:33px; pointer-events: none;"></button> --}}
                        <ul id="myDropdown" class="dropdown-content dropdown-menu rounded border border-danger">
                            {{-- <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('booking') }}">
                                        <i class="bi bi-journal-text"></i>
                                        Bookings</a> --}}
                            @php
                                $userDetails = Auth::user()->rfid_number;
                            @endphp
                            @hasrole('member')
                                <li>
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('dashboard') }}">
                                        <i class="bi bi-speedometer2"></i>
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('profile') }}">
                                        <i class="bi bi-person-badge"></i>
                                        Profile</a>
                                </li>
                                <li>
                                    <a class=" m-1 link-body-emphasis fw-bold disabled" href="{{ route('book.now') }}">
                                        <i class="bi bi-journal-arrow-down"></i>
                                        Book Now
                                    </a>
                                </li>
                            @endhasrole
                            @hasanyrole('admin|superadmin')
                                <li>
                                    <a class="m-1 link-body-emphasis fw-bold" href="/admin">
                                        Dashboard
                                    </a>
                                </li>
                            @endhasanyrole
                            <hr class="my-0 py-0 border border-danger">
                            <li>
                                <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-escape"></i>
                                    Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
