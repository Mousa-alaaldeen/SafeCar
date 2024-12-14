@extends('customer.master')
@section('contact')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
style="background-image:  url('https://velikorodnov.com/html/cleansy/rtl/images/slide1.png');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>

        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Add Create Post Button with Icon -->
<div class="container my-4">
    <!-- Add Create Post Button with Icon -->
    @auth
        <div class="container my-4">
            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createPostModal">
                <i class="fas fa-plus-circle me-2"></i> Create Post
            </button>
        </div>
    @endauth
    @if (count($posts) > 0)
            @foreach ($posts as $post)
                    <!-- Post Example -->
                    <!-- Post Example -->
                    <div class="card shadow-sm mx-auto mb-4" style="max-width: 600px;">
                        <div class="card-header d-flex align-items-center">
                            <img src="{{ $post->user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $post->user->car_image) }}"
                                class="rounded-circle me-2" alt="User Image" width="50" height="50">
                            <div>
                                <h5 class="mb-0">{{ $post->user->name }}</h5>
                                <small class="text-muted">{{ $post->formatted_date }}</small>
                            </div>
                        </div>

                        <!-- Post Image (smaller size) -->
                        @if ($post->image)
                            <img src="{{ asset('storage/posts/' . $post->image) }}" class="card-img-top" alt="Post Image"
                                style="max-height: 300px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <p>{{ $post->text }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-light"><i class="fas fa-thumbs-up"></i> Like</button>
                            <button class="btn btn-light"><i class="fas fa-comment"></i> Comment</button>
                        </div>
                        <!-- Comments Section -->
                        <form action="{{ route('comment.store') }}" method="post" class="d-flex">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <!-- Comment Textarea -->
                <textarea class="form-control border-0 shadow-none" name="comment_content" rows="3"
                    placeholder="Add a comment..."
                    style="resize: none; width: 100%; border-radius: 30px; padding-left: 12px; padding-top: 8px; border: 1px solid #ced4da;"></textarea>
                <button class="btn btn-primary ms-2"
                    style="height: 100%; border-radius: 50%; padding: 8px 16px; background-color: #007bff;">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </form>


                    </div>
                </div>
            @endforeach
    @endif
<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalLabel">Create a New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPostForm" method="POST" action="{{ route('posts.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="postText" class="form-label">Post Content</label>
                        <textarea class="form-control" id="postText" name="text" rows="4"
                            placeholder="Write your post here..."></textarea>
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