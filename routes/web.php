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
});
use App\Http\Controllers\PostController;

// Route utama langsung mengarah ke resource posts
Route::resource('/posts', PostController::class);

// Opsional: Redirect halaman utama (/) ke /posts
Route::get('/', function () {
    return redirect('/posts');
});