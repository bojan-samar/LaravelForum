<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('forum', 'forum.index')->name('forum.index');
Route::get('forum/{forum}', [\App\Http\Controllers\ForumController::class, 'show'])->name('forum.show');
Route::get('forum/user/{user}', [\App\Http\Controllers\ForumController::class, 'user'])->name('forum.user');

//Auth
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::view('forum-saved', 'forum.saved')->name('forum.saved');
});
