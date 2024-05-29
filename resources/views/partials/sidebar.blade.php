<div class="sidebar bg_dark text-white d-flex flex-column justify-content-between align-items-center px-2 py-4">


  <img width="75" src="{{ asset('storage/Avatar.jpg') }}" class="rounded-circle mb-3">

  <ul class="m-0 list-unstyled  flex-fill">

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-house fa-xs"></i>
        {{ __('Dashboard') }}
      </a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.projects.index') }}">
        <i class="fa-regular fa-folder-open fa-xs"></i>
        {{ __('Projects') }}
      </a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.types.index') }}">
        <i class="fa-solid fa-list fa-xs"></i>
        {{ __('Project types') }}
      </a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.technologies.index') }}">
        <i class="fa-solid fa-tags fa-xs"></i>
        {{ __('Technologies') }}
      </a>
    </li>


  </ul>

  <div class="dropup-center dropup">

    <a class="d-flex align-items-center dropdown-toggle gap-2 p-1" data-bs-toggle="dropdown" aria-expanded="false">
      {{ Auth::user()->name }}

    </a>

    <ul class="dropdown-menu">

      <li>
        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
      </li>

      <li>
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
