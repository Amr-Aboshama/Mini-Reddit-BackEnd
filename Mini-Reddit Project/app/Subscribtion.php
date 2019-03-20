<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    public static function subscribed($community_id , $username)
    {
        $result = Subscribtion::where('community_id' , $community_id)->where('user_name' , $username)->exists();
        return $result;
    }

    public static function subscribed_communities($username)
  {

    $subscribed_communities=DB::select(" select name , community_logo 
    	                              from communities , subscribtions 
    	                              where (( communities.community_id=subscribtions.community_id ) and (user_name='$username'))");

   return $subscribed_communities;


  }
}
