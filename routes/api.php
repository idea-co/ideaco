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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users', 'UserController@store');
Route::put('/users/verify', 'UserController@verify');

Route::group(['prefix' => 'organizations'], function () {
    //post request call to /organizations
    Route::post('/', 'OrganizationController@store');
    // create team: {organizationId: organization's id}
    Route::post('/{organizationId}/teams', 'TeamController@store');
    // log in the admin (creator) to complete the onboarding process
    Route::post('/{organizationId}/admin/login', 'OrganizationController@firstLogin');
});

Route::post('organization/member/login', 'OrganizationUserController@login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('/organization/member/password', 'OrganizationUserController@passwordReset');
    Route::get('/organization/member', 'OrganizationUserController@index');
    Route::patch('/organization/member/display-name', 'OrganizationUserController@changeDisplayName');
    Route::post('/organization/member/logout', 'OrganizationUserController@logout');
});
