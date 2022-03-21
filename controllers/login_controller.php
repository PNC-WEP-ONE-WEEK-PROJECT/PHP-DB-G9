<?php session_start(); 
require_once('../models/user.php');
$_SESSION['username']= $_POST['username'];
$_SESSION['password']= $_POST['password'];

$user = getUserBy($_SESSION['username'], $_SESSION['password']);
print_r($user['userName']);
if (!empty($_SESSION['username']) && !empty($_SESSION['password'])){
    if ($_SESSION['username'] == $user['userName'] && $_SESSION['password'] == $user['password']){
        header('location: ../views/post_view.php');
    }
    else{
        header('location: ../views/login_view.php');
        die();
    }
}

?>

