<?php

// database connection
require_once('database.php');

/**
 * Get all comments  
 */
function getComments()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM comments ORDER BY id");
    $statement->execute();
    return $statement->fetchAll();  
}

/**
 * Get a single comment
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
 * count comment 
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
    $statement  =$db->prepare("INSERT INTO comments(comment, postID) VALUES(:comment, :postID)");
    $statement->execute([
        ':comment' => $comment,
        ':postID' => $postID
    ]);
    return ($statement->rowCount()==1);
}

