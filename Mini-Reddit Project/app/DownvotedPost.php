<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownvotedPost extends Model
{

  protected $fillable = ['user_name', 'link_id'];
  public $timestamps = false; //so that doesn't expext time columns

  public static function downvoted($link_id,$username)
  {
      $result = downvotedPost::where('link_id' , $link_id)->where('user_name' , $username)->exists();
      return $result;
  }
}
