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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/social')->name('home');

    Route::get('/social', 'WallController@index')->name('wall');
    
    Route::post('/tweet', 'TweetController@store')->name('tweet.store');
    Route::get('/tweet/{id}', 'TweetController@show')->name('tweet.show');
    Route::get('/tweets', 'TweetController@index');
    
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/{username}', 'UserController@show')->name('user.show');
    Route::get('/follow/{id}', 'UserController@follow')->name('follow');
    Route::get('/hashtag/{hashtag}', 'WallController@hashtag')->name('hashtag');
    Route::redirect('/#{hashtag}', '/hashtag/{hashtag}');
    Route::get('/@{username}', function ($username){
        return redirect()->route('user.show', ['username' => $username]);
    });
    
    Route::get('/like/{id}', 'TweetController@like')->name('like');
    
    Route::post('/comment/{id}', 'TweetController@comment')->name('comment.store');
    
});
