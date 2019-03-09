<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
		/**
		 * Show current user blocklisted
		 * @authenticated
	   * @response 200 {
		 * 	"success": "true"
	   * 	"blockedList": ["John Smith"]
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
	   * @bodyParam username string required the username of the user being blocked
	   * @response 200 {
	   * 	"sucess": "true"
	   * }
	   *
	   *
     * @response 401 {
     * 	"error": "UnAuthorized"
     * }
	   */
		public function blockUser()
		{
		    // ...
		}

		/**
		 *
		 * Unblock a user
	   * @bodyParam username string required the username of the user being unblocked
	   * @response 200 {
	   * 	"succes": "true"
	   * }
	   *
	   *
     * @response 401 {
     * 	"error": "UnAuthorized"
     * }
	   */
		public function unblockUser()
		{
		    // ...
		}


		/**
	   * @bodyParam my_username string required the username of the current user
	   * @bodyParam token string required the token of the current user
	   * @bodyParam display_name string required the username of the user being un/blocked
	   * @response 200
	   */
		public function updateDisplayName()
		{
		    // ...
		}


		/**
	   * @bodyParam my_username string required the username of the current user
	   * @bodyParam token string required the token of the current user
	   * @bodyParam about string required the username of the user being un/blocked
	   * @response 200
	   */
		public function updateAbout()
		{
				// ...
		}
}
