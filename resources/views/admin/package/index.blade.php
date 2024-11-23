@extends('admin.master')


<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Packages
    </h1>
    <button class="button light" id="addPackageBtn">
      Add Package
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
          @if (count($packages) > 0)
        @foreach ($packages as $package)
      <tr>
      
      <td data-label="Name">{{$package->name}}</td>
      <td data-label="Name">{{$package->price}}</td>
      <td data-label="Name">{{$package->description}}</td>
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