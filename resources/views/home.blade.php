@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container mt-5">
                    <form>
                        <div class="form-group col-md-4">
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">{{ 'All' }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        @if (app('request')->input('category_id') == $category->id)
                                            selected
                                        @endif
                                        >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>

                    <div class="list-group mt-5">
                        @foreach ($posts as $post)
                            <div href="/post/{{ $post->id }}" class="list-group-item list-group-item-action flex-column align-items-start post-item" data-postid="{{ $post->id }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small class="text-muted">{{ $post->category->name }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="postTitle"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="postDate"></div>
                        <div id="postContent"></div>
                    </div>
                </div>
            </div>
        </div>

        <button type="hidden" class="invisible" data-bs-toggle="modal" data-bs-target="#postModal" id="postModalBtn"></button>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    document.querySelectorAll('.post-item').forEach(el => el.addEventListener('click', event => {
        let postId = el.getAttribute("data-postid")

        fetch('/post/' + postId, {
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
                document.getElementById("postTitle").innerHTML = data.post.title
                document.getElementById("postContent").innerHTML = data.post.content
                document.getElementById("postDate").innerHTML = data.post.created_at
                document.getElementById("postModalBtn").click()
            });
     }));
</script>
@stop
