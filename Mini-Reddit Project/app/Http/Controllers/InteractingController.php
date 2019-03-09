<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteractingController extends Controller
{
	/**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam post_id integer required the id of the post that the user wants to hide
      * @response 200{}
      */
	public function hideOrUnhidePost(){
		// ...
	}

     /**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam post_id integer required the id of the post that the user wants to edit
      * @bodyparam new_title string the new title of the post
      * @bodyparam new_content string the new content of the post
      * @response 200{}
      */
     public function editAPost(){
          // ...
     }

     /**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam comment_id integer required the id of the comment that the user wants to edit
      * @bodyparam new_content string the new content of the comment
      * @response 200{}
      */
     public function editAComment(){
          // ...
     }

     /**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam post_id integer required the id of the post that the user wants to pin
      * @response 200{}
      */
     public function pinOrUnpinAPost(){
          // ...
     }

     /**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam post_id integer required the id of the post that the user wants to downvote
      * @response 200{}
      */
     public function addOrRemoveDownvotePost(){
          // ...
     }

     /**
      *@group Interacting
      * APIs for managing user Interacting
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
      * @response 200{}
      */
     public function addOrRemoveDownvoteComment(){
          // ...
     }
}
