@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editForm" id="newPostBtn">New Post</button>
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#categoryModal">New Category</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <th>{{ $post->title }}</th>
                        <th>
                            <button type="button" class="btn btn-danger" onclick="deletePost({{ $post->id }})">Delete</button>
                            <button type="button" class="btn btn-success ms-1" onclick="editPost({{ $post->id }})">Edit</button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="editForm" tabindex="-1">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content w-75">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Post</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ route('post.store') }}" id="postForm">
                            @csrf
                            <input type="hidden" name="id" id="post_id"/>
                            <div class="form-outline mb-2">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="post_title" class="form-control" required/>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="category_id">Password</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="content">Content</label>
                                <textarea name="content" id="post_content" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="categoryModal" tabindex="-1">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content w-75">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add category</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Categories</li>
                        @foreach ($categories as $category)
                            <li class="list-group-item">{{ $category->name }}</li>
                        @endforeach
                      </ul>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ route('category.store') }}" id="categoryForm">
                            @csrf

                            <div class="form-outline mb-2">
                                <label class="form-label" for="email1">Category</label>
                                <input type="text" id="categoryName" name="name" class="form-control" required/>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
<script type="text/javascript">
function deletePost(id) {
    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    fetch('/post/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": csrf
        },
        body: JSON.stringify({
            _method: 'DELETE'
        })
    })
    .then(res => window.location.reload())
}

function editPost(id) {
    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    
    fetch('/post/' + id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": csrf
        }
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        document.getElementById("postForm").action = '/post/update'
        document.getElementById("post_id").value = data.post.id
        document.getElementById("post_title").value = data.post.title
        document.getElementById("post_content").value = data.post.content
        document.getElementById("category_id").value = data.post.category_id
        document.getElementById("newPostBtn").click()
    });
}
</script>
@stop
