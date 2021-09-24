<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

Route::resource('/posts', PostController::class);

// Route::get('/test', function() {
//     return view('greeting');
// });

Route::get('test', function() {
    return view('overview');
});

Route::get('test', function() {
    // try {
    //     DB::connection()->getPdo();
    //     return "connected";
    // }
    // catch (\Exception $e) {
    //     die("Could not connect to the database.  Please check your configuration. error:" . $e );
    // }
});




