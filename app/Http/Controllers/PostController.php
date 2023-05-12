<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts',compact('posts'));
    }
    public function create() {
        $postsArr = [
            [
                'title' => 'Laravel project',
                'content' => 'Protected',
                'image' => 'Image3.jpg',
                'likes' => 20,
                'is_published' => 0,
            ],
            [
                'title' => 'Imerges',
                'content' => 'Sim',
                'image' => 'Image4.jpg',
                'likes' => 10,
                'is_published' => 0,
            ]
        ];
        foreach($postsArr as $iten) {
            Post::create($iten);
        }

        dd('created');
    }
    public function update() {
        $post = Post::find(13);

        $post-> update([
            'title' => 'update title of post from VS Code',
            'content' => 'update some interesting content',
            'image' => 'update Image.jpg',
            'likes' => 590,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    public function delete() {
        $posts = Post::withTrashed()->Where('is_published',1)->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        dd('delete');
    }

    public function firstOrCreate () {


        $anotherPost = [
            'title' => 'Some post',
            'content' => 'Some',
            'image' => 'Some.jpg',
            'likes' => 20000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'Some post'
        ],[
            'title' => 'Some post',
            'content' => 'Some',
            'image' => 'Some.jpg',
            'likes' => 20000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd("end");
    }
    public function updateOrCreate () {

        $anotherPost = [
            'title' => 'updateOrCreate post',
            'content' => 'updateOrCreateSome',
            'image' => 'updateOrCreate Some.jpg',
            'likes' => 200,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'likes' => 23
        ],[
            'title' => 'Laravel projecter',
            'content' => 'Publik',
            'image' => 'updateOrCreateLaravelprojecter.jpg',
            'likes' => 235,
            'is_published' => 1,
        ]);
        dump($post->title);
        dd("update");
    }
}
