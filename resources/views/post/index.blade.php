@extends('layouts.main')
@section('content')
    <h1>This is posts page</h1>

    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3 mt-3">Create post</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Изображение</th>
                <th scope="col">Кол-во лайков</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->image }}</td>
                    <td>{{ $post->likes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection
