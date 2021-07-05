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

Route::get('/info', function () {
    return "info page";
});

Route::get('/news/{id}', function (string $id) {
    return "news, {$id}";
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, {$name}";
});