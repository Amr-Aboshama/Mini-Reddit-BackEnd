<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModerateCommunity extends Model
{
    protected $fillable = ['username','community_id'];
    public $timestamps = false; //so that doesn't expext time columns


    public static function checkExisting($community_id,$username)
    {
        $result = ModerateCommunity::where('community_id', $community_id)->where('username',$username)->exists();
        return $result;
    }

    public static function store($community_id,$username)
    {
        try {
            ModerateCommunity::create(['username' => $username , 'community_id' => $community_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
