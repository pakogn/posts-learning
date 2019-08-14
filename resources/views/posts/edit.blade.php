@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    @include('errors.list')
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @method('PATCH')
        @csrf
        @include('posts.form', ['submitButtonText' => 'Actualizar'])
    </form>
@endsection
