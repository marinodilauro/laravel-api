<div class="sidebar bg_dark text-white d-flex flex-column justify-content-start align-items-center p-2">

  <ul class="m-0 list-unstyled">

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-house fa-xs"></i>
        {{ __('Home') }}
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
</div>
