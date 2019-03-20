<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    public static function subscribed($community_id , $username)
    {
        $result = Subscribtion::where('community_id' , $community_id)->where('user_name' , $username)->exists();
        return $result;
    }
}
