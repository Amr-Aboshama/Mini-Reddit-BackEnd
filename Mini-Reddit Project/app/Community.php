<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
     public static function getCommunity($community_id)
     {
          $result = Community::where('community_id' , $community_id)->get()->first();
          return $result;
     }

}
