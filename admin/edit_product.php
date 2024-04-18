<?php
// Include the database connection file
include('../include/connect.php');

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Select the product details from the database
    $select_query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($con, $select_query);
    
    // Check if the product exists
    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        // Redirect to view products page if product not found
        header("Location: index.php?view_products");
        exit();
    }
} else {
    // Redirect to view products page if product ID is not provided
    header("Location: index.php?view_products");
    exit();
}

// Select all categories from the database
$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($con, $category_query);

// Check if form is submitted
if(isset($_POST['update_product'])) {
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $category_id = $_POST['category_id']; // Newly added
    
    // Update the product in the database
    $update_query = "UPDATE products SET product_title='$product_title', product_price='$product_price', product_description='$product_description', category_id='$category_id' WHERE product_id=$product_id";
    $result = mysqli_query($con, $update_query);
    
    if($result) {
        // Redirect to view products page after successful update
        header("Location: index.php?view_products");
        exit();
    } else {
        echo "Error updating product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        
        textarea {
            height: 150px;
        }
        
        select {
            height: 40px;
        }
        
        input[type="submit"] {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: navy;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Edit Product</h3>
        <form action="" method="post">
            <label for="product_title">Product Title:</label><br>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product['product_title']; ?>"><br>
            
            <label for="product_price">Product Price (MYR):</label><br>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>"><br>
            
            <label for="product_description">Product Description:</label><br>
            <textarea id="product_description" name="product_description"><?php echo $product['product_description']; ?></textarea><br>
            
            <!-- Newly added: Dropdown list for categories -->
            <label for="category_id">Category:</label><br>
            <select id="category_id" name="category_id">
                <?php while($category = mysqli_fetch_assoc($category_result)): ?>
                    <option value="<?php echo $category['category_id']; ?>" <?php if($category['category_id'] == $product['category_id']) echo 'selected'; ?>>
                        <?php echo $category['category_title']; ?>
                    </option>
                <?php endwhile; ?>
            </select><br>
            
            <input type="submit" name="update_product" value="Update Product">
        </form>
    </div>
</body>
</html>

