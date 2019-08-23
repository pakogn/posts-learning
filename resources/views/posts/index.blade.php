@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}">Nuevo Post</a>

                        @if (!$postsAreEmpty)
                            <form action="{{ route('posts.index') }}" method="GET">
                                <label>Búsqueda</label>
                                <br>
                                <input class="form-control" type="text" name="q" value="{{ old('q', request('q') ?? null) }}">
                                <br>
                                <label>Orden</label>
                                <br>
                                <select class="form-control" name="order_by">
                                    <option value="desc" {{ old('order_by', request('order_by')) == 'desc' ? 'selected' : null }}>Más reciente</option>
                                    <option value="asc" {{ old('order_by', request('order_by')) == 'asc' ? 'selected' : null }}>Más antiguo</option>
                                </select>
                                <br>
                                <button class="btn btn-success" type="submit">Buscar</button>
                                @if (request()->has('q'))
                                    <a href="{{ route('posts.index') }}">Quitar Filtros</a>
                                @endif
                            </form>
                        @endif
                        <hr>
                        @if ($posts->isEmpty())
                            @if ($postsAreEmpty)
                                <h3>Aún no hay posts en el sistema.</h3>
                            @else
                                <h3>No se encontraron resultados...</h3>
                            @endif
                        @else
                            <ol class="list-group">
                                @foreach ($posts as $post)
                                    <li class="list-group-item">
                                        <a href="{{ route('posts.edit', $post) }}"><h3>{{ $post->title }}</h3></a>
                                        <a href="{{ route('posts.show', $post) }}">Visualizar</a>
                                        <br>
                                        {{ $post->created_at }}
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">X</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ol>
                            {!! $posts->render() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
