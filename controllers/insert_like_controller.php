<?php
require_once('../models/like.php');
$likeNumber=1;
$post_id=$_POST['like'];
insertLike($post_id, $likeNumber);

header('location: ../views/post_view.php');