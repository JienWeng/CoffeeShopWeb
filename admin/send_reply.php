<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if recipient email and reply message are provided
    if (isset($_POST["recipient_email"]) && isset($_POST["reply_message"])) {
        // Sanitize input data
        $recipient_email = filter_var($_POST["recipient_email"], FILTER_SANITIZE_EMAIL);
        $reply_message = htmlspecialchars($_POST["reply_message"]);

        // Set email subject
        $subject = "Reply to Your Inquiry";

        // Compose email headers
        $headers = "From: Your Name <your_email@example.com>\r\n";
        $headers .= "Reply-To: Your Name <your_email@example.com>\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($recipient_email, $subject, $reply_message, $headers)) {
            echo "<script>alert('Reply sent successfully.');</script>";
            echo "<script>window.location.replace('index.php?inbox');</script>"; // Redirect back to inbox after sending reply
            exit();
        } else {
            echo "<script>alert('Failed to send reply. Please try again later.');</script>";
            echo "<script>window.location.replace('index.php?inbox');</script>"; // Redirect back to inbox
            exit();
        }
    } else {
        echo "<script>alert('Recipient email and reply message are required.');</script>";
        echo "<script>window.location.replace('index.php?inbox');</script>"; // Redirect back to inbox
        exit();
    }
} else {
    // Redirect back to inbox if accessed directly
    header("Location: index.php?inbox");
    exit();
}
?>
