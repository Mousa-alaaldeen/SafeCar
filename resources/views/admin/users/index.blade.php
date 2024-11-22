@extends('admin.master')


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
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if (count($users) > 0)
            @foreach ($users as $user)
              <tr>
                <td class="image-cell">
                  <div class="image">
                    <img
                      src="{{ $user->image == null ? asset('assets/img/service.png') : asset('storage/users/' . $user->image) }}"
                      class="rounded-full"
                      alt="User Image"
                    />
                  </div>
                </td>
                <td data-label="Name">{{ $user->name }}</td>
                <td data-label="Email">{{ $user->email }}</td>
                <td data-label="Phone">{{ $user->phone }}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small green" onclick="showUserDetails('{{ $user->id }}')">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('customer.destroy', $user->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>
                    <button type="button" class="button small red" onclick="confirmDelete('{{ $user->id }}')">
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
