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

/**
 * The routes that manage creating an ideaspace
 * or joining one.
 */
Route::get('/start', 'GetStartedController@start');
Route::get('/org/{id}', 'OrganizationController@show');

Route::get('/', 'LandingController@home')->name('home');
Route::get('/about', 'LandingController@home')->name('about');
Route::get('/contact', 'LandingController@home')->name('contact');
Route::get('/faq', 'LandingController@home')->name('faq');
Route::get('/login', 'LandingController@home')->name('login');