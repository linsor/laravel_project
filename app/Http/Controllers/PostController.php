<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\City;
use App\Models\Achivement;
use App\Models\Game;

class PostController extends Controller
{
    public function index() {
        $post = Post::find(1);
        $city = City::find(1);
        $achivement = Achivement::find(1);
        $game = Game::find(1);

        dump($post);
        dump($city);
        dump($achivement);
        dump($game);

        
    }
}
