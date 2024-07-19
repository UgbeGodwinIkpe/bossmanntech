<?php
require_once 'db.php';
require_once 'functions.php';
$err_msg = [];
$success_msg=[];
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if (isset($_POST['signup'])) {
    $err_flag = false;
    if (!empty($_POST['email'])) {
        $emailTemp = sanitize($_POST['email']);
        if (!check_duplicate('admins', 'email', $emailTemp)) {
            $email = $emailTemp;
        } else {
            $err_msg[] = "Sorry, this email: $emailTemp is already in use";
        }
    } else {
        $err_msg[] = "An email address is necessary";
    }
    if (!empty($_POST['username'])) {
        $usernameTemp = sanitize($_POST['username']);
        if (!check_duplicate('admins', 'username', $usernameTemp)) {
            $username = $usernameTemp;
        } else {
            $err_msg[] = "Sorry, this username: $usernameTemp is already in use, choose another name.";
        }
    } else {
        $err_msg[] = "Username is required!";
    }
    if (!empty($_POST['confirm'])) {
        $confirm = 1;
        
    } else {
        $err_msg[] = "Kindly confirm you really want to add up a new user to the system by ticking the small box.";
    }
    if (!empty($_POST['password'])) {
        $pas = sanitize($_POST['password']);
        $password=password_hash($pas, PASSWORD_DEFAULT);
    } else {
        $err_msg[] = "Password is required!";
    }
    
    if (empty($err_msg)) {
        // $id = rand(5, 1000000000);
        // $key = md5($email);
        $query = "INSERT INTO admins (username, email, password, confirmed) 
                VALUES ('$username', '$email','$password', '$confirm')";
        $ent = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($ent) {
            $success_msg[]="New user has been successfully added.";
        }else{
            $err_msg[]= mysqli_error($link);
        }
    } else {
        $err_flag = true;
    }
}
?>