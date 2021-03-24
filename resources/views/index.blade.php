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
                    <th scope="col">slug</th>
                    <th scope="col">Actions</th>
                    <th scope="col">
                        <a href="/blog/retrieve" type="button" class="btn btn-primary">Restore</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['author'] }}</td>
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post['created_at'])->format('Y-m-d') }}
                        </td>
                        <td>{{ $post['slug'] }}</td>
                        <td>
                            <a href="{{ route('blogs.show', ['blog' => $post['id']]) }}" type="button"
                                class="btn btn-success">view</a>
                            <a class="btn btn-danger" id="{{ $post['id'] }}" data-toggle="modal"
                                data-target="#exampleModal" onclick="asd(this)">delete</a>
                            <a href="{{ route('blogs.edit', ['blog' => $post['id']]) }}" class="btn btn-warning">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" id="yehia">Confirm Delete</a>
                    </div>
                </div>
            </div>
        </div>



        <x-button type="primary">View</x-button>
        <a href="{{ route('blogs.create') }}" type="button" class="btn btn-success">Create New Post</a>
        <a href="{{ route('blogs.createUser') }}" type="button" class="btn btn-secondary">Register</a>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <li class="page-item"><a class="page-link"
                            href="{{ route('blogs.page', ['page' => request()->segments()[2] - 1 <= 0 ? 1 : request()->segments()[2] - 1]) }}">Previous</a>
                    </li>
                    {{-- @for ($i = request()->segments()[2] - 1 <= 0 ? 1 : request()->segments()[2]; $i < round(count($all) / 3) + 1; $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ route('blogs.page', ['page' => $i-1]) }}">{{ $i -1 }}</a></li>
                    @endfor --}}

                    @for ($i = 0; $i < 3; $i++)
                        @if (request()->segments()[2] >= ceil(count($all) / 3)) 
                        @break
                    @else
                    <li class="page-item"><a class="page-link"
                        href="{{ route('blogs.page', ['page' => request()->segments()[2] + $i - 1 <= 0 ? 1 : request()->segments()[2] + $i - 1]) }}">{{ request()->segments()[2] + $i - 1 <= 0 ? 1 : request()->segments()[2] + $i - 1 }}</a>
                        </li> 
                    @endif
                    @endfor


                    <li class="page-item"><a class="page-link"
                            href="{{ route('blogs.page', ['page' => request()->segments()[2] + 1 > ceil(count($all) / 3) ? request()->segments()[2] : request()->segments()[2] + 1]) }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

@endsection
