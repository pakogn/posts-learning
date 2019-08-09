@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    <a href="{{ route('posts.create') }}">Nuevo Post</a>

    @if ($posts->isEmpty())
        <h3>Aún no hay posts en el sistema.</h3>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.edit', $post) }}">{{ $post->title }}</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">X</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
