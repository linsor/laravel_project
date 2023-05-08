<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('likes', 3)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }

    }
}
