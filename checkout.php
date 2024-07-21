<?php
require_once 'admin/controllers/db.php';
require_once 'admin/controllers/functions.php';
    $counter=1;
    if(isset($_GET['productId'])){
        $productId=$_GET['productId'];
        // echo $productId;
        // query products
        $queryProd = "SELECT * FROM products WHERE id='$productId'";
        $checkProducts = mysqli_query($link, $queryProd);
        $row = mysqli_fetch_assoc($checkProducts);
    }
require_once 'checkout1.php';
// require_once "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bossmann</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style11.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    </head>
    <body>
        <div class="center-wrapper">
            <div class="content">
                <nav>
                    <!-- <a href="index.php" class="menu">HOME</a> -->
                    <h1 class="logo">Bossmann Technologies</h1>
                    <!-- <div class="icons">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-shopping-bag"></i><span style="margin-left: 0.3rem;">1</span>
                    </div> -->
                </nav>
                <div class="top-bar">
                    <a href="retails.php" style="border:none;"><i class="fas fa-arrow-left" style="color:black"></i></a>
                    <span>Continue shopping</span>
                </div>
                <?php if (!empty($success_msg)) : ?>
                                <div class="container">
                                    <?php foreach ($success_msg as $success) : ?>
                                        <center class="alert alert-success" style="background:green; color:white; padding:5px;"><?php echo $success . '<br>' ?></center>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                <div class="bag">
                    <p class="bag-head"><span style="text-transform: uppercase"><?php echo $row['product_name'];?></span></p>
                </div>
                <div class="bag-product">
                    <div class="image">
                        <img src="admin/<?php echo $row['front_image'];?>" class="<?php echo $row['product_name'];?>" style="width:90%">
                    </div>
                    <div class="description">
                        <p class="product-code small muted">Product code: <?php echo $row['id'];?></p>
                        <h1><?php echo $row['product_name'];?></h1>
                        <!-- <p>Sun</p> -->
                        <p class="description-text"><?php echo $row['product_desc'];?></p>
                        <!-- <p style="margin-bottom: 0.5rem;">One Size</p> -->
                        <h2><del>N</del><spand id="dAmount"><?php echo $row['product_amount'];?></spand></h2>
                        <div class="quantity-wrapper">
                            <div>
                                <label for="quantity" style="margin-right: 0.5rem;">Quantity:</label>
                                <select name="quantity" style="margin-bottom: 1rem;" onchange="calAmount(this.value)">
                                    <option value disabled>Please select</option>
                                    <?php while($counter<=100){?>
                                    <option value="<?php echo $counter ?>" <?php if($counter==1){echo "selected";} ?>><?php echo $counter ?></option>
                                    
                                    <?php $counter++;}?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="bag-total">
                    <div class="subtotal">
                        <p class="small">Subtotal:</p>
                        <p class="small"><del>N</del><span id="dAmount1"><?php echo $row['product_amount'];?></span></p>
                    </div>
                    <div class="delivery">
                        <p class="small">Delivery (Standard - 2 working days):<br>
                            <span class="change-delivery">Free delivery within Abuja</span></p>
                        <!-- <p class="small">Free</p> -->
                    </div>
                    <div class="total">
                        <h3>Total:</h3>
                        <h3><del>N</del><span id="dAmount2"><?php echo $row['product_amount'];?></span></h3>
                    </div>
                    <?php if (!empty($err_msg)) : ?>
                                <div class="container">
                                    <?php foreach ($err_msg as $err) : ?>
                                        <center class="alert alert-danger" style="color:red"><?php echo $err . '<br>' ?></center>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                    <form method="POST">
                        <div style="display:none;">
                        <input type="text" name="productName" value="<?php echo $row['product_name'];?>" id="productName">
                        <input type="number" value="<?php echo $row['product_amount'];?>" id="amount11">
                            <input type="number" name="amount" value="<?php echo $row['product_amount'];?>" id="amount">
                            <input type="text" name="productId" id="productId"  value="<?php echo $row['id'];?>">
                            <input type="number" name="quantity" id="quantity" id="quantity" value="1">
                        </div>
                    <div class="promo-checkbox">
                        <label for="promo-check"><i class="fas fa-user"></i>Customer</label>
                        <input type="text" name="customer" id="customer" placeholder="Enter your full name" required>
                        <p id="required"></p>
                    </div>
                    <div class="promo-checkbox">
                        <label for="phone"><i class="fas fa-phone"></i> Number:</label>
                        <input type="text" name="phoneNumber" id="phone" placeholder="Enter your phone number" required>
                        <p id="required1"></p>
                    </div>
                    <div class="promo-checkbox">
                        <label for="email"><i class="fas fa-envelope"></i> Address:</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email" required>
                        <p id="required2"></p>
                    </div>
                    <div class="promo-checkbox">
                        <label for="address"><i class="fas fa-home"></i> Address:</label>
                        <input type="text" name="address" id="address" placeholder="Enter address of you location" required>
                        <p id="required"></p>
                    </div>
                    <button class="btn-go-checkout" id="cbtn">
                        <i class="fas fa-lock"></i>
                        <span>Go to Checkout</span>
                    </button><br><br>
                    <button class="btn-remove" style="width: 100%;" id="shopPay" name="payAtShop">Order and Pay at the shop</button>
                </form>

                </div>
                <div class="help">
                    <p>Need help? Call: 08130484992</p>
                </div>
            </div>
        </div>
        <div class="bg">
        </div>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <script src="js/script11.js"></script>

    </body>
</html>