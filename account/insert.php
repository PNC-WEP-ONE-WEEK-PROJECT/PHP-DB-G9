<?php 

$username = $_POST['username'];
$password = $_POST['pass'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$phoneCode = $_POST['phoneCode'];


if (!empty($username) && !empty($password) && !empty($gender) && !empty($email) && !empty($phoneCode) && !empty($phone)){
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = "";
    $dbname = "facebook";

    // create connection
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    }else{
        $SELECT = 'SELECT Email From users Where Email = ? Limit 1';
        $INSERT = 'INSERT Into users (userName,password,gender,Email,phone,phoneCode) Values(?,?,?,?,?,?)';

        // prepare staement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sssssi',$username,$password,$gender,$email,$phone,$phoneCode);
            $stmt->execute();
            require_once('login.php');
        }else{
            header('location: login.php');
        }
        $stmt->close();
        $conn->close();
    }
}else{
    header('location: register.php');
    die();
}

?>