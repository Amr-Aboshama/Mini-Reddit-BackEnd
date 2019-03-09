<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteractingController extends Controller
{
    /**
     *
     * @group Saving a link
     * This is used to save or unsave a post or a comment.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     * 
     */
    public function savingLink ($my_username,$token,$link_id)
    {

    } 
}
