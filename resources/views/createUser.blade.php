@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="/blogs/user">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" name="name" aria-describedby="nameHelp">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" id="title" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Password</label>
                <input type="password" class="form-control" id="title" name="password" aria-describedby="passwordHelp">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>

@endsection