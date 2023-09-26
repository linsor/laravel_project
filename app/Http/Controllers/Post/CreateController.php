<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class CreateController extends BaseController
{
    public function __invoke() {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post/create', compact('categories' , 'tags'));
    }
}

// 