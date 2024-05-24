@extends('layouts.admin')

@section('content')
  <!-- Dashboard top -->

  <div class="py-3 bg_dark text-white">
    <div class="custom_container d-flex align-items-center justify-content-between">
      <h1> {{ __('Welcome, ') . Str::substr(Auth::user()['name'], 0, 6) }}</h1>
    </div>
  </div>

  <div class="dashboard_container d-flex">

    <!-- Sidebar -->

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
      </ul>
    </div>

    <!-- Dashboard -->

    <div class="dashboard bg_light p-4">

      <div class="row">

        <!-- Projects table -->
        <div class="col-8">
          <div class="table-responsive">
            <table class="table table-striped table-hover m-0">

              <thead class="table-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">THUMB</th>
                  <th scope="col">TITLE</th>
                  <th scope="col">SLUG</th>
                  <th scope="col">DESCRIPTION</th>
                  <th scope="col">PROJECT LINK</th>
                  <th scope="col">REPO LINK</th>
                  <th scope="col">TYPE</th>
                  <th scope="col">ACTIONS</th>
                </tr>
              </thead>

              <tbody>

                @forelse ($projects as $project)
                  <tr>
                    <td scope="row">{{ $project->id }}</td>
                    <td>
                      @if (Str::startsWith($project->thumb, 'https'))
                        <img width="100" src="{{ $project->thumb }}" alt="{{ $project->title }}">
                      @else
                        <img width="100" src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->title }}">
                      @endif
                    </td>
                    <td width="8%">{{ $project->title }}</td>
                    <td width="8%">{{ $project->slug }}</td>
                    <td width="20%" class="text-truncate" style="max-width:1px">{{ $project->description }}</td>
                    <td class="text-truncate" style="max-width:1px">{{ $project->project_link }}</td>
                    <td class="text-truncate" style="max-width:1px">{{ $project->repo_link }}</td>
                    <td width="10%">
                      @if ($project->type)
                        <div class="type {{ $project->type->slug }}">{{ $project->type->name }} </div>
                      @else
                        No type has been chosen yet
                      @endif

                    </td>
                    <td>
                      {{-- View action --}}
                      <button type="button" class="action_small btn_primary">
                        <a class="text-decoration-none text-white" href="{{ route('admin.projects.show', $project) }}"
                          title="View">
                          <i class="fa-solid fa-eye fa-sm"></i>
                        </a>
                      </button>

                      {{-- Edit action --}}
                      <button class="action_small btn_primary">
                        <a class="text-decoration-none text-white" href="{{ route('admin.projects.edit', $project) }}"
                          title="Edit">
                          <i class="fa-solid fa-pencil fa-sm"></i>
                        </a>
                      </button>

                      {{-- Delete action --}}
                      <!-- Modal trigger button -->
                      <button type="button" class="action_small btn_red" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $project->id }}" title="Delete">
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
                                <button type="submit" class="btn btn_red">
                                  Confirm
                                </button>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

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

        <!-- Types table -->
        <div class="col-4">
          <div class="table-responsive">
            <table class="table table-striped table-hover m-0">

              <thead class="table-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NAME</th>
                  <th scope="col">SLUG</th>
                  <th scope="col">DESCRIPTION</th>
                  <th scope="col">PREVIEW</th>
                  <th scope="col">ACTIONS</th>
                </tr>
              </thead>

              <tbody>

                @forelse ($types as $type)
                  <tr>
                    <td scope="row">{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td width="30%" class="text-truncate" style="max-width:1px">{{ $type->description }}</td>
                    <td>
                      <div class="type {{ $type->slug }}">{{ $type->name }} </div>
                    </td>
                    <td>
                      {{-- View action --}}
                      <button type="button" class="action_small btn_primary">
                        <a class="text-decoration-none text-white" href="{{ route('admin.types.show', $type) }}"
                          title="View">
                          <i class="fa-solid fa-eye fa-sm"></i>
                        </a>
                      </button>

                      {{-- Edit action --}}
                      <button class="action_small btn_primary">
                        <a class="text-decoration-none text-white" href="{{ route('admin.types.edit', $type) }}"
                          title="Edit">
                          <i class="fa-solid fa-pencil fa-sm"></i>
                        </a>
                      </button>

                      {{-- Delete action --}}
                      <!-- Modal trigger button -->
                      <button type="button" class="action_small btn_red" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $type->id }}" title="Delete">
                        <i class="fa-solid fa-trash-can fa-sm"></i>
                      </button>

                      <!-- Modal Body -->
                      <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                      <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                        aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                          role="document">
                          <div class="modal-content">

                            <div class="modal-header justify-content-center align-items-center bg-danger">
                              <h5 class="modal-title text-center text-white" id="modalTitleId">
                                ⚠️ ATTENTION ⚠️
                                <br>
                                This action is irreversible
                              </h5>
                            </div>

                            <div class="modal-body text-center">
                              You are about to delete "{{ $type->name }}"
                              <br>
                              Are you sure you want to delete this type?
                            </div>

                            <div class="d-flex justify-content-end gap-3 p-3">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                              </button>

                              <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn_red">
                                  Confirm
                                </button>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

                    </td>

                  </tr>
                @empty

                  <tr class="">
                    <td scope="row" colspan="6">No type yet!</td>
                  </tr>
                @endforelse

              </tbody>
            </table>

          </div>
        </div>

      </div>


    </div>

  </div>

  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('resources/scss/partials/_welcome.scss') }}">
@endpush
