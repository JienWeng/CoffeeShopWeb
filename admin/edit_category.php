<?php
// Include the database connection file
include('../include/connect.php');

// Check if category ID is provided in the URL
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
    
    // Select the category details from the database
    $select_query = "SELECT * FROM categories WHERE category_id = $category_id";
    $result = mysqli_query($con, $select_query);
    
    // Check if the category exists
    if(mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);
    } else {
        // Redirect to view categories page if category not found
        header("Location: index.php?view_categories");
        exit();
    }
} else {
    // Redirect to view categories page if category ID is not provided
    header("Location: index.php?view_categories");
    exit();
}

// Check if form is submitted
if(isset($_POST['update_category'])) {
    $category_title = $_POST['category_title'];
    
    // Update the category in the database
    $update_query = "UPDATE categories SET category_title='$category_title' WHERE category_id=$category_id";
    $result = mysqli_query($con, $update_query);
    
    if($result) {
        // Redirect to view categories page after successful update
        header("Location: index.php?view_categories");
        exit();
    } else {
        echo "Error updating category.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
        <h3>Edit Category</h3>
        <form action="" method="post">
            <label for="category_title">Category Title:</label><br>
            <input type="text" id="category_title" name="category_title" value="<?php echo isset($category['category_title']) ? $category['category_title'] : ''; ?>"><br>
            
            <input type="submit" name="update_category" value="Update Category">
        </form>
    </div>
</body>
</html>
