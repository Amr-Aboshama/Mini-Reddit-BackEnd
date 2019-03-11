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

// Route::middleware('auth:api')->get('/auth/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/unauth/search','SearchingController@search');



Route::delete('/auth/delete/account', 'AccountSettingsController@deleteMyAccount');
Route::patch('/auth/change/password', 'AccountSettingsController@changePassword');

<<<<<<< HEAD
Route::post('/viewPrivateUserInfo','InformationController@viewPrivateUserInfo');
Route::post('/viewPublicUserInfo','InformationController@viewPublicUserInfo');


Route::post('/followers', 'FollowingController@viewUserFollowers');
Route::post('/following', 'FollowingController@viewUserFollowing');
Route::post('/follow', 'FollowingController@followUser');//
Route::delete('/follow', 'FollowingController@unfollowUser');//*


Route::post('/viewAUserMessage','MessagesController@viewAUserMessage');
Route::post('/viewUserSentMessages','MessagesController@viewUserSentMessages');
Route::post('/viewUserInboxMessages','MessagesController@viewUserInboxMessages');
Route::post('/sendMessage','MessagesController@sendMessage');
=======


Route::get('/auth/notification/check', 'NotificationController@checkNotification');
Route::get('/auth/notification/push', 'NotificationController@pushNotification');


>>>>>>> 7a681776c4d7f93217f19ae2aa9a9e2de05350ec

Route::get('/auth/viewPrivateUserInfo','InformationController@viewPrivateUserInfo');
Route::get('/auth/viewPublicUserInfo','InformationController@viewPublicUserInfo');



<<<<<<< HEAD
Route::post('/blocked/users', 'PrivacyController@showBlockedUsers');
Route::post('/blocking/users', 'PrivacyController@blockUser');//
Route::delete('/blocking/users', 'PrivacyController@unblockUser');//*
Route::patch('/update/display/name', 'PrivacyController@updateDisplayName');
Route::patch('/update/about', 'PrivacyController@updateAbout');
=======
Route::get('/auth/followers', 'FollowingController@viewUserFollowers');
Route::get('/auth/following', 'FollowingController@viewUserFollowing');
Route::post('/auth/follow', 'FollowingController@followUser');//
Route::delete('/auth/follow', 'FollowingController@unfollowUser');//*
>>>>>>> 7a681776c4d7f93217f19ae2aa9a9e2de05350ec


<<<<<<< HEAD
Route::post('/viewUserCommunities','CommunitiesController@viewUserCommunities');
Route::get('/communityRules','CommunitiesController@viewCommunitiesRulesDesc');
Route::patch('/editCommunity','CommunitiesController@editCommunity');
Route::post('/createCommunity','CommunitiesController@createCommunity');
Route::delete('/removeCommunity','CommunitiesController@removeCommunity');
Route::post('/addModerator','CommunitiesController@addModretorForCommunity');
Route::delete('/removeModerator','CommunitiesController@removeModretorFromCommunity');
Route::post('/subscribeCommunity','CommunitiesController@subscribeCommunity'); //
Route::delete('/subscribeCommunity','CommunitiesController@unsubscribeCommunity'); //*
=======
>>>>>>> 7a681776c4d7f93217f19ae2aa9a9e2de05350ec

Route::get('/auth/viewUserMessage','MessagesController@viewUserMessage');
Route::get('/auth/viewUserSentMessages','MessagesController@viewUserSentMessages');
Route::get('/auth/viewUserInboxMessages','MessagesController@viewUserInboxMessages');
Route::post('/auth/sendMessage','MessagesController@sendMessage');


<<<<<<< HEAD
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
Route::get('/viewPosts','InteractingController@viewPosts');
Route::get('/viewComments','InteractingController@viewComments');
Route::get('/viewCommentsReplies' , 'InteractingController@ViewComments_RepliesOfPosts_Comments');
Route::get('/viewUpOrDownvotedPosts', 'InteractingController@ViewUpVotedOrDownVotedPosts');
Route::get('/viewOverview' , 'InteractingController@ViewOverview');
Route::get('viewSavedLinks' , 'InteractingController@ViewSavedLinks');
=======
>>>>>>> 7a681776c4d7f93217f19ae2aa9a9e2de05350ec

Route::post('/unauth/login','AuthenticationController@login');
Route::post('/unauth/signUp','AuthenticationController@signUp');
Route::post('/unauth/forgetPassword','AuthenticationController@forgetPassword');
Route::post('/unauth/resetPassword','AuthenticationController@resetPassword');



Route::get('/auth/blockedUsers', 'PrivacyController@showBlockedUsers');
Route::post('/auth/blockingUsers', 'PrivacyController@blockUser');//
Route::delete('/auth/blockingUsers', 'PrivacyController@unblockUser');//*
Route::patch('/auth/updateDisplayName', 'PrivacyController@updateDisplayName');
Route::patch('/auth/updateAbout', 'PrivacyController@updateAbout');



Route::get('/unauth/viewUserCommunities','CommunitiesController@viewUserCommunities');
Route::get('/unauth/communityRules','CommunitiesController@viewCommunitiesRulesDesc');
Route::patch('/auth/editCommunity','CommunitiesController@editCommunity');
Route::post('/auth/createCommunity','CommunitiesController@createCommunity');
Route::delete('/auth/removeCommunity','CommunitiesController@removeCommunity');
Route::post('/auth/addModerator','CommunitiesController@addModretorForCommunity');
Route::delete('/auth/removeModerator','CommunitiesController@removeModretorFromCommunity');
Route::post('/auth/subscribeCommunity','CommunitiesController@subscribeCommunity'); //
Route::delete('/auth/subscribeCommunity','CommunitiesController@unsubscribeCommunity'); //*



Route::post('/auth/saveLink','InteractingController@saveLink'); //
Route::delete('/auth/saveLink','InteractingController@unsaveLink'); //*
Route::post('/auth/addLink', 'InteractingController@addNewLink');
Route::patch('/auth/pinPost', 'InteractingController@pinOrUnpinPost');
Route::delete('/auth/removeLink', 'InteractingController@removeLink');
Route::post('/auth/hidePost','InteractingController@hidePost'); //
Route::delete('/auth/hidePost','InteractingController@unhidePost');//*
Route::patch('/auth/editPost','InteractingController@editPost');
Route::patch('/auth/editComment','InteractingController@editComment');
Route::post('/auth/downVotePost','InteractingController@addDownvotePost');//
Route::delete('/auth/downVotePost','InteractingController@removeDownvotePost');//*
Route::post('/auth/downVoteComment','InteractingController@addDownvoteComment');//
Route::delete('/auth/downVoteComment','InteractingController@removeDownvoteComment');//*
Route::post('/auth/upVotePost','InteractingController@addUpvotePost');//
Route::delete('/auth/upVotePost','InteractingController@removeUpvotePost');//*
Route::post('/auth/upVoteComment','InteractingController@addUpvoteComment');//
Route::delete('/auth/upVoteComment','InteractingController@removeUpvoteComment');//*
Route::get('/unauth/ViewPosts','InteractingController@viewPosts');
Route::get('/auth/viewComments','InteractingController@viewComments');
Route::get('/unauth/viewCommentsReplies' , 'InteractingController@viewCommentsAndRepliesOfPostsAndComments');
Route::get('/auth/viewUpOrDownvotedPosts', 'InteractingController@ViewUpVotedOrDownVotedPosts');
Route::get('/auth/viewOverview' , 'InteractingController@ViewOverview');
Route::get('/auth/viewSavedLinks' , 'InteractingController@ViewSavedLinks');
Route::post('/auth/giveReward', 'InteractingController@giveReward');
