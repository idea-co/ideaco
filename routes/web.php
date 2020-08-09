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

/**
 * The routes that manage creating an ideaspace
 * or joining one.
 */
Route::get('/start', 'GetStartedController@start');
Route::get('/org/{id}', 'OrganizationController@show');