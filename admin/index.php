<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container .btn {
            margin: 10px;
        }

        .container {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h3>Manage Listing</h3>
    </div>

    <!-- Buttons -->
    <div class="button-container">
        <a href="index.php?insert_product" class="btn btn-primary">Insert Products</a>
        <a href="index.php?view_products" class="btn btn-primary">View Products</a>
        <a href="index.php?insert_category" class="btn btn-primary">Insert Categories</a>
        <a href="index.php?view_categories" class="btn btn-primary">View Categories</a>
        <a href="index.php?view_orders" class="btn btn-primary">View Orders</a>
        <a href="index.php?all_payments" class="btn btn-primary">All Payments</a>
        <a href="index.php?user_list" class="btn btn-primary">List Users</a>
    </div>

    <!-- Content -->
    <div class="container mt-5">
        <?php
        // Include the appropriate file based on the URL parameters
        if(isset($_GET['insert_product'])){
            include('insert_product.php');
        }
        if(isset($_GET['insert_category'])){
            include('insert_category.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_orders'])){
            include('view_orders.php');
        }
        if(isset($_GET['all_payments'])){
            include('all_payments.php');
        }
        if(isset($_GET['user_list'])){
            include('user_list.php');
        }                
        ?>
    </div>
</body>
</html>
