<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteractingController extends Controller
{


		/**
		 *
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
	   * @response 200{}
	   */
		public function hidePost()
		{
			// ...
		}


		/**
		 *
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
	   * @response 200{}
	   */
		public function unhidePost()
		{
			// ...
		}



    /**
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @bodyParam post_id integer required the id of the post that the user wants to edit
     * @bodyparam new_title string the new title of the post
     * @bodyparam new_content string the new content of the post
     * @response 200{}
     */
    public function editAPost()
		{
    		// ...
    }

    /**
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @bodyParam comment_id integer required the id of the comment that the user wants to edit
     * @bodyparam new_content string the new content of the comment
     * @response 200{}
     */
		public function editAComment()
		{
    		// ...
    }


    /**
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @bodyParam post_id integer required the id of the post that the user wants to pin
     * @response 200{}
     */
    public function pinOrUnpinPost()
		{
				// ...
    }


    /**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @response 200{}
     */
    public function addDownvotePost()
		{
    		// ...
    }


		/**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @response 200{}
     */
    public function removeDownvotePost()
		{
    		// ...
    }


    /**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @response 200{}
     */
    public function addDownvoteComment()
		{
    		// ...
    }


		/**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @response 200{}
     */
    public function removeDownvoteComment()
		{
    		// ...
    }


    /**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @response 200{}
     */
    public function addUpvotePost()
		{
    		// ...
    }


		/**
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @response 200{}
     */
    public function removeUpvotePost()
		{
    		// ...
    }


    /**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @response 200{}
     */
    public function addUpvoteComment()
		{
    		// ...
    }


		/**
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @response 200{}
     */
    public function removeUpvoteComment()
		{
    		// ...
    }


		/**
		 * viewing the posts of a specific user or a community or both when you are on the home page.
		 *
		 * @bodyParam my_username string required The username of the account owner.
	 	 * @bodyParam username string if you visited another user profile this is his username.
	 	 * @bodyParam token string required.
	 	 * @bodyParam community_id int if you want to show the posts of a specific community this is its id.
	   * @response {
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
  	 * @bodyParam my_username string required The username of the account owner.
  	 * @bodyParam username string required if you visited another user profile this is his username.
  	 * @bodyParam token string
  	 *
  	 * @response {
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 *
 		 * @response 404 {
		 *  "message" :"somethimg wrong!!!!"
 		 * }
     */
    public function ViewComments()
    {

    }


    /**
		 * viewing comments of a specific post or replies of a specific comment
		 * @bodyParam my_username string required The username of the account owner.
		 * @bodyParam id int required the id of the post or the id of the comment.
		 * @bodyParam token string
		 * @response {
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
		 * @bodyParam my_username string required The username of the account owner.
		 * @bodyParam type int required it is one for the upvoted posts and zero for the downvoted ones.
		 * @bodyParam token
		 * @response {
 		 * 	"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 *
 		 * @response 404 {
		 * 	"message" :"somethimg wrong!!!!"
 		 * }
     */
    public function ViewUpVotedOrDownVotedPosts( )
    {

    }


		/**
		 * view the overview of the user.
		 * @bodyParam my_username string required The username of the account owner.
		 * @bodyParam token
     */
    public function ViewOverview()
    {

    }


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
		 * view the saved links by the user.
		 * @bodyParam MyUserName string required The username of the account owner.
		 * @bodyParam Token
		 * @bodyParam my_username string required The username of the account owner.
		 * @bodyParam token
		 * @response {
 		 *	 "links" :[ { "link_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "link_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0  } , { "link_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_num" : 0 }]
 		 * }
 		 * @response 404 {
		 *	 "message" :"somethimg wrong!!!!"
 		 * }
     */
    public function ViewSavedLinks( )
    {
        // ...
    }

    /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam link_ID int required the ID of the link
     * @response 200
     * @response 400 {
     *  "message": "you are not authorized to remove the link"
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
     *
     */
    public function saveLink()
    {
        // ...
    }



    /**
     *
     * This is used to unsave a post or a comment.
     *
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     *
     */
    public function unsaveLink()
    {
        // ...
    }
}
