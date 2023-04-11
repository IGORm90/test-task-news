@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container mt-5">

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{ $post->title }}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                          <p class="card-text">{{ $post->content }}</p>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
@endsection