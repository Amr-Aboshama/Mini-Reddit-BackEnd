<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\PushNotification;

/**
 * @group Messages
 */
class MessagesController extends Controller
{
    /**
     * View the content of a specific message.
     *
     * @authenticated
     * @bodyParam message_id integer required the id of  the message that the user wants to see
     * @response 200 {
     *  "success": "true",
     * 	"username2":"lolo",
     *  "user_photo":"photo3",
     *  "message_content":"hello world"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     * 	"error": "message doesn't exist"
     * }
     */
    public function viewUserMessage(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => 'false',
                'error' => 'UnAuthorized',
            ], 401);
        }

        if ('' == $request->message_id || !$request->has('message_id') ||
            !Message::checkMessageExistance($request->message_id)) {
            return response()->json([
                'success' => 'false',
                'error' => "message doesn't exist",
            ], 403);
        }

        $message = Message::getMessageOfSpecificId($request->message_id);

        return response()->json([
                'success' => 'true',
                'username2' => $message->sender_username,
                'user_photo' => $message->photo_url,
                'message_content' => $message->content,
            ], 200);
    }

    /**
     * View current user outbox messages.
     *
     * @authenticated
     * @response 200{
     *  "success": "true",
     *  "messages" : [{
     *   	 "receiver_name":"maged",
     *   	 "receiver_photo":"photo1",
     *   	 "message_content":"hello world",
     *       "message_id":"5"
     *    }, {
     *   	 "receiver_name":"nour",
     *   	 "receiver_photo":"photo2",
     *   	 "message_content":"hello world tany",
     *       "message_id":"6"
     *   }]
     * }
     * @response 401 {
     *  "success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
    public function viewUserSentMessages(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => 'false',
                'error' => 'UnAuthorized',
            ], 401);
        }

        $sentmessages = Message::sentMessages($user->username);

        return response()->json([
                'success' => 'true',
                'messages' => $sentmessages,
            ], 200);
    }

    /**
     * View current user inbox Message.
     *
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
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "undefined state"
     * }
     */
    public function viewUserInboxMessages(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => 'false',
                'error' => 'UnAuthorized',
            ], 401);
        }

        $inboxmessages = Message::inboxMessage($user->username);

        return response()->json([
                'success' => 'true',
                'messages' => $inboxmessages,
            ], 200);
    }

    /**
     * Send a message to user from current user.
     *
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
    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => 'false',
                'error' => 'UnAuthorized',
            ], 401);
        }

        if ('' == $request->rec_username || !$request->has('rec_username') || !User::userExist($request->rec_username)) {
            return response()->json([
                'success' => 'false',
                'error' => 'username doesn\'t exist',
            ], 403);
        }

        if (!$request->has('msg_content') || '' == $request->msg_content) {
            return response()->json([
                'success' => 'false',
                'error' => 'message must have a content',
            ], 403);
        }

        //sending notification to user who received the messages

        PushNotification::sendNotificationToSpecificUsers(" you have a new message from '$user->username'", [$request->rec_username]);

        return response()->json([
                'success' => 'true',
            ], 200);
    }
}
