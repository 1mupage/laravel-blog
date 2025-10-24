<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
//        $category = Category::find(1);
//        $post = Post::find(1);
//        dd($post->category);

//        $post = Post::find(1);
//        dd($post->tags);

//        $tag = Tag::find(1);
//        dd($tag->posts);

//        $post = Post::find(1);
//        $category = Category::find(1);
//        $tag = Tag::find(1);
//        dd($post->tags);

        $posts = Post::all();

        return view('post/index', compact('posts'));
    }
}
