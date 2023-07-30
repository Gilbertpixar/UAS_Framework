@php
    $currentRouteName = Route::currentRouteName();
@endphp
<div id="preloader"></div>

<header class="navbar navbar-dark sticky-top flex-md-nowrap p-3 shadow sticky-top" style="background-color: #db6565;">
    <ul class="navbar-nav row wrap text-dark text-center">
        <li>
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 " href="{{ route('home') }}">gigiku </a>

        </li>


    </ul>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">


        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link px-3 bi bi-box-arrow-right"> Sign out</button>
        </form>


    </div>
</header>
