<?php

use App\Http\Controllers\MyPlaceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my_page', [MyPlaceController::class, 'index']);

Route::get('/calk', function() {
    return 5 + 7;
});

Route::get('/my_sity', function() {
    return "My sity is Shymcent";
});

Route::get('/PHP', function() {
    return "i like PHP. Meybe";
});

Route::get('/page', function() {
    return 'Забываю точку с запятой в конце Route';
});