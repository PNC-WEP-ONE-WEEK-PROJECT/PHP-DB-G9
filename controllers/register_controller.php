<?php 
session_start(); 
require_once('../models/database.php');
require_once('../models/user.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_POST['username'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $code = $_POST['phoneCode'];
    if (!empty($user_name) && !empty($gender) && !empty($phone) && !empty($email) && !empty($password) && !empty($code)){
        createUser($user_name, $gender,$phone,$email,$password,$code);
        header('location: ../views/login_view.php');
    }else{
        header('location: ../views/register_view.php');
        die();
    }
}
?>