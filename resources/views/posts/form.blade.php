{{ Form::label('title', 'Título') }}
<br>
{{ Form::text('title', null, ['required']) }}
<br>
{{ Form::label('body', 'Contenido') }}
<br>
{{ Form::textarea('body', null, ['required']) }}
<br>
{{ Form::label('is_for_kids', 'Es para niños?') }}
<br>
{{ Form::select('is_for_kids', [
        true => 'Sí',
        false => 'No',
    ], null, ['required']) }}
<br>
{{ Form::submit($submitButtonText) }}
<a href="{{ route('posts.index') }}">Cancelar</a>
