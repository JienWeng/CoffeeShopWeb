<?php
session_start();

include('config.php'); 


if (!isset($_SESSION['userId']) || $_SESSION['userId'] == null) {
    header('Location: login.php');
    exit;
}


//error_log("All session variables: " . print_r($_SESSION, true));


if (!isset($_SESSION['userId'])) {
    error_log("Session userId not set. Redirecting to login.");
    header('Location: login.php');
    exit;
} else {
    error_log("User is logged in with userId=" . $_SESSION['userId']);
}

// Process the checkout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate unique order ID
    $order_id = uniqid($_SESSION['userId'] . '_');
   
    // Retrieve form data
    $user_id = $_SESSION['userId']; 
    $shipping_address = $_POST['shipping_address']; 
    $payment_method = $_POST['payment_method']; 
    $date_created = date('Y-m-d H:i:s'); 
    $total_payment = 0;

    // Begin database transaction
    mysqli_begin_transaction($con);

    try {
         // Calculate total payment
         foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Retrieve product price
            $product_query = "SELECT product_price FROM products WHERE product_id = ?";
            $product_stmt = $con->prepare($product_query);
            $product_stmt->bind_param("i", $product_id);
            $product_stmt->execute();
            $product_result = $product_stmt->get_result();
            $product_data = $product_result->fetch_assoc();
            $price_per_unit = $product_data['product_price'];
            $total_payment += $quantity * $price_per_unit;
        }

        // Insert order into orders table
        $insert_order_query = "INSERT INTO orders (order_id, user_id, total_payment, shipping_address, payment_method, date_created) 
                                VALUES (?, ?, ?, ?, ?, ?)";
        $insert_order_stmt = $con->prepare($insert_order_query);
        $insert_order_stmt->bind_param("siisss", $order_id, $user_id, $total_payment, $shipping_address, $payment_method, $date_created);
        $insert_order_stmt->execute();
        $insert_order_stmt->close();

        // Insert order details for each item in cart
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Retrieve product details
            $product_query = "SELECT product_title, product_price FROM products WHERE product_id = ?";
            $product_stmt = $con->prepare($product_query);
            $product_stmt->bind_param("i", $product_id);
            $product_stmt->execute();
            $product_result = $product_stmt->get_result();
            $product_data = $product_result->fetch_assoc();
            $product_name = $product_data['product_title'];
            $price_per_unit = $product_data['product_price'];
            $total_payment += $quantity * $price_per_unit;

            // Insert order details into order_details table
            $insert_detail_query = "INSERT INTO order_details (order_id, product_name, price_per_unit, quantity) 
                                    VALUES (?, ?, ?, ?)";
            $insert_detail_stmt = $con->prepare($insert_detail_query);
            $insert_detail_stmt->bind_param("ssdi", $order_id, $product_name, $price_per_unit, $quantity);
            $insert_detail_stmt->execute();
            $insert_detail_stmt->close();
        }

        // Commit transaction
        mysqli_commit($con);

        
        mysqli_commit($con);
        echo "Order placed successfully. Redirecting back to cart in 3 seconds...";
        unset($_SESSION['cart']); 
        echo "<meta http-equiv='refresh' content='3;url=cart.php'>"; 
        exit;

    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($con);
        throw $exception;
    }
    
}
?>
