<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class AdminShowController extends Controller
{
    public function __invoke(Post $post) {
        
        return view('admin.post.show', compact('post'));  
    }
}

