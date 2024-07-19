<?php
require_once 'db.php';
require_once 'functions.php';
$err_msg = [];
$success_msg=[];
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if (isset($_POST['addProduct'])) {
    $err_flag = false;
    if (!empty($_POST['productName'])) {
        $productName = sanitize($_POST['productName']);
    } else {
        $err_msg[] = "Product name can  not be empty!";
    }
    if (!empty($_POST['productDesc'])) {
        $productDesc = sanitize($_POST['productDesc']);
    } else {
        $err_msg[] = "Product description is required!";
    }
    if (!empty($_POST['productAmount'])) {
        $productAmount = sanitize($_POST['productAmount']);
        
    } else {
        $err_msg[] = "Product amount is required!";
    }
    if (!empty($_FILES['frontImage'])) {
        $img=$_FILES['frontImage'];
        $frontImage =upload_image($img, $err_msg);
    } else {
        $err_msg[] = "Front store image cannot be empty!";
    }
    if (!empty($_FILES['frontImage'])) {
        $Image = $_FILES['moreImages'];
        $moreImages = upload_image($Image, $err_msg);
    } else {
        $moreImage = null;
    }
    
    if (empty($err_msg)) {
        $id = rand(5, 1000000000);
        // $key = md5($email);
        $query = "INSERT INTO products (id, product_name, product_desc, product_amount, front_image, more_images) 
                VALUES ('$id', '$productName', '$productDesc','$productAmount', '$frontImage', '$moreImages')";
        $ent = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($ent) {
            $success_msg[]="New product has been successfully added to the online store.";
        }else{
            $err_msg[]= mysqli_error($link);
        }
    } else {
        $err_flag = true;
    }
}
?>