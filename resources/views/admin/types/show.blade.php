@extends('layouts.admin')

@section('content')
  <section class="py-5">
    <div class="container mb-5">

      <div class="mb-3">
        <div class="d-flex align-items-center justify-content-between">

          <h3>{{ $type->name }}</h3>

          <a class="custom_btn btn_primary" href="{{ route('admin.types.index') }}">
            <i class="fa-solid fa-angle-left fa-sm"></i>
            Back to types
          </a>

        </div>
      </div>

      <div class="row">
        <div class="col-3">
          <div class="card">

            <div class="card-header">
              <h3 class="card-title">
                {{ $type->name }}
              </h3>
            </div>

            <div class="card-body">

              <div class="mb-3">
                <strong>Type description: </strong>
                <p>{{ $type->description }}</p>
              </div>

              <div class="mb-3">
                <strong>Preview: </strong>
                <span class="type {{ $type->slug }}">{{ $type->name }} </span>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
