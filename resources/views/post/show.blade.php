@extends('layouts.main')
@section('content')
    <h1>{{ $post->title }}</h1>

    <div><br>ID: {{ $post->id }}</div>
    <div>Title: {{ $post->title }}</div>
    <div>Content: {{ $post->content }}</div>
    <div>Image: {{ $post->image }}</div>
    <div>Likes: {{ $post->likes }}<br><br></div>

    <div>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-1">Edit</a>
    </div>

    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-1">Delete</button>
        </form>
    </div>

    <div>
        <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>
    </div>

@endsection
