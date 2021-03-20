@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:20px">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">author</th>
                    <th scope="col">date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['posted_by'] }}</td>
                        <td>{{ Carbon\Carbon::now() }}</td>
                        <td>
                            <a href="{{ route('blogs.show', ['blog' => $post['id']]) }}" type="button"
                                class="btn btn-success">view</a>
                            <a class="btn btn-danger">delete</a>
                            <a href="blogs/{{ $post['id'] }}/edit" class="btn btn-warning">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-button type="primary">View</x-button>
        <a href="blogs/create" type="button" class="btn btn-success">Create New Post</a>
    </div>
@endsection
