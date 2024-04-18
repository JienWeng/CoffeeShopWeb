<?php
// include the database connection file
include('../include/connect.php');

// select all products from the database with their categories
$select_query = "SELECT p.product_id, p.product_title, p.product_price, c.category_title FROM products p JOIN categories c ON p.category_id = c.category_id";
$result = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Table styles (same as before) */
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
        
        /* Icon styles */
        .icon {
            font-size: 18px;
            color: #007bff; /* Blue color */
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>View Products</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price (MYR)</th>
            <th>Category</th> 
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // fetch and display products
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['product_title'] . "</td>";
            echo "<td>MYR " . number_format($row['product_price'], 2) . "</td>";
            echo "<td>" . $row['category_title'] . "</td>"; 
            // Edit icon
            echo "<td><a href='edit_product.php?id=" . $row['product_id'] . "'><i class='fas fa-edit icon'></i></a></td>";
            // Delete icon
            echo "<td><a href='delete_product.php?id=" . $row['product_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\")'><i class='fas fa-trash-alt icon'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
