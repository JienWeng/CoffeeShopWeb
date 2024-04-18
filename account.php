<?php
    session_start();
    include("config.php"); 
    
    // Check if the user is logged in
    if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
        header("Location: login.php");
        exit();
    }

    // Fetch user's personal information from the database
    $userId = $_SESSION['userId'];
    $query = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        $userData = mysqli_fetch_assoc($result);
    } else {
        // Handle database error
        $error = "Failed to fetch user data";
    }

    // Fetch user's orders from the database and sort by date
    $orderQuery = "SELECT * FROM orders WHERE user_id = $userId ORDER BY date_created DESC";
    $orderResult = mysqli_query($con, $orderQuery);

    // Check if the query was successful
    if ($orderResult) {
        // Fetch and store orders data
        $orders = mysqli_fetch_all($orderResult, MYSQLI_ASSOC);
    } else {
        // Handle database error
        $error = "Failed to fetch user orders";
    }

    // Logout function
    if (isset($_POST['logout'])) {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to login page after logout
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="reAccount.css">
</head>
<body>
    <!-- Include navbar -->
    <?php include("include/navbar.php") ?>
    
    <div class="container">
        <div class="box">
            <div class="form-box">
                <h1>My Account</h1>
                <!-- Display user's personal information -->
                <div class="user-info">
                    <p><strong>First Name:</strong> <?php echo $userData['firstname']; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $userData['lastname']; ?></p>
                    <p><strong>Username:</strong> <?php echo $userData['username']; ?></p>
                    <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                    <!-- You can display more information here if needed -->
                </div>
                <!-- Logout button -->
                <form action="" method="post">
                    <input type="submit" name="logout" value="Logout" class="logout-button">
                </form>
            </div>
        </div>
    </div>

    <!-- Display user's orders -->
    <div class="container">
        <div class="box">
            <div class="form-box">
                <h2>My Orders</h2>
                <div class="orders">
                    <?php if (isset($orders) && !empty($orders)) { ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Payment</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) { ?>
                                    <tr>
                                        <td><a href="order_details.php?order_id=<?php echo $order['order_id']; ?>"><?php echo $order['order_id']; ?></a></td>
                                        <td><?php echo $order['total_payment']; ?></td>
                                        <td><?php echo $order['date_created']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No orders found.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include('include/footer.php'); ?>
    </footer>
</body>
</html>