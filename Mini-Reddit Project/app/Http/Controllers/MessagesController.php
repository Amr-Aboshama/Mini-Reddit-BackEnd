<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * @group Messages
 */


class MessagesController extends Controller
{
    /**
     * View the content of a specific message
     * @authenticated
     * @bodyParam message_id integer required the id of  the message that the user wants to see
     * @response 200 {
     * 	"username2":"lolo",
     *  "user_photo":"photo3",
	   *  "message_content":"hello world"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "message doesn't exist"
     * }
     */
    public function viewUserMessage()
	  {
		    // ...
	  }


  	/**
  	 * View current user outbox messages
  	 * @authenticated
  	 * @response 200{
  	 *  "success": "true",
  	 *  "messages" : [{
  	 *   	 "reciever_name":"maged",
  	 *   	 "reciever_photo":"photo1",
  	 *   	 "message_content":"hello world",
  	 *       "message_id":"5"
  	 *    }, {
  	 *   	 "reciever_name":"nour",
  	 *   	 "reciever_photo":"photo2",
  	 *   	 "message_content":"hello world tany",
  	 *       "message_id":"6"
  	 *   }]
  	 * }
  	 * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
  	 */
  	public function viewUserSentMessages()
  	{
  		// ...
  	}


  	/**
  	 * View current user inbox Message
  	 * @authenticated
  	 * @bodyParam state integer required 1 if unread messages ,2 if all messages,3 if notified messages
  	 * @response 200{
  	 *  "success": "true",
  	 *  "messages" : [{
  	 *   	 "sender_name":"maged",
  	 *   	 "sender_photo":"photo1",
  	 *   	 "message_content":"hello world",
  	 *     "message_id":"1"
  	 *   	}, {
  	 *   	 "sender_name":"nour",
  	 *   	 "sender_photo":"photo2",
  	 *   	 "message_content":"hello world tany",
  	 *     "message_id":"3"
  	 *   }]
  	 * }
  	 * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "undefined state"
     * }
  	 */
  	public function viewUserInboxMessages()
  	{
  		// ...
  	}


  	/**
  	 * Send a message to user from current user
  	 * @authenticated
  	 * @bodyParam rec_username string required The username of the reciever user.
  	 * @bodyParam msg_content string required The content of the message to be sent.
  	 * @response 200{
  	 * 	"success":"true"
  	 * }
  	 * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "username doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "message must have a content"
     * }
  	 */
  	public function sendMessage()
  	{
  		// ...
  	}
}
