<?php
require_once('../models/post.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $content=$_POST["content"];
    $image=$_POST["image"];
    if(!empty($content) || !empty($image)){
        createPost($content, $image);
        header("location: ../index.php");
    }
}
header('location: ../index.php');