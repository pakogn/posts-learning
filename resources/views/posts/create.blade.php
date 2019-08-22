@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    @include('errors.list')
    {{ Form::open(['route' => 'posts.store']) }}
        @include('posts.form', ['submitButtonText' => 'Guardar'])
    {{ Form::close() }}
@endsection
