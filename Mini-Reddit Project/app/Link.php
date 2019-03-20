<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

  public $timestamps = false; //so that doesn't expext time columns


  public static function incrementUpvotes($link_id)
  {
      $upvotes = Link::where('link_id', $link_id)->get()->first()->upvotes;
      $upvotes++;
      Link::where('link_id', $link_id)->update(['upvotes' => $upvotes ]);
  }
  public static function decrementUpvotes($link_id)
  {
      $upvotes = Link::where('link_id', $link_id)->get()->first()->upvotes;
      $upvotes--;
      Link::where('link_id', $link_id)->update(['upvotes' => $upvotes ]);
  }
  public static function incrementDownvotes($link_id)
  {
      $downvotes = Link::where('link_id', $link_id)->get()->first()->downvotes;
      $downvotes++;
      Link::where('link_id', $link_id)->update(['downvotes' => $downvotes ]);  }

  public static function decrementDownvotes($link_id)
  {
      $downvotes = Link::where('link_id', $link_id)->get()->first()->downvotes;
      $downvotes--;
      Link::where('link_id', $link_id)->update(['downvotes' => $downvotes ]);
  }

  public static function scopegetPosts($query)
  {
      return $query->where('parent_id' , null);
  }


  public static function homePosts($username)
  {

    $posts = DB::select("SELECT * FROM links
             where( parent_id is null and ( author_user_name
             in (select followed_user_name from followings
               where follower_user_name = '$username') or community_id
               in(select community_id from subscribtions
                 where user_name = '$username'))) ORDER BY link_date DESC " );

    return $posts;

  }

  public static function commentsNum($post_id)
  {
      $result = Link::where('parent_id' , $post_id)->count();
      return $result;
  }


}
