<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="include/navbar.css">
    <link rel="stylesheet" type="text/css" href="contactus.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php 
session_start();
include("include/navbar.php"); 

if(isset($_SESSION['feedback'])): ?>
    <div class="feedback"><?= $_SESSION['feedback']; ?></div>
    <?php unset($_SESSION['feedback']); // Remove message after displaying
endif; 
?>

<section class="contact">
    <div class="content">
        <h2>Contact Us</h2>
        <p>Have a question or feedback? Feel free to reach out to us - we'd love to hear from you! Contact Cup Corner today for any inquiries or assistance.</p>
    </div>
    <div class="container">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class="fa fa-map-marker"></i></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>1, Jalan Sungai Long,<br>43200 Kajang, Selangor</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-phone"></i></div>
                <div class="text">
                    <h3>Phone</h3>
                    <p>012-1232094</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <div class="text">
                    <h3>Email</h3>
                    <p>cupcorner@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="contactform">
            <form action="submit_contact.php" method="post">
                <h2>Feedback</h2>
                <div class="inputBox">
                    <input type="text" name="name" required="required">
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <textarea name="message" required="required"></textarea>
                    <span>Type your Message...</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="submit" value="Send">
                </div>
            </form>
        </div>
    </section>
</body>
<footer>
<?php include('include/footer.php'); ?>
</footer>
</html>
