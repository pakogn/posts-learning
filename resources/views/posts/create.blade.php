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
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Título</label>
        <br>
        <input type="text" name="title" value="{{ old('title', null) }}" required>
        <br>
        <label>Contenido</label>
        <br>
        <textarea name="body" required>{{ old('body', null) }}</textarea>
        <br>
        <button type="submit">Guardar</button>
        <a href="{{ route('posts.index') }}">Cancelar</a>
    </form>
@endsection
