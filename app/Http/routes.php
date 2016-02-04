<?php
use App\User;
use App\UserProvider;

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

Route::get('profile', ['as' => 'profile', 'middleware' => 'auth', 'uses' => 'UserController@load_profile']);
Route::post('profile/save_data', ['middleware' => 'auth', 'uses' => 'UserController@save_profile']);


// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', ['as'=> 'register', 'uses' =>'Auth\AuthController@getRegister']);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', ['as'=> 'forgot_pw', 'uses' =>'Auth\PasswordController@getEmail']);
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('facebook_login', [
    'as'    => 'fb_login',
    'uses'  => 'Auth\AuthController@redirectToFB'
]);
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFBCallback');


// Route::get('login/{provider?}', 'Auth\AuthController@login');