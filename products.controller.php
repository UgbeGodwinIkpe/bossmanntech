<?php
require_once 'admin/controllers/db.php';
require_once 'admin/controllers/functions.php';
    $counter=1;
    $Available="Available";
    // query products
    $queryProd = "SELECT * FROM products WHERE availability ='$Available' ORDER BY date_created DESC";
    $checkProducts = mysqli_query($link, $queryProd);
    
 ?>