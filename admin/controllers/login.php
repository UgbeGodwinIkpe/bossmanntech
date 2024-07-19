<?php
require 'functions.php';
require 'db.php';
$err_msg = [];
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    header('location: index.php');
} else {
    session_destroy();
}

if (isset($_POST['login'])) {
    $err_flag = false;
    if (!empty($_POST['username'])) {
        $username= sanitize($_POST['username']);   
    } else {
        $err_msg[] = "Both username and password can not be empty!";
    }
    if (!empty($_POST['password'])) {
        $pass = sanitize($_POST['password']);
    } else { 
        $err_msg[] = "Both username and password can not be empty!";
    }
    if (empty($err_msg)) {
        $query = "SELECT * FROM admins WHERE username='$username' OR email ='$username'";
        $check = mysqli_query($link, $query);
         if(mysqli_error($link)){
            $err_msg[]=mysqli_error($link);
         }
        $find = mysqli_num_rows($check);
        if ($find >=1) {
            $fetch = mysqli_fetch_assoc($check);
            $user = $fetch['username'];
            $isVerified=password_verify($pass, $fetch['password']);
            if($isVerified){
                session_start();
                $_SESSION['user'] = $user;
                header('location: index.php');

            }else{
                $err_msg[] = "Password is incorrect!";
            }
        } else {
            $err_msg[] = "Username or password is incorrect!";
        }
    }else{
        $err_flag = true;
    }
}

?>