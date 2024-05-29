@extends('layouts.admin')

@section('content')
  <div class="custom_container py-5">

    <div class="mb-3">
      <div class="d-flex align-items-center justify-content-between">

        <h3>{{ $technology->name }}</h3>

        <a class="custom_btn btn_primary" href="{{ route('admin.technologies.index') }}">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to technologies
        </a>


      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">
              {{ $technology->name }}
            </h3>
          </div>

          <div class="card-body">

            <div class="mb-3">
              <strong>Preview: </strong>
              <span class="tag {{ $technology->slug }}">{{ $technology->name }} </span>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
@endsection
