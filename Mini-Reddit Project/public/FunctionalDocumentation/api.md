## Table of contents

- [\App\Blocking](#class-appblocking)
- [\App\Community](#class-appcommunity)
- [\App\DownvotedLink](#class-appdownvotedlink)
- [\App\Following](#class-appfollowing)
- [\App\HiddenPost](#class-apphiddenpost)
- [\App\Link](#class-applink)
- [\App\ModerateCommunity](#class-appmoderatecommunity)
- [\App\PushNotification](#class-apppushnotification)
- [\App\SavedLink](#class-appsavedlink)
- [\App\Subscribtion](#class-appsubscribtion)
- [\App\UpvotedLink](#class-appupvotedlink)
- [\App\User](#class-appuser)
- [\App\UsersTokens](#class-appuserstokens)

<hr />

### Class: \App\Blocking

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>blockUser(</strong><em>string</em> <strong>$blocker_username</strong>, <em>string</em> <strong>$blocked_username</strong>)</strong> : <em>bool [ if already blocked return false. otherwise, return true ]</em><br /><em>function to make a user block another user given their usernames where the first username belongs to the one who blocks.</em> |
| public static | <strong>blockedOrBlocker(</strong><em>string</em> <strong>$username1</strong>, <em>mixed</em> <strong>$username2</strong>)</strong> : <em>bool [ true if anyone is blocking the other, false if not ]</em><br /><em>function to check if username1 is blocking another username2 or vice versa.</em> |
| public static | <strong>checkBlock(</strong><em>string</em> <strong>$blocker</strong>, <em>string</em> <strong>$blocked</strong>)</strong> : <em>bool [ if blocker is blocking return true. otherwise, return false ].</em><br /><em>Check if a user is blocking another user given their usernames where the first username belongs to the blocker.</em> |
| public static | <strong>getUsersBlockedByUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ containing blocked usernames ]</em><br /><em>function to get a list of the blocked users by a specific user given his/her username.</em> |
| public static | <strong>getUsersWhoBlockedUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ containing usernames who blocked $username ]</em><br /><em>function to get a list of the users who blocked a specific user given his/her username.</em> |
| public static | <strong>unblockUser(</strong><em>string</em> <strong>$blocker_username</strong>, <em>string</em> <strong>$blocked_username</strong>)</strong> : <em>bool [ if already unblocked return false. otherwise, return true ]</em><br /><em>function to make a user unblock another user given their usernames where the first username belongs to the one who blocked.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\Community

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>communityExist(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>bool [ true or false according to the existance of the community ]</em><br /><em>check if the community exists in the database or not given its id.</em> |
| public static | <strong>communityNameExist(</strong><em>string</em> <strong>$community_name</strong>)</strong> : <em>bool [ true or false according to the existance of the community ] name</em><br /><em>check if the name of this community exist in the database given its name. existance</em> |
| public static | <strong>createDummyCommunity(</strong><em>string</em> <strong>$communityname</strong>)</strong> : <em>object [ the community object that just has been created ]</em><br /><em>create community for testing given its name.</em> |
| public static | <strong>editCommunity(</strong><em>int</em> <strong>$community_id</strong>, <em>\App\text</em> <strong>$rules_content</strong>, <em>\App\text</em> <strong>$description_content</strong>, <em>string</em> <strong>$banner</strong>, <em>string</em> <strong>$logo</strong>)</strong> : <em>bool [ true or false according to the edit success ]</em><br /><em>edit a specific community data given its community_id and its information (content , description , banner and logo).</em> |
| public static | <strong>getCommunitiesByName(</strong><em>string</em> <strong>$comm_name</strong>)</strong> : <em>array [ the array of communities that their name contains the subname ]</em><br /><em>return all the communities that their name contains a specific subname ($comm_name).</em> |
| public static | <strong>getCommunity(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>object [ the community object which given its id ]</em><br /><em>return a specific community given its id. its data</em> |
| public static | <strong>getCommunityByName(</strong><em>string</em> <strong>$community_name</strong>)</strong> : <em>object [ the community object which given its name ]</em><br /><em>return a specific community given its name.</em> |
| public static | <strong>getMaxId()</strong> : <em>int [ the max community_id ]</em><br /><em>return the maximum community id.</em> |
| public static | <strong>removeCommunity(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>bool [ true or false according to the deletion of the community ]</em><br /><em>remove an existing community giving its id.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\DownvotedLink

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>downvoted(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the user downvotes the link and false if not ]</em><br /><em>this function checks if a specific user downvoted a specific link given its id and the username of the user.</em> |
| public static | <strong>remove(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$post_id</strong>)</strong> : <em>bool [ true if the record deleted successfully and false if failed ]</em><br /><em>this function is to remove a recored from  the database relation called 'downvoted_links' given the username of the user and the id of the link given the username and post_id.</em> |
| public static | <strong>store(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$post_id</strong>)</strong> : <em>bool [ true if the creation succeeded and false if it failed ]</em><br /><em>this function creats a new record into the database relation called 'downvoted_links' given the username of the user and the id of the link which he/she upvoted.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\Following

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>CheckExisting(</strong><em>string</em> <strong>$follower</strong>, <em>string</em> <strong>$followed</strong>)</strong> : <em>boolean [ true if the first user follows the other , false otherwise ]</em><br /><em>function to check if a user is following another user given their usernames where the first username belongs to the follower.</em> |
| public static | <strong>createFollow(</strong><em>string</em> <strong>$follower_username</strong>, <em>string</em> <strong>$followed_username</strong>)</strong> : <em>boolean [ If existing, return false. otherwise, create relation and return true ]</em><br /><em>Add a new following relation given both, the username of the follower and the followed user .</em> |
| public static | <strong>deleteFollow(</strong><em>string</em> <strong>$follower_username</strong>, <em>string</em> <strong>$followed_username</strong>)</strong> : <em>boolean [ If not existing, return false. otherwise, delete relation and return true ]</em><br /><em>Remove an existing following relation given the username of the follower and followed users.</em> |
| public static | <strong>getUserFollowers(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$requesting_user</strong>)</strong> : <em>array [ List of users that the username follow ]</em><br /><em>Get the followers of "username" except the blocked or blocking ones from "the requesting user"</em> |
| public static | <strong>getUserFollowing(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$requesting_user</strong>)</strong> : <em>array [ List of users that follows the username ]</em><br /><em>Get the followers of "username" except the blocked or blocking ones from "the requesting user"</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\HiddenPost

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>hidden(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true for hidden, false for unhidden ]</em><br /><em>function to check if a specific link given its id is hidden by a user or not, given the username of that user.</em> |
| public static | <strong>hidePost(</strong><em>int</em> <strong>$post_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the the data recorded successfully and false otherwise ]</em><br /><em>function to store a record in the database relation called "hidden_posts" making a specific user hide a specific post.</em> |
| public static | <strong>unhidePost(</strong><em>int</em> <strong>$post_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the record has been removed successfully and false otherwise ]</em><br /><em>function to delete a record from the database relation called "hidden_posts" making a user who hided a post to unhide it,(given the id of the post and the username of the user).</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\Link

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>Duration(</strong><em>string</em> <strong>$link_date</strong>)</strong> : <em>string [the duration for example "1 min ago"]</em><br /><em>[ this function take the date and return the diffrence in time ]</em> |
| public static | <strong>checkExisting(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>bool</em><br /><em>function to check if a link still exists.</em> |
| public static | <strong>checkPinStatus(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>bool</em><br /><em>function to check if a link is pinned.</em> |
| public static | <strong>commentsNum(</strong><em>int</em> <strong>$post_id</strong>)</strong> : <em>int [ number of comments ].</em><br /><em>function to return the number of comments on a specific post.</em> |
| public static | <strong>commentsOfPostByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>array [description]</em><br /><em>function to get the comments by the given user on the given post.</em> |
| public static | <strong>commentsOfPostsByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>array [ array of objects, each object is a comment of the user on the given post ].</em><br /><em>this function returns all the comments done by a specific user on a specific post.</em> |
| public static | <strong>decrementDownvotes(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>void</em><br /><em>function to decrement the downvotes of a specific link.</em> |
| public static | <strong>decrementUpvotes(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>void</em><br /><em>function to decrement the upvotes of a specific link.</em> |
| public static | <strong>downvotedPostsByUser(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ an array of objects, each object is a downvoted post by the user ].</em><br /><em>it returns the posts that are downvoted by a user given his/her username.</em> |
| public static | <strong>getAuthor(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>string [ -1 if the link doesn't exists or the username of the author of the link if the link exists ].</em><br /><em>this function gets the author's username of a specific link given its id.</em> |
| public static | <strong>getComment(</strong><em>int</em> <strong>$comment_id</strong>)</strong> : <em>object [the comment info]</em><br /><em>[function to get the comment by comment id]</em> |
| public static | <strong>getCommunity(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>int [ -1 if the link doesn't exist and return the community id if the link exists ].</em><br /><em>this function gets the community id where the link is published given the id of the link.</em> |
| public static | <strong>getHiddenPosts(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ list of objects each object is a hidden post ]</em><br /><em>[ funciton to get all the hidden posts ]</em> |
| public static | <strong>getParent(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>int [ parent id / and returns -1 if the link is a post ].</em><br /><em>function to get the parent of a specific link i.e: get the post of the comment or get the comment of the reply.</em> |
| public static | <strong>getPostID(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>int returns the post_id of the link</em><br /><em>function to get the attribute called post_id for a specific link given the link_id.</em> |
| public static | <strong>homePosts(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ list of home posts ].</em><br /><em>return the posts that should appear in the homepage of the user included the posts of the users that our user follows and of the communities that our user subscribe and excluded the posts of the users that our user blocked them or be blocked by our user and then return the posts ordered by the post date.</em> |
| public static | <strong>incrementDownvotes(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>void</em><br /><em>function to increment the downvotes of a specific link.</em> |
| public static | <strong>incrementUpvotes(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>void</em><br /><em>function to increment the upvotes of a specific link.</em> |
| public static | <strong>isCommentByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if it's a comment or a reply bu the user , false if not. ]</em><br /><em>check if the give id is the id of a comment by the given user.</em> |
| public static | <strong>isCommentOrReplyOfPost(</strong><em>int</em> <strong>$comment_id</strong>, <em>int</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if it's a comment or reply on the given post ,false if not ].</em><br /><em>check if the given comment or reply ($comment_id) belongs to the given post ($link_id).</em> |
| public static | <strong>isPostByUser(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if belongs , false if not ].</em><br /><em>function to check if the guven post belongs to the given user.</em> |
| public static | <strong>isPostHasSavedCommentsByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the post has comments or replies saved by the given user,false if not ] .</em><br /><em>this function checks if the given post has comments or replies which are saved by the given user .</em> |
| public static | <strong>ispostHasCommentsByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the post has comments by the user , false if not ].</em><br /><em>function to check if the given post has comments by the given user.</em> |
| public static | <strong>linksOfLink(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>array [description]</em><br /><em>function to get all the comments of a post or all replies of a comment.</em> |
| public static | <strong>popularPosts(</strong><em>string</em> <strong>$username=null</strong>)</strong> : <em>array [ array of objects(posts) ].</em><br /><em>function to get the posts, either for a specific user or the whole posts based of the given argument ( it returns all posts if $username is null , if $username is assigned a username of a user, it returns the posts of that user ).</em> |
| public static | <strong>postsOfcommunity(</strong><em>int</em> <strong>$community_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>array [ list of the required posts ].</em><br /><em>return all the posts of a specific community given its id to a specific user but exclude the posts of the users who block our user or blocked by him/her and then order the posts by date before returning them. to see its posts community posts</em> |
| public static | <strong>postsOrpostsHaveComments(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [description]</em><br /><em>function to return all the posts by the given user or the posts which have comments by the given user.</em> |
| public static | <strong>postsUserCommentedOn(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ array of object, each object is a post that the user commented on or replied on a comment belongs to that post ].</em><br /><em>this function returns all the posts which the user commented on or replied on comments of these posts.</em> |
| public static | <strong>removeLink(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if the deletion succeeded and false if it failed ].</em><br /><em>this function is to remove a specific link from the database relation called 'links' given its id.</em> |
| public static | <strong>savedCommentsOfPostByUser(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>array [ array of objects, each object is a comment of the given post saved by the user ].</em><br /><em>this function returns all the saved comments by a specific user given his/her username on a specific post given its id.</em> |
| public static | <strong>savedPostsOrPostsHaveSavedComments(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ array of objects, each object is a post saved by the user or have comments or replies saved by that user ].</em><br /><em>this function returns the saved posts by the given user or the posts that have comments or replies saved by that user.</em> |
| public static | <strong>scopegetPosts(</strong><em>mixed</em> <strong>$query</strong>)</strong> : <em>object [ query of selected posts ].</em><br /><em>scopegetPosts it's a scope type function which returns a query of all posts which i can use to filter these posts with more checks .</em> |
| public static | <strong>storeLink(</strong><em>array</em> <strong>$link_data</strong>)</strong> : <em>object [ the created link ].</em><br /><em>this function creates a record into the database relation calles 'links' given the id of the link.</em> |
| public static | <strong>togglePinStatus(</strong><em>int</em> <strong>$link_id</strong>)</strong> : <em>bool [ false if the post doesn't exist or anything went wrong , true if it toggled the pinned status successfully ].</em><br /><em>this function toggle the pin status of the post given its id.</em> |
| public static | <strong>updateLinkContent(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$content</strong>)</strong> : <em>int the number of the updated rows</em><br /><em>this function is to update the attribute called content of a spesific row in the relation called links in the database given the id of that link.</em> |
| public static | <strong>updatePostImage(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$image</strong>)</strong> : <em>int the number of the updated rows</em><br /><em>this function is to update the attribute called content_image of a spesific row in the relation called links in the database given the id of that link.</em> |
| public static | <strong>updatePostTitle(</strong><em>int</em> <strong>$post_id</strong>, <em>string</em> <strong>$title</strong>)</strong> : <em>int the number of the updated rows</em><br /><em>this function is to update the attribute called title of a spesific row in the relation called links in the database given the id of that link.</em> |
| public static | <strong>updatePostVideo(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$url</strong>)</strong> : <em>int the number of the updated rows</em><br /><em>this function is to update the attribute called video_url of a spesific row in the relation called links in the database given the id of that link.</em> |
| public static | <strong>upvotedPostsByUser(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ an array of object each object is an upvoted post by the user ].</em><br /><em>it returns the posts that are upvoted by a user.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\ModerateCommunity

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>checkExisting(</strong><em>int</em> <strong>$community_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool true if the user moderates the community and false if not.</em><br /><em>this function checks if a specific user given its username moderates a specific community given its id.</em> |
| public static | <strong>getModerators(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>array [th moderators of specific community]</em><br /><em>[getModerators description].</em> |
| public static | <strong>numberOfModerators(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>int number of moderators</em><br /><em>[numberOfModerators description].</em> |
| public static | <strong>remove(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$community_id</strong>)</strong> : <em>bool [true if deleted successfully , false if not].</em><br /><em>function to remove modirator.</em> |
| public static | <strong>store(</strong><em>int</em> <strong>$community_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the creation succeeded and false if it faild ].</em><br /><em>this function creats a record in the database relation called 'moderate_community' givent the username of the moderator and the community id.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\PushNotification

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>sendNotificationToAllUsers(</strong><em>mixed</em> <strong>$message</strong>)</strong> : <em>void</em> |
| public static | <strong>sendNotificationToSpecificUsers(</strong><em>mixed</em> <strong>$message</strong>, <em>mixed</em> <strong>$users</strong>)</strong> : <em>void</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\SavedLink

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>isSaved(</strong><em>\App\[type]</em> <strong>$link_id</strong>, <em>\App\[type]</em> <strong>$username</strong>)</strong> : <em>bool [true if saved, false if not].</em><br /><em>checks if the given link is saved by the given user.</em> |
| public static | <strong>linkSaved(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [true if saved, false if not ].</em><br /><em>checks if the given user alrady save the given link.</em> |
| public static | <strong>remove(</strong><em>string</em> <strong>$username</strong>, <em>mixed</em> <strong>$link_id</strong>)</strong> : <em>bool [true if deleted successfully , false if not].</em><br /><em>function to unsave link given its id and the username of the user.</em> |
| public static | <strong>store(</strong><em>string</em> <strong>$username</strong>, <em>mixed</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if stored successfully , false if not whatever the reason].</em><br /><em>function to store that the user save the post.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\Subscribtion

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>createDummySubscribtion(</strong><em>int</em> <strong>$community_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>object [the created subscribtion].</em><br /><em>this function to create dummmy subscribtion for unit testing.</em> |
| public static | <strong>numberOfSubscriptions(</strong><em>int</em> <strong>$community_id</strong>)</strong> : <em>int number of subscriptions</em><br /><em>[numberOfSubscriptions description].</em> |
| public static | <strong>remove(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$community_id</strong>)</strong> : <em>bool [true if deleted successfully , false if not].</em><br /><em>function to unsubscribe community given its id and the username of the user.</em> |
| public static | <strong>store(</strong><em>string</em> <strong>$username</strong>, <em>int</em> <strong>$community_id</strong>)</strong> : <em>bool [ true if stored successfully , false if not whatever the reason].</em><br /><em>function to store that the given user subscribed the given community.</em> |
| public static | <strong>subscribed(</strong><em>int</em> <strong>$community_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [true if subscribed, false if not ].</em><br /><em>checks if the given user subscribed the given community.</em> |
| public static | <strong>subscribed_communities(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ list of all communities subscribed by the given user ].</em><br /><em>function to get the communities subsribed by a user given its username.</em> |
| public static | <strong>subscribed_communities_data(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ list of all communities subscribed by the given user ].</em><br /><em>function to get the communities subsribed by a user given its username.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\UpvotedLink

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>remove(</strong><em>string</em> <strong>$username</strong>, <em>mixed</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if the record deleted successfully and false if failed ].</em><br /><em>this function is to remove a recored from  the database relation called 'upvoted_links' given the username and post_id.</em> |
| public static | <strong>store(</strong><em>string</em> <strong>$username</strong>, <em>mixed</em> <strong>$link_id</strong>)</strong> : <em>bool [ true if the creation succeeded and false if it failed ].</em><br /><em>this function creats a new record into the database relation called 'upvoted_links'.</em> |
| public static | <strong>upvoted(</strong><em>int</em> <strong>$link_id</strong>, <em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true if the user upvotes the link and false if not ].</em><br /><em>this function checks if a specific user upvoted a specific link.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

<hr />

### Class: \App\User

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>changeUserPassword(</strong><em>array</em> <strong>$username</strong>, <em>array</em> <strong>$password</strong>)</strong> : <em>object [ the created user object ].</em><br /><em>changes the password of the user.</em> |
| public static | <strong>checkIfPasswordRight(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$password</strong>)</strong> : <em>int [ 1 or according to the success of the update ].</em><br /><em>check if the password entered by the user is right or not.</em> |
| public static | <strong>deleteAccount(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>bool [true if the deletion process succeeded, false otherwise]</em><br /><em>delete account.</em> |
| public static | <strong>deleteUserByUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true or false according t the deletion of the user object ].</em><br /><em>delete specific user from the database.</em> |
| public static | <strong>getHashedPassword(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>string [ hashed password ].</em><br /><em>getHashedPassword.</em> |
| public | <strong>getJWTCustomClaims()</strong> : <em>array</em><br /><em>Return a key value array, containing any custom claims to be added to the JWT.</em> |
| public | <strong>getJWTIdentifier()</strong> : <em>mixed</em><br /><em>Get the identifier that will be stored in the subject claim of the JWT.</em> |
| public static | <strong>getUserWholeRecord(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>object [ the user object wanted ].</em><br /><em>return the data of a specific user given his/her username. data</em> |
| public static | <strong>getUserWholeRecordByEmail(</strong><em>string</em> <strong>$email</strong>)</strong> : <em>object [ the user object wanted ].</em><br /><em>return the data of a specific user given his/her email. data</em> |
| public static | <strong>getUsersByUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>array [ the list of users that their name contains the subname ].</em><br /><em>return list of users that their name contains a specific subname.</em> |
| public static | <strong>getUsersByUsernameExceptblockedOrBlockedBy(</strong><em>mixed</em> <strong>$currentuser</strong>, <em>mixed</em> <strong>$username</strong>)</strong> : <em>array [ the list of users who the current user searching for ].</em><br /><em>return all the users except the blocked users and the users be blocked where $currentuser is the username of the user  who searches for the other users and $username is the subname of the users who the current user. wants to search for them</em> |
| public | <strong>notifications()</strong> : <em>void</em><br /><em>Get the entity's notifications.
        @return \Illuminate\Database\Eloquent\Relations\MorphMany</em> |
| public | <strong>notify(</strong><em>mixed</em> <strong>$instance</strong>)</strong> : <em>void</em><br /><em>Send the given notification.
        @param  mixed  $instance
    @return void</em> |
| public | <strong>notifyNow(</strong><em>mixed</em> <strong>$instance</strong>, <em>array</em> <strong>$channels=null</strong>)</strong> : <em>void</em><br /><em>Send the given notification immediately.
        @param  mixed  $instance
    @param  array|null  $channels
    @return void</em> |
| public | <strong>readNotifications()</strong> : <em>void</em><br /><em>Get the entity's read notifications.
        @return \Illuminate\Database\Query\Builder</em> |
| public | <strong>routeNotificationFor(</strong><em>mixed</em> <strong>$driver</strong>, <em>mixed</em> <strong>$notification=null</strong>)</strong> : <em>void</em><br /><em>Get the notification routing information for the given driver.
        @param  string  $driver
    @param  \Illuminate\Notifications\Notification|null  $notification
    @return mixed</em> |
| public static | <strong>storeUser(</strong><em>array</em> <strong>$user_data</strong>)</strong> : <em>object [ the created user object ].</em><br /><em>takes the data of the user then bcrypt its password then create this user and return it.</em> |
| public | <strong>unreadNotifications()</strong> : <em>void</em><br /><em>Get the entity's unread notifications.
        @return \Illuminate\Database\Query\Builder</em> |
| public static | <strong>updateAboutFunction(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$about</strong>)</strong> : <em>int [ 1 or according to the success of the update ].</em><br /><em>update the display_name of the currently logged in user.</em> |
| public static | <strong>updateDisplayNameFunction(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$displayname</strong>)</strong> : <em>int [ 1 or according to the success of the update ].</em><br /><em>update the display_name of the currently logged in user.</em> |
| public static | <strong>updateProfileImage(</strong><em>array</em> <strong>$username</strong>, <em>array</em> <strong>$image</strong>)</strong> : <em>object [ the created user object ].</em><br /><em>update the profile image.</em> |
| public static | <strong>userExist(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>bool [ true or false according to the existance of the user ].</em><br /><em>check if the user exists in the database or not given the username.</em> |

*This class extends \Illuminate\Foundation\Auth\User*

*This class implements \Illuminate\Contracts\Auth\CanResetPassword, \Illuminate\Contracts\Auth\Access\Authorizable, \Illuminate\Contracts\Auth\Authenticatable, \ArrayAccess, \Illuminate\Contracts\Support\Arrayable, \Illuminate\Contracts\Support\Jsonable, \JsonSerializable, \Illuminate\Contracts\Queue\QueueableEntity, \Illuminate\Contracts\Routing\UrlRoutable, \Tymon\JWTAuth\Contracts\JWTSubject*

<hr />

### Class: \App\UsersTokens

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>getTokensByUsername(</strong><em>mixed</em> <strong>$username</strong>)</strong> : <em>mixed</em> |
| public static | <strong>insertToken(</strong><em>array</em> <strong>$data</strong>)</strong> : <em>object if record inserted successfully returns record. otherwise, false.</em><br /><em>Insert new token of a use.</em> |
| public static | <strong>removeByDate(</strong><em>string</em> <strong>$date</strong>)</strong> : <em>bool if records deleted successfully returns true. otherwise, false.</em><br /><em>Remove records that are invalid before specific time.</em> |
| public static | <strong>removeByToken(</strong><em>string</em> <strong>$token</strong>)</strong> : <em>bool if record deleted successfully returns true. otherwise, false.</em><br /><em>Remove a record with a specific token.</em> |
| public static | <strong>removeByUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>bool if records deleted successfully returns true. otherwise, false.</em><br /><em>Remove records with a specific username.</em> |

*This class extends \Illuminate\Database\Eloquent\Model*

*This class implements \Illuminate\Contracts\Routing\UrlRoutable, \Illuminate\Contracts\Queue\QueueableEntity, \JsonSerializable, \Illuminate\Contracts\Support\Jsonable, \Illuminate\Contracts\Support\Arrayable, \ArrayAccess*

