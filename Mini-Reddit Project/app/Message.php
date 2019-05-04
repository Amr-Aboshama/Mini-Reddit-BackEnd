<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;


class Message extends Model
{
    protected $fillable = ['content', 'sender_username', 'receiver_username', 'message_subject'];
    public $timestamps = false; //so that doesn't expext time columns
    protected $primaryKey = 'message_id';

    /**
     * function to get the messages sent by a specific user
     * @param  string $username
     * @return array  [ list of all messages sent by the given user ].
     */

    public static function sentMessages($username)
    {


        $sentmessages = DB::select(" select receiver_username as receiver_name, receiver.photo_url as receiver_photo, message_subject, content as message_content, message_id 
            from Messages, Users as sender, Users as receiver
        	where (sender.username=sender_username and sender.username='$username' and receiver.username=receiver_username)");


        
        return $sentmessages;
    }

    /**
     * function to get the  read inbox messages for a specific user
     * @param  string $username
     * @return array  [ list of all inbox messages for the given user ].
     */

    public static function readInboxMessage($username)
    {

        $inboxmessages = DB::select(" select sender_username as sender_name, photo_url as sender_photo,message_subject, content as message_content, message_id 
            from Messages, Users
            where (Messages.read = 1 and receiver_username= '$username' and username=sender_username )");


        
        return $inboxmessages;

        
    }

    /**
     * function to get the unread inbox messages for a specific user
     * @param  string $username
     * @return array  [ list of all inbox messages for the given user ].
     */

    public static function unreadInboxMessage($username)
    {

        $inboxmessages = DB::select(" select sender_username as sender_name, photo_url as sender_photo,message_subject, content as message_content, message_id 
            from Messages, Users
            where (Messages.read = 0 and receiver_username= '$username' and username=sender_username)");


        
        return $inboxmessages;
    }

    /**
     * function to get the inbox messages for a specific user
     * @param  string $username
     * @return array  [ list of all inbox messages for the given user ].
     */

    public static function inboxMessage($username)
    {

        $inboxmessages = DB::select(" select sender_username as sender_name, photo_url as sender_photo,message_subject, content as message_content, message_id 
            from Messages, Users
            where (receiver_username= '$username' and username=sender_username)");


        
        return $inboxmessages;
    }

    /**
     * function to get a specific message
     * @param  integer id of message
     * @return row of data due to joining users and messages tables on the givin id
     */

    public static function getMessageOfSpecificId($id)
    {
        Message::where('message_id', $id)->update(['read'=> true]);

        return Message::where('message_id', $id)
               -> leftJoin('Users', 'username', '=', 'sender_username')
               -> select ('sender_username', 'photo_url', 'content', 'message_subject')
               ->first();

    }

    

    /**
     * function to get a specific message
     * @param  integer id of message
     * @return row of data due to joining users and messages tables on the givin id
     */

    public static function checkMessageExistance($id)
    {

        return Message::where('message_id', $id)->exists();


    }

    /**
     * this function to create dummmy message for unit testing.
     * @param  string $senderusername
     * @param  string $receiverusername
     * @param  string $messagecontent
     * @return object [the created message].
     */

    public static function createDummyMessage($senderusername, $receiverusername, $messagecontent, $message_subject)
    {
        if (!User::userExist($senderusername) || !User::userExist($receiverusername))
            return null;

        return Message::create(['sender_username' => $senderusername,
                                'receiver_username' => $receiverusername,
                                'message_subject' => $message_subject,
                                'content'=>$messagecontent]);
    }


}
