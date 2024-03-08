<!-- resources/views/posts/show.blade.php -->

@extend('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <p>Views: {{$post->views}}</p>
    <p>Posted by: {{$post->user->name}}</p>

    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <div class="comment">
            <p>{{$comment->content}}</p>
            <p>Comment by: {{$comment->user->name}}</p>
            <form action="{{ route('comments.destroy', ['post' => $post, 'comment' => $comment]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Comment</button>
            </form>
        </div>
    @endforeach

    <h2>Add a comment</h2>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <label for="content">Comment:</label>
        <textarea name="content" id="content" cols="30" rows="5" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
@endsection

