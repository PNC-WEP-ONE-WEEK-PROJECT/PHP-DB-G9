<?php

// database connection
$db = new PDO("mysql:host=localhost;dbname=facebook",'root','');
/**
 * Get all posts  
 */
function getComments()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM comments ORDER BY commentID desc");
    $statement->execute();
    return $statement->fetchAll();  
}

/**
 * Get a single post
*/
function getCommentById($id)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM comments WHERE commentID= :id_comment");
    $statement->execute([
        ":id_comment" => $id
    ]);
    return $statement->fetch();
}

/**
 * Create a new comment 
 */
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
function updatePost($id, $comment, $postID)
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

