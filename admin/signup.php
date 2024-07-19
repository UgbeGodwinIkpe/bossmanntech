<?php
require 'controllers/signup.php';
require_once "includes/header.php"
?>


            <!-- Add New User Start -->
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-6">
                        <form action="" method="POST">
                            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <a href="" class="">
                                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADD NEW ADMIN USER</h3>
                                    </a>
                                    <!-- <h3>ADMIN USER</h3> -->
                                </div>
                                <p>Create new user that will be managing the system</p>
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
                                <div class="form-floating mb-3">
                                    <input type="text" name="username" class="form-control" id="floatingText" placeholder="jhondoe">
                                    <label for="floatingText">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="confirm" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1">Do You Really Want To Add New User?</label>
                                    </div>
                                    <!-- <a href="">Forgot Password</a> -->
                                </div>
                                <button type="submit" name="signup" class="btn btn-primary py-3 w-100 mb-4">Add New User</button>
                                <!-- <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Add New User End -->

<?php
require_once "includes/footer.php";
?>