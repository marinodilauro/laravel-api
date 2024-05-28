        <div>

          <button type="button" class="action_small btn_primary text-decoration-none text-white ms-3 me-2"
            href="#add_new_project" data-bs-toggle="offcanvas" role="button" aria-controls="add_new_project">

            <i class="fa-solid fa-plus"></i>

          </button>

          <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="add_new_project"
            aria-labelledby="add_new_projectLabel">

            <div class="offcanvas-header px-3 pt-3 pb-0">
              <h5 class="offcanvas-title" id="add_new_projectLabel">Insert a new project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body text-start">

              @include('partials.validation-errors')

              <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" aria-describedby="titleHelper" placeholder="Food Delivery App"
                    value="{{ old('title') }}" />
                  <small id="titleHelper" class="form-text text-muted">Type a title for this project</small>

                  @error('title')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="mb-3">
                  <label for="type_id" class="form-label">Type</label>
                  <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select a type for the project</option>

                    @foreach ($types as $type)
                      <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                        {{ $type->name }}
                      </option>
                    @endforeach

                  </select>
                  <small id="type_idHelper" class="form-text text-muted">Select a type for this project</small>
                </div>

                <label for="technologies[]" class="form-label">Technology used</label>
                <div class="mb-3 d-flex gap-3 flex-wrap">

                  @foreach ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">

                      <input name="technologies[]" class="form-check-input" type="checkbox"
                        value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                      <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                      </label>

                    </div>
                  @endforeach

                  @error('technologies')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="mb-3">
                  <label for="thumb" class="form-label">Thumbnail</label>
                  <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                    id="thumb" aria-describedby="thumbHelper" placeholder="Choose an image" />
                  <small id="thumbHelper" class="form-text text-muted">Insert a thumbnail for this project</small>

                  @error('thumb')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="mb-3">
                  <label for="project_link" class="form-label">Project link</label>
                  <input type="text" class="form-control @error('project_link') is-invalid @enderror"
                    name="project_link" id="project_link" aria-describedby="project_linkHelper" placeholder="https://"
                    value="{{ old('project_link') }}" />
                  <small id="project_linkHelper" class="form-text text-muted">Insert the link of the project</small>

                  @error('project_link')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>

                <div class="mb-3">
                  <label for="repo_link" class="form-label">Repository link</label>
                  <input type="text" class="form-control @error('repo_link') is-invalid @enderror" name="repo_link"
                    id="repo_link" aria-describedby="repo_linkHelper" placeholder="https://"
                    value="{{ old('repo_link') }}" />
                  <small id="repo_linkHelper" class="form-text text-muted">Insert the link of the repository</small>

                  @error('repo_link')
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
