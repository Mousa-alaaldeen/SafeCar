@extends('admin.master')


<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
     Employees
    </h1>
    <button class="button light" id="addEmployeeBtn">
      Add Employee
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
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if (count($employees) > 0)
            @foreach ($employees as $employee)
              <tr>
                
                <td class="image-cell">
                  <div class="image">
                    <img
                      src="{{ $employee->image == null ? asset('assets/img/service.png') : asset('storage/employees/' . $employee->image) }}"
                      class="rounded-full"
                      alt="employee Image"
                    />
                  </div>
                </td>
                <td data-label="Name">{{ $employee->name }}</td>
                <td data-label="Email">{{ $employee->email }}</td>
                <td data-label="Phone">{{ $employee->phone }}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small green" onclick="showEmployeeDetails('{{ $employee->id }}')">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>
                    <button type="button" class="button small red" onclick="confirmDelete('{{ $employee->id }}')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5">No Employees found.</td>
            </tr>
          @endif
        </tbody>
      </table>
      <div class="pagination">
        {{ $employees->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>
