<?php
require_once 'admin/controllers/db.php';
require_once 'admin/controllers/functions.php';
    $counter=1;
    if(isset($_GET['productId'])){
        $productId=$_GET['productId'];
        // echo $productId;
        // query products
        $queryProd = "SELECT * FROM products WHERE id ='$productId'";
        $checkProducts = mysqli_query($link, $queryProd);
        $row = mysqli_fetch_assoc($checkProducts);
    }

require_once "includes/header.php";
?>
      </div>
      <!-- banner bg main end -->
      <!-- electronic section start -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner"><br>
            <h1 class="fashion_taital"><?php echo $row['product_name']?></h1>
                <center>
                    <h4 class="fashion_taital" style="color:#f26522;"><del>N</del> <?php echo $row['product_amount']?></h4>
                    <p class="price_text">Details: <span style="color: #262626;"><?php echo $row['product_desc']?></span></p>
                    <div class="buy_bt"><a href="#"><h1 class="fashion_taital" style="color:#f26522;">Buy Now</h1></a></div>
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