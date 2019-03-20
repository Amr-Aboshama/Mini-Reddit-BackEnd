<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedPost extends Model
{
    public static function isSaved($link_id , $username)
    {
        $result = SavedPost::where('link_id' , $link_id)->where('user_name' , $username)->exists();
        return $result;
    }
}
