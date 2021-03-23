<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// use Symfony\Component\Routing\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

// Route::get('/inicio', function () {
//     return redirect('/');
// });

Route::get('/contact', 'HomeController@contact')->name('contact');

// Route::post('/contact', 'MessagesController@store')->name('messages.store');

Route::get('/about', 'HomeController@about')->name('about');


Route:: catch(function () {
    return redirect()->route('login');
});
