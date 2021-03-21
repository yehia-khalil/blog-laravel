@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('blogs.update', ['blog' => $posts['id']]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    value="{{ $posts['title'] }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"> {{ $posts['description'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="post_creator">Post Creator</label>
                <select class="form-control" id="post_creator" name="creator">
                    <option>{{$posts->author}}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Edit Post</button>
        </form>
    </div>

@endsection
