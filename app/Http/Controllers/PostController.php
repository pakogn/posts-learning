<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:5',
        ]);

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:5',
        ]);

        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
