<?php
require_once('../models/post.php');
if (!empty($_POST['content']) or !empty($_FILES['file_name']['name'])){
    $content=$_POST["content"];
    $image=$_FILES['file_image']['name'];
    $folder = $_FILES['file_image']['tmp_name'];
    $target = "../post_image/" . $image;
    move_uploaded_file($folder,$target);
    createPost($content, $image);
}

header('location: ../index.php');