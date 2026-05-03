@foreach($posts as $post)
    <h1>{{ $post->titulo }}</h1>
    <a href="{{ route('posts.edit', $post->id) }}">Editar</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endforeach