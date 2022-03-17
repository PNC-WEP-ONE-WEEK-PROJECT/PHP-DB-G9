<?php

// database connection
$db = new PDO("mysql:host=localhost;dbname=facebook",'root','');
/**
 * Get all posts  
 */
function getPosts()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM posts ORDER BY postID desc");
    $statement->execute();
    return $statement->fetchAll();  
}

/**
 * Get a single post
*/
function getPostById($id)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM posts WHERE postID= :id_post");
    $statement->execute([
        ":id_post" => $id
    ]);
    return $statement->fetch();
}

/**
 * Remove post related to given post id
 */
function deletePost($id)
{
    global $db;
    $statement= $db->prepare("DELETE FROM posts WHERE postID= :id");
    $statement->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}

/**
 * Update a post given id and attibutes
 */
function updatePost($id, $content, $image)
{
    // echo ($content . $image); die;
    global $db;
    $statement= $db->prepare("UPDATE posts set postID=:id, content=:content, image=:img WHERE postID=:id;");
    $statement->execute([
        ":id" => $id,
        ":content" => $content,
        ":img" => $image
    ]);
    return ($statement->rowCount()==1);
}

/**
 * Create a new item 
 */
function createPost($content, $image)
{
    global $db;
    $statement= $db->prepare("INSERT into posts(content,image) values (:content,:image)");
    $statement->execute([
        ':content' => $content,
        ':image' => $image
    ]);
    return ($statement->rowCount()==1);
}
