<?php
require_once "includes/header.php";
?>

            <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                   <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Admin Users</h6><a href="signup.php" class="btn btn-primary">Add New User</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col">Access Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while (($row = mysqli_fetch_assoc($checkAdmins)) != null) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $counter?></th>
                                            <td>
                                                <?php echo $row['username']?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']?>
                                            </td>
                                            <td>
                                                <?php echo $row['created_at']?>
                                            </td>
                                            <td>
                                                <?php if($row['confirmed']==1){echo "Granted";}else{echo "Denied";} ?>
                                            </td>
                                            <td><a class="btn btn-primary">Denie Access</a><b class="btn btn-danger">Delete</a></td>
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