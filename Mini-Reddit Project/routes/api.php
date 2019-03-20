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


//     return $request->user();
// });


Route::middleware('auth:api')->group(function ()
{
  Route::delete('/auth/delete/account', 'AccountSettingsController@deleteMyAccount');
  Route::patch('/auth/change/password', 'AccountSettingsController@changePassword');
  Route::patch('/auth/updateDisplayName', 'AccountSettingsController@updateDisplayName');
  Route::patch('/auth/updateAbout', 'AccountSettingsController@updateAbout');
  Route::patch('/auth/updateProfileImage', 'AccountSettingsController@updateProfileImage');
  Route::get('/auth/notification/check', 'NotificationController@checkNotification');
  Route::get('/auth/notification/push', 'NotificationController@pushNotification');
  Route::get('/auth/viewPrivateUserInfo','InformationController@viewPrivateUserInfo');
  Route::get('/auth/viewPublicUserInfo','InformationController@viewPublicUserInfo');
  Route::get('/auth/viewAvatar' , 'InformationController@GetAvatar');
  Route::get('/auth/followers', 'FollowingController@viewUserFollowers');
  Route::get('/auth/following', 'FollowingController@viewUserFollowing');
  Route::post('/auth/follow', 'FollowingController@followUser');//
  Route::delete('/auth/follow', 'FollowingController@unfollowUser');//*
  Route::get('/auth/viewUserMessage','MessagesController@viewUserMessage');
  Route::get('/auth/viewUserSentMessages','MessagesController@viewUserSentMessages');
  Route::get('/auth/viewUserInboxMessages','MessagesController@viewUserInboxMessages');
  Route::post('/auth/sendMessage','MessagesController@sendMessage');
  Route::post('/auth/signOut', 'AuthenticationController@signOut');
  Route::get('/auth/blockedUsers', 'PrivacyController@showBlockedUsers');
  Route::post('/auth/blockingUsers', 'PrivacyController@blockUser');//
  Route::delete('/auth/blockingUsers', 'PrivacyController@unblockUser');//*
  Route::patch('/auth/editCommunity','CommunitiesController@editCommunity');
  Route::post('/auth/createCommunity','CommunitiesController@createCommunity');
  Route::delete('/auth/removeCommunity','CommunitiesController@removeCommunity');
  Route::post('/auth/addModerator','CommunitiesController@addModretorForCommunity');
  Route::delete('/auth/removeModerator','CommunitiesController@removeModretorFromCommunity');
  Route::post('/auth/subscribeCommunity','CommunitiesController@subscribeCommunity'); //
  Route::delete('/auth/unSubscribeCommunity','CommunitiesController@unsubscribeCommunity'); //*
  Route::post('/auth/saveLink','InteractingController@saveLink'); //
  Route::delete('/auth/saveLink','InteractingController@unsaveLink'); //*
  Route::post('/auth/addLink', 'InteractingController@addNewLink');
  Route::patch('/auth/pinPost', 'InteractingController@pinOrUnpinPost');
  Route::delete('/auth/removeLink', 'InteractingController@removeLink');
  Route::post('/auth/hidePost','InteractingController@hidePost'); //
  Route::delete('/auth/hidePost','InteractingController@unhidePost');//*
  Route::patch('/auth/editPost','InteractingController@editPost');
  Route::patch('/auth/editComment','InteractingController@editComment');
  Route::post('/auth/downvoteLink','InteractingController@downvoteLink');//
  Route::delete('/auth/removeDownVotePost','InteractingController@removeDownvotePost');//*
  Route::post('/auth/downVoteComment','InteractingController@addDownvoteComment');//
  Route::delete('/auth/removeDownVoteComment','InteractingController@removeDownvoteComment');//*
  Route::post('/auth/upVotePost','InteractingController@addUpvotePost');//
  Route::delete('/auth/upVotePost','InteractingController@removeUpvotePost');//*
  Route::post('/auth/upVoteComment','InteractingController@addUpvoteComment');//
  Route::delete('/auth/upVoteComment','InteractingController@removeUpvoteComment');//*
  Route::get('/auth/viewComments','InteractingController@viewComments');
  Route::get('/auth/viewUpOrDownvotedPosts', 'InteractingController@ViewUpVotedOrDownVotedPosts');
  Route::get('/auth/viewOverview' , 'InteractingController@ViewOverview');
  Route::get('/auth/viewSavedLinks' , 'InteractingController@ViewSavedLinks');
  Route::post('/auth/giveReward', 'InteractingController@giveReward');
  Route::post('/auth/uploadImage', 'InteractingController@uploadImage');
  Route::get('/auth/getUsername', 'InformationController@getUsername');

});

Route::get('/unauth/search','SearchingController@search');
Route::post('/unauth/signIn','AuthenticationController@signIn');
Route::post('/unauth/signUp','AuthenticationController@signUp');
Route::post('/unauth/forgetPassword','AuthenticationController@forgetPassword');
Route::post('/unauth/resetPassword','AuthenticationController@resetPassword');
Route::get('/unauth/viewUserCommunities','CommunitiesController@viewUserCommunities');
Route::get('/unauth/communityRules','CommunitiesController@viewCommunitiesRulesDesc');
Route::get('/unauth/ViewPosts','InteractingController@viewPosts');
Route::get('/unauth/viewCommentsReplies' , 'InteractingController@viewCommentsAndRepliesOfPostsAndComments');
Route::get('/unauth/viewSinglePost' , 'InteractingController@viewSinglePost');
