<?php
include('include/connect.php'); // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $con->prepare("INSERT INTO contact_responses (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Your message has been sent, please wait til our team to contact you shortly.'); window.location.href='contact.php';</script>";
    } else {
        echo "<script>alert('Error sending message.'); window.location.href='contact.php';</script>";
    }

    $stmt->close();
    $con->close();
}
?>
