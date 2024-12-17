@extends('admin.master')

@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
     Review
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
            <th>user Name</th>
            <th>Review</th>
           
          </tr>
        </thead>
        <tbody>
          @if (count($reviews) > 0)
        @foreach ($reviews as $review)
   <tr>
    
   </tr>
    @endforeach
      @else
      <tr>
      <td colspan="3">No Review found.</td>
      </tr>
    @endif

        </tbody>
      </table>
     

    </div>
  </div>
</section>
@endsection