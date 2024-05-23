@extends('layouts.admin')

@section('content')
  <header class="py-3 bg_dark text-white">
    <div class="custom_container d-flex align-items-center justify-content-between">

      <h1>{{ $project->title }}</h1>

      <a class="custom_btn btn_primary" href="{{ route('admin.projects.index') }}">
        <i class="fa-solid fa-angle-left fa-sm"></i>
        Back to projects
      </a>

    </div>
  </header>

  <section class="py-5">
    <div class="container d-flex gap-5">

      @if (Str::startsWith($project->thumb, 'https'))
        <img width=700 src="{{ $project->thumb }}" alt="{{ $project->title }}">
      @else
        <img width=700 src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->title }}">
      @endif

      <div>
        <div class="mb-3">
          <h5><strong>Project description: </strong></h5>
          <p>{{ $project->description }}</p>
        </div>

        <div class="mb-3">
          <span><strong>Project link: </strong></span>
          <a href="">{{ $project->project_link }}</a>
        </div>

        <div class="mb-3">
          <span><strong>Repository link:</strong></span>
          <a href="">{{ $project->repo_link }}</a>
        </div>

        <div class="metadata">
          <strong>Type: </strong> {{ $project->type ? $project->type->name : 'No type has been chosen yet' }}
        </div>

      </div>

    </div>
  </section>
@endsection
