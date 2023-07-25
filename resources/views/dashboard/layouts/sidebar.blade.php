@php
    $currentRouteName = Route::currentRouteName();
@endphp


<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">
            <span class="bi bi-house"></span>
            Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
            <span class="bi bi-tags-fill"></span>
            List Categories
          </a>
        </li>

        <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.appointments.index') }}">
              <span class="bi bi-journal-text"></span>
              List Appointments
          </a>
      </li>

  </nav>


  