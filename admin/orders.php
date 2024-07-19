<?php
require_once "includes/header.php"
?>
            <!-- Sales  orders Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Orders And Sales</h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Phone</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // query orders
                                $queryAllOrders = "SELECT * FROM orders ORDER BY orderId DESC";
                                $checkAllOrders = mysqli_query($link, $queryAllOrders);
                                    while (($row = mysqli_fetch_assoc($checkAllOrders)) != null) { ?>
                                        <tr>
                                            <th scope="row">
                                            <?php echo $counter ?>
                                            <td>
                                                <?php echo $row['orderDate']?>
                                            </td>
                                            <td>
                                                <?php echo $row['productId']?>
                                            </td>
                                            <td>
                                                <?php echo $row['productName']?>
                                            </td>
                                            <td><del>N</del>
                                                <?php echo $row['customer']?>
                                            </td>
                                            <td><del>N</del>
                                                <?php echo $row['customerPhoneNumber']?>
                                            </td>
                                            <td><del>N</del>
                                                <?php echo $row['amount']?>
                                            </td>
                                            <td>
                                                <?php echo $row['paymentStatus']?>
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
            <!-- Recent Sales End -->

<?php
    require_once "includes/footer.php";
?>