<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public $posts = [
        ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20', 'description' => 'i hate php'],
        ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15', 'description' => 'i hate php :@'],
        ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01', 'description' => 'i love JAVASCRIPT <3'],
    ];

    public function index()
    {
        return view("index", [
            'posts' => Blog::all()
        ]);
    }

    public function show($postid)
    {
        return view("show", [
            'posts' => Blog::find($postid)
        ]);
    }

    public function create()
    {
        return view("create", [
            'users' => User::all()
        ]);
    }

    public function createUser()
    {
        return view("createUser");
    }

    public function store(Request $request)
    {
        $user = User::find($request->input('creator'));
        Blog::create(array('title' => $request->input('title'), 'author' => $user->name, 'description' => $request->input('description'), 'user_id' => $request->input('creator')));
        return redirect()->route('blogs.index');
    }

    public function storeUser(Request $request)
    {
        User::create(array('name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password')));
        return redirect()->route('blogs.index');
    }
    public function edit($postid)
    {
        return view("edit", [
            'posts' => Blog::find($postid)
        ]);
    }

    public function update(Request $request, $postid)
    {
        $blog = Blog::find($postid);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->save();
        return redirect()->route('blogs.index');
    }
}
