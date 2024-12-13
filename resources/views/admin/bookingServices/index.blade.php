@extends('admin.master')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Booking Services
        </h1>
        <!-- <button class="button light" id="addBookingServiceBtn">
            Add Booking Service
        </button> -->
    </div>
</section>

<section class="section main-section">
    <div class="card has-table">
        <div class="card-content">
            <table>
                <thead>
                    <tr>

                        <th>User Name</th>
                        <th>Service</th>
                        <th>Booking Date</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @if (count($bookingServices) > 0)
                        @foreach ($bookingServices as $bookingService)
                            <tr>
                                <td data-label="Customer Name">
                                    {{ $bookingService->booking?->user?->name ?? 'N/A' }}
                                </td>
                                <td data-label="Service">
                                    {{ $bookingService->service?->name ?? 'N/A' }}
                                </td>
                                <td data-label="Booking Date">
                                    {{ $bookingService->booking?->booking_date ?? 'N/A' }}
                                </td>
                                <td data-label="Status">
                                    {{ $bookingService->booking?->status ?? 'N/A' }}
                                </td>

                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button type="button" class="button small green"
                                            onclick="showBookingServiceDetails('{{ $bookingService->booking_id }}', '{{ $bookingService->service_id }}')">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </button>

                                        <form
                                            id="delete-form-{{ $bookingService->booking_id }}-{{ $bookingService->service_id }}"
                                            action="{{ route('booking-services.destroy', ['booking_id' => $bookingService->booking_id, 'service_id' => $bookingService->service_id]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button type="button" class="button small red"
                                            onclick="deleteBookingService('{{ $bookingService->booking_id }}', '{{ $bookingService->service_id }}')">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No booking services found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="pagination">
                {{ $bookingServices->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>