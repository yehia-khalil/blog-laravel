@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">{{$posts['title']}}</p>
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{$posts['description']}}</p>
            </div>
        </div>
    </div>
@endsection