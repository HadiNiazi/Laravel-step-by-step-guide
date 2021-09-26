<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
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

Route::get('/users', [UserController::class, 'index'])->name('user');
Route::get('users/{id}', [UserController::class, 'show'])->name('user.show');

// Route::resource('/posts', PostController::class);


Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');

// Search/get information from the database using model
Route::get('test', function() {
    // Post::all();
    // return Post::findOrFail(5);

    // $post = Post::find(4);
    // if(! $post){
    //     // return;
    // }
    // else {
    //     return $post;
    // }

    // return Post::where('title', 'LIKE' ,'%Dolor eveniet nesc%')->first();

    // return Post::where('title', 'Dolor eveniet nesci')
    // ->where('description', 'Et consequatur minu')->first();

    // return Post::where('title', 'Dolor eveniet nesci')
    // ->orWhere('description', 'Et Laravelco nsequatur minu')->first();

    return Post::where('title', 'Laravel')->get();


});
