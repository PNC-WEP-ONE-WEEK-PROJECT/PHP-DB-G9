<?php
require_once('../models/post.php');
if (!empty($_POST['content']) or !empty($_FILES['file_name']['name'])){
    if (isset($_POST['submit'])){
        $content=$_POST["content"];
        $postDate = $_POST['date'];
        $image=$_FILES['file_image']['name'];
        $folder = $_FILES['file_image']['tmp_name'];
        $target = "../post_image/" . $image;
        move_uploaded_file($folder,$target);
        createPost($content, $image,$postDate);
        header('location: ../views/post_view.php');
    }
}
