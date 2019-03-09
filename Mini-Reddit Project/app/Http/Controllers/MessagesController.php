<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
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
     */
    public function viewUserMessage()
	{
		// ...
	}


	/**
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
	 *
	 * APIs for managing user Messages
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
	 */
	public function viewUserInboxMessages()
	{
		// ...
	}

	/**
	 * This is used to send a message to another user.
	 *
	 * @bodyParam rec_username string required The username of the reciever user.
	 * @bodyParam msg_content string required The content of the message to be sent.
	 * @response 200{
	 * 	"success":"true"
	 * }
	 * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
	 */
	public function sendMessage()
	{
		// ...
	}
}
