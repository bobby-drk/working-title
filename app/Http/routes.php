<?php
use App\User;
use App\UserProvider;

use Illuminate\Http\Request;
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


Route::get('/', ['as' => 'home', function () {
    return view('pages.home');
}]);

Route::get('profile', ['as' => 'profile', function() {
    return View::make('pages.profile');
}]);

Route::get('rate', ['as' => 'rate', function() {
    return View::make('pages.rate');
}]);

Route::get('test', ['as' => 'test', function() {
    return View::make('pages.test');
}]);

Route::post('save_rating', function() {
//    dd($request->all());
    dd($_POST);
});


// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('facebook_login', 'Auth\AuthController@redirectToFB');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFBCallback');


// Route::get('login/{provider?}', 'Auth\AuthController@login');