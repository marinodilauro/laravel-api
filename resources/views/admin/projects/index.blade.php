@extends('layouts.admin')

@section('content')
  <header class="py-3 bg_dark text-white">
    <div class="custom_container m-auto d-flex align-items-center justify-content-between">
      <h1>Projects</h1>
      <a class="custom_btn btn_primary" href="{{ route('admin.projects.create') }}">
        <i class="fa-solid fa-plus fa-sm"></i>
        Add new project
      </a>
    </div>
  </header>

  <section class="py-5">
    <div class="custom_container m-auto">
      <h4 class="text-muted">All projects</h4>

      @include('partials.action-confirmation')

      <div class="table-responsive rounded shadow">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">THUMB</th>
              <th scope="col">TITLE</th>
              <th scope="col">SLUG</th>
              <th scope="col">DESCRIPTION</th>
              <th scope="col">PROJECT LINK</th>
              <th scope="col">REPO LINK</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($projects as $project)
              <tr class="">
                <td scope="row">{{ $project->id }}</td>
                <td>
                  @if (Str::startsWith($project->thumb, 'https'))
                    <img width="100" src="{{ $project->thumb }}" alt="{{ $project->title }}">
                  @else
                    <img width="100" src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->title }}">
                  @endif
                </td>
                <td width="10%">{{ $project->title }}</td>
                <td width="10%">{{ $project->slug }}</td>
                <td width="35%">{{ $project->description }}</td>
                <td class="text-truncate" style="max-width:1px">{{ $project->project_link }}</td>
                <td class="text-truncate" style="max-width:1px">{{ $project->repo_link }}</td>
                <td>
                  {{-- View action --}}
                  <button type="button" class="action btn_primary  p-1">
                    <a class="text-decoration-none text-white" href="{{ route('admin.projects.show', $project) }}"
                      title="View">
                      View
                      <i class="fa-solid fa-eye fa-sm"></i>
                    </a>
                  </button>

                  {{-- Edit action --}}
                  <button class="action btn_primary p-1">
                    <a class="text-decoration-none text-white" href="{{ route('admin.projects.edit', $project) }}"
                      title="Edit">
                      Edit
                      <i class="fa-solid fa-pencil fa-sm"></i>
                    </a>
                  </button>

                  {{-- Delete action --}}
                  <!-- Modal trigger button -->
                  <button type="button" class="action btn_red p-1" data-bs-toggle="modal"
                    data-bs-target="#modalId-{{ $project->id }}" title="Delete">
                    Delete
                    <i class="fa-solid fa-trash-can fa-sm"></i>
                  </button>

                  <!-- Modal Body -->
                  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                  <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $project->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">

                        <div class="modal-header justify-content-center align-items-center bg-danger">
                          <h5 class="modal-title text-center text-white" id="modalTitleId">
                            ⚠️ ATTENTION ⚠️
                            <br>
                            This action is irreversible
                          </h5>
                        </div>

                        <div class="modal-body text-center">
                          You are about to delete "{{ $project->title }}"
                          <br>
                          Are you sure you want to delete this project?
                        </div>

                        <div class="d-flex justify-content-end gap-3 p-3">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                          </button>

                          <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="custom_btn btn_red">
                              Confirm
                            </button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>

                </td>

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
