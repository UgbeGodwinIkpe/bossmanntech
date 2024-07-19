<?php
require_once "includes/header.php";
?>

            <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Available Online Shop Products</h6><a href="product.php" class="btn btn-primary">Add New Product</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Selling Amount</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while (($row = mysqli_fetch_assoc($checkProducts)) != null) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $counter?></th>
                                            <td>
                                                <?php echo $row['id']?>
                                            </td>
                                            <td>
                                                <?php echo $row['product_name']?>
                                            </td>
                                            <td><del>N</del>
                                                <?php echo $row['product_amount']?>
                                            </td>
                                            <td>
                                                <?php echo $row['date_created']?>
                                            </td>
                                            <td>
                                                <?php echo $row['availability']?>
                                            </td>
                                            <td><a class="btn btn-primary">More Detail</a><b class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php
                                    $counter++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

<?php
    require_once "includes/footer.php";
?>