<?php
// Include the database connection file
include('../include/connect.php');

// Check if category ID is provided in the URL
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
    
    // Delete the category from the database
    $delete_query = "DELETE FROM categories WHERE category_id = $category_id";
    $result = mysqli_query($con, $delete_query);
    
    if($result) {
        // Redirect to view categories page after successful deletion
        header("Location: index.php?view_categories");
        exit();
    } else {
        echo "Error deleting category.";
    }
} else {
    // Redirect to view categories page if category ID is not provided
    header("Location: index.php?view_categories");
    exit();
}
?>
