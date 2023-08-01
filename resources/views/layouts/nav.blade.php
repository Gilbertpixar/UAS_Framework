@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-md navbar-dark bg-white shadow fixed-top">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand mb-4 mt-3 h1 text-danger"><svg xmlns="http://www.w3.org/2000/svg"
                height="1em" viewBox="0 0 448 512">
                <style>
                    svg {
                        fill: #ef6262
                    }
                </style>
                <path
                    d="M186.1 52.1C169.3 39.1 148.7 32 127.5 32C74.7 32 32 74.7 32 127.5v6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2l36.7 205.8c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C192.2 323.7 207 312 224 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5v-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" />
            </svg></i> Gigiku</a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="d-md-none text-white-50">
            <ul class="navbar-nav row wrap text-dark text-center">
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                        class="nav-link text-dark @if ($currentRouteName == 'home') active @endif">Home</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('about') }}"
                        class="nav-link text-dark @if ($currentRouteName == 'about') active @endif">About</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('services') }}"
                        class="nav-link text-dark @if ($currentRouteName == 'services') active @endif">Services</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('ourteam') }}"
                        class="nav-link text-dark @if ($currentRouteName == '/ourteam') active @endif">Our Team</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('blog') }}"
                        class="nav-link text-dark @if ($currentRouteName == 'blog') active @endif">Blog</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('news') }}"
                        class="nav-link text-dark  @if ($currentRouteName == 'news') active @endif">News</a></li>
                {{-- <li class="nav-item col-2 col-md-auto btn btn-danger px-1"><a href="{{ route('appointment.create') }}"
                        class="nav-link text-white @if ($currentRouteName == 'appointment.create') active @endif">Make
                        Appointment</a>
                </li> --}}
            </ul>

            <hr class="d-md-none text-white-50">

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <!-- Jika pengguna tidak terautentikasi (belum login) -->
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- <!-- Jika pengguna terautentikasi (sudah login) -->
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </a> --}}

                    {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- <a class="dropdown-item" href="{{ route('profile') }}"> --}}
                    {{-- <i class="bi-person-fill me-1"></i> My Profile
                            </a> --}}

                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-1"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
            </li>  --}}
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </a> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-1"></i>{{ __('Logout') }}
                    </a>

                    {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('about') }}">
                            <i class="bi-person-fill me-1"></i> My Profile
                        </a> --}}
            </div>
            </li>
        @endguest
        </ul>
    </div>
    </div>
    {{-- <div class="mb-5"></div> --}}


</nav>
