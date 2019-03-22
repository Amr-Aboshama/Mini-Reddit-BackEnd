<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Notification
 */

class NotificationController extends Controller
{
    /**
     * Check if there are new notifications fo the current user
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "number": 15
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function checkNotification()
    {
        // code...
    }


    /**
     * Return last 20 notifications for the current user
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "notifications": ["John has followed you",
     *    "Smith has posted a new post on his profile",
     *    "Mathew has posted a new post in BackEnd community",
     *    "Sam has mentioned you"]
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function pushNotification()
    {
        // code...
    }
}
