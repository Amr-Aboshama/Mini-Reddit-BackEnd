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



Route::middleware('auth:api')->group(function () {
    Route::post('/auth/delete/account', 'AccountSettingsController@deleteMyAccount');
    Route::patch('/auth/change/password', 'AccountSettingsController@changePassword');
    Route::patch('/auth/updateDisplayName', 'AccountSettingsController@updateDisplayName');
    Route::patch('/auth/updateAbout', 'AccountSettingsController@updateAbout');
    Route::post('/auth/updateProfileImage', 'AccountSettingsController@updateProfileImage');
    Route::get('/auth/notification/check', 'NotificationController@checkNotification');
    Route::get('/auth/notification/push', 'NotificationController@pushNotification');
    Route::get('/auth/viewPrivateUserInfo', 'InformationController@viewPrivateUserInfo');
    Route::get('/auth/followers', 'FollowingController@viewUserFollowers');
    Route::get('/auth/following', 'FollowingController@viewUserFollowing');
    Route::post('/auth/follow', 'FollowingController@followUser');//
    Route::post('/auth/unfollow', 'FollowingController@unfollowUser');//*
    Route::get('/auth/viewUserMessage', 'MessagesController@viewUserMessage');
    Route::get('/auth/viewUserSentMessages', 'MessagesController@viewUserSentMessages');
    Route::get('/auth/viewUserInboxMessages', 'MessagesController@viewUserInboxMessages');
    Route::post('/auth/sendMessage', 'MessagesController@sendMessage');
    Route::post('/auth/signOut', 'AuthenticationController@signOut');
    Route::get('/auth/blockedUsers', 'PrivacyController@viewBlockedUsers');
    Route::post('/auth/blockUser', 'PrivacyController@blockUser');//
    Route::post('/auth/unblockUser', 'PrivacyController@unblockUser');//*
    Route::post('/auth/editCommunity', 'CommunitiesController@editCommunity');
    Route::post('/auth/createCommunity', 'CommunitiesController@createCommunity');
    Route::post('/auth/removeCommunity', 'CommunitiesController@removeCommunity');
    Route::post('/auth/addModerator', 'CommunitiesController@addModretorForCommunity');
    Route::post('/auth/removeModerator', 'CommunitiesController@removeModretorFromCommunity');
    Route::post('/auth/subscribeCommunity', 'CommunitiesController@subscribeCommunity'); //
    Route::post('/auth/unSubscribeCommunity', 'CommunitiesController@unsubscribeCommunity'); //*
    Route::post('/auth/saveLink', 'InteractingController@saveLink'); //
    Route::post('/auth/saveLink', 'InteractingController@unsaveLink'); //*
    Route::post('/auth/addLink', 'InteractingController@addNewLink');
    Route::patch('/auth/pinPost', 'InteractingController@pinOrUnpinPost');
    Route::post('/auth/removeLink', 'InteractingController@removeLink');//
    Route::post('/auth/hidePost', 'InteractingController@hidePost'); //
    Route::post('/auth/unhidePost', 'InteractingController@unhidePost');//
    Route::patch('/auth/editPost', 'InteractingController@editPost');
    Route::patch('/auth/editComment', 'InteractingController@editComment');
    Route::post('/auth/upvoteLink', 'InteractingController@upvoteLink');//
    Route::post('/auth/downvoteLink', 'InteractingController@downvoteLink');//*
    Route::get('/auth/viewUpOrDownvotedPosts', 'InteractingController@ViewUpVotedOrDownVotedPosts');
    Route::get('/auth/viewOverview', 'InteractingController@ViewOverview');
    Route::get('/auth/viewSavedLinks', 'InteractingController@ViewSavedLinks');
    Route::post('/auth/giveReward', 'InteractingController@giveReward');
    Route::post('/auth/uploadImage', 'InteractingController@uploadImage');
    Route::get('/auth/getUsername', 'InformationController@getUsername');
});


Route::get('/unauth/viewPublicUserInfo', 'InformationController@viewPublicUserInfo');
Route::get('/unauth/search', 'SearchingController@search');
Route::post('/unauth/signIn', 'AuthenticationController@signIn');
Route::post('/unauth/signUp', 'AuthenticationController@signUp');
Route::post('/unauth/forgetPassword', 'AuthenticationController@forgetPassword');
Route::post('/unauth/resetPassword', 'AuthenticationController@resetPassword');
Route::get('/unauth/viewUserCommunities', 'CommunitiesController@viewUserCommunities');
Route::get('/unauth/communityInformation', 'CommunitiesController@viewCommunityInformation');
Route::get('/unauth/ViewPosts', 'InteractingController@viewPosts');
Route::get('/unauth/viewComments', 'InteractingController@viewComments');
Route::get('/unauth/viewCommentsReplies', 'InteractingController@viewCommentsAndRepliesOfPostsAndComments');
Route::get('/unauth/viewSinglePost', 'InteractingController@viewSinglePost');
