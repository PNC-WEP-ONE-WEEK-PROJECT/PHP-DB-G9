<?php
/**
 * Your code here
 */
require_once('../models/post.php');
echo 
$id = null;
isset($_GET['id']) ? $id = $_GET['id']:null;
if ($id != null){
    deletePost($id);
}
header('location: ../views/post_view.php');
