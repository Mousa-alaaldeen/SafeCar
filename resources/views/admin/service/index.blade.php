@extends('admin.master')
@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Services
    </h1>
    <button class="button light" id="addServiceBtn" data-bs-toggle="modal" data-bs-target="#addServiceModal">
      Add Services
    </button>
  </div>
</section>

<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Name</th>
      
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          @if (count($services) > 0)
            @foreach ($services as $service)
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img
                      src="{{ $service->image == null ? asset('assets/img/service.png') : asset('storage/services/' . $service->image) }}"
                      class="rounded-full">
                  </div>
                </td>
                <td data-label="Name">{{$service->name}}</td>
          
                <td data-label="Description">{{$service->description}}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small green" data-bs-toggle="modal"
                            data-bs-target="#editServiceModal-{{ $service->id }}">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $service->id }}" action="{{ route('services.destroy', $service->id) }}"
                          method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>

                    <button type="button" class="button small red" onclick="confirmDelete('{{ $service->id }}')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- Edit Service Modal -->
              <div class="modal fade" id="editServiceModal-{{ $service->id }}" tabindex="-1"
                   aria-labelledby="editServiceModalLabel-{{ $service->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-size">
                  <div class="modal-content rounded-3 shadow-lg">
                    <!-- Modal Header -->
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title" id="editServiceModalLabel-{{ $service->id }}">Edit Service</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                      <form action="{{ route('services.update', $service->id) }}" method="POST"
                            id="updateServiceForm-{{ $service->id }}" class="update-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Image -->
                        <div class="mb-3 card">
                          <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="text-align: center;">
                              <img
                                src="{{ $service->image == null ? asset('assets/img/icon-service.jpg') : asset('storage/services/' . $service->image) }}"
                                alt="{{ $service->name }}"
                                style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover;">
                            </div>
                            <input type="file" name="image" class="form-control-file" style="flex-grow: 1;">
                          </div>
                        </div>
                        <!-- Service Name -->
                        <div class="mb-3">
                          <label for="service_name" class="form-label">Service Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                          <label for="service_description" class="form-label">Description</label>
                          <textarea name="description" class="form-control" rows="3" required>{{ $service->description }}</textarea>
                        </div>
                        <!-- Price -->
                        <div class="mb-3">
                          <label for="service_price" class="form-label">Small Price</label>
                          <input type="number" name="price_small" class="form-control" value="{{ $service->price_small ?? '' }}" required>
                        </div>
                        <!-- Medium Price -->
                         <div>
                           <label for="service_price" class="form-label">Medium Price</label>
                           <input type="number" name="price_medium" class="form-control" value="{{ $service->price_medium ?? '' }}" required>

                         </div>
                         <!-- Large Price -->
                         <div>
                           <label for="service_price" class="form-label">Large Price</label>
                           <input type="number" name="price_large" class="form-control" value="{{ $service->price_large ?? '' }}" required>

                         </div>


                        <!-- Button Section -->
                        <div class="d-flex justify-content-between mt-2">
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
              <td colspan="3">No services found.</td>
            </tr>
          @endif
        </tbody>
      </table>
      <div class="pagination">
        {{ $services->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal-size">
    <div class="modal-content rounded-3 shadow-lg">
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Image -->
          <div class="mb-3 card">
            <div style="display: flex; align-items: center; gap: 20px;">
              <div style="text-align: center;">
                <img src="{{ asset('assets/img/service.png') }}" alt="Default Image"
                     style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover;">
              </div>
              <input type="file" name="image" class="form-control-file" style="flex-grow: 1;">
            </div>
          </div>
          <!-- Service Name -->
          <div class="mb-3">
            <label for="service_name" class="form-label">Service Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <!-- Description -->
          <div class="mb-3">
            <label for="service_description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <!-- Price -->
          <label for="service_price" class="form-label">Small Price</label>
          <input type="number" name="price_small" class="form-control" value="{{ $service->price_small ?? '' }}" required>
          <label for="service_price" class="form-label">Medium Price</label>
          <input type="number" name="price_medium" class="form-control" value="{{ $service->price_medium ?? '' }}" required>
          <label for="service_price" class="form-label">Large Price</label>
          <input type="number" name="price_large" class="form-control" value="{{ $service->price_large ?? '' }}" required>

         
          <!-- Button Section -->
          <div class="d-flex justify-content-between my-2">
            <!-- Cancel Button -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Service</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
<script>
  function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this service?')) {
      document.getElementById('delete-form-' + id).submit();
    }
  }
</script>

