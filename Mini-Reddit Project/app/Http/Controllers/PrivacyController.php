<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blocking;
use App\Following;

/**
 * @group Privacy settings
 */
class PrivacyController extends Controller
{
    /**
     * Show current user blocklist.
     *
     * @authenticated
     * @response 200 {
     * 	"success": "true",
     * 	"blockedList": ["john-smith"]
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
    public function viewBlockedUsers()
    {
        try {
            $blocked_list = Blocking::getUsersBlockedByUsername(auth()->user()->username);
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }

        return response()->json([
            'success' => 'true',
            'blockedList' => $blocked_list,
        ]);
    }

    /**
     * Block a user.
     *
     * @authenticated
     * @bodyParam username string required the username of the user being blocked
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "Already blocked"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function blockUser(Request $request)
    {
        $current_username = auth()->user()->username;
        $block_username = $request->username;

        if (!User::userExist($block_username) || Blocking::checkBlock($block_username, $current_username)
            || $current_username == $block_username) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            if (Blocking::blockUser($current_username, $block_username)) {
                Following::deleteFollow($current_username, $block_username);
                Following::deleteFollow($block_username, $current_username);

                return response()->json([
                    'success' => 'true',
                ], 200);
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Already blocked',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }
    }

    /**
     * Unblock a user.
     *
     * @authenticated
     * @bodyParam username string required the username of the user being unblocked
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "Already unblocked"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function unblockUser(Request $request)
    {
        $current_username = auth()->user()->username;
        $unblock_username = $request->username;

        if (!User::userExist($unblock_username) || Blocking::checkBlock($unblock_username, $current_username)
            || $current_username == $unblock_username) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        try {
            if (Blocking::unblockUser($current_username, $unblock_username)) {
                return response()->json([
                    'success' => 'true',
                ], 200);
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Already unblocked',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
            ], 404);
        }
    }
}
