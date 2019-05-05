<?php

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

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->middleware('auth:api')->group(function () {
        Route::post('/deleteMyAccount', 'AccountSettingsController@deleteMyAccount');
        Route::patch('/changePassword', 'AccountSettingsController@changePassword');
        Route::patch('/updateDisplayName', 'AccountSettingsController@updateDisplayName');
        Route::patch('/updateAbout', 'AccountSettingsController@updateAbout');
        Route::post('/updateCoverAndProfileImage', 'AccountSettingsController@updateCoverAndProfileImage');
        Route::get('/checkNotification', 'NotificationController@checkNotification');
        Route::get('/pushNotification', 'NotificationController@pushNotification');
        Route::get('/viewPrivateUserInfo', 'InformationController@viewPrivateUserInfo');
        Route::get('/followers', 'FollowingController@viewUserFollowers');
        Route::get('/following', 'FollowingController@viewUserFollowing');
        Route::post('/follow', 'FollowingController@followUser');
        Route::post('/unfollow', 'FollowingController@unfollowUser');
        Route::get('/viewUserMessage', 'MessagesController@viewUserMessage');
        Route::get('/viewUserSentMessages', 'MessagesController@viewUserSentMessages');
        Route::get('/viewUserInboxMessages', 'MessagesController@viewUserInboxMessages');
        Route::post('/sendMessage', 'MessagesController@sendMessage');
        Route::post('/signOut', 'AuthenticationController@signOut');
        Route::get('/blockedUsers', 'PrivacyController@viewBlockedUsers');
        Route::post('/blockUser', 'PrivacyController@blockUser');
        Route::post('/unblockUser', 'PrivacyController@unblockUser');
        Route::post('/editCommunity', 'CommunitiesController@editCommunity');
        Route::post('/createCommunity', 'CommunitiesController@createCommunity');
        Route::post('/removeCommunity', 'CommunitiesController@removeCommunity');
        Route::post('/addModerator', 'CommunitiesController@addModretorForCommunity');
        Route::post('/removeModerator', 'CommunitiesController@removeModretorFromCommunity');
        Route::post('/subscribeCommunity', 'CommunitiesController@subscribeCommunity');
        Route::post('/unSubscribeCommunity', 'CommunitiesController@unsubscribeCommunity');
        Route::post('/saveLink', 'InteractingController@saveLink');
        Route::post('/unsaveLink', 'InteractingController@unsaveLink');
        Route::post('/addLink', 'InteractingController@addNewLink');
        Route::patch('/pinPost', 'InteractingController@pinOrUnpinPost');
        Route::post('/removeLink', 'InteractingController@removeLink');
        Route::post('/hidePost', 'InteractingController@hidePost');
        Route::post('/unhidePost', 'InteractingController@unhidePost');
        Route::patch('/editPost', 'InteractingController@editPost');
        Route::patch('/editComment', 'InteractingController@editComment');
        Route::post('/upvoteLink', 'InteractingController@upvoteLink');
        Route::post('/downvoteLink', 'InteractingController@downvoteLink');
        Route::get('/viewUpOrDownvotedPosts', 'InteractingController@ViewUpVotedOrDownVotedPosts');
        Route::get('/viewSavedLinks', 'InteractingController@ViewSavedLinks');
        Route::get('/viewHiddenPosts', 'InteractingController@viewHiddenPosts');
        Route::post('/uploadImage', 'InteractingController@uploadImage');
        Route::get('/getUsername', 'InformationController@getUsername');
    });

    Route::prefix('unauth')->group(function () {
        Route::get('/viewOverview', 'InteractingController@ViewOverview');
        Route::get('/viewPublicUserInfo', 'InformationController@viewPublicUserInfo');
        Route::get('/search', 'SearchingController@search');
        Route::post('/signIn', 'AuthenticationController@signIn');
        Route::post('/signUp', 'AuthenticationController@signUp');
        Route::post('/forgetPassword', 'AuthenticationController@forgetPassword');
        Route::post('/resetPassword/{hash}', 'AuthenticationController@resetPassword');
        Route::get('/viewModerators', 'CommunitiesController@viewModeratorsCommunity');
        Route::get('/viewUserCommunities', 'CommunitiesController@viewUserCommunities');
        Route::get('/communityInformation', 'CommunitiesController@viewCommunityInformation');
        Route::get('/ViewPosts', 'InteractingController@viewPosts');
        Route::get('/viewComments', 'InteractingController@viewComments');
        Route::get('/viewCommentsReplies', 'InteractingController@viewCommentsAndRepliesOfPostsAndComments');
        Route::get('/viewSinglePost', 'InteractingController@viewSinglePost');
    });
});
