<?php
include("../include/connect.php");

// Product Sales
$query_product_sales = "SELECT product_name AS 'Product',
                                SUM(quantity) AS 'Unit Sold',
                                price_per_unit AS 'Price per Unit',
                                SUM(quantity * price_per_unit) AS 'Total Price'
                         FROM order_details
                         GROUP BY product_name";

$result_product_sales = mysqli_query($con, $query_product_sales);

// Category Sales
$query_category_sales = "SELECT c.category_title AS 'Category',
                                 COUNT(od.product_name) AS 'Frequency of Category Sold',
                                 SUM(od.quantity * od.price_per_unit) AS 'Total Category Sales'
                          FROM order_details od
                          INNER JOIN products p ON od.product_name = p.product_title
                          INNER JOIN categories c ON p.category_id = c.category_id
                          GROUP BY c.category_title";


$result_category_sales = mysqli_query($con, $query_category_sales);

// User Sales
$query_user_sales = "SELECT CONCAT(u.username) AS 'User',
                             COUNT(o.order_id) AS 'User Purchase Frequency',
                             SUM(o.total_payment) AS 'Total User Spending'
                      FROM orders o
                      INNER JOIN users u ON o.user_id = u.id
                      GROUP BY u.id";

$result_user_sales = mysqli_query($con, $query_user_sales);

// Payment Method Sales
$query_payment_method_sales = "SELECT payment_method AS 'Payment Method',
                                        COUNT(order_id) AS 'Frequency of Payment Method Used',
                                        SUM(total_payment) AS 'Total Sales by Payment Method'
                                 FROM orders
                                 GROUP BY payment_method";

$result_payment_method_sales = mysqli_query($con, $query_payment_method_sales);

// Order Sales
$query_order_sales = "SELECT order_id AS 'Order',
                               total_payment AS 'Order Price'
                        FROM orders";

$result_order_sales = mysqli_query($con, $query_order_sales);

// Total Sales
$query_total_sales = "SELECT SUM(total_payment) AS 'Total Sales'
                      FROM orders";

$result_total_sales = mysqli_query($con, $query_total_sales);
$total_sales_row = mysqli_fetch_assoc($result_total_sales);
$total_sales = $total_sales_row['Total Sales'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Sales Report</h2>

        <!-- Product Sales -->
        <h3>Product Sales</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Sold</th>
                    <th>Price per Unit</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_product_sales)) { ?>
                    <tr>
                        <td><?php echo $row['Product']; ?></td>
                        <td><?php echo $row['Unit Sold']; ?></td>
                        <td>MYR <?php echo number_format($row['Price per Unit'], 2); ?></td>
                        <td>MYR <?php echo number_format($row['Total Price'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Category Sales -->
        <h3>Category Sales</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Frequency of Category Sold</th>
                    <th>Total Category Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_category_sales)) { ?>
                    <tr>
                        <td><?php echo $row['Category']; ?></td>
                        <td><?php echo $row['Frequency of Category Sold']; ?></td>
                        <td>MYR <?php echo number_format($row['Total Category Sales'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- User Sales -->
        <h3>User Sales</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>User Purchase Frequency</th>
                    <th>Total User Spending</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_user_sales)) { ?>
                    <tr>
                        <td><?php echo $row['User']; ?></td>
                        <td><?php echo $row['User Purchase Frequency']; ?></td>
                        <td>MYR <?php echo number_format($row['Total User Spending'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Payment Method Sales -->
        <h3>Payment Method Sales</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Payment Method</th>
                    <th>Frequency of Payment Method Used</th>
                    <th>Total Sales by Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_payment_method_sales)) { ?>
                    <tr>
                        <td><?php echo $row['Payment Method']; ?></td>
                        <td><?php echo $row['Frequency of Payment Method Used']; ?></td>
                        <td>MYR <?php echo number_format($row['Total Sales by Payment Method'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Order Sales -->
        <h3>Order Sales</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Order Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_order_sales)) { ?>
                    <tr>
                        <td><?php echo $row['Order']; ?></td>
                        <td>MYR <?php echo number_format($row['Order Price'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Total Sales -->
        <h3>Total Sales</h3>
        <p>Total: MYR <?php echo number_format($total_sales, 2); ?></p>
    </div>
</body>
</html>
