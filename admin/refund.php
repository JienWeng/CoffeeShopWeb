<?php
// Include the database connection file
include('../include/connect.php');

// Function to delete an order and its details
function deleteOrder($orderId, $connection) {
    // Delete order details first
    $deleteOrderDetailsQuery = "DELETE FROM order_details WHERE order_id = '$orderId'";
    $deleteOrderDetailsResult = mysqli_query($connection, $deleteOrderDetailsQuery);

    // Delete the order
    $deleteOrderQuery = "DELETE FROM orders WHERE order_id = '$orderId'";
    $deleteOrderResult = mysqli_query($connection, $deleteOrderQuery);

    // Return true if both queries executed successfully, otherwise return false
    return $deleteOrderResult && $deleteOrderDetailsResult;
}

// Check if delete request is submitted
if(isset($_GET['order_id'])) {
    $orderIdToDelete = $_GET['order_id'];
    $deleteSuccess = deleteOrder($orderIdToDelete, $con);
    
    if($deleteSuccess) {
        // Order and its details deleted successfully
        echo "<script>alert('Order and its details refunded successfully.')</script>";
    } else {
        // Error deleting order
        echo "<script>alert('Error deleting order.')</script>";
    }
    
    // Redirect to view orders page
    echo "<script>window.location.replace('index.php?view_orders');</script>";
    exit();
} else {
    // Redirect to view orders page if order ID is not provided
    header("Location: index.php?view_orders");
    exit();
}
?>
