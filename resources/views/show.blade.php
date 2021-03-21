@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="card">
            <div class="card-header">
                {{ $posts['id'] }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">{{ $posts['title'] }}</p>
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $posts['description'] }}</p>
                <h5 class="card-title">Time added</h5>
                <p class="card-text">
                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $posts['created_at'])->format('l jS \\of F Y h:i:s A') }}
                </p>
            </div>
        </div>
    </div>
@endsection
