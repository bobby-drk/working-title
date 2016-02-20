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


Route::get('/', ['as' => 'home', function () {
    return view('pages.home');
}]);

Route::get('profile', ['as' => 'profile', 'middleware' => 'auth', 'uses' => 'UserController@load_profile']);
Route::post('profile/save_data', ['middleware' => 'auth', 'uses' => 'UserController@save_profile']);
Route::post('change_password', ['middleware' => 'auth', 'uses' => 'UserController@change_password']);


// Authentication routes...
Route::get('login', ['as'=> 'login', 'uses'=> 'Auth\AuthController@getLogin']);
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

Route::get('oauth/connect/{provider_name}/{redir}',  ['as' => 'oauth.connect', 'uses' => 'Auth\OAauthController@connect']);
Route::get('oauth/callback/{provider_name}', ['as' => 'oauth.callback', 'uses' => 'Auth\OAauthController@callback']);

Route::get('remove_provider/{provider_id}', ['as'=> 'remove_provider', 'uses' =>'UserController@remove_provider']);
Route::get('add_provider/{provider_id}', ['as'=> 'add_provider', 'uses' =>'UserController@add_provider']);
