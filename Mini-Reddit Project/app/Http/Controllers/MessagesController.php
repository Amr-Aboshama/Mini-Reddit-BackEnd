
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     *@group Messages
     * APIs for managing user Messages
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @bodyParam message_id integer required the id of  the message that the user wants to see
     * @response 200{
     *   "username2":"lolo",
     *   "photo":"photo3",
	 *   "message_content":"hello world"
     * }
     */
	public function viewAUserMessage(){
		// ...
	}

	/**
     *@group Messages
     * APIs for managing user Messages
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @response 200{
	 *   "messages" : [{
     *   "reciever_name":"maged",
     *   "reciever_photo":"photo1",
     *   "message_content":"hello world"
     *   }, {
     *   "reciever_name":"nour",
     *   "reciever_photo":"photo2",
     *   "message_content":"hello world tany"
     *   }]
     }
     */
	public function viewUserSentMessages(){
		// ...
	}

	/**
     *@group Messages
     * APIs for managing user Messages
     * @bodyParam my_username string required the username of the current user.
     * @bodyParam token string required the token of the user and it is required for authontication.
     * @bodyParam state integer required 1 if unread messages ,2 if all messages,3 if notified messages
     * @response 200{
	 *   "messages" : [{
     *   "sender_name":"maged",
     *   "sender_photo":"photo1",
     *   "message_content":"hello world"
     *   }, {
     *   "sender_name":"nour",
     *   "sender_photo":"photo2",
     *   "message_content":"hello world tany"
     *   }]
     * }
     */
	public function viewUserInboxMessages(){
		// ...
	}
    /**
     *
     * @group Send a Message
     * This is used to send a message to another user.
     * 
     * @bodyParam my_username string required The username of the sender user.
     * @bodyParam token string required The token of the sender user.
     * @bodyParam rec_username string required The username of the reciever user.
     * @bodyParam msg_content string required The content of the message to be sent.
     * 
     */
    public function sendMsg ($my_username,$token,$rec_username,$msg_content)
    {

    }
}
