@extends('admin.master')

@section('contact')
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul class="breadcrumb">
    <li class="-item">
        <span class="icon text-warning">
          <i class="mdi mdi-email"></i>
        </span>
      </li>
      <li>Contact</li>
    </ul>
  </div>
</section>

<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if (count($contacts) > 0)
        @foreach ($contacts as $contact)
      <tr>
      <td data-label="Name">{{ $contact->name }}</td>
      <td data-label="Email">{{ $contact->email }}</td>
      <td data-label="Subject">{{ $contact->subject }}</td>
      <td data-label="Message">{{ Str::limit($contact->message, 50) }}</td>
      <td data-label="Actions">
        <div class="buttons">

        <button type="button" class="button small bg-success " data-bs-toggle="modal" data-bs-target="#contactModal"
        onclick="showContactDetails({{ json_encode($contact) }})" title="View Details">
        <span class="icon text-white"><i class="mdi mdi-eye"></i></span>
        </button>
        <a href="mailto:{{ $contact->email }}" class="button small blue" title="Send Email">
        <span class="icon"><i class="mdi mdi-email-outline"></i></span>
        </a>
        </div>
      </td>

      </tr>
    @endforeach
      @else
      <tr>
      <td colspan="5" class="text-center">No Contacts found.</td>
      </tr>
    @endif
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="contactModalLabel">Contact Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group">
  <label for="contactName"><strong>Name:</strong></label>
  <input 
    type="text" 
    class="form-control" 
    id="contactName" 
    name="contactName" 
    value="{{ $contact->name }}" 
    readonly>
</div>

<div class="form-group">
  <label for="contactEmail"><strong>Email:</strong></label>
  <input 
    type="email" 
    class="form-control" 
    id="contactEmail" 
    name="contactEmail" 
    value="{{ $contact->email }}" 
    readonly>
</div>

<div class="form-group">
  <label for="contactSubject"><strong>Subject:</strong></label>
  <input 
    type="text" 
    class="form-control" 
    id="contactSubject" 
    name="contactSubject" 
    value="{{ $contact->subject }}" 
    readonly>
</div>

<div class="form-group">
  <label for="contactMessage"><strong>Message:</strong></label>
  <textarea 
    class="form-control" 
    id="contactMessage" 
    name="contactMessage" 
    rows="4" 
    readonly>{{ $contact->message }}</textarea>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Button to send email to the user -->
        <a href="mailto:{{ $contact->email }}" class="btn btn-primary">
          Send Email
        </a>
      </div>
    </div>
  </div>
</div>
@endsection