<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsCategoryController as NewsCategoryController;
use App\Http\Controllers\WelcomeController as WelcomeController;

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

Route::get('/info', function () {
    return "info page";
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, {$name}";
});
//admin
Route::group(['prefix' => 'admin', 'as' => 'admin'], function(){
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])
->name('admin.categories');
Route::get('/admin/news', [AdminNewsController::class, 'index'])
->name('admin.news');
//site
Route::get('/news', [NewsController::class, 'index'])
->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');

Route::get('/welcome', [WelcomeController::class, 'index'])
->name('welcome');

Route::get('/category', [NewsCategoryController::class, 'index'])
->name('category');