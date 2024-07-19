<?php
require_once 'products.controller.php';

require_once "includes/header.php";
 ?>

         
      </div>
      <!-- banner bg main end -->
      <!-- electronic section start -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <h1 class="fashion_taital">Our Hot Sales</h1>
                <center>
                    <!-- <div id="sec">
                        <a href="retails.php"><button class="btn btn-primary">Retail Sales</button></a>
                        <a href="enterprise.php"><button class="btn btn-secondary">Enterprise Services</button></a>
                    </div><br> -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Laptops</a>
                            <a class="dropdown-item" href="#">Keyboard/Mouse</a>
                            <a class="dropdown-item" href="#">Storage Devices</a>
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Looking for product to buy?">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522">
                           <i class="fa fa-search"></i>
                           </button>
                            </div>
                        </div>
                    </div>
                </center><br>
                <div class="container row">
                <?php
                  while (($row = mysqli_fetch_assoc($checkProducts)) != null) { ?>
                              <div class="col-lg-4 col-sm-4">
                                 <div class="box_main">
                                    <h4 class="shirt_text"><?php echo $row['product_name']?></h4>
                                    <p class="price_text">Price  <span style="color: #262626;"><del>N</del> <?php echo $row['product_amount']?></span></p>
                                    <div class="electronic_img"><img src="admin/<?php echo $row['front_image']?>"></div>
                                    <div class="btn_main">
                                       <div class="buy_bt"><a href="#">Buy Now</a></div>
                                       <div class="seemore_bt"><a href="details.php?productId=<?php echo $row['id']?>">More Details</a></div>
                                    </div>
                                 </div>
                              </div>
                     <?php
                  $counter++;
               }
               ?>
               </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a> -->
         </div>
      </div>
      <!-- electronic section end -->
      <?php
      require_once "includes/footer.php";
      ?>