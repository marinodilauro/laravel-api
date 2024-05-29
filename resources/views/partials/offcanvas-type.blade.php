<div>

  <button type="button" class="action_small btn_primary text-decoration-none text-white ms-3 me-2" href="#add_new_type"
    data-bs-toggle="offcanvas" role="button" aria-controls="add_new_type">

    <i class="fa-solid fa-plus"></i>

  </button>

  <div class="offcanvas offcanvas-end {{ session('type-form') === 'type-new' && $errors->any() ? 'show' : '' }} w-25"
    tabindex="-1" id="add_new_type" aria-labelledby="add_new_typeLabel">

    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="add_new_typeLabel">Insert a new project type
      </h5>
      <button type="submit" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body text-start">

      {{-- @include('partials.validation-errors') --}}

      <form action="{{ route('admin.types.store') }}" method="post">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text"
            class="form-control {{ session('type-form') === 'type-new' && $errors->has('name') ? 'is-invalid' : '' }}"
            name="name" id="name" aria-describedby="nameHelper" placeholder="Library"
            value="{{ session('type-form') === 'type-new' && $errors->any() ? old('name') : '' }}" />
          <small id="nameHelper" class="form-text text-muted">Type a name for this type</small>

          @if (session('type-form') === 'type-new' && $errors->has('name'))
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          @endif
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea
            class="form-control {{ session('type-form') === 'type-new' && $errors->has('description') ? 'is-invalid' : '' }}"
            name="description" id="description" rows="5">
            {{ session('type-form') === 'type-new' && $errors->has('description') ? old('description') : '' }}
</textarea>
          <small id="descriptionHelper" class="form-text text-muted">Type a description for this type</small>

          @if (session('type-form') === 'type-new' && $errors->has('description'))
            @error('description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          @endif

        </div>

        <button type="submit" class="custom_btn btn_primary border-0">
          Create
        </button>

      </form>

    </div>

  </div>

</div>
