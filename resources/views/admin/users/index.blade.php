@extends('admin.master')
@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Users
    </h1>
  </div>
</section>

<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Type</th>
            <th>Model</th>
            <th>Size</th>
            <th>License Plate</th>
          </tr>
        </thead>
        <tbody>
          @if (count($users) > 0)
        @foreach ($users as $user)
      <tr>
      <td class="image-cell">
        <div class="image">
        <img
        src="{{ $user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $user->car_image) }}"
        class="rounded-full" alt="User Image" />
        </div>
      </td>

      <td data-label="Name">{{ $user->car_type }}</td>
      <td data-label="Email">{{ $user->car_model }}</td>
      <td data-label="size">{{$user->car_size}}</td>
      <td data-label="Phone">{{ $user->car_license_plate }}</td>

      <td class="actions-cell">
        <div class="buttons right nowrap">
        <button class="p-2 m-2 text-white button green" data-bs-toggle="modal"
        data-bs-target="#viewUserModal-{{ $user->id }}">
        <i class="mdi mdi-eye"></i>
        </button>
        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST"
        class="inline">
        @csrf
        @method('DELETE')
        </form>
        <button type="button" class="button small red" onclick="packageDelete('{{ $user->id }}')">
        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
        </button>
        </div>
      </td>
      </tr>
    @endforeach
      @else
      <tr>
      <td colspan="5">No services found.</td>
      </tr>
    @endif
        </tbody>
      </table>
      <div class="pagination">
        {{ $users->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>

<!-- Modal for viewing user information -->
<div class="modal fade" id="viewUserModal-{{ $user->id }}" tabindex="-1"
  aria-labelledby="viewUserModalLabel-{{ $user->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal-size">
    <div class="modal-content rounded-3 shadow-lg">
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="viewUserModalLabel-{{ $user->id }}">
          Car Information
        </h5>
        <button type="button " class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <!-- Car Information in a Row (Flexbox) -->
        <div class="d-flex align-items-stretch mb-3"
          style="gap: 15px; background-color: #f9f9f9; border-radius: 10px; padding: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
          <!-- Car Image Section -->
          <div class="image-cell d-flex justify-content-center align-items-center" style="flex: 1;">
            <div class="image" style="width: 100%; aspect-ratio: 16/9; overflow: hidden; border-radius: 8px;">
              <img
                src="{{ $user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $user->car_image) }}"
                class="rounded-3"
                style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"
                alt="Car Image" />
            </div>
          </div>

          <!-- Car Information Section -->
          <div class="d-flex flex-column justify-content-start" style="flex: 1; gap: 10px;">
            <div>
              <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Car Type</label>
              <p class="form-text"
                style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
                {{ $user->car_type }}
              </p>
            </div>
            <div>
              <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Car Model</label>
              <p class="form-text"
                style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
                {{ $user->car_model }}
              </p>
            </div>
            <div>
              <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Car Size</label>
              <p class="form-text"
                style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
                {{ $user->car_size }}
              </p>
            </div>
            <div>
              <label class="form-label font-weight-bold" style="font-size: 14px; color: #333;">Car License Plate</label>
              <p class="form-text"
                style="border: 1px solid #ddd; padding: 6px 10px; border-radius: 8px; font-size: 14px; margin-bottom: 0; background-color: #fff;">
                {{ $user->car_license_plate }}
              </p>
            </div>
          </div>
        </div>


        <!-- User Information -->
        <div class="mb-3">
          <label class="form-label font-weight-bold">Name</label>
          <p class="form-text" style="border: 1px solid #ccc; padding: 5px; border-radius: 8px;">{{ $user->name }}</p>
        </div>
        <div class="mb-3">
          <label class="form-label font-weight-bold">Email</label>
          <p class="form-text" style="border: 1px solid #ccc; padding: 5px; border-radius: 8px;">{{ $user->email }}</p>
        </div>
        <div class="mb-3">
          <label class="form-label font-weight-bold">Phone</label>
          <p class="form-text" style="border: 1px solid #ccc; padding: 5px; border-radius: 8px;">{{ $user->phone }}</p>
        </div>
        <!-- Button Section -->

        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection