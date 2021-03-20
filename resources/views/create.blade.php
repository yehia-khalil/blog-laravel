@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="/blogs">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"> </textarea>
            </div>
            <div class="form-group">
                <label for="post_creator">Post Creator</label>
                <select class="form-control" id="post_creator" name="creator">
                    <option>Ahmed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>

@endsection