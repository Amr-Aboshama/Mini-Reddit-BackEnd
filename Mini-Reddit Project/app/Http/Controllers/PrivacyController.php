<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Privacy settings
 */

class PrivacyController extends Controller
{
    /**
     * Show current user blocklist
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
    public function showBlockedUsers()
    {
        // ...
    }


    /**
     *
     * Block a user
     * @authenticated
     * @bodyParam username string required the username of the user being blocked
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     * 	"success": "true",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "true",
     * 	"error": "Already blocked"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function blockUser()
    {
        // ...
    }

    /**
     *
     * Unblock a user
     * @authenticated
     * @bodyParam username string required the username of the user being unblocked
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     * 	"success": "true",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "true",
     * 	"error": "Already unblocked"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function unblockUser()
    {
        // ...
    }
}
