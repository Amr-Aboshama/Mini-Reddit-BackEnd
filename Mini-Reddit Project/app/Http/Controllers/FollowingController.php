<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

	/**
	 *@group all APIs concerned with following and unfollowing stuff are included
	*/

class FollowingController extends Controller
{
    /**
     * View User's Followers
     * @authenticated
     * @bodyParam username string required Username to show his followers
     * @response 200 {
     *  "success": "true",
     * 	"follwersList": ["John Smith"]
     * }
     *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
		public function viewUserFollowers()
		{
				// ...
		}

		/**
		 * View Who User is Following
		 * @authenticated
     * @bodyParam username string required Username to show his followering
	   * @response 200 {
     *  "success": "true",
	   * 	"follwingList": ["John Smith"]
	   * }
	   *
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
	   */
		public function viewUserFollowing()
		{
				// ...
		}

		/**
		 * Follow a user
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
		 */
		public function followUser()
		{

		}

		/**
		 * Unfollow a user
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
		 */
		public function unfollowUser()
		{

		}
}
