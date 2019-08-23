@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        @include('errors.list')
                        {{ Form::open(['route' => 'posts.store']) }}
                            @include('posts.form', ['submitButtonText' => 'Guardar'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
