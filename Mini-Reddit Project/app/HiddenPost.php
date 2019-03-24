<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HiddenPost extends Model
{
    /**
     * function to check if a specific link is hidden by a user or not
     *
     * @param   int $link_id
     *
     * @param   string  $username
     *
     * @return  bool   true for hidden, false for unhidden
     */
    public static function hidden($link_id, $username)
    {
        $result = HiddenPost::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }
}
