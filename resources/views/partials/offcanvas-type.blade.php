        <div>

          <button type="button" class="action_small btn_primary text-decoration-none text-white ms-3 me-2"
            href="#add_new_type" data-bs-toggle="offcanvas" role="button" aria-controls="add_new_type">

            <i class="fa-solid fa-plus"></i>

          </button>

          <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="add_new_type" aria-labelledby="add_new_typeLabel">

            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="add_new_typeLabel">Insert a new programming language or framework
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body text-start">

              @include('partials.validation-errors')

              <form action="{{ route('admin.types.store') }}" method="post">
                @csrf

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" aria-describedby="nameHelper" placeholder="Library" value="{{ old('name') }}" />
                  <small id="nameHelper" class="form-text text-muted">Type a name for this type</small>

                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description') }}
        </textarea>
                  <small id="descriptionHelper" class="form-text text-muted">Type a description for this type</small>

                  @error('description')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <button type="submit" class="custom_btn btn_primary border-0">
                  Create
                </button>

              </form>

            </div>

          </div>

        </div>
