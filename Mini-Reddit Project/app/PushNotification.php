<?php

namespace App;
use OneSignal;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    static public function sendNotificationToAllUsers($message)
    {
        OneSignal::sendNotificationToAll(
            $message,
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
    }

    static public function sendNotificationToSpecificUsers($message , $users)
    {
        foreach($users as $username) {
            OneSignal::sendNotificationUsingTags(
                $message,
                array(
                  ["field" => "tag", "key"=>"username", "relation" => "=", "value" => $username],
                ),
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }

    }
}
