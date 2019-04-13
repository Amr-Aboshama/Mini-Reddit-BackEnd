<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedLink extends Model
{
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
}
