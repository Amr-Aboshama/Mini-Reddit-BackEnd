<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Account settings
 */
class AccountSettingsController extends Controller
{
    /**
     * Delete current user account
     * @authenticated
     * @bodyParam password string required the password of te current user
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
     * 	"error": "password isn't correct"
     * }
     */
		public function deleteMyAccount()
		{
		    // ...
		}


		/**
		 * Change current user password
     * @bodyParam password string required the current password of the current user
     * @bodyParam new_password string required the new password of the current user
     * @bodyParam confirm_new_password string required the new password of the current user
     * @authenticated
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 404 {
     * 	"success": "false",
     * 	"error": "new password doesn't match the confirmation"
     * }
     *
     * @response 404 {
     * 	"success": "false",
     * 	"error": "wrong old passwords"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
		public function changePassword()
		{
		    // ...
		}


		/**
		 * Update current user Displayed Name
		 * @authenticated
	   * @bodyParam name string required The new name of user to update.
	   * @response 200 {
	   * 	"success": "true"
	   * }
	   *
     * @response 401 {
	   * 	"sucess": "true",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "user must have a name"
     * }
	   */
		public function updateDisplayName()
		{
		    // ...
		}


		/**
		 * Update current user About
		 * @authenticated
	   * @bodyParam about string required the content of about to be updated to
	   * @response 200 {
	   * 	"success": "true"
	   * }
	   *
     * @response 401 {
	   * 	"sucess": "true",
     * 	"error": "UnAuthorized"
     * }
     *
	   */
		public function updateAbout()
		{
				// ...
		}

		/**
		 * Update user profile image
		 * @authenticated
		 * @bodyParam profile_image file required User's new profile image.
		 *
		 * @response 200 {
		 * 	"success": "true",
		 * 	"path": "sotrage/app/avatar.jpg"
		 * }
		 *
		 * @response 401 {
		 * 	"sucess": "false",
		 * 	"error": "UnAuthorized"
		 * }
		 *
		 * @response 401 {
		 * 	"sucess": "false",
		 * 	"error": "Unsupported media type"
		 * }
		 *
		 * @response 400 {
		 * 	"sucess": "false",
		 * 	"error": "Cannot upload the image"
		 * }
		 */
		public function updateProfileImage()
		{
			// code...
		}
}
