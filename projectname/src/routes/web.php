<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user','UserController@index');
Route::get('/bbs','BbsController@index');
Route::post('/bbs','BbsController@create');

Route::get('/blue','BlueController@index');
Route::post('/blue','BlueController@create');

Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('user', 'User\UserController@updateUser');

Route::get('/', 'Picinst\HomeController@index');
Route::get('/CreatePost', 'Picinst\HomeController@CreatePost');


//Route::post('/upload', 'HomeController@upload');

//Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('logout','Auth\LoginController@logout');
//Route::get('login/logout','logoutController@postLogout');
//Route::get('/logout', 'LogoutController@index');
