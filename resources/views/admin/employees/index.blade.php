@extends('admin.master')
@section('contact')


<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul class="breadcrumb">

      <li>Employees</li>
    </ul>
    
    <button class="button blue" id="addEmployeeBtn" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
      Add Employee
    </button>
  </div>
</section>
<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Name</th>
            <th>Service</th>
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
                      src="{{ $employee->image == null ? asset('assets/img/User_Icon.png') : asset('storage/employees/' . $employee->image) }}"
                      class="rounded-full" alt="employee Image" />
                  </div>
                </td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->service->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small bg-success" data-bs-toggle="modal"
                            data-bs-target="#editEmployeeModal-{{ $employee->id }}">
                      <span class="icon text-white"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}"
                          method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>
                    <button type="button" class="button small red" onclick="confirmDelete('{{ $employee->id }}')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>

              <!-- Edit Employee Modal -->
              <div class="modal fade" id="editEmployeeModal-{{ $employee->id }}" tabindex="-1"
                   aria-labelledby="editEmployeeModalLabel-{{ $employee->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-size">
                  <div class="modal-content rounded-3 shadow-lg">
                    <!-- Modal Header -->
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title" id="editEmployeeModalLabel-{{ $employee->id }}">Edit Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                      <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                            id="updateForm-{{ $employee->id }}" class="update-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Image -->
                        <div class="mb-3 card">
                          <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="text-align: center;">
                              <img
                                src="{{ $employee->image == null ? asset('assets/img/User_Icon.png') : asset('storage/employees/' . $employee->image) }}"
                                alt="{{ $employee->name }}"
                                style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover;">
                            </div>
                            <input type="file" name="image" class="form-control-file" style="flex-grow: 1;">
                          </div>
                        </div>
                        <!-- Employee Name -->
                        <div class="mb-3">
                          <label for="employee_name" class="form-label">Employee Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                          <label for="employee_email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                          <label for="employee_phone" class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
                        </div>
                        <!-- Salary -->
                        <div class="mb-3">
                          <label for="employee_salary" class="form-label">Salary</label>
                          <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
                        </div>
                        <!-- Service -->
                        <div class="mb-3 card p-3">
                          <label for="employee_service" class="form-label">Service</label>
                          <div class="d-flex align-items-center gap-3">
                            <select name="service_id" class="form-select" required>
                              @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ $employee->service_id == $service->id ? 'selected' : '' }}>
                                  {{ $service->name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- Button Section -->
                        <div class="d-flex justify-content-between">
                          <!-- Cancel Button -->
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <!-- Update Button -->
                          <button type="button" class="btn btn-primary updateEmployeeBtn"
                                  data-employee-id="{{ $employee->id }}">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <tr>
              <td colspan="6">No Employees found.</td>
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
<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal-size">
    <div class="modal-content rounded-3 shadow-lg">
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Image -->
          <div class="mb-3 card">
            <div style="display: flex; align-items: center; gap: 20px;">
              <div style="text-align: center;">
                <img src="{{ asset('assets/img/User_Icon.png') }}" alt="Default Image"
                     style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover;">
              </div>
              <input type="file" name="image" class="form-control-file" style="flex-grow: 1;">
            </div>
          </div>
          <!-- Employee Name -->
          <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <!-- Email -->
          <div class="mb-3">
            <label for="employee_email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <!-- Phone -->
          <div class="mb-3">
            <label for="employee_phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <!-- Salary -->
          <div class="mb-3">
            <label for="employee_salary" class="form-label">Salary</label>
            <input type="number" name="salary" class="form-control" required>
          </div>
          <!-- Service -->
          <div class="mb-3 card p-3">
            <label for="employee_service" class="form-label">Service</label>
            <select name="service_id" class="form-select" required>
              @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
              @endforeach
            </select>
          </div>
<!-- Start Date -->
          <div class="form-group">
         <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>

          <!-- Button Section -->
          <div class="d-flex justify-content-between">
            <!-- Cancel Button -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Employee</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection