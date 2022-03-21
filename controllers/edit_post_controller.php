<?php  
require_once('../models/post.php');
if (!empty($_POST['content']) or !empty($_FILES['file_name']['name'])){
    $id = $_POST['id'];
    $content=$_POST["content"];
    $image=$_POST['file'];
    $postDate = $_POST['date'];
    if(!empty($_FILES['file_image']['name'])){
        $image=$_FILES['file_image']['name'];
    }
    $folder = $_FILES['file_image']['tmp_name'];
    $target = "../post_image/" . $image;
    move_uploaded_file($folder,$target);
    updatePost($id,$content, $image, $postDate);
    
    header('location: ../views/post_view.php');
}
?>