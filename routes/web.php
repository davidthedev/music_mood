<?php

// Authentication
Auth::routes();

// Home
Route::get('/', 'HomeController@index')->name('index');
Route::get('/records', 'HomeController@search')->name('search');
Route::post('/records', 'HomeController@search')->name('search');

// Admin area
Route::get('/admin', 'Admin\RecordsController@index')->name('admin');

// Users
Route::get('/admin/user', 'Admin\UsersController@index')->name('user.index');
Route::put('/admin/user', 'Admin\UsersController@updateDetails')->name('user.update');
Route::get('/admin/user/password', 'Admin\UsersController@showPassword')->name('user.password');
Route::put('/admin/user/password', 'Admin\UsersController@updatePassword')->name('user.password.update');

// Genres
Route::resource('/admin/genres', 'Admin\GenresController');

// Moods
Route::resource('/admin/moods', 'Admin\MoodsController');

// Artists
Route::resource('/admin/artists', 'Admin\ArtistsController');

// Records
Route::resource('/admin/records', 'Admin\RecordsController');
