@extends('layouts.master')

@section('content')
    <h2>Posts</h2>

    @include('errors.list')
    {{ Form::model($post, ['route' => ['posts.update', $post], 'method' => 'PATCH']) }}
        @include('posts.form', ['submitButtonText' => 'Actualizar'])
    {{ Form::close() }}
@endsection
