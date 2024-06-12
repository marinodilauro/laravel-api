@extends('layouts.admin')

@section('content')
  <!-- Dashboard body-->
  <div class="dashboard bg_darker px-3 py-4">


    @include('partials.action-confirmation')


    <div class="row">

      <div class="col-6">

        <!-- Types table -->
        <div class="d-flex align-items-center mb-2">

          {{-- Table title --}}
          <h5 class="text-white my-0">Project types</h5>

          @include('partials.offcanvas-type')
          {{-- Divider --}}
          <hr class="border-2" style="width: 369px;">
        </div>

        <div class="types_table table-responsive">
          <table class="table table-hover m-0">

            <thead class="table">
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

      </div>

      <div class="col-6">

        <!-- Technologies table -->
        <div class="d-flex align-items-center mb-2">
          {{-- Table title --}}
          <h5 class="text-white my-0">Technologies</h5>

          @include('partials.offcanvas-technology')
          {{-- Divider --}}
          <hr class="w-75 border-2">
        </div>

        <div class="technologies_table table-responsive">
          <table class="table table-hover m-0">

            <thead class="table">
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
                    <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1" data-bs-backdrop="static"
                      data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $technology->id }}"
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
