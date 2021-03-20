<?php

namespace App\Http\Controllers;

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
            'posts' => $this->posts
        ]);
    }

    public function show($postid)
    {
        return view("show", [
            'posts' => $this->posts[$postid - 1]
        ]);
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $ldate = date('Y-m-d H:i:s');
        $this->posts[] = array('id' => count($this->posts) + 1, 'title' => $request->input('title'), 'posted_by' => $request->input('creator'), 'created_at' => $ldate, 'description' => $request->input('description'));
        dd($this->posts);
        // return redirect()->route('blogs.index');
    }

    public function edit($postid)
    {
        return view("edit", [
            'posts' => $this->posts[$postid - 1]
        ]);
    }

    public function update(Request $request,$postid)
    {
        dd($postid);
    }
}
