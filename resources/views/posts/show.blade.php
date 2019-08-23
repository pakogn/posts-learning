@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <h1>{{ $post->title }}</h1>
                        <small>{{ $post->is_for_kids ? 'Contenido para todos' : 'Contenido para adultos' }}</small>
                        <p>
                            {{ $post->body }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
