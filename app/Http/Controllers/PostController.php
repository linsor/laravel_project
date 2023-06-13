<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
 
        $post = Post::find(1);
        $tag = Tag::find(1); 
        dd($tag->posts);


        //return view('post/index',compact('posts'));
    }
    public function create() {
        $posts = Post::all();
        return view('post/create');
    }

    public function show (Post $post) {
        return view('post/show', compact('post'));  
    }
    public function edit (Post $post) {
        return view('post/edit', compact('post'));
    }
    public function store () {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
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

