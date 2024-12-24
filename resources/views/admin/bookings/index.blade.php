@extends('admin.master')

@section('contact')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul class="breadcrumb">
      <li class="-item">
        <span class="icon text-success">
          <i class="mdi mdi-calendar-multiple-check"></i>
        </span>
      </li>
      <li>Bookings</li>
    </ul>
  </div>
</section>

<section class="section main-section">
  <!-- Filter Buttons -->
  <!-- Filter Buttons with Icons -->
  <div class="mb-4 d-flex align-items-center justify-content-center" style="gap: 15px;">
    <a href="{{ route('bookings.index') }}"
      class="btn {{ request('status') == '' ? 'btn-primary' : 'btn-outline-secondary' }} btn-lg">
      <i class="fas fa-list-alt me-2"></i> All
    </a>
    <a href="{{ route('bookings.index', ['status' => 'Completed']) }}"
      class="btn {{ request('status') == 'Completed' ? 'btn-success' : 'btn-outline-success' }} btn-lg">
      <i class="fas fa-check-circle me-2"></i> Completed
    </a>
    <a href="{{ route('bookings.index', ['status' => 'Confirmed']) }}"
      class="btn {{ request('status') == 'Confirmed' ? 'btn-warning' : 'btn-outline-warning' }} btn-lg">
      <i class="fas fa-check me-2"></i> Confirmed
    </a>
    <a href="{{ route('bookings.index', ['status' => 'Cancelled']) }}"
      class="btn {{ request('status') == 'Cancelled' ? 'btn-danger' : 'btn-outline-danger' }} btn-lg">
      <i class="fas fa-times-circle me-2"></i> Cancelled
    </a>
  </div>
  <div class="card has-table">
    <div class="card-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Customer Name</th>
            <th>Service</th>
            <th>Booking Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($bookings->count() > 0)
        @foreach ($bookings as $booking)
      <tr>
      <td class="image-cell">
        <div class="image">
        <img
        src="{{ $booking->service->image == null ? asset('assets/img/service.png') : asset('storage/services/' . $booking->service->image) }}"
        class="rounded-full">
        </div>
      </td>
      <td>{{ $booking->user->name }}</td>
      <td>{{ $booking->service->name }}</td>
      <td>{{ $booking->booking_date }}</td>
      <td>
        <span class="badge text-white
        @if($booking->status == 'Completed') bg-success
    @elseif($booking->status == 'Confirmed') bg-warning
    @else bg-danger
  @endif">
        {{ ucfirst($booking->status) }}
        </span>
      </td>
      <td>
        <div class="buttons">
        <button type="button" class="button small green bg-success" data-bs-toggle="modal"
        data-bs-target="#bookingModal-{{ $booking->id }}">
        <span class="icon"><i class="mdi mdi-eye"></i></span>
        </button>
        <form id="delete-form-{{ $booking->id }}" action="{{ route('bookings.destroy', $booking->id) }}"
        method="POST" class="inline">
        @csrf
        @method('DELETE')
        </form>
        <button type="button" class="button small red" onclick="confirmDelete('{{ $booking->id }}')">
        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
        </button>
        </div>
      </td>
      </tr>

      <!-- Modal for Booking Details -->
      <div class="modal fade" id="bookingModal-{{ $booking->id }}" tabindex="-1"
      aria-labelledby="bookingModalLabel-{{ $booking->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="bookingModalLabel-{{ $booking->id }}">Booking Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label class="form-label font-weight-bold">Customer Name</label>
          <p class="form-text">{{ $booking->user->name }}</p>
        </div>

        <div class="mb-3">
          <label class="form-label font-weight-bold">Phone Number</label>
          <p class="form-text">{{ $booking->user->phone }}</p>
        </div>

        <div class="mb-3">
          <label class="form-label font-weight-bold">Service</label>
          <p class="form-text">{{ $booking->service->name }}</p>
        </div>

        <div class="mb-3">
          <label class="form-label font-weight-bold">Booking Date</label>
          <p class="form-text">{{ $booking->booking_date }}</p>
        </div>

        <div class="mb-3">
          <label class="form-label font-weight-bold">Status</label>
          <select name="status" class="form-select">
          <option value="Completed" @if($booking->status == 'Completed') selected @endif>Completed</option>
          <option value="Confirmed" @if($booking->status == 'Confirmed') selected @endif>Confirmed</option>
          <option value="Cancelled" @if($booking->status == 'Cancelled') selected @endif>Cancelled</option>
          </select>
        </div>

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
        </div>
        </div>
      </div>
      </div>
    @endforeach
      @else
      <tr>
      <td colspan="6" class="has-text-centered">No bookings found.</td>
      </tr>
    @endif
        </tbody>
      </table>

      <div class="pagination justify-content-center">
        {{ $bookings->appends(request()->query())->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>

<script>
  function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this booking?')) {
      document.getElementById(`delete-form-${id}`).submit();
    }
  }
</script>

@endsection