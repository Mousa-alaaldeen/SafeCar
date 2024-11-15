@extends('customer.master')
@section('contact')
@section('contact-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/carousel-bg-1.jpg') }}');">

    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Table Start -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Service</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $contact)
      <tr>
        <th scope="row">{{ $data->firstItem() + $loop->index }}</th>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->services ? $contact->services->name : '' }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="6" class="text-center">No contacts found.</td>
      </tr>
    @endforelse
  </tbody>
</table>
{{$data->render('pagination::bootstrap-4');}}

<!-- Contact Table End -->

@endsection
