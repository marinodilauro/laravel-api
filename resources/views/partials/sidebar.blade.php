<div class="sidebar bg_dark text-white d-flex flex-column justify-content-between align-items-start px-2 pb-4 pt-2">


  <img width="65" src="{{ asset('storage/Avatar.jpg') }}" class="rounded-circle align-self-center mb-4">

  <ul class="nav_link list-unstyled flex-fill m-0 ps-2">

    <li class="d-flex align-items-center gap-2 p-1 pb-2">
      <i class="fa-regular fa-folder-open fa-xs"></i>
      <a href="{{ route('admin.projects.index') }}">
        {{ __('Projects') }}
      </a>
    </li>

    <li class="d-flex align-items-center gap-2 p-1 pb-2">
      <i class="fa-solid fa-tags fa-xs"></i>
      <a href="{{ route('admin.tags') }}">
        {{ __('Tags') }}
      </a>
    </li>

    <li class="d-flex align-items-center gap-2 p-1 pb-2">
      <i class="fa-solid fa-envelope-open-text fa-xs"></i>
      <a href="{{ route('admin.leads.index') }}">
        {{ __('Messages') }}
      </a>
    </li>

  </ul>

  <div class="dropup-center dropup d-flex align-items-center gap-2 ps-2 p-1">

    <i class="fa-solid fa-gear fa-xs"></i>
    <a data-bs-toggle="dropdown" aria-expanded="false">
      {{ Auth::user()->name }}
    </a>

    <ul class="dropdown-menu">

      <li class="d-flex align-items-center ms-3">
        <i class="fa-solid fa-user fa-xs"></i>
        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
      </li>

      <li class="d-flex align-items-center ms-3">
        <i class="fa-solid fa-right-from-bracket fa-xs"></i>
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

      </li>

    </ul>

  </div>

</div>
