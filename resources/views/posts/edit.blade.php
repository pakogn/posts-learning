@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @method('PATCH')
        @csrf
        <label>Título</label>
        <br>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        <br>
        <label>Contenido</label>
        <br>
        <textarea name="body" required>{{ old('body', $post->body) }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
        <a href="{{ route('posts.index') }}">Cancelar</a>
    </form>
@endsection
