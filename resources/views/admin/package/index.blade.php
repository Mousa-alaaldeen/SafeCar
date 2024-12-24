@extends('admin.master')

@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Packages
    </h1>
    <button class="button blue" id="addPackagesBtn" data-bs-toggle="modal" data-bs-target="#addPackagesModal">
      Add Packages
    </button>
  </div>
</section>





  @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
  @endif


  <div class="card has-table">
    <div class="card-content">
      <table>
        <thead>
          <tr>

            <th>Name</th>
            <th>Price</th>
   
          </tr>
        </thead>
        <tbody>
          @if (count($packages) > 0)
        @foreach ($packages as $package)
      <tr>

      <td data-label="Name">{{$package->name}}</td>
      <td data-label="Name">{{$package->price}}</td>
      
      <td class="actions-cell">
        <div class="buttons right nowrap">
        <button type="button" class="button small green" onclick="showPackageDetails('{{ $package->id }}')">
        <span class="icon"><i class="mdi mdi-eye"></i></span>
        </button>
        <form id="delete-form-{{ $package->id }}" action="{{ route('package.destroy', $package->id) }}"
        method="POST" class="inline">
        @csrf
        @method('DELETE')
        </form>
        <button type="button" class="button small red" onclick="confirmDelete('{{ $package->id }}')">
        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
        </button>
        </div>
      </td>
      </tr>
    @endforeach
      @else
      <tr>
      <td colspan="3">No packages found.</td>
      </tr>
    @endif
        </tbody>
      </table>
      <div class="pagination">
        {{ $packages->links('pagination::bootstrap-4') }}
      </div>

    </div>
  </div>
</section>

<!-- Add Packages Modal -->
<div class="modal fade" id="addPackagesModal" tabindex="-1" aria-labelledby="addPackagesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addPackagesModalLabel">Add Package with Services</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('package.store') }}" method="POST">
          @csrf
          <!-- Package Name -->
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>


          <!-- Package Price -->
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" required>
          </div>


          <!-- Services Selection -->
          <div class="mb-3">
            <label for="service_id" class="form-label">Select Services</label>
            <div class="form-check border py-3 px-5" >
              @foreach($services as $service)
          <input class="form-check-input @error('service_id') is-invalid @enderror" type="checkbox"
          name="service_id[]" value="{{ $service->id }}" id="service{{ $service->id }}">
          <label class="form-check-label" for="service{{ $service->id }}">
          {{ $service->name }}
          </label>
          <br>
        @endforeach
            </div>
            @error('service_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>

          <div class="row g-4">
  <!-- Car Size -->
  <div class="col-md-6 mb-3">
    <label for="size" class="form-label">Car Size</label>
    <select class="form-select @error('size') is-invalid @enderror" id="size" name="size" required style="border: 2px solid #007bff;">
      <option value="">Select Car Size</option>
      <option value="Small" {{ old('size') == 'Small' ? 'selected' : '' }}>Small</option>
      <option value="Medium" {{ old('size') == 'Medium' ? 'selected' : '' }}>Medium</option>
      <option value="Large" {{ old('size') == 'Large' ? 'selected' : '' }}>Large</option>
    </select>
    @error('size')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <!-- Duration -->
  <div class="col-md-6 mb-3">
    <label for="duration" class="form-label">Duration</label>
    <select class="form-select @error('duration') is-invalid @enderror" id="duration" name="duration" required style="border: 2px solid #007bff;">
      <option value="">Select Duration</option>
      <option value="Monthly" {{ old('duration') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
      <option value="Yearly" {{ old('duration') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
    </select>
    @error('duration')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

      </div>





      <!-- Button Section -->
      <div class="d-flex justify-content-between m-2">
        <!-- Cancel Button -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <!--Add Button -->
        <button type="submit" class="btn btn-primary">Add Package</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


@endsection