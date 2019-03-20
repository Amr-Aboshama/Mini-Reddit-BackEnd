<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\community;

/**
 *@group Searching
 */

class SearchingController extends Controller
{
    /**
     * Search for a community or a user
     * @bodyParam search_content string required The string the user searching for.
     * @response 200 {
     *  "usersContent": ["johnsmith", "stevenkay"],
     *  "communityContent": ["Ahly", "BackEnd"]
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "search content is empty"
     * }
     */
    public function search(Request $request)
    {
        
        
        if(!$request->has('search_content'))
            {

                return response()->json([

                    "success" => "false",
                    "error" => "search content is empty"

                ],403);

            }

        $users_list = User::where('user_name', 'like', '%' . $request->search_content . '%')
            ->select('user_name')
            ->where('user_name', 'like', '%' . $request->search_content. '%')
            ->pluck('user_name')->toArray();
        
         $community_list = community::where('name', 'like', '%' . $request->search_content . '%')
             ->select('name')
             ->where('name', 'like', '%' . $request->search_content . '%')
             ->pluck('name')->toArray();   
       
        return response()->json([
            
            "usersContent" => $users_list,
            "communityContent" => $community_list

            ], 200 );  

    }
}
