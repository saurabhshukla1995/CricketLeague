<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('teams', 'Admin\TeamsController');
    Route::resource('players', 'Admin\PlayersController');
    Route::resource('matches', 'Admin\MatchesController');
    Route::resource('results', 'Admin\ResultsController');
    Route::post('getData/{id}', 'Admin\PlayersController@getData');
});

Route::get('teams', 'Home\TeamsController@index');
Route::get('players', 'Home\PlayersController@index');
Route::get('matches', 'Home\MatchesController@index');
Route::get('results', 'Home\ResultsController@index');
Route::post('getData/{id}', 'Home\PlayersController@getData');