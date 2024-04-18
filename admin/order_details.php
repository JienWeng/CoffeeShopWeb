<?php
// Include the database connection file
include('../include/connect.php');

// Check if order ID is provided in the URL
if(isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    
    // Select the order details from the database
    $select_query = "SELECT * FROM orders WHERE order_id = '$orderId'";
    $result = mysqli_query($con, $select_query);
    
    // Check if the order exists
    if(mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
    } else {
        // Redirect to view orders page if order not found
        header("Location: view_orders.php");
        exit();
    }
} else {
    // Redirect to view orders page if order ID is not provided
    header("Location: view_orders.php");
    exit();
}

// Fetch order details from the order_details table based on the order ID
$orderDetailsQuery = "SELECT * FROM order_details WHERE order_id = '$orderId'";
$orderDetailsResult = mysqli_query($con, $orderDetailsQuery);

// Check if the query was successful
if ($orderDetailsResult) {
    // Fetch and store order details data
    $orderDetails = mysqli_fetch_all($orderDetailsResult, MYSQLI_ASSOC);
} else {
    // Handle database error
    $error = "Failed to fetch order details";
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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h2 {
    margin-top: 0;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.orders {
    margin-bottom: 20px;
}

p {
    margin: 0;
}
    </style>
</head>
<body>
    <!-- Add your admin header/navbar here -->

    <div class="container">
        <h2>Order Details</h2>
        <!-- Display order information -->
        <p><strong>Order ID:</strong> <?php echo $order['order_id']; ?></p>
        <p><strong>User ID:</strong> <?php echo $order['user_id']; ?></p>
        <p><strong>Shipping Address:</strong> <?php echo $order['shipping_address']; ?></p>
        <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
        <p><strong>Date Created:</strong> <?php echo $order['date_created']; ?></p>
        
        <!-- Display order details table -->
        <h3>Order Items</h3>
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
            </tbody>
        </table>
        <p><strong>Total Payment (MYR):</strong> MYR <?php echo number_format($totalPrice, 2); ?></p>
    </div>

    <!-- Back to Admin Home Page button -->
    <div class="container">
        <a href="index.php?view_orders" class="btn">Back to Admin Home Page</a>
</body>
</html>
