<?php
// Include the database connection file
include('../include/connect.php');

// Select all categories from the database
$select_query = "SELECT * FROM categories";
$result = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Table styles (similar to view_products.php) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Icon styles (same as view_products.php) */
        .icon {
            font-size: 18px;
            color: #007bff; /* Blue color */
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>View Categories</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // Fetch and display categories
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['category_id'] . "</td>";
            echo "<td>" . $row['category_title'] . "</td>";
            // Edit icon
            echo "<td><a href='edit_category.php?id=" . $row['category_id'] . "'><i class='fas fa-edit icon'></i></a></td>";
            // Delete icon
            echo "<td><a href='delete_category.php?id=" . $row['category_id'] . "' onclick='return confirm(\"Are you sure you want to delete this category?\")'><i class='fas fa-trash-alt icon'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
