<?php
// database connection
require_once('database.php');

/**
 * Get a single like
 * @param integer $post_id : the id of post
 
 * @return associative_array: the likes related to given post id
 */
function getLikeNumber($post_id)
{   
    global $db;
    $statement= $db->prepare("SELECT count(likeNumber) as 'likeNumber', postID FROM likes WHERE postID= :post_id");
    $statement->execute([
        ":post_id" => $post_id
    ]);
    return $statement->fetchAll();
}



/**
 * insert a like 
 * @param integer  $post_id :  	the id of post
 * @param integer $likeNumber :  the number of like
 
 * @return boolean: true if create was successful, false otherwise
 */
function insertLike($post_id, $likeNumber)
{
    global $db;
    $statement= $db->prepare("INSERT into likes(postID,likeNumber) values (:post_id,:likeNubmer)");
    $statement->execute([
        ":post_id" => $post_id,
        ":likeNubmer" => $likeNumber
    ]);
    return ($statement->rowCount()==1);
}
