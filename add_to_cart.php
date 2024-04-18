<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productId'])) {
    $productId = $data['productId'];
    $increment = $data['increment'] ?? false; 
    
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1; 
    } else if ($increment) {
        $_SESSION['cart'][$productId]++; 
    }

    echo json_encode(['message' => 'Product added to cart successfully.']);
} else {
    echo json_encode(['message' => 'Product ID is missing.']);
}
?>
