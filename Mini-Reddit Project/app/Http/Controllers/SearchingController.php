<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\User;
use App\community;

/**
 *@group Searching
 */
class SearchingController extends Controller
{
    /**
     * Search for a community or a user.
     *
     * @bodyParam search_content string required The string the user searching for.
     * @response 200 {
     *  "usernames": ["johnsmith", "stevenkay"],
     *  "community_IDs": [1, 5]
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "search content is empty"
     * }
     */
    public function search(Request $request)
    {
        if ('' == $request->search_content || !$request->has('search_content')) {
            return response()->json([
                'success' => 'false',
                'error' => 'search content is empty',
            ], 403);
        }

        $Auth = 1;
        //$posts = [];
        try {
            $tokenFetch = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            $Auth = 0;
        }

        if ($Auth) {
            $user = auth()->user();
            $users_list = User::getUsersByUsernameExceptblockedOrBlockedBy($user->username, $request->search_content);
        } else {
            $users_list = User::getUsersByUsername($request->search_content);
        }

        $community_list = Community::getCommunitiesByName($request->search_content);

        return response()->json([
            'usernames' => $users_list,
            'community_IDs' => $community_list,
        ], 200);
    }
}
