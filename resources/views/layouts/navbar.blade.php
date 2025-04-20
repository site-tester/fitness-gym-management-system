<nav class="navbar navbar-expand-lg sticky-top bg-white d-none d-md-block">
    <div class="container">
        <a href="/" class="logo">
            <img class="img m-auto w-100 h-100" src="{{ asset('/resources/img/Logo.jpg') }}" alt="">
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
                    <a href="{{ route('equipment') }}"
                        class="nav-link  {{ Route::currentRouteName() === 'equipment' ? 'active' : '' }}">
                        Equipments
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
            <div class="d-flex flex-row flex-md-column align-items-center">
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
                    <div class="dropdown d-none d-md-block">
                        <button class="dropbtn btn rounded fw-bold dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false"><img src="{{ asset('/resources/img/profile_red.png') }} " alt=""
                                style="width:33px; pointer-events: none;"></button>
                        @php
                            $userDetails = Auth::user()->rfid_number;
                        @endphp

                        <ul id="myDropdown"
                            class="dropdown-content dropdown-menu dropdown-menu-start rounded border border-danger">

                            @hasrole('member')
                                <li>
                                    <a class=" m-1 link-body-emphasis fw-bold " href="{{ route('dashboard') }}">
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

                    <div class="d-block d-md-none">
                        <hr class="my-0 py-0 border border-danger">
                        <div class="row">
                            @hasrole('member')
                                <div class="col-12">
                                    <a class=" m-1 link-body-emphasis fw-bold btn" href="{{ route('dashboard') }}">
                                        <i class="bi bi-speedometer2"></i>
                                        Dashboard</a>
                                </div>
                                <div class="col-12">
                                    <a class=" m-1 link-body-emphasis fw-bold btn" href="{{ route('profile') }}">
                                        <i class="bi bi-person-badge"></i>
                                        Profile</a>
                                </div>
                                <div class="col-12">
                                    <a class=" m-1 link-body-emphasis fw-bold btn" href="{{ route('book.now') }}">
                                        <i class="bi bi-journal-arrow-down"></i>
                                        Book Now
                                    </a>
                                </div>
                            @endhasrole
                            @hasanyrole('admin|superadmin')
                                <div class="col-6">
                                    <a class=" m-1 link-body-emphasis fw-bold" href="/admin">
                                        Dashboard
                                    </a>
                                </div>
                            @endhasanyrole


                        </div>
                        <hr class="my-0 py-0 border border-danger">
                        <div class="col-12">
                            <a class="m-1 link-body-emphasis fw-bold btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-escape"></i>
                                Logout</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg sticky-top bg-white d-block d-md-none">
    <div class="container">
        <a href="/" class="logo">
            <img class="img m-auto w-100 h-100" src="{{ asset('/resources/img/Logo.jpg') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#navbarSupportedContentOffcanvas" aria-controls="navbarSupportedContentOffcanvas"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end " id="navbarSupportedContentOffcanvas"
            style="background-color: #F3F6F6  ; width: 270px !important;" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                {{-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> --}}
                <a href="/" class="logo offcanvas-title">
                    <img class="img m-auto w-100 h-100" src="{{ asset('/resources/img/Logo.jpg') }}" alt="">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    @guest
                        <div class="guest ms-1 row mb-2">
                            <li class="main-button col-6 ms-auto my-1 ps-0 text-end px-1">
                                <a href="{{ route('register') }}" class="w-100">Register</a>
                            </li>
                            <li class="main-button col-6 ms-auto my-1 ps-0 text-end px-1">
                                <a href="{{ route('login') }}" class="w-100">Login</a>
                            </li>
                        </div>
                    @else
                        @php
                            $userDetails = Auth::user()->rfid_number;
                        @endphp
                        <li class="nav-item dropdown mb-2">
                            <a class="nav-link dropdown-toggle text-center text-bg-danger rounded" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: smaller;">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @hasrole('member')
                                    <li class="dropdown-item">
                                        <a class="nav-link m-1 link-body-emphasis fw-bold {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"
                                            href="{{ route('dashboard') }}">
                                            <i class="bi bi-speedometer2"></i> Dashboard
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link m-1 link-body-emphasis fw-bold {{ Route::currentRouteName() === 'profile' ? 'active' : '' }}"
                                            href="{{ route('profile') }}">
                                            <i class="bi bi-person-badge"></i> Profile
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link m-1 link-body-emphasis fw-bold {{ Route::currentRouteName() === 'book.now' ? 'active' : '' }}"
                                            href="{{ route('book.now') }}">
                                            <i class="bi bi-journal-arrow-down"></i> Book Now
                                        </a>
                                    </li>
                                @endhasrole
                                @hasanyrole('admin|superadmin')
                                    <li class="dropdown-item">
                                        <a class="nav-link m-1 link-body-emphasis fw-bold" href="/admin">
                                            Dashboard
                                        </a>
                                    </li>
                                @endhasanyrole
                                <li class="dropdown-item">
                                    <a class="nav-link m-1 link-body-emphasis fw-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-escape"></i>
                                        Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a href="{{ route('landing') }}"
                            class="nav-link link-danger {{ Route::currentRouteName() === 'landing' ? 'active fw-bolder bg-danger-subtle ps-2 rounded' : '' }}">
                            Home
                        </a>
                    </li>
                    {{-- <hr class="my-0 py-0 border border-danger"> --}}
                    <li class="nav-item">
                        <a href="{{ route('workout') }}"
                            class="nav-link link-danger {{ Route::currentRouteName() === 'workout' ? 'active fw-bolder bg-danger-subtle ps-2 rounded' : '' }}">
                            Workouts
                        </a>
                    </li>
                    {{-- <hr class="my-0 py-0 border border-danger"> --}}
                    <li class="nav-item">
                        <a href="{{ route('equipment') }}"
                            class="nav-link link-danger {{ Route::currentRouteName() === 'equipment' ? 'active fw-bolder bg-danger-subtle ps-2 rounded' : '' }}">
                            Equipments
                        </a>
                    </li>
                    {{-- <hr class="my-0 py-0 border border-danger"> --}}
                    <li class="nav-item">
                        <a href="{{ route('about.us') }}"
                            class="nav-link link-danger {{ Route::currentRouteName() === 'about.us' ? 'active fw-bolder bg-danger-subtle ps-2 rounded' : '' }}">
                            About
                        </a>
                    </li>
                    {{-- <hr class="my-0 py-0 border border-danger"> --}}
                    <li class="nav-item">
                        <a href="{{ route('contact.us') }}"
                            class="nav-link link-danger {{ Route::currentRouteName() === 'contact.us' ? 'active fw-bolder bg-danger-subtle ps-2 rounded' : '' }}">
                            Contact
                        </a>
                    </li>
                    {{-- <hr class="my-0 py-0 border border-danger"> --}}

                </ul>
            </div>
        </div>
    </div>
</nav>
