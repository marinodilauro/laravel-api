@extends('layouts.admin')

@section('content')

  <!-- Dashboard body-->
  <div class="dashboard bg_light px-3 py-4">


    @include('partials.action-confirmation')


    <div class="row">

      <!-- Projects table -->
      <div class="col-8">

        <div class="d-flex align-items-center mb-2">
          {{-- Table title --}}
          <h4 class="text-secondary my-0">Projects</h4>

          {{-- New item button --}}
          {{--             <button type="button" class="action_small btn_primary ms-3 me-2">
              <a class="text-decoration-none text-white" href="{{ route('admin.projects.create') }}"
                title="Add new projects">
                <i class="fa-solid fa-plus"></i>
              </a>
            </button> --}}
          @include('partials.offcanvas-project')
          {{-- Divider --}}
          <hr class="w-100 border-2">

        </div>

        <div class="projects_table table-responsive">
          <table class="table table-striped table-hover m-0">

            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">SLUG</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PROJECT LINK</th>
                <th scope="col">REPO LINK</th>
                <th scope="col">TAGS</th>
                <th scope="col">TYPE</th>
                <th scope="col">ACTIONS</th>
              </tr>
            </thead>

            <tbody>

              @forelse ($projects as $project)
                <tr>

                  {{-- ID --}}
                  <td scope="row">{{ $project->id }}</td>

                  {{-- Title --}}
                  <td width="8%">{{ $project->title }}</td>

                  {{-- Slug --}}
                  <td width="8%">{{ $project->slug }}</td>

                  {{-- Description --}}
                  <td width="20%" class="text-truncate" style="max-width:1px">{{ $project->description }}</td>

                  {{-- Project link --}}
                  <td class="text-truncate" style="max-width:1px">{{ $project->project_link }}</td>

                  {{-- Repository link --}}
                  <td class="text-truncate" style="max-width:1px">{{ $project->repo_link }}</td>

                  {{-- Tags --}}
                  <td width="10%">
                    @if (count($project->technologies) > 0)
                      <div class="d-flex gap-1 flex-wrap">
                        @foreach ($project->technologies as $technology)
                          <div class="tag small {{ $technology->slug }}">{{ $technology->name }} </div>
                        @endforeach
                      </div>
                    @else
                      No tag has been added yet
                    @endif

                  </td>

                  {{-- Project type --}}
                  <td width="10%">
                    @if ($project->type)
                      <div class="type {{ $project->type->slug }}">{{ $project->type->name }} </div>
                    @else
                      No type has been added yet
                    @endif

                  </td>

                  {{-- Actions --}}
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

      <div class="col-4">

        <!-- Types table -->
        <div class="d-flex align-items-center mb-2">
          {{-- Table title --}}
          <h5 class="text-secondary my-0">Project types</h5>

          @include('partials.offcanvas-type')
          {{-- Divider --}}
          <hr class="border-2" style="width: 369px;">
        </div>

        <div class="types_table table-responsive">
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
                  <td width="23%" class="text-truncate" style="max-width:1px">{{ $type->description }}</td>
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
                    <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1" data-bs-backdrop="static"
                      data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $type->id }}"
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

        <!-- Technologies table -->
        <div class="d-flex align-items-center mb-2">
          {{-- Table title --}}
          <h5 class="text-secondary my-0">Technologies</h5>

          @include('partials.offcanvas-technology')
          {{-- Divider --}}
          <hr class="w-75 border-2">
        </div>

        <div class="technologies_table table-responsive">
          <table class="table table-striped table-hover m-0">

            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">SLUG</th>
                <th scope="col">PREVIEW</th>
                <th scope="col">ACTIONS</th>
              </tr>
            </thead>

            <tbody>

              @forelse ($technologies as $technology)
                <tr>
                  <td scope="row">{{ $technology->id }}</td>
                  <td>{{ $technology->name }}</td>
                  <td>{{ $technology->slug }}</td>
                  <td>
                    <div class="tag {{ $technology->slug }}">{{ $technology->name }} </div>
                  </td>
                  <td>
                    {{-- View action --}}
                    <button type="button" class="action_small btn_primary">
                      <a class="text-decoration-none text-white"
                        href="{{ route('admin.technologies.show', $technology) }}" title="View">
                        <i class="fa-solid fa-eye fa-sm"></i>
                      </a>
                    </button>

                    {{-- Edit action --}}
                    <button class="action_small btn_primary">
                      <a class="text-decoration-none text-white"
                        href="{{ route('admin.technologies.edit', $technology) }}" title="Edit">
                        <i class="fa-solid fa-pencil fa-sm"></i>
                      </a>
                    </button>

                    {{-- Delete action --}}
                    <!-- Modal trigger button -->
                    <button type="button" class="action_small btn_red" data-bs-toggle="modal"
                      data-bs-target="#modalId-{{ $technology->id }}" title="Delete">
                      <i class="fa-solid fa-trash-can fa-sm"></i>
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1"
                      data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                      aria-labelledby="modalTitleId-{{ $technology->id }}" aria-hidden="true">
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
                            You are about to delete "{{ $technology->name }}"
                            <br>
                            Are you sure you want to delete this type?
                          </div>

                          <div class="d-flex justify-content-end gap-3 p-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                              Close
                            </button>

                            <form action="{{ route('admin.technologies.destroy', $technology) }}" method="post">
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
