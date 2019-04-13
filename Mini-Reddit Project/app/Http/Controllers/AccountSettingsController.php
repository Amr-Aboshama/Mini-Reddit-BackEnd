<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\User;
use Validator;

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
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([

                "success" => "false",
                "error" => "UnAuthorized"
            ], 401);
        } elseif ($request->password == '' || !$request->has('password') ||
            ! User::checkIfPasswordRight($user->username, $request->password)) {
            return response()->json([

                "success" => "false",
                "error" => "wrong old passwords"

            ], 404);
        } elseif (strcmp($request->new_password, $request->confirm_new_password) ||
            $request->new_password == '' || !$request->has('new_password') ||
            $request->confirm_new_password == '' || !$request->has('confirm_new_password')) {
            return response()->json([

                "success" => "false",
                "error" => "new password doesn't match the confirmation"

            ], 404);
        } elseif (user::changeUserPassword($user->username, $request->new_password)) {
            return response()->json([
                'success' => 'true'
            ], 200);
        }
    }


    /**
     * Update current user Displayed Name
     * @authenticated
     * @bodyParam name string required The new name of user to update.
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 400 {
     *  "success": "false",
     *  "error": "you are trying to update with the old value"
     * }
     *
     * @response 401 {
     *
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "user must have a name"
     * }
     */
    public function updateDisplayName(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([

                "success" => "false",
                "error" => "UnAuthorized"
            ], 401);
        }

        if ($request->name == '' || !$request->has('name')) {
            return response()->json([

                "success" => "false",
                "error" => "user must have a name"

            ], 403);
        }

        if (User::updateDisplayNameFunction($user->username, $request->name)) {
            return response()->json([
                'success' => 'true'
            ], 200);
        } else {
            return response()->json([

                "success" => "false",
                "error" => "you are trying to update with the old value"

            ], 400);
        }
    }


    /**
     * Update current user About
     * @authenticated
     * @bodyParam about string required the content of about to be updated to
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 400 {
     *  "success": "false",
     *  "error": "you are trying to update with the old value"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "no about is written"
     * }
     */
    public function updateAbout(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([

                "success" => "false",
                "error" => "UnAuthorized"
            ], 401);
        }

        if ($request->about == '' || !$request->has('about')) {
            return response()->json([

                "success" => "false",
                "error" => "no about is written"

            ], 403);
        }

        if (User::updateAboutFunction($user->username, $request->about)) {
            return response()->json([
                'success' => 'true'
            ], 200);
        } else {
            return response()->json([

                "success" => "false",
                "error" => "you are trying to update with the old value"

            ], 400);
        }
    }

    /**
     * Update user profile image
     * @authenticated
     * @bodyParam profile_image file required User's new profile image.
     * @bodyParam profile_or_cover int required 1 for profile 2 for cover.
     *
     * @response 200 {
     * 	"success": "true",
     * 	"path": "storage/app/avatars/avatar.jpg"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "Unsupported media type"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "photo is not categorized neither profile nor cover photo"
     * }
     *
     */
    public function updateProfileImage(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'profile_or_cover' => 'required'
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Unsupported media type',
            ], 401);
        }

        $user = Auth()->user();

        if (!$user) {
            return response()->json([

                'success' => 'false',
                'error' => 'UnAuthorized'
            ], 401);
        }

        if (!$request->has('profile_or_cover') ||
            !($request->profile_or_cover == 1 || $request->profile_or_cover == 2)) {
            return response()->json([

                'success' => 'false',
                'error' => 'photo is not categorized neither profile nor cover photo'
            ], 403);
        }


        $image = $request->profile_image;
        $avatarName = $image->getClientOriginalName();

        $request->profile_image->storeAs('avatars', $avatarName);

        if ($request->profile_or_cover == 1) {
            $user->photo_url = $avatarName;
            $user->save();
        } else {
            $user->cover_url = $avatarName;
            $user->save();
        }



        $response = response()->json([
            'success' => 'true',
            'path' => ('storage/'.'app/'.'avatars/'.$avatarName)
        ], 200);



        return $response;
    }

    /**
     * Update user profile cover
     * @authenticated
     * @bodyParam cover_image file required User's new cover image.
     *
     * @response 200 {
     * 	"success": "true",
     * 	"path": "sotrage/app/avatar.jpg"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "Unsupported media type"
     * }
     *
     * @response 400 {
     * 	"success": "false",
     * 	"error": "Cannot upload the image"
     * }
     */

    public function updateCoverImage()
    {
        // code...
    }
}
