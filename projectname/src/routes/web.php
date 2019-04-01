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

//Route::post('user', 'User\UserController@updateUser');



//Route::post('/upload', 'HomeController@upload');

//Route::get('/logout','Auth\LoginController@logout')->name('logout');


//Picinstでの使われているファイル

Route::get('', 'Picinst\HomeController@index');
Route::post('/', 'Picinst\HomeController@search');

Route::post('/create', 'Picinst\CreateController@create');
Route::get('/CreatePost', 'Picinst\CreateController@CreatePost');
Route::get('/delete', 'Picinst\CreateController@delete');
Route::get('/good', 'Picinst\HomeController@good');
Route::get('/GoodList', 'Picinst\HomeController@GoodList');

//編集に使うURL
Route::get('/Edit', 'Picinst\CreateController@Edit');
Route::post('/EditPost', 'Picinst\CreateController@EditPost');

Route::get('/loginpage','Picinst\HomeController@Login');
Route::get('Profile','Picinst\ProfileController@index');
Route::get('User_Profile','Picinst\ProfileController@user_profile');

//ログイン時
Route::get('github', 'Github\GithubController@top');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
