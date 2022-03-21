<?php
require_once('../models/comment.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comment=$_POST['comments'];
    $postID=$_POST['postID'];
    $userid = 7;
    createComment($comment, $postID);
};
header('location: ../views/post_view.php');