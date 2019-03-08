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
     * @bodyParam userName string required The username of the sender user.
     * @bodyParam token string required The token of the sender user.
     * @bodyParam recUsername string required The username of the reciever user.
     * @bodyParam msgContent string required The content of the message to be sent.
     * 
     */
    public function sendMsg ($userName,$token,$recUsername,$msgContent)
    {

    }
}
