<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\Admin\TestController;
use Database\Seeders\ArticleSeeder;
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

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('/articles', ArticleController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// creates all routes for article
// routes will only be available if user logs in
Route::resource('/admin/articles', AdminArticleController::class)->middleware(['auth'])->names('admin.articles');

Route::resource('/user/articles', UserArticleController::class)->middleware(['auth'])->names('user.articles')->only(['index', 'show']);
