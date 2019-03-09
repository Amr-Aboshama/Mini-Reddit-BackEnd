<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
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
