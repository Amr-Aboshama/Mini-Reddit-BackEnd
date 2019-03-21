<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{

  protected $fillable = ['user_name', 'community_id'];
  public $timestamps = false; //so that doesn't expext time columns


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



  public static function store($user_name , $community_id)
    {

      try {

        Subscribtion::create(['user_name' => $user_name , 'community_id' => $community_id ]);
        return true;

      } catch (\Exception $e) {

        return false;

      }
    }


    public static function remove($user_name , $community_id)
    {
        $result = Subscribtion::where('user_name' , $user_name)->where('community_id' , $community_id)->delete();
        return $result;
    }

    
}


