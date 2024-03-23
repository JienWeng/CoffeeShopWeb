<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["login-user"];
    $password = $_POST["login-pass"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            echo "Login successful!";

            /*temporary*/
            header("Location: home.php");

            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>

