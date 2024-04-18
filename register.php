<?php
    session_start();
    include("config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<?php 
include("include/navbar.php") 
?>

<div class="container">
    <div class="box">
        <div class="form-box">
            <?php
            if(isset($_POST["submit"])){
                $firstname = $_POST['first-name'];
                $lastname = $_POST['last-name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Check if the email is already used
                $verify_email = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");
                if(mysqli_num_rows($verify_email) != 0){
                    echo "<div class='message'>
                              <p>Email is already used! Please try another one.</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    // Check if the username is already used
                    $verify_username = mysqli_query($conn, "SELECT Username FROM users WHERE Username='$username'");
                    if(mysqli_num_rows($verify_username) != 0){
                        echo "<div class='message'>
                                  <p>Username is already used! Please try another one.</p>
                              </div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        // Insert user data into the database
                        mysqli_query($conn, "INSERT INTO users(Firstname, Lastname, Username, Email, Password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')") or die("Error Occurred");

                        echo "<div class='message2'>
                                  <p>Registration successful!</p>
                              </div><br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button>";
                    }
                }
            } else {
            ?>

            <h1>Sign Up</h1>
            <form action="" method="post">

                <div class="input">
                    <label for="first-name">First Name</label>
                    <input type="text" placeholder="Enter your first name" name="first-name" id="first-name" required>
                </div>

                <div class="input">
                    <label for="last-name">Last Name</label>
                    <input type="text" placeholder="Enter your last name" name="last-name" id="last-name" required>
                </div>

                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter your username" name="username" id="username" required>
                </div>

                <div class="input">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter your email" name="email" id="email" required>
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" id="password" required>
                </div>

                <div class="input">
                    <div class="btn-field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                </div>
                <div class="link">
                    Already have an account? <a href="login.php">Login now!</a>
                </div>
                
            </form>
        </div>
        <?php } ?>

    </div>
</div>

<footer>
<?php
include('include/footer.php');
?>
</footer>

</body>
</html>

</body>
</html>

   
