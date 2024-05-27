<div class="sidebar bg_dark text-white d-flex flex-column justify-content-start align-items-center p-2">

  <ul class="m-0 list-unstyled">

    <li class="pb-2">
      <a class="d-flex align-items-center gap-2 p-1" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-house fa-xs mb-1"></i>
        <span class="d-none d-lg-inline">Home</span>
      </a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-baseline gap-2 p-1" href="{{ route('admin.projects.index') }}">
        <i class="fa-solid fa-chart-simple fa-xs pe-1">

        </i><span class="d-none d-lg-inline">Projects</span>
      </a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-baseline gap-2 p-1" href="{{ route('admin.types.index') }}">
        <i class="fa-solid fa-signal fa-xs"></i>
        <span class="d-none d-lg-inline">Types</span></a>
    </li>

    <li class="pb-2">
      <a class="d-flex align-items-baseline gap-2 p-1" href="{{ route('admin.technologies.index') }}">
        <i class="fa-solid fa-signal fa-xs"></i>
        <span class="d-none d-lg-inline">Technologies</span></a>
    </li>

  </ul>
</div>
