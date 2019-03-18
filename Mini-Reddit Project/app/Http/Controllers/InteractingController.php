<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use App\UpvotedPost;
use App\UpvotedComment;

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
     * @bodyParam new_title string the new title of the post
     * @bodyParam new_content string the new content of the post
		 * @bodyParam new_image string the directory of the new image if there is .
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
     * @bodyParam new_content string the new content of the comment
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
    public function addUpvotePost(Request $request)
  	{
        //token should be parsed to get the user name

				$user = User::where('user_name' , 'amr')->first(); //should be changed.....

				if(!$request->has('post_id'))
				{

					return response()->json([

						"success" => "false",
						"error" => "post_id is required"

					],403);

				}

				$result = UpvotedPost::store($user->user_name , $request->post_id);

				if($result)
				{
						return response()->json([
							"success" => "true"
						], 200 );
				}
				else
				{
					  return response()->json([
						  "success" => "false",
    		 		  "error" => "post doesn't exist or already upvoted"
					  ], 403 );

				}


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


    public function removeUpvotePost(Request $request)
		{
		    //token should be parsed to get the user name
				
		  	$user = User::where('user_name' , 'amr')->first(); //should be changed.....

				if(!$request->has('post_id'))
				{

					return response()->json([

						"success" => "false",
						"error" => "post_id is required"

					],403);

				}

			  $result = UpvotedPost::remove($user->user_name , $request->post_id);

			  if($result)
			  {
					  return response()->json([
						  "success" => "true"
					  ], 200 );
			  }
		    else
			  {
				  	return response()->json([
						  "success" => "false",
						  "error" => "post isn't upvoted"
					  ], 403 );

			  }

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
    public function addUpvoteComment(Request $request)
  	{

		    //token should be parsed to get the user name

			  $user = User::where('user_name' , 'amr')->first(); //should be changed.....

			  if(!$request->has('comment_id'))
			  {

				  return response()->json([

					  "success" => "false",
					  "error" => "comment_id is required"

				  ],403);

			  }

			  $result = UpvotedComment::store($user->user_name , $request->comment_id);

			  if($result)
			  {
				  	return response()->json([
					  	"success" => "true"
					  ], 200 );
			  }
			  else
			  {
				   	return response()->json([
						  "success" => "false",
						  "error" => "Comment doesn't exist or already upvoted"
					  ], 403 );

			  }


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

     public function removeUpvoteComment(Request $request)
		 {
			   //token should be parsed to get the user name

			   $user = User::where('user_name' , 'amr')->first(); //should be changed.....

			   if(!$request->has('comment_id'))
			   {

				   return response()->json([

					   "success" => "false",
					   "error" => "comment_id is required"

				   ],403);

			   }

			   $result = UpvotedComment::remove($user->user_name , $request->comment_id);

			   if($result)
			   {
				   	 return response()->json([
						   "success" => "true"
					   ], 200 );
			   }
			   else
			   {
					   return response()->json([
						   "success" => "false",
						   "error" => "Comment doesn't exist or already upvoted"
					   ], 403 );

			   }

     }


		/**
		 * Viewing the posts of a specific user or a community or both when you are on the home page.
		 *
		 * @bodyParam sort string Choosing sorting type (New / Popular) [Default Popular]
	 	 * @bodyParam username string if you visited another user profile this is his username [Default null=>guest / my username=>user].
	 	 * @bodyParam community_id int if you want to show the posts of a specific community this is its id [Default null].
	   *@response 200 {
		 * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "laravel" ,"author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false", "upvoted" : "true" , "downvoted" : "false" } ,
		 *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none" ,"author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" } ,
		 *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" }]
		 *}
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
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "false" , "downvoted" : "false"}]
 		 * }
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
 		 *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed",  "author_photo_path" : "storage/app/avater.jpg","downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" }]
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
	 	 *	"posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed","community" : "none" ,"author_photo_path" : "storage/app/avater.jpg" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none","author_photo_path" : "storage/app/avater.jpg", "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "laravel" , "author_photo_path" : "storage/app/avater.jpg","downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" }]
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
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "none","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false", "upvoted" : "true" , "downvoted" : "false" } ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "none","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" } ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "laravel","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" }] ,
	 	 *
     * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" ,  "author_photo_path" : "storage/app/avater.jpg","downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false"}]
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
		 * @bodyParam image_path string if a post contains an image.
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
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "none", "author_photo_path" : "storage/app/avater.jpg","downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "false" , "upvoted" : "true" , "downvoted" : "false"} ,
	 	 *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed", "community" : "laravel","author_photo_path" : "storage/app/avater.jpg" , "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "true" , "upvoted" : "true" , "downvoted" : "false"} ,
	 	 *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none", "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "hidden": "true" , "upvoted" : "true" , "downvoted" : "false"}] ,
	 	 *
     * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" , "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0 , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0 , "upvoted" : "true" , "downvoted" : "false" } ,
 		 *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0  , "upvoted" : "true" , "downvoted" : "false"}]
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
		 * Viewing the hidden posts of the user.
		 * @authenticated
		 *@response 200 {
		 * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "laravel" ,"author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true",  "upvoted" : "true" , "downvoted" : "false" } ,
		 *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none" ,"author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "upvoted" : "true" , "downvoted" : "false" } ,
		 *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" ,"community" : "none", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true",  "upvoted" : "true" , "downvoted" : "false" }]
		 *}
		 * @response 404 {
		 *	"error" :"somethimg wrong!!!!"
		 * }
		 * @response 401 {
		 *  "success": "false",
		 *  "error": "UnAuthorized"
		 * }
		 */


		public function ViewHiddenPosts()
		{
			//..
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


		/**
		 * Upload an image
		 * @authenticated
		 * @bodyParam uploaded_image file required Image to upload.
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
		public function uploadImage()
		{
			// code...
		}

		/**
		 * Viewing a single post
		 *
	 	 *@bodyParam post_id int required the id of the post.
	   *@response 200 {
	 	 *	"post_id": 1 ,
		 *  "body" : "post1" ,
		 *  "image" : "storage/app/avater.jpg",
		 *  "title":"title1",
		 *	"username": "ahmed" ,
		 *  "community" : "none",
		 * 	"photo_path" : "storage/app/avater.jpg",
		 *	"downvotes" : 17,
		 *	"upvotes" : 30 ,
		 *	"date":" 2 days ago " ,
		 *	"comments_num" : 0,
		 *	"saved": "true",
		 *  "hidden": "false" ,
		 *	"upvoted" : "false" ,
		 *	"downvoted" : "true"
		 * }
		 *
	 	 * @response 404 {
		 *	"error" :"somethimg wrong!!!!"
	 	 * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "id doesn't exist"
     * }
	 	 */

		public function viewSinglePost()
		{
			// code ...
		}
}
