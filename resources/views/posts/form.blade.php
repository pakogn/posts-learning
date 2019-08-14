<label>Título</label>
<br>
<input type="text" name="title" value="{{ old('title', $post->title ?? null) }}" required>
<br>
<label>Contenido</label>
<br>
<textarea name="body" required>{{ old('body', $post->body ?? null) }}</textarea>
<br>
<button type="submit">{{ $submitButtonText }}</button>
<a href="{{ route('posts.index') }}">Cancelar</a>
