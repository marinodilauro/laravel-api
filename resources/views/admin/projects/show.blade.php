@extends('layouts.admin')

@section('content')
  <header class="py-3 bg-dark text-white">
    <div class="container">
      <h1>{{ $project->title }}</h1>
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

        <div>
          <span><strong>Repository link:</strong></span>
          <a href="">{{ $project->repo_link }}</a>
        </div>
      </div>

    </div>
  </section>
@endsection
