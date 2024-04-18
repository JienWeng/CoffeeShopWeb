<?php
session_start(); 

include('./include/connect.php');
include('./functions/common_function.php');
include("config.php"); 


if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
    exit; 
}

function getUserInfo() {
    if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
        return [
            'userId' => $_SESSION['userId'],
            //'username' => $_SESSION['username']
        ];
    }
    return null; 
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart_products = [];
$total_price = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $row['quantity'] = $quantity; 
        $cart_products[] = $row;
        $total_price += $row['product_price'] * $quantity; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <link rel="stylesheet" href="cart.css"> 
</head>
<body>
    <?php include("include/navbar.php") ?>

    
    <div class="container mt-5">
         <h1 class="mb-4" style="text-align: center; padding:20px;">Cart</h1>
        <?php if(count($cart_products) > 0): ?>
            <div class="row">
                <div class="col-md-8">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart_products as $product): ?>
                            <tr>
                                <td>
                                <img src="./admin/product_images/<?php echo $product['product_image']; ?>" class="cart-item-image" alt="Product Image">
                        <span class="cart-item-name"><?php echo htmlspecialchars($product['product_title']); ?></span>
                                </td>
                                <td>
                                <?php echo $product['quantity'];?>
                                </td>
                                <td>$<?php echo number_format($product['product_price'], 2); ?></td>
                                <td>
                                    <span class="btn-remove" data-productid="<?php echo $product['product_id']; ?>">Remove</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 mb-3">
                        <h2 style:text-align="right";padding:30px;font-size:50;>Total: $<?php echo number_format($total_price, 2); ?></h2>
                        
                    </div>
                    <br>
                    <?php
                        $userId = $_SESSION['userId'] ?? 'Not logged in';
                        //$username = $_SESSION['username'] ?? 'Not available';
                        // Ensure this key matches exactly

                        echo "UserID: " . htmlspecialchars($userId) . "<br>";
                        //echo "Username: " . htmlspecialchars($username) . "<br>";

                    ?>


                    <!-- Checkout form -->
                    <div class="border p-3">
                        <h2 style="padding-top:50px">Shipping & Payment</h2>
                        <form action="checkout.php" method="post">
                            <div class="mb-3">
                                <label for="shippingAddress" class="form-label" style="font-size:18px; padding:30px;">Shipping Address</label>
                                <input type="text" class="form-control" id="shippingAddress" name="shipping_address" required>
                            </div>
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label"  style="font-size:18px; padding:30px;">Payment Method</label>
                                <select class="form-select" id="paymentMethod" name="payment_method" required>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" style="font-size: 16px; padding: 5px 30px;text-align: center;">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p style="text-align: center; padding:50px;">Your cart is empty.</p>
        <?php endif; ?>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.btn-remove');
    
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-productid');
            fetch('remove_from_cart.php', {
                method: 'POST',
                body: JSON.stringify({ productId: productId }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    
                    window.location.reload();
                } else {
                    alert(data.message); 
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});
</script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
   
</body>
</html>
