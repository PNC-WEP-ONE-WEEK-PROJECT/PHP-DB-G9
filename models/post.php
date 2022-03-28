<?php
require_once('database.php');
/**
 * Get all posts  
 */
function getPosts()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM posts ORDER BY id desc");
    $statement->execute();
    return $statement->fetchAll();  
}

/**
 * Get a single post
*/
function getPostById($id)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM posts WHERE id= :id_post");
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
    $statement= $db->prepare("DELETE FROM posts WHERE id= :id");
    $statement->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}

/**
 * Update a post given id and attibutes
 */
function updatePost($id,$content, $image, $postDate)
{
    global $db;
    $statement= $db->prepare("UPDATE posts set content=:content, image=:img, postDate=:post_date WHERE id=:id;");
    $statement->execute([
        ":id"=>$id,
        ":content" => $content,
        ":img" => $image,
        ":post_date"=>$postDate
    ]);
    return ($statement->rowCount()==1);
}

/**
 * Create a new post 
 */
function createPost($content, $image,$postDate)
{
    global $db;
    $statement= $db->prepare("INSERT into posts(content,image,postDate) values (:content,:image,:post_date)");
    $statement->execute([
        ':content' => $content,
        ':image' => $image,
        ':post_date'=> $postDate
    ]);
    return ($statement->rowCount()==1);
}

