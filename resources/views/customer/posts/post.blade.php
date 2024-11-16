@extends('customer.master')
@section('contact')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/carousel-bg-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Add Create Post Button with Icon -->
<div class="container my-4">
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createPostModal">
        <i class="fas fa-plus-circle me-2"></i> Create Post
    </button>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <!-- Post Example -->
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User Image">
                    <div>
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                        <small class="text-muted">{{ $post->formatted_date }}</small>
                    </div>
                </div>

                <!-- Post Image (smaller size) -->
                <img src="{{ asset('storage' ) }}/posts/{{$post->image}}" class="card-img-top" alt="Post Image" style="max-height: 200px; object-fit: cover;">

                <div class="card-body">
                    <p>{{ $post->text }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-light">Like</button>
                    <button class="btn btn-light">Comment</button>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-4">
                <div class="d-flex mb-3">
                    <img src="https://via.placeholder.com/35" class="rounded-circle me-2" alt="Commenter Image">
                    <div>
                        <strong>Ahmed</strong>
                        <p>Great post, thanks for sharing!</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <img src="https://via.placeholder.com/35" class="rounded-circle me-2" alt="Commenter Image">
                    <div>
                        <strong>Fatima</strong>
                        <p>Excellent content! I totally agree.</p>
                    </div>
                </div>

                <!-- Add Comment -->
                <div class="d-flex">
                    <textarea class="form-control" rows="2" placeholder="Add a comment..."></textarea>
                    <button class="btn btn-primary mt-2 ms-2">Post</button>
                </div>
            </div>
        @endforeach
    @endif

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-lg-12">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalLabel">Create a New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPostForm" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="postText" class="form-label">Post Content</label>
                        <textarea class="form-control" id="postText" name="text" rows="4" placeholder="Write your post here..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="postImage" class="form-label">Upload Image (optional)</label>
                        <input type="file" class="form-control" id="postImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
