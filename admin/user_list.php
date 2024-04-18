<?php
// Include the database connection file
include('../include/connect.php');

// Select all users from the database
$select_query = "SELECT * FROM users";
$result = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Table styles (same as before) */
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
        
        /* Icon styles */
        .icon {
            font-size: 18px;
            color: #007bff; /* Blue color */
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>User List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th> 
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // Fetch and display users
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            // Concatenate first name and last name
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
            // Edit icon
            echo "<td><a href='edit_user.php?id=" . $row['id'] . "'><i class='fas fa-edit icon'></i></a></td>";
            // Delete icon
            echo "<td><a href='delete_user.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'><i class='fas fa-trash-alt icon'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
