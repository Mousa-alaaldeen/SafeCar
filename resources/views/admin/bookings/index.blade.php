@extends('admin.master')
@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Bookings
    </h1>
    <!-- <button class="button light" id="addBookingBtn">
      Add Booking
    </button> -->
  </div>
</section>

<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Customer Name</th>
            <th>Service</th>
            <th>Booking Date</th>
            <th>Status</th>
          
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
                <td data-label="Customer Name">{{ $booking->user->name }}</td>
                <td data-label="Service">{{ $booking->service->name }}</td>
                <td data-label="Booking Date">{{ $booking->booking_date }}</td>
                <td data-label="Status">{{ $booking->status }}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small green" onclick="showBookingDetails('{{ $booking->id}}')">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $booking->id }}" action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>
                    <button type="button" class="button small red" onclick="confirmDelete('{{ $booking->id }}')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6">No bookings found.</td>
            </tr>
          @endif
        </tbody>
      </table>

      <div class="pagination">
        {{ $bookings->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>
@endsection