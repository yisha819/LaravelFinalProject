<h1>Posts</h1>

<a href="{{ route('posts.create') }}">Create Post</a>

@foreach($posts as $post)
    <div style="margin:20px 0;">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>

        <a href="{{ route('posts.edit', $post) }}">Edit</a>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach