<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
     protected $fillable = ['name'];
     public $timestamps = false;
     protected $primaryKey = 'community_id';

     public static function getCommunity($community_id)
     {
          $result = Community::where('community_id' , $community_id)->get()->first();
          return $result;
     }


     public function createDummyCommunity($communityname)
    {
        return Community::create([
              'name' => $communityname
          ]);
    }

    public static function getCommunitiesByName($comm_name)
    {
      return community::where('name', 'like', '%' . $comm_name . '%')
             ->select('name')
             ->where('name', 'like', '%' . $comm_name . '%')
             ->pluck('name')->toArray();  
    }
     public static function communityExist($community_id)
    {
        $result = Community::where('community_id' , $community_id)->exists();
        return $result;

    }
}

