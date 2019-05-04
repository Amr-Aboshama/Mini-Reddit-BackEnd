<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Following;
use App\Blocking;
use App\PushNotification;

/**
 * @group Following
 */
class FollowingController extends Controller
{
    /**
     * View User's Followers.
     *
     * @authenticated
     * @bodyParam username string required Username to show his followers
     * @response 200 {
     *  "success": "true",
     * 	"follwersList": ["john-smith"]
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function viewUserFollowers(Request $request)
    {
        $current_username = auth()->user()->username;
        $username = $request->username;

        if (!User::userExist($username) || Blocking::blockedOrBlocker($current_username, $username)) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            $followers_list = Following::getUserFollowers($username, $current_username);
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }

        return response()->json([
            'success' => 'true',
            'follwersList' => $followers_list,
        ], 200);
    }

    /**
     * View Who User is Following.
     *
     * @authenticated
     * @bodyParam username string required Username to show his followering
     * @response 200 {
     *  "success": "true",
     * 	"follwingList": ["john_smith", "john-kay"]
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function viewUserFollowing(Request $request)
    {
        $current_username = auth()->user()->username;
        $username = $request->username;
        if (!User::userExist($username) || Blocking::blockedOrBlocker($current_username, $username)) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            $following_list = Following::getUserFollowing($username, $current_username);
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }

        return response()->json([
            'success' => 'true',
            'followingList' => $following_list,
        ], 200);
    }

    /**
     * Follow a user.
     *
     * @authenticated
     * @bodyParam username string required Username Want to follow.
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "Already following"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function followUser(Request $request)
    {
        $current_username = auth()->user()->username;
        $follow_username = $request->username;

        if (!User::userExist($follow_username) || Blocking::blockedOrBlocker($current_username, $follow_username)
              || $current_username == $follow_username) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            if (Following::createFollow($current_username, $follow_username)) {
                // sending notification to the followed user.....
                PushNotification::sendNotificationToSpecificUsers("'$current_username' has followed you", [$follow_username]);

                return response()->json([
                    'success' => 'true',
                ], 200);
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Already following',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }
    }

    /**
     * Unfollow a user.
     *
     * @authenticated
     * @bodyParam username string required Username Want to unfollow.
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "Already unfollowing"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function unfollowUser(Request $request)
    {
        $current_username = auth()->user()->username;
        $unfollow_username = $request->username;

        if (!User::userExist($unfollow_username) || Blocking::blockedOrBlocker($current_username, $unfollow_username)
              || $current_username == $unfollow_username) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            if (Following::deleteFollow($current_username, $unfollow_username)) {
                return response()->json([
                    'success' => 'true',
                ], 200);
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Already unfollowing',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }
    }
}
