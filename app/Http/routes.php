<?php

use App\Models\User;

Route::get('/', ['as' => 'home', function () {
    return view('pages.home');
}]);

//Must Be logged in:
Route::group(['middleware' => 'auth'], function () {


    //API routes:
    Route::group(['prefix' => 'api'], function () {
        Route::post('f', 'FriendController@find');
        Route::post('f/c', 'FriendController@connect');
        Route::delete('f/d', 'FriendController@delete');
    });
    //End API

    //Simple Friends Section:
    Route::group(['prefix' => 'friends'], function () {
        Route::get('/', ["as" => "friends", "uses" => 'FriendController@index']);
    });
    //End Simple Friends
    
    //Rate a movie Section:
    Route::get('rate', ['as' => 'rate', function() {
        return View::make('pages.rate');
    }]);

    Route::post('rate/save', 'RateController@newrating');
    //END Rate Movie

    //Profile Section
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', ['as' => 'profile', 'uses' => 'UserController@load_profile']);
        Route::post('save_data', ['uses' => 'UserController@save_profile']);

    });
    Route::get('remove_provider/{provider_id}', ['as'=> 'remove_provider', 'uses' =>'UserController@remove_provider']);
    Route::post('change_password', ['middleware' => 'auth', 'uses' => 'UserController@change_password']);
    //End Profile

});

// Authentication routes...
Route::get('login', ['as'=> 'login', 'uses'=> 'Auth\AuthController@getLogin']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', ['as'=> 'register', 'uses' =>'Auth\AuthController@getRegister']);
Route::post('register', 'Auth\AuthController@postRegister');


// Password reset link request routes...
Route::get('password/email', ['as'=> 'forgot_pw', 'uses' =>'Auth\PasswordController@getEmail']);
Route::post('password/email',  ['as'=> 'send_pw', 'uses' =>'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('oauth/connect/{provider_name}/{redir}',  ['as' => 'oauth.connect', 'uses' => 'Auth\OAauthController@connect']);
Route::get('oauth/callback/{provider_name}', ['as' => 'oauth.callback', 'uses' => 'Auth\OAauthController@callback']);


