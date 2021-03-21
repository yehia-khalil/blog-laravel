<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index()
    {
        return view("index", [
            'posts' => Blog::get()->skip(0)->take(3),
            'all' => Blog::all()
        ]);
    }

    public function page($pageno)
    {
        return view("index", [
            'posts' => Blog::get()->skip(($pageno-1)*3)->take(3),
            'all' => Blog::all()
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
            'posts' => Blog::find($postid),
            'users' => User::all()
        ]);
    }

    public function update(Request $request, $postid)
    {
        $blog = Blog::find($postid);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->author = $request->input('creator');
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function retrieve()
    {
        $blogs=Blog::onlyTrashed()->get();
        foreach ($blogs as $blog) {
            Blog::withTrashed()->find($blog->id)->restore();
        };
        return redirect()->route('blogs.index');
    }

    public function destroy($postid)
    {
        $record = Blog::find($postid);
        $record->delete();
        return redirect()->route('blogs.index');
    }
}
