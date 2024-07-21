<?php
if (isset($_POST['payAtShop'])) {
    $err_flag = false;
    if (!empty($_POST['customer'])) {
        $customer= sanitize($_POST['customer']);   
    } else {
        $err_msg[] = "Name field can not be empty!";
    }
    if (!empty($_POST['email'])) {
        $email = sanitize($_POST['email']);
    } else { 
        $err_msg[] = "Email field can not be empty!";
    }
    if (!empty($_POST['phoneNumber'])) {
        $phone = sanitize($_POST['phoneNumber']);
    } else { 
        $err_msg[] = "Phone Number field can not be empty!";
    }
    if (!empty($_POST['address'])) {
        $address = sanitize($_POST['address']);
    } else { 
        $err_msg[] = "Address field can not be empty!";
    }
    if (!empty($_POST['amount'])) {
        $amount = sanitize($_POST['amount']);
    } else { 
        $err_msg[] = "Amount field can not be empty!";
    }
    if (!empty($_POST['quantity'])) {
        $quantity = sanitize($_POST['quantity']);
    } else { 
        $err_msg[] = "Quantity field can not be empty!";
    }
    if (!empty($_POST['productName'])) {
        $productName = sanitize($_POST['productName']);
    } else { 
        $err_msg[] = "Product name field can not be empty!";
    }
    if (!empty($_POST['productId'])) {
        $productId = sanitize($_POST['productId']);
    } else { 
        $err_msg[] = "Product ID field can not be empty!";
    }
    
    if (empty($err_msg)) {
        $orderId = rand(5, 100000000);
        $payStatus = "Not yet";
        $query = "INSERT INTO orders (orderId, productId, productName, customer, customerPhoneNumber, email, address, quantity, amount, paymentStatus) 
                VALUES ('$orderId', '$productId','$productName', '$customer', '$phone', '$email', '$address', '$quantity', '$amount', '$payStatus')";
        $ent = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($ent) {
            $success_msg[]="Order Placed Successfulled!";
            ?>
            <script>
                return Swal.fire({
                    title: "Order Placed Successfulled!",
                    text: "Your order has been placed, our marketing team will contact you soon.",
                    icon: "success",
                    // button: "Ok",
                    }).then(()=>console.log("Success!"))
            </script>
            <?php
        }else{
            $err_msg[]= mysqli_error($link);
        }
    } else {
        $err_flag = true;
    }
}
?>