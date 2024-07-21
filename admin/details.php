<?php
require_once 'controllers/db.php';
require_once 'controllers/functions.php';
    $counter=1;
    if(isset($_GET['productId'])){
        $productId=$_GET['productId'];
        // echo $productId;
        // query products

        $queryProd = "SELECT * FROM orders WHERE productId ='$productId' INNER JOIN products WHERE id='$productId'";
        $checkProducts = mysqli_query($link, $queryProd);
        $row = mysqli_fetch_assoc($checkProducts);
        var_dump($row);
        die();
    }

require_once "includes/header.php";
?>
      <!-- electronic section start -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <h1 class="fashion_taital"><?php echo $row['customer'].' made an order for '.$row['quantity'].' '.$row['productName'].' on '.$row['orderDate']?></h1>
                <center>
                    <h4 class="fashion_taital" style="color:#f26522;">Amount:<del>N</del> <?php echo $row['amount'].''.$row['paymentStauts']?></h4>
                    <p class="price_text">Customer Email: <span style="color: #262626;"><?php echo $row['email']?></span></p>
                    <p class="price_text">Contact Number: <span style="color: #262626;"><?php echo $row['customerPhoneNumber']?></span></p>
                    <p class="price_text">Address: <span style="color: #262626;"><?php echo $row['address']?></span></p>
                    <!--  <div class="buy_bt"><a href="#"><h1 class="fashion_taital" style="color:#f26522;">Buy Now</h1></a></div> -->
                    <!-- <p class="price_text">Price  <span style="color: #262626;"><del>N</del> <?php echo $row['product_amount']?></span></p> -->
                    <div class="container row">
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                <div class="electronic_img"><img src="admin/<?php echo $row['front_image']?>"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <div class="electronic_img">
                                        <img src="admin/<?php echo $row['more_images']?>">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <p>Continue to order this product by clicking the Boy Now button bellow</p>
                    <div class="btn_main">
                        <div class="buy_bt"><a href="retails.php">Go Back</a></div>
                            <div class="buy_bt"><a href="#">Buy Now</a></div>
                    </div>
                </center>
            </div>
         </div>
      </div>
      <!-- electronic section end -->
<?php
require_once "includes/footer.php";
?>