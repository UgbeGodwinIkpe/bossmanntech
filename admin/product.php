<?php
    require_once "includes/header.php";
    require_once "controllers/product.php";
?>


    <!-- Add New Product Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADD NEW PRODUCT</h3>
                        </a>
                    </div>
                    <p>Enter the product details below to add to the online shop</p>
                    <?php if (!empty($err_msg)) : ?>
                        <div class="container">
                            <?php foreach ($err_msg as $err) : ?>
                                <center class="alert alert-danger"><?php echo $err . '<br>' ?></center>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($success_msg)) : ?>
                        <div class="container">
                            <?php foreach ($success_msg as $success) : ?>
                                <center class="alert alert-success"><?php echo $success . '<br>' ?></center>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype='multipart/form-data'>
                    <div class="form-floating mb-3">
                        <input type="text" name="productName" class="form-control" id="floatingText" placeholder="jProduct Name">
                        <label for="floatingText">Product Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <textarea type="text" name="productDesc" rows="10" class="form-control" id="floatingDescription" placeholder="Describe the product including the product's specification"></textarea>
                        <label for="floatingDescription">Describe the product including the product's specification..</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="productAmount" min="1000" class="form-control" id="floatingInput" placeholder="Amount">
                        <label for="floatingInput">Amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="frontImage" class="form-control" id="floatingStoreImage" placeholder="Attach Store Front Image">
                        <label for="floatingStoreImage">Store Front Image</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="moreImages" class="form-control" id="floatingStoreImages" placeholder="Attach more Images" multiple>
                        <label for="floatingStoreImages">More Images</label>
                    </div>
                    <button type="submit" name="addProduct" class="btn btn-primary py-3 w-100 mb-4">Add New Product</button>
                    <!-- <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Product End -->


<?php
require_once "includes/footer.php";
?>