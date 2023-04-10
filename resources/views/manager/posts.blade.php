@extends('base')

@section('content')
    <div class="container mt-5">
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editForm">New Post</button>
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#categoryForm">New Category</button>

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
                        <th></th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="editForm" tabindex="-1">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content w-75">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Sign in</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ route('manager.store') }}">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="email1">Email address</label>
                                <input type="email" id="email1" class="form-control" />
                            </div>
        
                            <!-- password input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="password1">Password</label>
                                <input type="password" id="password1" class="form-control" />
                            </div>
        
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="categoryForm" tabindex="-1">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content w-75">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add category</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ route('category.store') }}">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="email1">Category</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
        
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
