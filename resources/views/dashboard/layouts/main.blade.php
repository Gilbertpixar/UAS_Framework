@php
    $currentRouteName = Route::currentRouteName();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'GIGIKU') }}</title>



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>
<body>
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">

    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">

     @yield('container')

     @stack('scripts')

     @include('sweetalert::alert')

     

    </main>
  </div>
</div>

</body>
</html>
