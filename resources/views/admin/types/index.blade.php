@extends('layouts.admin')

@section('content')
  <div class="dashboard_container d-flex">

    <!-- Sidebar -->

    @include('partials.sidebar')

    <!-- Dashboard -->


    <div class="dashboard bg_light p-4">

      <div class="container-fluid d-flex align-items-center justify-content-between px-0 mb-3">
        <h1>Project types</h1>
        <a class="custom_btn btn_primary" href="{{ route('admin.types.create') }}">
          <i class="fa-solid fa-plus fa-sm"></i>
          Add new project type
        </a>
      </div>

      @include('partials.action-confirmation')

      <!-- Types table -->
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
                <td width="40%">{{ $type->description }}</td>
                <td>
                  <div class="type {{ $type->slug }}">{{ $type->name }} </div>
                </td>
                <td>
                  {{-- View action --}}
                  <button type="button" class="action btn_primary p-1">
                    <a class="text-decoration-none text-white" href="{{ route('admin.types.show', $type) }}"
                      title="View">
                      View
                      <i class="fa-solid fa-eye fa-sm ms-1"></i>
                    </a>
                  </button>

                  {{-- Edit action --}}
                  <button class="action btn_primary p-1">
                    <a class="text-decoration-none text-white" href="{{ route('admin.types.edit', $type) }}"
                      title="Edit">
                      Edit
                      <i class="fa-solid fa-pencil fa-sm ms-1"></i>
                    </a>
                  </button>

                  {{-- Delete action --}}
                  <!-- Modal trigger button -->
                  <button type="button" class="action btn_red p-1" data-bs-toggle="modal"
                    data-bs-target="#modalId-{{ $type->id }}" title="Delete">
                    Delete
                    <i class="fa-solid fa-trash-can fa-sm ms-1"></i>
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
      {{ $types->links('pagination::bootstrap-5') }}

    </div>

  </div>

  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('resources/scss/partials/_welcome.scss') }}">
@endpush
