@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        @include('errors.list')
                        {{ Form::model($post, ['route' => ['posts.update', $post], 'method' => 'PATCH']) }}
                            @include('posts.form', ['submitButtonText' => 'Actualizar'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
