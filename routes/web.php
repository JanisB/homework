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
    return response()->json([
        'title' => 'example',
        'description' => 'ExampleDescrip'
    ]);
});

Route::get('/info', function () {
    return "info page";
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, {$name}";
});
//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::view('/', 'admin.index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

//site
Route::get('/news', [NewsController::class, 'index'])
->name('news');

Route::get('/news/{news}', [NewsController::class, 'show'])
->where('news', '\d+')
->name('news.show');

Route::get('/welcome', [WelcomeController::class, 'index'])
->name('welcome');

Route::get('/category', [NewsCategoryController::class, 'index'])
->name('category');

Route::get('collections', function(){
    $collection = collect([
        1,2,3,4,10,100,11,5,6,7,8,9,621
    ]);

    dd($collection->chunk(3));

});