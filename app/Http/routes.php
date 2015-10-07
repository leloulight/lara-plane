<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Admin panel
Route::get('admin', 'adminController@index');
Route::get('admin/create', 'adminController@create');
Route::post('admin', 'adminController@store');
Route::get('admin/{id}', 'adminController@show');


// Pages
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::controllers([
    "auth" => "Auth\AuthController",
    "password" => "Auth\PasswordController",
]);