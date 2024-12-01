<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav d-flex align-items-center justify-content-between">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        {{-- <img class="img m-auto w-100 h-100" src="{{ asset('img/logo3.png') }}" alt=""> --}}
                        <em
                            style="text-shadow:
                            1px 1px 2px #fff, /* Light shadow for highlight */
                            -1px -1px 2px #000; Dark shadow for depth">
                            AJ DIA</em>
                        <br>
                        {{-- <div class="fitness">Fitness Gym</div> --}}
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
                                <button onclick="myFunction()" class="dropbtn rounded fw-bold">{{ Auth::user()->name }}</button>
                                <div id="myDropdown" class="dropdown-content rounded border border-danger">
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('booking') }}">
                                        <i class="bi bi-journal-text"></i>
                                        Bookings</a>
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('profile') }}">
                                        <i class="bi bi-person-badge"></i>
                                        Profile</a>
                                    <a class=" m-1 link-body-emphasis fw-bold" href="{{ route('book.now') }}">
                                        <i class="bi bi-journal-arrow-down"></i>
                                        Book Now</a>
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
