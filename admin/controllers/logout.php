<?php
if (isset($_POST['logout'])) {
     session_start();
     unset($_SESSION['user']);
     session_destroy();
     header('location: signin.php');
}
?>