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
    Route::post('/{organizationId}/admin/login', 'OrganizationController@firstLogin');
});


Route::post('OrganizationUser/login', 'OrganizationUserController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/OrganizationUser/changePassword', 'OrganizationUserController@passwordReset');
    Route::get('/OrganizationUser/index', 'OrganizationUserController@index');
    Route::post('/OrganizationUser/changeDisplayName', 'OrganizationUserController@changeDisplayName');
    Route::post('/OrganizationUser/logout', 'OrganizationUserController@logout');
});
