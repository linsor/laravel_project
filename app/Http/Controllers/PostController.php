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
    public function create() {
        $postsArr = [
            [
                'title' => 'title of post from VS Code',
                'content' => 'some interesting content',
                'image' => 'Image.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post from VS Code',
                'content' => 'some interesting content',
                'image' => 'Image.jpg',
                'likes' => 590,
                'is_published' => 1,
            ]
        ];
        foreach($postsArr as $iten) {
            Post::create($iten);
        }

        dd('created');
    }

}
