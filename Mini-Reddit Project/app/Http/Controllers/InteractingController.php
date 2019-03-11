<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Interacting Actions
 * posts , comments and anything related
 */


class InteractingController extends Controller
{
		/**
		 * Hide a post
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
     * @authenticated
	   * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "already hidden"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
	   */
		public function hidePost()
		{
			// ...
		}


		/**
		 * Unhide a post
	   * @bodyParam post_id integer required the id of the post that the user wants to hide
     * @authenticated
	   * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "already unhidden"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
	   */
		public function unhidePost()
		{
			// ...
		}



    /**
     * Edit a post
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
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post must have a title"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post must have a content"
     * }
     */
    public function editPost()
		{
    		// ...
    }

    /**
     * Edit a comment
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
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment must have a content"
     * }
     */
		public function editComment()
		{
    		// ...
    }


    /**
     * Pin or unpin a post
     * @bodyParam post_id integer required the id of the post that the user wants to pin or unpin
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     */
    public function pinOrUnpinPost()
		{
				// ...
    }


    /**
     * Add Downvote to a post
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     */
    public function addDownvotePost()
		{
    		// ...
    }


		/**
		 * Remove Downvote from a post
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     */
    public function removeDownvotePost()
		{
    		// ...
    }


    /**
     * Add Downvote to a comment
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     */
    public function addDownvoteComment()
		{
    		// ...
    }


		/**
		 * Remove Downvote from a comment
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     */
    public function removeDownvoteComment()
		{
    		// ...
    }


    /**
     * Add Upvote to a post
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     */
    public function addUpvotePost()
	{
    		// ...
    }


		/**
		 * Remove Upvote from a post
     * @bodyParam post_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     */
    public function removeUpvotePost()
		{
    		// ...
    }


    /**
     * Add Upvote to a comment
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     */
    public function addUpvoteComment()
		{
    		// ...
    }


		/**
		 * Remove Upvote from a comment
     * @bodyParam comment_id integer required the id of the comment that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     */

    public function removeUpvoteComment()
		{
    		// ...
    }


		/**
		 * Viewing the posts of a specific user or a community or both when you are on the home page.
		 *
		 * @bodyParam sort string Choosing sorting type (New / Popular) [Default Popular]
	 	 * @bodyParam username string if you visited another user profile this is his username [Default null=>guest / my username=>user].
	 	 * @bodyParam community_id int if you want to show the posts of a specific community this is its id [Default null].
	   * @response 200 {
	 	 *	"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true" }]
	 	 * }
	 	 *
	 	 * @response 404 {
		 *	"error" :"somethimg wrong!!!!"
	 	 * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "community doesn't exist"
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
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true"  } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false"  } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" }]
 		 * }
 		 *
 		 * @response 404 {
		 *  "error" :"somethimg wrong!!!!"
 		 * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username doesn't exist"
     * }
     */
    public function ViewComments()
    {

    }


    /**
		 * Viewing comments of a specific post or replies of a specific comment
		 * @bodyParam link_id int required the id of the post or the id of the comment.
  	 * @response 200 {
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true"  } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false"  } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" }]
 		 * }
		 *
 		 * @response 404 {
		 *	"error" :"somethimg wrong!!!!"
 		 * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "this post, comment or reply doesn't exist"
     * }
     */
    public function ViewCommentsAndRepliesOfPostsAndComments()
    {

    }


    /**
		 * View the upvoted posts of the user or the downvoted ones
		 * @bodyParam type int required it is one for the upvoted posts and zero for the downvoted ones.
     * @authenticated
	   * @response 200 {
	 	 *	"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" }]
 		 * }
 		 * @response 404 {
		 * 	"error" :"somethimg wrong!!!!"
 		 * }
     * @response 401 {
     * 	"success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "undefined type"
     * }
     */
    public function ViewUpVotedOrDownVotedPosts( )
    {

    }



		/**
		 * View the overview of the user [Posts, comments, and links].
     * @bodyParam username string required if you visited another user profile this is his username.
     * @authenticated
 		 * @response 200 {
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true" }] ,
	 	 *
     * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true"  } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false"  } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" }]
     * }
     * @response 404 {
     * "error" : "something wrong!!!"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username doesn't exist"
     * }
     */
    public function ViewOverview()
    {

    }


    /**
     * Add new Link
     * @bodyParam post_content string required the content written in the post
     * @bodyParam parent_link_id int required the ID of the parent link, this parameter should be 'null' if the link is a post
     * @bodyParam post_title string this parameter is not required only for posts
     * @bodyParam community_id int this parameter is required only if the link is inside a community
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "post must have a title"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "post must have a content"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "parent doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "community doesn't exist"
     * }
     */
	  public function addNewLink()
	  {
		    // ...
	  }


    /**

		* View the saved Links by the user.
     * @authenticated

		 * @response 200 {
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "true" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "true" }] ,
	 	 *
     * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true"  } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0  } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0 }]
     * }
 		 * @response 404 {
		 *	 "error" :"somethimg wrong!!!!"
 		 * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function ViewSavedLinks( )
    {

    }

    /**
     * Remove post, comment or reply.
     * @bodyParam link_id int required the ID of the link
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "this post, comment or reply doesn't exist"
     * }
     */
    public function removeLink()
    {
        // ...
    }

    /**
     *
     * Save Post, Comment or Reply.
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
     * @response 403 {
     *  "success": "false",
     *  "error": "this post, comment or reply doesn't exist"
     * }
     */
    public function saveLink()
    {

    }


    /**
     *
     * Unsave Post, Comment or Reply
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
     * @response 403 {
     *  "success": "false",
     *  "error": "this post, comment or reply doesn't exist"
     * }
     */
    public function unsaveLink()
    {
        // ...
    }

		/**
		 * Give Karma to a user.
		 *
		 * @authenticated
		 * @bodyParam username string required Username to give to a reward.
		 * @response 200 {
		 * 	"success": "true"
		 * }
		 *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "Already given before"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "username doesn't exist"
     * }
		 */
		public function giveReward()
		{
				// ...
		}
}
