@extends('admin.master')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">Subscriptions</h1>
  </div>
</section>
<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th>User Name</th>
            <th>Plan Type</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
        </thead>
        <tbody>
          @if (count($subscriptions) > 0)
        @foreach ($subscriptions as $subscription)
      <tr>
      <td data-label="Name">{{ $subscription->user->name }}</td>
      <td data-label="Plan Type">{{ $subscription->plan_type }}</td>
      <td data-label="Start Date">{{ $subscription->start_date->format('Y-m-d') }}</td>
      <td data-label="End Date">{{ $subscription->end_date->format('Y-m-d') }}</td>
      <td class="actions-cell">
        <div class="buttons right nowrap">
        <!-- Button to trigger the modal -->
        <button class="p-2 m-2 text-white button green" data-bs-toggle="modal"
        data-bs-target="#editSubscriptionModal-{{ $subscription->id }}">
        <i class="mdi mdi-eye"></i>
        </button>
        <!-- Delete button -->
        <form id="delete-form-{{ $subscription->id }}"
        action="{{ route('subscription.destroy', $subscription->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        </form>
        <button type="button" class="button small red" onclick="confirmDelete('{{ $subscription->id }}')">
        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
        </button>
        </div>
      </td>
      </tr>
      <!-- Modal for editing the subscription -->
      <div class="modal fade" id="editSubscriptionModal-{{ $subscription->id }}" tabindex="-1"
      aria-labelledby="editSubscriptionModalLabel-{{ $subscription->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered custom-modal-size">
        <div class="modal-content rounded-3 shadow-lg">
        <!-- Modal Header -->
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="editSubscriptionModalLabel-{{ $subscription->id }}">
        Edit Subscription
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{ route('subscription.update', $subscription->id) }}" method="POST"
        id="updateForm-{{ $subscription->id }}">
        @csrf
        @method('PUT')
        <!-- Plan Type -->
        <div class="mb-3">
          <label for="plan_type" class="form-label">Plan Type</label>
          <div class="input-group">
          <select name="plan_type" id="plan_type" class="form-select custom-select" required>
          <option value="Monthly" {{ $subscription->plan_type == 'Monthly' ? 'selected' : '' }}>Monthly
          </option>
          <option value="Yearly" {{ $subscription->plan_type == 'Yearly' ? 'selected' : '' }}>Yearly
          </option>
          </select>
          </div>
        </div>
        <!-- Start Date -->
        <div class="mb-3">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="datetime-local" name="start_date" class="form-control"
          value="{{ $subscription->start_date->format('Y-m-d\TH:i') }}" required>
        </div>
        <!-- End Date -->
        <div class="mb-3">
          <label for="end_date" class="form-label">End Date</label>
          <input type="datetime-local" name="end_date" class="form-control"
          value="{{ $subscription->end_date->format('Y-m-d\TH:i') }}" required>
        </div>
        <!-- Button Section -->
        <div class="d-flex justify-content-between">
          <!-- Cancel Button -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <!-- Update Button with Confirmation -->
          <button type="button" class="btn btn-primary" onclick="confirmUpdate('{{ $subscription->id }}')">
          Update
          </button>
        </div>
        </form>
        </div>
        </div>
      </div>
      </div>
    @endforeach
      @else
      <tr>
      <td colspan="5">No subscriptions found.</td>
      </tr>
    @endif
        </tbody>
      </table>
      <div class="pagination mt-4">
        {{ $subscriptions->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>
<script>
  function confirmUpdate(subscriptionId) {
    // Display SweetAlert2 confirmation dialog
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you really want to update this subscription?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, update it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('updateForm-' + subscriptionId).submit();
      }
    });
  }
</script>
