<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cup_corner";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) { // Change $conn to $con
    die("Connection failed: " . mysqli_connect_error());
}
?>
