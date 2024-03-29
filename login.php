<?php
    session_start();
    include("config.php"); // Include config.php to access $conn

    // Initialize $error variable
    $error = "";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['valid'] = $row;
            header("Location: menu.php");
            exit();
        } else {
            $error = "Wrong Username or Password Entered!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <!---------navbar----------->
    <?php include("include/navbar.php") ?>
    <div class="container">
        <div class="box">
            <div class="form-box">
                <!-- Display error message -->
                <?php if(!empty($error)) { ?>
                    <div class="message">
                        <p><?php echo $error; ?></p>
                    </div>
                <?php } ?>
                <h1>Login</h1>
                <form action="" method="post">
                    <div class="input">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter your username" name="username" id="username" required>
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter your password" name="password" id="password" required>
                    </div>
                    <div class="input">
                        <div class="btn-field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                        </div>
                    </div>
                    <div class="link">
                        Don't have an account yet ? <a href="register.php">Sign up now !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <?php include('include/footer.php'); ?>
    </footer>
</body>
</html>
