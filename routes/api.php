<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', 'UserController@store');
Route::put('/users/verify', 'UserController@verify');

Route::group(['prefix' => 'organizations'], function () {
    //post request call to /organizations
    Route::post('/', 'OrganizationController@store');
    // find an organization by shortname
    Route::get('/{shortname}/find', 'OrganizationController@show');
    // create team: {organizationId: organization's id}
    Route::post('/{organizationId}/teams', 'TeamController@store');
    // search for a member of an organization with email and organization id
    Route::post('/{organizationId}/members/search', 'OrganizationUserController@find');
    // Add member to an organization
    Route::post('/{organizationId}/members', 'OrganizationUserController@create');
    // Add member to an organization
    Route::get('/{organizationId}/members', 'OrganizationUserController@show');
    // log in the admin (creator) to complete the onboarding process
    Route::post('/{organizationId}/admin/login', 'OrganizationUserController@firstLogin');
    //log in a user to a workspace
    Route::post('/{organizationId}/login', 'OrganizationUserController@login');

    Route::group(['prefix' => '/{organizationId}/ideas','middleware'=>['auth:sanctum']], function () {
        Route::post('/', 'IdeaController@store');
        Route::patch('/archive', 'IdeaController@archive');
        Route::get('{id}', 'IdeaController@show');
        Route::post('{id}/vote', 'IdeaController@upVote');
        Route::delete('{id}/vote', 'IdeaController@downVote');
        Route::patch('/{idea}/implement', 'IdeaController@implement');
        Route::patch('/{idea}', 'IdeaController@update');
        Route::get('/author/{author}', 'IdeaController@findByAuthor');
        Route::post('/{idea}/comments','IdeaController@comment');
    });
});

Route::group(['middleware' => ['auth:sanctum'],'prefix'=> 'organizations' ], function () {
    Route::patch('/members/password', 'OrganizationUserController@passwordReset');
    Route::get('/members', 'OrganizationUserController@index');
    Route::patch('/members/display-name', 'OrganizationUserController@changeDisplayName');
    Route::post('/members/logout', 'OrganizationUserController@logout');
});
