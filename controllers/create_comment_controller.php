<?php
require_once('../models/comment.php');
if(!empty($_POST['comments'])){
    $comment=$_POST['comments'];
    $postID=$_POST['postID'];
    createComment($comment, $postID);
};
header('location: ../views/post_view.php');