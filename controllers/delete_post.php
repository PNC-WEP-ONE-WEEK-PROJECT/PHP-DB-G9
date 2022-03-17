<?php
/**
 * Your code here
 */
require_once('../models/post.php');

$id = null;
isset($_GET['id']) ? $id = $_GET['id']:null;
if ($id != null){
    deletePost($id);
}
header('location: ../index.php');
