<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
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


Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/show/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('posts/update', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('posts/restore', [PostController::class, 'restore'])->name('post.restore');
// Route::get('test', function() {
//     return view('posts.test');
// });


Route::get('test', function() {
    // $user = User::findOrFail(1);
    // $post = Post::findOrFail(1);
    // return $user->posts()->attach($post);
    // return $user;
    // return $user->posts;

    // $user->posts()->detach($post);

    //  return $user->posts()->attach([1]);

    // $user->posts()->detach([1,2]);

    // $user = User::find(1);

    // return $user->name;

    // User::create([
    //     'name' => 'TEST',
    //     'email' => 'test1@gmail.com',
    //     'password' => '123;'
    // ]);

    // return 'success';

    // $post = Post::find(1);

    // dd($post->is_publish);

    // Post::create([
    //     'title' => 'Title of post',
    //     'description' => 'Test desc'
    // ]);


    return Post::find(5);

});


// Route::get('test', function() {
//     $post = Post::find(2);
//     return $post->user;
// });


// Route::get('admin/contact-us', function() {
//     return "contact us page";
// })->name('contact');





// Search/get information from the database using model
// Route::get('test', function() {
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

    // return Post::where('title', 'Laravel')->get();

    // return DB::table('posts')->where('title', 'LIKE' ,'%Larave%')->first();

    // $post = Post::where('title', 'Laravel')->first();
    // $title = $post->title;
    // $post->title = 'Laravel Chnage one again title';
    // $post->description = 'New description of post';
    // $post->save();
    // return "Success";

    // $post = Post::findOrFail(1);
    // $post->update([
    //     'title' => 'Updated Laravel title',
    //     'description' => 'New dec',
    //     'is_publish' => 0,
    //     'status' => 0
    // ]);
    // return "Saved";


    // $post = Post::find(3);
    // if($post){
    //     $post->delete();
    //     return "Deleted";
    // }

// });
