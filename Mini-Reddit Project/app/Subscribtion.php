<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    protected $fillable = ['username', 'community_id'];
    public $timestamps = false; //so that doesn't expext time columns


    public static function subscribed($community_id, $username)
    {
        $result = Subscribtion::where('community_id', $community_id)->where('username', $username)->exists();
        return $result;
    }

    public static function subscribed_communities($username)
    {
        $subscribed_communities=DB::select(" select name , community_logo 
    	                              from communities , subscribtions 
    	                              where (( communities.community_id=subscribtions.community_id ) and (username='$username'))");
        return $subscribed_communities;
    }



    public static function store($username, $community_id)
    {
        try {
            Subscribtion::create(['username' => $username , 'community_id' => $community_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public static function remove($username, $community_id)
    {
        $result = Subscribtion::where('username', $username)->where('community_id', $community_id)->delete();
        return $result;
    }
}
