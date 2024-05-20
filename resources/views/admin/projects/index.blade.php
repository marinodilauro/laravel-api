@extends('layouts.admin')

@section('content')
  <header class="py-3 bg-dark text-white">
    <div class="container d-flex align-items-center justify-content-between">
      <h1>Projects</h1>
      <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">
        <i class="fa fa-pencil" aria-hidden="true"></i>
        Add new project
      </a>
    </div>
  </header>

  <section class="py-5">
    <div class="container">
      <h4 class="text-muted">All projects</h4>
      <div class="table-responsive">
        <table class="table table-light table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">THUMB</th>
              <th scope="col">TITLE</th>
              <th scope="col">SLUG</th>
              <th scope="col">DESCRIPTION</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($projects as $project)
              <tr class="">
                <td scope="row">{{ $project->id }}</td>
                <td>
                  <img width="100" src="{{ $project->thumb }}" alt="{{ $project->title }}">
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->description }}</td>
                <td>
                  {{-- View action --}}
                  <a class="btn btn-primary badge p-1" href="{{ route('admin.projects.show', $project) }}" title="View">
                    View
                    <i class="fa-solid fa-eye fa-sm"></i>
                  </a>
                  /Edit/Delete
                </td>
              </tr>
            @empty

              <tr class="">
                <td scope="row" colspan="6">No project yet!</td>

              </tr>
            @endforelse

          </tbody>
        </table>
      </div>

    </div>
  </section>
@endsection
