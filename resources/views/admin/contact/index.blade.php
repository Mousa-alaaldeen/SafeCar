@extends('admin.master')

@section('contact')
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
     Contacts
    </h1>
    
  </div>
</section>
<section class="section main-section">
  <div class="card has-table">
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>Name</th>
         
            <th>Email</th>
            <th>subject</th>
            <th>message</th>
          </tr>
        </thead>
        <tbody>
          @if (count($contacts) > 0)
            @foreach ($contacts as $contact)
              <tr>
                <td data-label="Name">{{ $contact->name }}</td>
           
                <td data-label="Name">{{ $contact->email }}</td>
                <td data-label="Phone">{{ $contact->subject }}</td>
                <td data-label="Email">{{ $contact->message }}</td>
                
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5">No Contacts found.</td>
            </tr>
          @endif
        </tbody>
      </table>
     
    </div>
  </div>
</section>
@endsection