<link rel="stylesheet" href="order_details.css">
<?php
    session_start();
    include("config.php");

    // Check if the order ID is provided in the URL
    if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
        // Redirect the user back to the account page or display an error message
        header("Location: account.php");
        exit();
    }

    // Retrieve the order ID from the URL
    $orderId = $_GET['order_id'];

    // Fetch order details from the database based on the order ID
    $orderQuery = "SELECT * FROM order_details WHERE order_id = '$orderId'";
    $orderResult = mysqli_query($con, $orderQuery);

    // Check if the query was successful
    if ($orderResult) {
        // Fetch and store order details data
        $orderDetails = mysqli_fetch_all($orderResult, MYSQLI_ASSOC);
    } else {
        // Handle database error
        $error = "Failed to fetch order details";
    }

    // Fetch shipping address and payment method from the orders table
    $orderInfoQuery = "SELECT shipping_address, payment_method, date_created FROM orders WHERE order_id = '$orderId'";
    $orderInfoResult = mysqli_query($con, $orderInfoQuery);

    // Check if the query was successful
    if ($orderInfoResult) {
        // Fetch shipping address and payment method
        $orderInfo = mysqli_fetch_assoc($orderInfoResult);
    } else {
        // Handle database error
        $error = "Failed to fetch order information";
    }

    // Calculate total price
    $totalPrice = 0;
    foreach ($orderDetails as $orderDetail) {
        $totalPrice += $orderDetail['quantity'] * $orderDetail['price_per_unit'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Include navbar -->
    <?php include("include/navbar.php") ?>
    
    <div class="container">
        <div class="box">
            <div class="form-box">
                <h2>Order Details</h2>
                <div class="orders">
                    <?php if (isset($orderDetails) && !empty($orderDetails)) { ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price Per Unit (MYR)</th>
                                    <th>Total Price (MYR)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orderDetails as $orderDetail) { ?>
                                    <tr>
                                        <td><?php echo $orderDetail['product_name']; ?></td>
                                        <td><?php echo $orderDetail['quantity']; ?></td>
                                        <td><?php echo number_format($orderDetail['price_per_unit'], 2); ?></td>
                                        <td><?php echo number_format($orderDetail['quantity'] * $orderDetail['price_per_unit'], 2); ?></td>
                                    </tr>
                                <?php } ?>
                                <!-- Display total price -->
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total Price (MYR):</strong></td>
                                    <td><strong><?php echo number_format($totalPrice, 2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No order details found.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Display shipping address and payment method -->
    <div class="container">
        <div class="box">
            <div class="form-box">
                <h2>Order Date</h2>
                <p><?php echo $orderInfo['date_created']; ?></p>
                <br>
                <h2>Shipping Address</h2>
                <p><?php echo $orderInfo['shipping_address']; ?></p>
                <br>
                <h2>Payment Method</h2>
                <p><?php echo $orderInfo['payment_method']; ?></p>
            </div>
        </div>
    </div>

    <!-- Back to Home button -->
    <div class="container">
        <div class="box">
            <div class="form-box">
                <a href="account.php" class="btn">Back to Account</a>
            </div>
        </div>
    </div>    

    <footer>
        <?php include('include/footer.php'); ?>
    </footer>
</body>
</html>
