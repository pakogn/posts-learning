@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    <a href="{{ route('posts.create') }}">Nuevo Post</a>

    @if (!$postsAreEmpty)
        <form action="{{ route('posts.index') }}" method="GET">
            <label>Búsqueda</label>
            <br>
            <input type="text" name="q" value="{{ old('q', request('q') ?? null) }}" required>
            <br>
            <button type="submit">Buscar</button>
            @if (request()->has('q'))
                <a href="{{ route('posts.index') }}">Quitar Filtros</a>
            @endif
        </form>
    @endif

    @if ($posts->isEmpty())
        @if ($postsAreEmpty)
            <h3>Aún no hay posts en el sistema.</h3>
        @else
            <h3>No se encontraron resultados...</h3>
        @endif
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
