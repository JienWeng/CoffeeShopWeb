<?php
// Include the database connection file
include("../include/connect.php");

// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Select the user details from the database
    $select_query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($con, $select_query);
    
    // Check if the user exists
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // Redirect to user list page if user not found
        header("Location: index.php?user_list");
        exit();
    }
} else {
    // Redirect to user list page if user ID is not provided
    header("Location: index.php?user_list");
    exit();
}

// Check if form is submitted
if(isset($_POST['update_user'])) {
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    
    // Update the user in the database
    $update_query = "UPDATE users SET firstname='$firstName', lastname='$lastName', email='$email' WHERE id=$user_id";
    $result = mysqli_query($con, $update_query);
    
    if($result) {
        // Redirect to user list page after successful update
        header("Location: index.php?user_list");
        exit();
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
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
        <h3>Edit User</h3>
        <form action="" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" readonly><br>
            
            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName" name="firstName" value="<?php echo $user['firstname']; ?>"><br>
            
            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName" name="lastName" value="<?php echo $user['lastname']; ?>"><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
            
            <input type="submit" name="update_user" value="Update User">
        </form>
    </div>
</body>
</html>
