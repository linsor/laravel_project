<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Post;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index() {
        $games = Game::all();
        return view('game/index',compact('games'));
    }
    public function create() {
        $games = Game::all();
        return view('game/create');
    }
    public function store () {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Game::create($data);
        return redirect()->route('game.index');
    }
}

