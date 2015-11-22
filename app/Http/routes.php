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

// Main page
Route::get('/', 'PagesController@index');

// Admin panel
Route::resource('admin', 'adminController');
Route::get('admin/delete-image/{id}/{name}', 'adminController@deleteCarouselImage');

// Spaceships
Route::get('spaceships', 'spaceshipsController@index');
Route::get('spaceships/{id}', 'spaceshipsController@show');

// Pages
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('search', 'PagesController@search');

// Mail sending
Route::post('contact/send', 'MailController@index');

// Auth
Route::controllers([
    "auth" => "Auth\AuthController",
    "password" => "Auth\PasswordController",
]);