<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("drinks", "App\Http\Controllers\DrinksController@index");
//http://localhost/kadai/public/drinks

Route::get("requestForm", "App\Http\Controllers\RequestFormController@form");

Route::post("showRequest", "App\Http\Controllers\RequestFormController@postRequest");

Route::get("showRequest", "App\Http\Controllers\RequestFormController@getRequest");

Route::get("showAllRequest", "App\Http\Controllers\RequestFormController@showAllRequest");

Route::get("session/save", "App\Http\Controllers\DrinksController@saveSession");

Route::get("session/show", "App\Http\Controllers\DrinksController@showSession");

Route::get("session/inputMessage", "App\Http\Controllers\SessionController@inputMessage");

Route::post("session/setSession", "App\Http\Controllers\SessionController@setSession");

Route::get("drinks/create", "App\Http\Controllers\DrinksController@create");

Route::post("drinks/store", "App\Http\Controllers\DrinksController@store");

Route::get("drinks", "App\Http\Controllers\DrinksController@index");

Route::get("drinks/edit/{id}", "App\Http\Controllers\DrinksController@edit");

Route::post("drinks/update/{id}", "App\Http\Controllers\DrinksController@update");

Route::post("drinks/delete/{id}", "App\Http\Controllers\DrinksController@delete");