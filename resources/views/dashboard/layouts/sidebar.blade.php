@php
    $currentRouteName = Route::currentRouteName();
@endphp


<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse py-3">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link" style="font-size: 18px;" href="{{ route('dashboard.index') }}">
            <span class="bi bi-house"></span>
            Dashboard
        </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="font-size: 18px;" href="{{ route('dashboard.categories.index') }}">
            <span class="bi bi-tags-fill"></span>
            List Categories
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" style="font-size: 18px;" href="{{ route('dashboard.appointments.index') }}">
              <span class="bi bi-journal-text"></span>
              List Appointments
            </a>
      </li>

  </nav>


  