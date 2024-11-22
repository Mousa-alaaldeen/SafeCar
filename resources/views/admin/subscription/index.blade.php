@extends('admin.master')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Subscriptions
    </h1>
    <button class="button light" id="addSubscriptionBtn">
      Add Services
    </button>
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
                <td data-label="Name">{{ $subscription->user->name}}</td>
                <td data-label="Plan Type">{{ $subscription->plan_type }}</td>
                <td data-label="Start Date">{{ $subscription->start_date->format('Y-m-d') }}</td>
                <td data-label="End Date">{{ $subscription->end_date->format('Y-m-d') }}</td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <button type="button" class="button small green" onclick="showSubscriptionDetails('{{ $subscription->id }}')">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <form id="delete-form-{{ $subscription->id }}" action="{{ route('subscription.destroy', $subscription->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                    </form>
                    <button type="button" class="button small red" onclick="confirmDelete('{{ $subscription->id }}')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
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
