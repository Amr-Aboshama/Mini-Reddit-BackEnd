<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $fillable = ['content', 'sender_username', 'receiver_username'];
    public $timestamps = false; //so that doesn't expext time columns
    protected $primaryKey = 'message_id';

    /**
     * function to get the messages sent by a specific user
     * @param  string $username
     * @return array  [ list of all messages sent by the given user ].
     */

    public static function sentMessages($username)
    {


        $sentmessages = DB::select(" select receiver_username, photo_url as receiver_photo,
                                     content as message_content, message_id
        	                         from Messages, Users
        	                         where (username=sender_username and username='$username')");


        
        return $sentmessages;
    }
}
