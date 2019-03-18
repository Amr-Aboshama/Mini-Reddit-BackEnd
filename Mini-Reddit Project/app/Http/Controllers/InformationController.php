<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group User Information
 */


class InformationController extends Controller
{

    /**
     * Show user's private information
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "email": "john_bb@gmail"
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
    public function viewPrivateUserInfo()
    {
        // ...
  	}

  	/**
     *
     * Show user's public information
     * @bodyParam username string required username to show his public info
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "username": "john",
     *  "name": "John Smith",
     *  "karma":500,
     *  "cake_day":"March 8, 2019",
     *  "about":"be or not to be",
     *  "photo_path" : "storage/app/avater.jpg"
     *
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
  	public function viewPublicUserInfo()
    {
        // ...
    }
    
     /**
     * Show user's username
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "username": "john"
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
    public function getUsername()
    {
        return response()->json([
            'success'=>'true',
            'username' => auth()->user()->user_name
            ]);
    }
}
