<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
     public static function getCommunity($community_id)
     {
          $result = Community::where('community_id' , $community_id)->get()->first();
          return $result;
     }

     public static function communityExist($community_id)
    {
        $result = Community::where('community_id' , $community_id)->exists();
        return $result;
    }

}
