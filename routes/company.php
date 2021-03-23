<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::get('/', 'CompanyController@index')->name('company_dashboard');

// Route::get('/subscription/{user}/info', 'SubscriptionController@info')->name('subscription.info');

// Route::get('/subscription/notification', 'SubscriptionController@notification')->name('subscription.notification');

// Route::get('/subscription/{user}/edit', 'SubscriptionController@edit')->name('subscription.edit');

// Route::put('/subscription/{user}', 'SubscriptionController@update')->name('subscription.update');


// Route::get('/profile/create', 'UserProfileController@create')->name('profiles.create');

// Route::post('/profile/create', 'UserProfileController@store')->name('profiles.store');

// Route::get('/profile/{profile}', 'UserProfileController@show')->name('profiles.show');

// Route::get('/profiles/{profile}/edit', 'UserProfileController@edit')->name('profiles.edit');

// Route::put('/profiles/{profile}', 'UserProfileController@update')->name('profiles.update');


Route::get('/ads/create', 'AdController@create')->name('ads.create');

Route::post('/ads/create', 'AdController@store')->name('ads.store');

Route::get('/ads/index', 'AdController@index')->name('ads.index');

Route::get('/ads/{link}/edit', 'AdController@edit')->name('ads.edit');

Route::put('/ads/{link}', 'AdController@update')->name('ads.update');

Route::delete('/ads/{link}', 'AdController@destroy')->name('ads.destroy');



Route::get('/accounts/{user}', 'AccountController@show')->name('accounts.show');

Route::get('/accounts/{user}/edit', 'AccountController@edit')->name('accounts.edit');

Route::put('/accounts/{user}', 'AccountController@update')->name('accounts.update');

Route::delete('/accounts/{user}', 'AccountController@destroy')->name('accounts.destroy');



Route::get('/passwords/{user}/edit', 'AccountController@editPassword')->name('passwords.edit');

Route::put('/passwords/{user}', 'AccountController@updatePassword')->name('passwords.update');

// Route:: catch(function () {
//     return redirect()->route('login');
// });
