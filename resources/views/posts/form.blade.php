{{ Form::label('title', 'Título') }}
<br>
{{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
<br>
{{ Form::label('body', 'Contenido') }}
<br>
{{ Form::textarea('body', null, ['class' => 'form-control', 'required']) }}
<br>
{{ Form::label('is_for_kids', 'Es para niños?') }}
<br>
{{ Form::select('is_for_kids', [
        true => 'Sí',
        false => 'No',
    ], null, ['class' => 'form-control', 'required']) }}
<br>
{{ Form::submit($submitButtonText, ['class' => 'btn btn-success']) }}
<a class="btn btn-warning" href="{{ route('posts.index') }}">Cancelar</a>
