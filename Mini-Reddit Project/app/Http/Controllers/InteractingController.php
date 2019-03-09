<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    /**
    *@group all interacting actions (posts , comments and anything related )

    */


class InteractingController extends Controller
{


		/**
		 *
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
       * @authenticated
	   * @response 200 {
       *  "success": "true"
       * }
       * @response 401 {
       *  "success": "false",
       *  "error": "UnAuthorized"
       * }
       *@response 403 {
       * "success" : "false",
       * "error" : "already hidden"
       }
	   */
		public function hidePost()
		{
			// ...
		}


		/**
		 *
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
       * @authenticated
	   * @response 200 {
       *  "success": "true"
       * }
       * @response 401 {
       *  "success": "false",
       *  "error": "UnAuthorized"
       * }
       *@response 403 {
       * "success" : "false",
       * "error" : "already unhidden"
       }
	   */
		public function unhidePost()
		{
			// ...
		}



    /**
     * @bodyParam post_id integer required the id of the post that the user wants to edit
     * @bodyparam new_title string the new title of the post
     * @bodyparam new_content string the new content of the post
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function editAPost()
		{
    		// ...
    }

    /**
     * @bodyParam comment_id integer required the id of the comment that the user wants to edit
     * @bodyparam new_content string the new content of the comment
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
		public function editAComment()
		{
    		// ...
        }


    /**
     * @bodyParam post_id integer required the id of the post that the user wants to pin
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function pinOrUnpinPost()
		{
				// ...
    }


    /**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function addDownvotePost()
	{
    		// ...
    }


		/**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function removeDownvotePost()
	{
    		// ...
    }


    /**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function addDownvoteComment()
		{
    		// ...
    }


		/**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function removeDownvoteComment()
		{
    		// ...
    }


    /**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }

     */
    public function addUpvotePost()
		{
    		// ...
    }


		/**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function removeUpvotePost()
	{
    		// ...
    }


    /**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function addUpvoteComment()
		{
    		// ...
    }


		/**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */

    public function removeUpvoteComment()
		{
    		// ...
    }


		/**
		 * viewing the posts of a specific user or a community or both when you are on the home page.
		 *
	 	 * @bodyParam username string if you visited another user profile this is his username.
	 	 * @bodyParam community_id int if you want to show the posts of a specific community this is its id.
	     * @response 200 {
	 	 *	"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
	 	 * }
	 	 *
	 	 * @response 404 {
		 *	"message" :"somethimg wrong!!!!"
	 	 * }
	 	 */
    public function ViewPosts()
    {

    }


  	/**
  	 *
     * Viewing comments of a user on posts he/she has interacted with.
  	 * @bodyParam username string required if you visited another user profile this is his username.
  	 * @authenticated
  	 * @response 200 {
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }

 		 *
 		 * @response 404 {
		 *  "message" :"somethimg wrong!!!!"
 		 * }

         * @response 401 {
         *  "success": "false",
         *  "error": "UnAuthorized"
         * }
     */
    public function ViewComments()
    {

    }


    /**
		 * viewing comments of a specific post or replies of a specific comment
		 * @bodyParam id int required the id of the post or the id of the comment.

		 * @response 200 {
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 * @response 404 {
		 *	"message" :"somethimg wrong!!!!"
 		 * }
     */
    public function ViewComments_RepliesOfPosts_Comments()
    {

    }


    /**
		 * view the upvoted posts of the user or the downvoted ones
		 * @bodyParam type int required it is one for the upvoted posts and zero for the downvoted ones.
         * @authenticated
        
		 * @response 200 {
 		 * 	"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 *
 		 * @response 404 {
		 * 	"message" :"somethimg wrong!!!!"
 		 * }

         * @response 401 {
         *"success": "false",
         *  "error": "UnAuthorized"
         * }
     */
    public function ViewUpVotedOrDownVotedPosts( )
    {

    }


		/**
		 * view the overview of the user.
         * @bodyParam username string required if you visited another user profile this is his username.
         * @authenticated
        

         *@response 200 {
             
            * "posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }] ,

            * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }] 

         *}

         *@response 404 {
         * "message" : "something wrong!!!"
         *}

         * @response 401 {
         *  "success": "false",
         *  "error": "UnAuthorized"
         * }

        */

    public function ViewOverview()
    {

    }

    /**
     * @bodyParam post_content string required the content written in the post
     * @bodyParam parent_link_ID int required the ID of the parent link, this parameter should be 'null' if the link is a post
     * @bodyParam post_title string this parameter is required only for posts
     * @bodyParam community_ID int this parameter is required only if the link is inside a community
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */

	  public function addNewLink()
	  {
		    // ...
	  }


    /**
		 * view the saved links by the user.
		 * @bodyParam MyUserName string required The username of the account owner.
		 * @bodyParam token
         * @authenticated
         
		 * @response 200 {
 		 *	 "links" :[ { "link_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "link_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "link_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 * @response 404 {
		 *	 "message" :"somethimg wrong!!!!"
 		 * }

         * @response 401 {
         *  "success": "false",
         *  "error": "UnAuthorized"
         *}
     */
    public function ViewSavedLinks( )
    {

    }

    /**
     * @bodyParam link_ID int required the ID of the link
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function removeLink()
    {
        // ...
    }

    /**
     *
     * This is used to save a post or a comment.
     *
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function saveLink()
    {

    }






    /**
     *
     * This is used to unsave a post or a comment.
     *
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }

     * @response 401 {
     *  "success": "false"
     *  "error": "UnAuthorized"
     * }
     */
    public function unsaveLink()
    {
        // ...
    }
}
