<?php

namespace App;

use OneSignal;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    public static function sendNotificationToAllUsers($message)
    {
        OneSignal::sendNotificationToAll(
            $message,
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
    }

    public static function sendNotificationToSpecificUsers($message, $users)
    {
        foreach ($users as $username) {
            OneSignal::sendNotificationUsingTags(
                $message,
                [
                  ['field' => 'tag', 'key' => 'username', 'relation' => '=', 'value' => $username],
                ],
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
    }
}
