<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AgeMiddleware;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(AgeMiddleware::class)->only('show');
    }

    public function index()
    {
        $posts = Auth::user()->posts()->when(request('q'), function ($query) {
            $query->where('title', 'like', '%'.request('q').'%');
        })->when(request('order_by'), function ($query) {
            $query->orderBy('created_at', request('order_by'));
        }, function ($query) {
            $query->orderBy('created_at', 'desc');
        })->today()->paginate(10);

        $posts->appends(request()->all());

        $postsAreEmpty = Auth::user()->posts()->count() === 0;

        return view('posts.index', compact('posts', 'postsAreEmpty'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        Auth::user()->posts()->create(request()->all());

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
