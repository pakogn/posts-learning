@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    @include('errors.list')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts.form', ['submitButtonText' => 'Guardar'])
    </form>
@endsection
