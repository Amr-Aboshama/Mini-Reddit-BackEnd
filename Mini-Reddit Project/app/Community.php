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

     public function createDummyCommunity($communityname)
    {
        return Community::create([
              'community_name' => $communityname
          ]);
    }

    public static function getCommunitiesByName($comm_name)
    {
      return community::where('name', 'like', '%' . $comm_name . '%')
             ->select('name')
             ->where('name', 'like', '%' . $comm_name . '%')
             ->pluck('name')->toArray();  
    }

}
