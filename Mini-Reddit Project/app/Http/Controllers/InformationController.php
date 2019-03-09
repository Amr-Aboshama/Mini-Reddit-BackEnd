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
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "username": "john",
     *  "karma":500,
     *  "cake_day":"March 8, 2019",
     *  "about":"be or not to be"
     * }
     *
     * @response 401 {
     *  "success": "false"
     * 	"error": "UnAuthorized"
     * }
     */
  	public function viewPublicUserInfo()
    {
        // ...
  	}
}
