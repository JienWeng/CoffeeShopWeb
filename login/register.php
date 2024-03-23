<?php
include("php/config.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = $_POST["first-name"];
    $lastname = $_POST["last-name"];
    $username = $_POST["reg-user"];
    $email = $_POST["reg-email"];
    $password = $_POST["reg-password"];
    $confirm_password = $_POST["confirm-password"];

    $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
    if(mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>