<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteractingController extends Controller
{
    /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam post_content string required the content written in the post
     * @bodyParam parent_link_ID int required the ID of the parent link, this parameter should be 'null' if the link is a post 
     * @bodyParam post_title string this parameter is required only for posts
     * @bodyParam community_ID int this parameter is required only if the link is inside a community 
     * @response 200
     */
	
	public function addNewLink()
	{
	    // ...
	}

    /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam post_ID int required the ID of the post
     * @response 200
     * @response 400 {"message": "you are not authorized to pin/unpin the post"}
     */
    
    public function pinAndUnPinPost()
    {
        // ...
    }

     /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam link_ID int required the ID of the link
     * @response 200
     * @response 400 {"message": "you are not authorized to remove the link"}
     */
    
    public function removeLink()
    {
        // ...
    }


}
