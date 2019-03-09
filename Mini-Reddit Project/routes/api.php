<?php

use Illuminate\Http\Request;

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

Route::get('/search','SearchingController@search');
Route::post('/sendMsg','MessagesController@sendMsg');
Route::get('/commRules','CommunitiesController@viewCommRulesDesc');
Route::patch('/editComm','CommunitiesController@editComm');
Route::post('/createComm','CommunitiesController@createComm');
Route::delete('/removeComm','CommunitiesController@removeComm');
Route::patch('/addModerator','CommunitiesController@addModretorForComm');
Route::patch('/removeModerator','CommunitiesController@removeModretorFromComm');
Route::patch('/subscriptionComm','CommunitiesController@subscriptionComm');
Route::patch('/savingLink','InteractingController@savingLink');