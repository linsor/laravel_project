<?php

use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Post\AdminIndexController;
use App\Http\Controllers\Admin\Post\AdminCreateController;
use App\Http\Controllers\Admin\Post\AdminDeleteController;
use App\Http\Controllers\Admin\Post\AdminShowController;
use App\Http\Controllers\Admin\Post\AdminEditController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Doctrine\DBAL\Schema\Index;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DeleteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('Home');

Route::group(['namespace' => 'Post'], function () {
    Route::get('/posts', [IndexController::class, '__invoke'])->name('post.index');
    Route::get('/posts/create', [CreateController::class, '__invoke'])->name('post.create');
    Route::post('/posts', [StoreController::class, '__invoke'])->name('post.store');
    Route::get('/posts/{post}', [ShowController::class, '__invoke'])->name('post.show');
    Route::get('/posts/{post}/edit', [EditController::class, '__invoke'])->name('post.edit');
    Route::patch('/posts/{post}', [UpdateController::class, '__invoke'])->name('post.update');
    Route::delete('/posts/{post}', [DeleteController::class, '__invoke'])->name('post.delete');
});

Route::group(['namespace' => 'Admin\Post', 'middleware' => 'admin', 'prefix'=> 'admin'], function () {
        Route::get('/post', [AdminIndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/post/create', [AdminCreateController::class, '__invoke'])->name('admin.post.create');
        Route::get('/post/{post}', [AdminShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/post/{post}/edit', [AdminEditController::class, '__invoke'])->name('admin.post.edit');
        Route::delete('/post/{post}', [AdminDeleteController::class, '__invoke'])->name('admin.post.delete');  
});


Route::get('/game', [GameController::class, 'index']) ->name('game.index');
Route::get('/games/create',[GameController::class, 'create']) ->name('game.create');
Route::post('/games', [GameController::class, 'store'])->name('game.store');


Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
