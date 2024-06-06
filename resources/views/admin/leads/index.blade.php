@extends('layouts.admin')

@section('content')
  <!-- Dashboard -->

  <div class="dashboard bg_light p-4">

    <div class="container-fluid d-flex align-items-center justify-content-between px-0 mb-3">
      <h1>Lead messages</h1>
    </div>


    <!-- Messages table -->
    <div class="messages_table table-responsive m-auto">

      @include('partials.action-confirmation')

      <table class="table table-striped table-hover m-0">

        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ACTIONS</th>
          </tr>
        </thead>

        <tbody>

          @forelse ($leads as $lead)
            <tr>

              {{-- ID --}}
              <td width="1%">{{ $lead->id }}</td>

              {{-- Name --}}
              <td width="20%">{{ $lead->name }}</td>

              {{-- Email --}}
              <td width="30%">{{ $lead->email }}</td>

              {{-- Actions --}}
              <td class="d-flex">

                {{-- Reply action --}}
                <!-- Modal trigger button -->
                <button type="button" class="action btn_primary me-1" data-bs-toggle="modal"
                  data-bs-target="#replyModal-{{ $lead->id }}" title="Reply">
                  Reply
                  <i class="fa-solid fa-reply fa-xs ms-1"></i>
                </button>

                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="replyModal-{{ $lead->id }}" tabindex="-1" data-bs-backdrop="static"
                  data-bs-keyboard="false" role="dialog" aria-labelledby="replyModalLabel-{{ $lead->id }}"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">

                      <div class="modal-header justify-content-center align-items-center bg_dark">
                        <h5 class="modal-title text-center text-white" id="replyModalLabel-{{ $lead->id }}">
                          Reply to the message
                        </h5>
                      </div>

                      <div class="modal-body">

                        <div class="mb-2">
                          <span><strong>From:</strong></span>
                          <span>
                            {{ $lead->name }}
                          </span>
                        </div>

                        <span><strong>Message:</strong></span>
                        <br>
                        <div class="mb-2">
                          {{ $lead->message }}
                        </div>

                        <div class="mb-2">
                          <span><strong>To:</strong></span>
                          <span>
                            {{ $lead->email }}
                          </span>
                        </div>

                        <div>

                          <label for="replyMessage" class="form-label">
                            <strong>Your message:</strong>
                          </label>
                          <textarea class="form-control name="replyMessage" id="replyModalLabel-{{ $lead->id }}" rows="5">
                            {{ $lead->reply }}
                          </textarea>
                          <small id="replyMessageHelper" class="form-text text-muted">Type a message to reply</small>

                        </div>

                      </div>

                      <div class="d-flex justify-content-end gap-3 p-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Close
                        </button>

                        <form {{-- action="{{ route('admin.leads.send', $lead) }}" --}} method="post">
                          @csrf
                          <button type="submit" class="btn btn_red">
                            Send
                          </button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                {{-- Generate AI message action --}}
                <form action="{{ route('admin.leads.reply_generation', $lead) }}" method="post">
                  @csrf

                  <button type="submit" class="action btn_primary me-1">
                    <a class="text-decoration-none text-white" title="Generate response with AI">
                      Generate message
                      <i class="fa-solid fa-wand-magic-sparkles fa-sm ms-1"></i>
                    </a>
                  </button>

                </form>

                {{-- Delete action --}}
                <!-- Modal trigger button -->
                <button type="button" class="action btn_red" data-bs-toggle="modal"
                  data-bs-target="#modalId-{{ $lead->id }}" title="Delete">
                  Delete
                  <i class="fa-solid fa-trash-can fa-sm ms-1"></i>
                </button>

                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="modalId-{{ $lead->id }}" tabindex="-1" data-bs-backdrop="static"
                  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $lead->id }}"
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
                        You are about to delete the message from "{{ $lead->name }}"
                        <br>
                        Are you sure you want to delete this message?
                      </div>

                      <div class="d-flex justify-content-end gap-3 p-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Close
                        </button>

                        <form {{-- action="{{ route('admin.leads.destroy', $lead) }}" --}} method="post">
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
              <td scope="row" colspan="6">No message yet!</td>
            </tr>
          @endforelse

        </tbody>
      </table>

    </div>
    {{ $leads->links('pagination::bootstrap-5') }}

  </div>

  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('resources/scss/partials/_welcome.scss') }}">
@endpush
