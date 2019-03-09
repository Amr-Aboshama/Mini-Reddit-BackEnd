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


<<<<<<< HEAD
Route::delete('/delete/account', 'AccountSettingsController@deleteMyAccount');

Route::patch('/change/password', 'AccountSettingsController@changePassword');

Route::post('/followers', 'FollowingController@viewMyFollowers');

Route::post('/following', 'FollowingController@viewMyFollowing');

Route::post('/add/link', 'InteractingController@addNewLink');

Route::patch('/pin/post', 'InteractingController@pinAndUnPinPost');

Route::delete('/remove/link', 'InteractingController@removeLink');

Route::post('/blocked/users', 'PrivacyController@showMyBlockedUsers');

Route::post('/blocking/users', 'PrivacyController@blockOrUnblockUser');



=======
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
>>>>>>> bb848949e2d501e8ee169d431dccf6ce3d33dfe6
