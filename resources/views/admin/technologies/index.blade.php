@extends('layouts.admin')

@section('content')
  <!-- Dashboard -->

  <div class="dashboard flex-fill bg_light p-4">

    <div class="container-fluid d-flex align-items-center justify-content-between px-0 mb-3">
      <h1>Programming languages and frameworks </h1>
      <a class="custom_btn btn_primary" href="{{ route('admin.technologies.create') }}">
        <i class="fa-solid fa-plus fa-sm"></i>
        Add new technology
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
                <div class="tag small {{ $technology->slug }}">{{ $technology->name }} </div>
              </td>
              <td>
                {{-- View action --}}
                <button type="button" class="action btn_primary p-1">
                  <a class="text-decoration-none text-white" href="{{ route('admin.technologies.show', $technology) }}"
                    title="View">
                    View
                    <i class="fa-solid fa-eye fa-sm ms-1"></i>
                  </a>
                </button>

                {{-- Edit action --}}
                <button class="action btn_primary p-1">
                  <a class="text-decoration-none text-white" href="{{ route('admin.technologies.edit', $technology) }}"
                    title="Edit">
                    Edit
                    <i class="fa-solid fa-pencil fa-sm ms-1"></i>
                  </a>
                </button>

                {{-- Delete action --}}
                <!-- Modal trigger button -->
                <button type="button" class="action btn_red p-1" data-bs-toggle="modal"
                  data-bs-target="#modalId-{{ $technology->id }}" title="Delete">
                  Delete
                  <i class="fa-solid fa-trash-can fa-sm ms-1"></i>
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
                        Are you sure you want to delete this technology?
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
    {{ $technologies->links('pagination::bootstrap-5') }}

  </div>

  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('resources/scss/partials/_welcome.scss') }}">
@endpush
