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
          @if (count($bookings) > 0)
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
        @if($booking->status == 'Completed') 
      bg-success 
    @elseif($booking->status == 'Confirmed') 
    bg-warning 
  @else 
  bg-danger 
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

          <!-- Customer Name -->
          <div class="mb-3">
            <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Customer
            Name</label>
            <p class="form-text"
            style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
            {{ $booking->user->name }}
            </p>
          </div>

          <!-- Phone Number -->
          <div class="mb-3">
            <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Phone
            Number</label>
            <p class="form-text"
            style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
            {{ $booking->user->phone }}
            </p>
          </div>

          <!-- Service -->
          <div class="mb-3">
            <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Service</label>
            <p class="form-text"
            style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
            {{ $booking->service->name }}
            </p>
          </div>

          <!-- Booking Date -->
          <div class="mb-3">
            <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Booking
            Date</label>
            <p class="form-text"
            style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
            {{ $booking->booking_date }}
            </p>
          </div>

          <!-- Status Dropdown for Update -->
          <div class="mb-3">
            <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Status</label>
            <select name="status" class="form-select" style="font-size: 14px; border-radius: 8px;">
            <option value="Completed" @if($booking->status == 'Completed') selected @endif>Completed</option>
            <option value="Confirmed" @if($booking->status == 'Confirmed') selected @endif>Confirmed</option>
            <option value="Cancelled" @if($booking->status == 'Cancelled') selected @endif>Cancelled</option>
            </select>
          </div>

          <!-- Button Section -->
          <div class="d-flex justify-content-between">
            <!-- Cancel Button -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <!-- Update Button -->
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
      <div class="pagination justify-content-center ">
        {{ $bookings->links('pagination::bootstrap-4') }}
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