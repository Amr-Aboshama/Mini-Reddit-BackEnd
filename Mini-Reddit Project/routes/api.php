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

Route::post('/login','AuthenticationController@login');
Route::post('/signUp','AuthenticationController@signUp');
Route::post('/forgetPassword','AuthenticationController@forgetPassword');
Route::post('/resetPassword','AuthenticationController@resetPassword');
Route::post('/viewPrivateUserInfo','InformationController@viewPrivateUserInfo');
Route::post('/viewPublicUserInfo','InformationController@viewPublicUserInfo');
Route::post('/viewUserCommunities','CommunitiesController@viewUserCommunities');
Route::post('/hideOrUnhidePost','InteractingController@hideOrUnhidePost');
Route::post('/editAPost','InteractingController@editAPost');
Route::post('/editAComment','InteractingController@editAComment');
Route::post('/pinOrUnpinAPost','InteractingController@pinOrUnpinAPost');
Route::post('/addOrRemoveDownvotePost','InteractingController@addOrRemoveDownvotePost');
Route::post('/addOrRemoveDownvoteComment','InteractingController@addOrRemoveDownvoteComment');

Route::post('/viewAUserMessage','MessagesController@viewAUserMessage');
Route::post('/viewUserSentMessages','MessagesController@viewUserSentMessages');
Route::post('/viewUserInboxMessages','MessagesController@viewUserInboxMessages');
