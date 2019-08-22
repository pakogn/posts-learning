@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    <h1>{{ $post->title }}</h1>
    <small>{{ $post->is_for_kids ? 'Contenido para todos' : 'Contenido para adultos' }}</small>
    <p>
        {{ $post->body }}
    </p>
@endsection
