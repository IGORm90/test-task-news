@extends('base')

@section('content')
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>
</div>

<div class="container mt-5">
    <ul class="list-group">
        <li class="list-group-item">Dapibus ac facilisis in</li>


        <li class="list-group-item list-group-item-primary">This is a primary list group item</li>
        <li class="list-group-item list-group-item-secondary">This is a secondary list group item</li>
        <li class="list-group-item list-group-item-success">This is a success list group item</li>
        <li class="list-group-item list-group-item-danger">This is a danger list group item</li>
        <li class="list-group-item list-group-item-warning">This is a warning list group item</li>
        <li class="list-group-item list-group-item-info">This is a info list group item</li>
        <li class="list-group-item list-group-item-light">This is a light list group item</li>
        <li class="list-group-item list-group-item-dark">This is a dark list group item</li>
    </ul>
</div>
@endsection