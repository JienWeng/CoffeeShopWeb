<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        /* Table styles (similar to previous examples) */
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
        
        .link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>View Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Total Payment (MYR)</th>
            <th>Shipping Address</th>
            <th>Payment Method</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
        <?php
        // Include the database connection file
        include('../include/connect.php');

        // Select all orders from the database
        $select_query = "SELECT * FROM orders";
        $result = mysqli_query($con, $select_query);
        
        // Fetch and display orders
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='order_details.php?order_id=" . $row['order_id'] . "' class='link'>" . $row['order_id'] . "</a></td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>MYR " . number_format($row['total_payment'], 2) . "</td>";
            echo "<td>" . $row['shipping_address'] . "</td>";
            echo "<td>" . $row['payment_method'] . "</td>";
            echo "<td>" . $row['date_created'] . "</td>";
            echo "<td><a href='refund.php?order_id=" . $row['order_id'] . "' onclick='return confirm(\"Are you sure you want to refund this order?\")'>Refund</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
