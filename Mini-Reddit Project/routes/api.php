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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/search','SearchingController@search');


Route::delete('/delete/account', 'AccountSettingsController@deleteMyAccount');
Route::patch('/change/password', 'AccountSettingsController@changePassword');


Route::post('/viewPrivateUserInfo','InformationController@viewPrivateUserInfo');
Route::post('/viewPublicUserInfo','InformationController@viewPublicUserInfo');


Route::get('/followers', 'FollowingController@viewUserFollowers');
Route::get('/following', 'FollowingController@viewUserFollowing');
Route::post('/follow', 'FollowingController@followUser');//
Route::delete('/follow', 'FollowingController@unfollowUser');//*


Route::post('/viewAUserMessage','MessagesController@viewAUserMessage');
Route::post('/viewUserSentMessages','MessagesController@viewUserSentMessages');
Route::post('/viewUserInboxMessages','MessagesController@viewUserInboxMessages');
Route::post('/sendMessage','MessagesController@sendMessage');


Route::post('/login','AuthenticationController@login');
Route::post('/signUp','AuthenticationController@signUp');
Route::post('/forgetPassword','AuthenticationController@forgetPassword');
Route::post('/resetPassword','AuthenticationController@resetPassword');


Route::get('/blocked/users', 'PrivacyController@showBlockedUsers');
Route::post('/blocking/users', 'PrivacyController@blockUser');//
Route::delete('/blocking/users', 'PrivacyController@unblockUser');//*
Route::patch('/update/display/name', 'PrivacyController@updateDisplayName');
Route::patch('/update/about', 'PrivacyController@updateAbout');


Route::post('/viewUserCommunities','CommunitiesController@viewUserCommunities');
Route::get('/communityRules','CommunitiesController@viewCommunitiesRulesDesc');
Route::patch('/editCommunity','CommunitiesController@editCommunity');
Route::post('/createCommunity','CommunitiesController@createCommunity');
Route::delete('/removeCommunity','CommunitiesController@removeCommunity');
Route::post('/addModerator','CommunitiesController@addModretorForCommunity');
Route::delete('/removeModerator','CommunitiesController@removeModretorFromCommunity');
Route::post('/subscribeCommunity','CommunitiesController@subscribeCommunity'); //
Route::delete('/subscribeCommunity','CommunitiesController@unsubscribeCommunity'); //*


Route::post('/saveLink','InteractingController@saveLink'); //
Route::delete('/saveLink','InteractingController@unsaveLink'); //*
Route::post('/add/link', 'InteractingController@addNewLink');
Route::patch('/pin/post', 'InteractingController@pinOrUnpinPost');
Route::delete('/remove/link', 'InteractingController@removeLink');
Route::post('/hidePost','InteractingController@hidePost'); //
Route::delete('/hidePost','InteractingController@unhidePost');//*
Route::post('/editAPost','InteractingController@editAPost');
Route::post('/editAComment','InteractingController@editAComment');
Route::post('/downVotePost','InteractingController@addDownvotePost');//
Route::delete('/downVotePost','InteractingController@removeDownvotePost');//*
Route::post('/downVoteComment','InteractingController@addDownvoteComment');//
Route::delete('/downVoteComment','InteractingController@removeDownvoteComment');//*
Route::post('/upVotePost','InteractingController@addUpvotePost');//
Route::delete('/upVotePost','InteractingController@removeUpvotePost');//*
Route::post('/upVoteComment','InteractingController@addUpvoteComment');//
Route::delete('/upVoteComment','InteractingController@removeUpvoteComment');//*
