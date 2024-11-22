@extends('admin.master')


<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Services
    </h1>
    <button class="button light" id="addServiceBtn">
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
            <th>Price</th>
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
      <td data-label="Name">{{$service->price}}</td>
      <td data-label="Name">{{$service->description}}</td>
      <td class="actions-cell">
        <div class="buttons right nowrap">
        <button type="button" class="button small green" onclick="showServiceDetails('{{ $service->id }}')">
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