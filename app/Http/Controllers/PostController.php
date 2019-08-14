<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('q'), function ($query) {
            $query->where('title', 'like', '%'.request('q').'%');
        })->get();

        $postsAreEmpty = Post::count() === 0;

        return view('posts.index', compact('posts', 'postsAreEmpty'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        Post::create(request()->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update(request()->all());

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
