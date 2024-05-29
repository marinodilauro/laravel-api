@extends('layouts.admin')

@section('content')

  <section class="py-5">
    <div class="container mb-5">
      <div class="d-flex align-items-center justify-content-between">

        <h3>{{ $project->title }}</h3>

        <a class="custom_btn btn_primary" href="{{ route('admin.projects.index') }}">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to projects
        </a>

      </div>
    </div>
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
          <div class="mb-3">
            <strong>Type: </strong> {{ $project->type ? $project->type->name : 'No type has been chosen yet' }}
          </div>

          <div>
            <strong>Technologies used in this project: </strong>
            @if (count($project->technologies) > 0)
              <div class="d-flex gap-1 flex-wrap">
                @foreach ($project->technologies as $technology)
                  <div class="tag small {{ $technology->slug }}">{{ $technology->name }} </div>
                @endforeach
              </div>
            @else
              No tag has been added yet
            @endif
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection
