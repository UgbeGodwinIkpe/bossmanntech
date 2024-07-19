<?php
require 'db.php';
require_once 'functions.php';
require_once 'logout.php';
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $counter=1;
    // query products
    $queryProd = "SELECT * FROM products ORDER BY date_created DESC";
    $checkProducts = mysqli_query($link, $queryProd);
    $totalproducts = mysqli_num_rows($checkProducts);

    // query admins
    $queryAdmins = "SELECT * FROM admins ORDER BY id";
    $checkAdmins = mysqli_query($link, $queryAdmins);
    // query orders
    $queryOrders = "SELECT * FROM orders ORDER BY orderId DESC LIMIT 5";
    $checkOrders = mysqli_query($link, $queryOrders);
    // // select and sum the users' wallet balance
    // $querySum = "SELECT SUM(wallet) FROM users";
    // $checkSum = mysqli_query($link, $querySum);
    // $totalBal = mysqli_fetch_array($checkSum);
    // // select and sum the users' wallet balance
    // $querySumD = "SELECT SUM(amount) FROM topups";
    // $checkSumD = mysqli_query($link, $querySumD);
    // $totalDept = mysqli_fetch_array($checkSumD);
    // // select all from top-us table
    // $queryTopup = "SELECT * FROM topups";
    // $checkTopup= mysqli_query($link, $queryTopup);
    // // query data table for plans and prices
    // $qdata = "SELECT * FROM databundle ORDER BY network DESC";
    // $checkData = mysqli_query($link, $qdata);
    // // query recharge table for airtime prices
    // $qAirtime = "SELECT * FROM recharge ORDER BY network DESC";
    // $checkAirtime = mysqli_query($link, $qAirtime);
    
    
    
    
} else {
    session_destroy();
    header('location: signin.php');
}
?>