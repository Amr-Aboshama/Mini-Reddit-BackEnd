<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedPost extends Model
{
    /**
     * function to check if a specific link is saved by a user or not
     *
     * @param   int  $link_id
     *
     * @param   string  $username
     *
     * @return  bool   true for saved, false for unsaved
     */
    public static function isSaved($link_id, $username)
    {
        $result = SavedPost::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }
}
