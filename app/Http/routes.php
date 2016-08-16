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

Route::get('/', ['uses' => 'HomeController@index']);
// pass reset ---------------------------------
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
// Reg ----------------------------------------
Route::get('/registration', ['uses' => 'AuthController@getRegistration', 'middleware' => ['guest']]);
Route::post('/registration', ['uses' => 'AuthController@postRegistration', 'middleware' => ['guest']]);
Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'AuthController@confirm']);
//logout --------------------------------------
Route::get('/logout', ['uses' => 'AuthController@getLogout', 'middleware' => ['auth']]);
//login ---------------------------------------
Route::get('/login', ['uses' => 'AuthController@getLogin', 'middleware' => ['guest']]);
Route::post('/login', ['uses' => 'AuthController@postLogin', 'middleware' => ['guest']]);
Route::get('/branch/{id}', ['uses' => 'HomeController@show']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/branch/{id}/problem', ['uses' => 'ProblemController@show']);
    Route::post('/problem', ['uses' => 'ProblemController@create']);
});

Route::get('/search', ['uses' => 'ProblemController@search']);


Route::get('search/token', ['uses' => 'ProblemController@tokenSearch']);