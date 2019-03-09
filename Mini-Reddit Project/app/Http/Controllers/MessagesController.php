<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


	/**
	 *@group Messages
	*/


class MessagesController extends Controller
{
    /**
     *
     * APIs for managing user Messages
     * @bodyParam message_id integer required the id of  the message that the user wants to see
     * @response 200 {
     * 	"username2":"lolo",
     *  "photo":"photo3",
	 	 *  "message_content":"hello world"
     * }

     */
    public function viewUserMessage()
		{
				// ...
		}


		/**
	   *
	   * APIs for managing user Messages
	   * @response 200{
		 *  "messages" : [{
	   *   	 "reciever_name":"maged",
	   *   	 "reciever_photo":"photo1",
	   *   	 "message_content":"hello world"
	   *    }, {
	   *   	 "reciever_name":"nour",
	   *   	 "reciever_photo":"photo2",
	   *   	 "message_content":"hello world tany"
	   *   }]
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
	   *  "messages" : [{
	   *   	 "sender_name":"maged",
	   *   	 "sender_photo":"photo1",
	   *   	 "message_content":"hello world"
	   *   	}, {
	   *   	 "sender_name":"nour",
	   *   	 "sender_photo":"photo2",
	   *   	 "message_content":"hello world tany"
	   *   }]
	   * }
	   */
		public function viewUserInboxMessages()
		{
				// ...
		}

	  /**
	   *
	   *
	   * This is used to send a message to another user.
	   *
	   * @bodyParam rec_username string required The username of the reciever user.
	   * @bodyParam msg_content string required The content of the message to be sent.
	   *
	   */
	  public function sendMessage()
	  {
				// ...
	  }
}
