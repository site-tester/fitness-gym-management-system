<header class="header-area header-sticky sticky-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav d-flex align-items-center justify-content-between">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img class="img m-auto w-100 h-100" src="{{ asset('public/img/Logo.jpg') }}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="{{ route('landing') }}"
                                class="{{ Route::currentRouteName() === 'landing' ? 'active' : '' }}">
                                Home
                            </a>
                        </li>
                        {{-- @hasrole('member') --}}
                            <li class="scroll-to-section">
                                <a href="{{ route('workout') }}"
                                    class="{{ Route::currentRouteName() === 'workout' ? 'active' : '' }}">
                                    Workouts
                                </a>
                            </li>
                        {{-- @endhasrole --}}
                        <li class="scroll-to-section">
                            <a href="{{ route('about.us') }}"
                                class="{{ Route::currentRouteName() === 'about.us' ? 'active' : '' }}">
                                About
                            </a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('contact.us') }}"
                                class="{{ Route::currentRouteName() === 'contact.us' ? 'active' : '' }}">
                                Contact
                            </a>
                        </li>
                        @guest
                            <div class="guest ms-1 row">
                                <li class="main-button col">
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                                <li class="main-button col">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            </div>
                        @else
                            {{-- <div class="guest ms-1 row">
                                @hasrole('member')
                                    <li class="main-button col" >
                                        <a href="{{ route('profile') }}" style="line-height: 20px;">Profile</a>
                                    </li>
                                    <li class="main-button col" >
                                        <a href="{{ route('book.now') }}" style="line-height: 20px;" class="text-nowrap">Book Now</a>
                                    </li>
                                @endhasrole

                                @hasanyrole('admin|superadmin')
                                    <li class="main-button col">
                                        <a class="text-center btn btn-success text-nowrap fw-bolder mx-2"
                                            href="/admin">
                                            Dashboard
                                        </a>
                                    </li>
                                @endhasanyrole


                                <li class="main-button col">
                                    <a href="{{ route('logout') }}" class=" bg-secondary"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div> --}}
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn rounded fw-bold"><img src="{{ asset('/resources/img/profile_red.png') }} " alt="" style="width:33px; pointer-events: none;"></button>
                                {{-- <button onclick="myFunction()" class="dropbtn rounded fw-bold"><img src="{{ asset('/img/profile_red.png') }} " alt="" style="width:33px; pointer-events: none;"></button> --}}
                                <div id="myDropdown" class="dropdown-content rounded border border-danger">
                                    {{-- <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('booking') }}">
                                        <i class="bi bi-journal-text"></i>
                                        Bookings</a> --}}
                                    @php
                                        $userDetails = Auth::user()->rfid_number;
                                    @endphp
                                    @hasrole('member')
                                        <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('dashboard') }}">
                                            <i class="bi bi-speedometer2"></i>
                                            Dashboard</a>
                                        <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('profile') }}">
                                            <i class="bi bi-person-badge"></i>
                                            Profile</a>
                                        <a class=" m-1 link-body-emphasis fw-bold disabled" href="{{ route('book.now') }}">
                                            <i class="bi bi-journal-arrow-down"></i>
                                            Book Now
                                        </a>
                                    @endhasrole
                                    @hasanyrole('admin|superadmin')
                                        <a class="m-1 link-body-emphasis fw-bold" href="/admin">
                                            Dashboard
                                        </a>
                                    @endhasanyrole
                                    <hr class="my-0 py-0 border border-danger">
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-escape"></i>
                                        Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
