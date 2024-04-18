<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo json_encode(['status' => 'error', 'message' => 'Cart not initialized']);
    exit;
}

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); // Convert it into an associative array

if(isset($input['productId']) && is_numeric($input['productId'])) {
    $product_id = (int)$input['productId'];
    
    if (isset($_SESSION['cart'][$product_id])) {
        if ($_SESSION['cart'][$product_id] > 1) {
            $_SESSION['cart'][$product_id] -= 1; // Decrement quantity
        } else {
            unset($_SESSION['cart'][$product_id]); // Remove item if quantity is 1
        }
        echo json_encode(['status' => 'success', 'message' => 'Item updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Item not found in cart']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid product ID']);
}
?>
