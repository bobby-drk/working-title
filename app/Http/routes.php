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

Route::get('/', function () {

echo "&nbsp;logged in:";
if (Auth::check()) {
    echo "1<br />\n";
} else {
    echo "0<br />\n";

}

    return view('pages.home');
});

Route::get('profile', function()
{
    return View::make('pages.profile');
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