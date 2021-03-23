<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::get('/', 'AdminController@index')->name('admin_dashboard');

// Route::get('/trials/index', 'AdminController@trialsIndex')->name('trials.index');

// Route::get('/trials/init', 'AdminController@trialsInit')->name('trials.init');

// Route::get('/subscriptions/index', 'AdminController@subscriptionsIndex')->name('subscriptions.index');

// Route::get('/subscriptions/init', 'AdminController@subscriptionsInit')->name('subscriptions.init');

// Route::get('/unsubscribe/index', 'AdminController@unsubscribe')->name('unsubscribe.index');

// Route::get('/unsubscribe/init', 'AdminController@unsubscribeInit')->name('unsubscribe.init');


// Route::get('/trial/{user}', 'AdminController@individualTrialInit')->name('trial.init');

// Route::get('/subscription/{user}', 'AdminController@individualSubscriptionInit')->name('subscription.init');


Route::get('/users/index', 'UserController@index')->name('users.index');

Route::get('/users/{user}', 'UserController@show')->name('users.show');

// Route::get('/reset/{user}', 'AdminController@userReset')->name('user.reset');

Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

Route::put('/users/{user}', 'UserController@update')->name('users.update');

Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('/links/create', 'LinkController@create')->name('links.create');

Route::post('/links/create', 'LinkController@store')->name('links.store');

Route::get('/links/index', 'LinkController@index')->name('links.index');

Route::get('/links/{link}/edit', 'LinkController@edit')->name('links.edit');

Route::put('/links/{link}', 'LinkController@update')->name('links.update');

Route::delete('/links/{link}', 'LinkController@destroy')->name('links.destroy');

Route::get('/categories/index', 'CategoryController@index')->name('categories.index');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');

Route::post('/categories/create', 'CategoryController@store')->name('categories.store');

Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

// Route:: catch(function () {
//     return redirect()->route('login');
// });
