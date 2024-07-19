<?php
$host = "localhost";
$user = "root";
//u680663025_cidusface
$passw = "";
// #PassworD1
$db = "bossmann";
// u680663025_comelive
/* Attempt to connect to MySQL database */
$link = mysqli_connect($host, $user, $passw, $db);

// Check connection
if ($link === false) {
     die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>