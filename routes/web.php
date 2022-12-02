<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\HomeController;
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

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home/categories', [App\Http\Controllers\HomeController::class, 'categoryIndex'])->name('home.category.index');

// This will create all the routes for Article
// routes will only be available when a user is logged in
Route::resource('/admin/articles', AdminArticleController::class)->middleware(['auth'])->names('admin.articles');
Route::resource('/user/articles', UserArticleController::class)->middleware(['auth'])->names('user.articles')->only(['index', 'show']);

// This will create all the routes for Category functionality.
// routes will only be available when a user is logged in
Route::resource('/admin/categories', AdminCategoryController::class)->middleware(['auth'])->names('admin.categories');

// the ->only at the end of this statement says only create the index and show routes.
Route::resource('/user/categories', UserCategoryController::class)->middleware(['auth'])->names('user.categories')->only(['index', 'show']);

Route::post('/admin/{article}/comment', [App\Http\Controllers\Admin\CommentController::class, 'store'])->middleware(['auth'])->name('admin.comments.store');
