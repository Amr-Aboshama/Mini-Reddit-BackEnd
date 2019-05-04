<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedLink extends Model
{

    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns
    /**
     * checks if the given link is saved by the given user.
     * @param  [type]  $link_id
     * @param  [type]  $username
     * @return boolean     [true if saved, false if not].
     */

    public static function isSaved($link_id, $username)
    {
        $result = SavedLink::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }

    /**
     * function to store that the user save the post.
     * @param  string $username     [description]
     * @param  int $community_id [description]
     * @return boolean               [ true if stored successfully , false if not whatever the reason].
     */

    public static function store($username, $link_id)
    {
      return SavedLink::create([
          'username' => $username ,'link_id'=> $link_id
      ]);
    }

    /**
     * function to unsave link given its id and the username of the user.
     * @param  string $username
     * @param  int $community_id
     * @return boolean               [true if deleted successfully , false if not].
     */

    public static function remove($username, $link_id)
    {
        $result = SavedLink::where('username', $username)->where('link_id', $link_id)->delete();

        return $result;
    }

    /**
     * checks if the given user alrady save the given link.
     * @param  int $link_id
     * @param  string $username
     * @return boolean               [true if saved, false if not ].
     */

    public static function linkSaved($link_id, $username)
    {
        $result = SavedLink::where('link_id',$link_id)->where('username', $username)->exists();

        return $result;
    }


}
