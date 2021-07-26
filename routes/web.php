<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserEditController as AdminUserEditController;
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

Route::get('session', function(){
    session(['newSession' => 'newValue']);
    if(session()->has('newSession')){
        session()->remove('newSession');
    }
    return "No session";
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/account', AccountController::class);
    Route::get('/logout', function(){
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function(){
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserEditController::class);
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

