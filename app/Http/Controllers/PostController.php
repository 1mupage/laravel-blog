<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $category = Category::find(1);
//        $post = Post::find(1);
//        dd($post->category);

//        $post = Post::find(1);
//        dd($post->tags);

//        $tag = Tag::find(1);
//        dd($tag->posts);

        $post = Post::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);

        dd($post->tags);

        return view('post/index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post/create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'some title',
            'content' => 'some content',
            'image' => 'someimg123.jpg',
            'likes' => 5400,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title'
        ], $anotherPost);

        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'some2 title not phpstorm',
            'content' => 'it\'s2 not update some content',
            'image' => 'it\'s2NotUpdateSomeImg0002.jpg',
            'likes' => 432,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'some2 title not phpstorm'
        ], $anotherPost);

        dump($post->content);
        dd('finished');
    }
}
