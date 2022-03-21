<?php

// database connection
require_once('database.php');
/**
 * Get all posts  
 */

function getUsers(){
    global $db;
    $statement = $db->prepare("SELECT * FROM users where  ORDER BY id desc");
    $statement->execute();
    return $statement->fetchAll(); 
}
 function getUserBy($user_name,$password)
{
    global $db;
    $statement= $db->prepare("SELECT * FROM users WHERE userName=:username and password=:password");
    $statement->execute([
        ':username'=>$user_name,
        ':password'=>$password
    ]);
    return $statement->fetch();
}
/**
 * Get a single post
*/
function createUser($user_name, $gender,$phone,$email,$password,$code)
{
    global $db;
    $statement= $db->prepare("INSERT into users(userName,gender,phone,email,password,phoneCode) values (:username,:gender,:phone,:email,:password,:phoneCode)");
    $statement->execute([
        ':username'=>$user_name,
        ':gender'=>$gender,
        ':phone'=>$phone,
        ':email'=>$email,
        ':password'=>$password,
        ':phoneCode'=>$code
    ]);
    return ($statement->rowCount()==1);
}


