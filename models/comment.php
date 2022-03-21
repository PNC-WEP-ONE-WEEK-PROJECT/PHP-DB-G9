<?php

// database connection
require_once('../models/comment.php');
/**
 * Get all posts  
 */
function getComments()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM comments ORDER BY id");
    $statement->execute();
    return $statement->fetchAll();  
}

/**
 * Get a single post
*/
function getCommentById($id)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM comments WHERE id= :id_comment");
    $statement->execute([
        ":id_comment" => $id
    ]);
    return $statement->fetch();
}
function getCommentByPost($post_id)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM comments_on_post WHERE id= :post_id");
    $statement->execute([
        ":post_id" => $post_id
    ]);
    return $statement->fetchAll();
}

/**
 * Create a new comment 
 */

function countComment($post_id){
    global $db;
    $statement=$db->prepare("SELECT COUNT(id) AS 'number' FROM comments WHERE postID=:post_id");
    $statement->execute([
        ':post_id'=>$post_id
    ]);
    return $statement->fetchAll();
}
function createComment($comment, $postID)
{
    global $db;
    $statement= $db->prepare("INSERT into comments(comment,postID) values (:comment,:postID)");
    $statement->execute([
        ':comment' => $comment,
        ':postID' => $postID
    ]);
    return ($statement->rowCount()==1);
}



/**
 * Remove post related to given post id
 */
function deleteComment($id)
{
    global $db;
    $statement= $db->prepare("DELETE FROM comments WHERE commentID= :id");
    $statement->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}

/**
 * Update a post given id and attibutes
 */
function updateComment($id, $comment, $postID)
{
    // echo ($content . $image); die;
    global $db;
    $statement= $db->prepare("UPDATE comments set postID=:id, content=:content, postID=:postID WHERE commentID=:id;");
    $statement->execute([
        ":id" => $id,
        ":comment" => $comment,
        ":postID" => $postID
    ]);
    return ($statement->rowCount()==1);
}

