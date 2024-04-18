<?php
// Include database connection file
include("../include/connect.php");

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Check if deletion was successful
    if($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "Invalid request.";
}
?>
