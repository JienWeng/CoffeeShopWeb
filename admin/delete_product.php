<?php
// Include the database connection file
include('../include/connect.php');

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE product_id = $product_id";
    $result = mysqli_query($con, $delete_query);
    
    if($result) {
        // Redirect to view products page after successful deletion
        header("Location: index.php?view_products");
        exit();
    } else {
        echo "Error deleting product.";
    }
} else {
    // Redirect to view products page if product ID is not provided
    header("Location: index.php?view_products");
    exit();
}
?>
