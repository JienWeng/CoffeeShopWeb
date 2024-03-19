<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>    
    
<body>
    
    <header class="header">
            <a href="#" class="logo">Cup Corner</a>
            <input type="checkbox" id="check">
            <label for="check" class="icons">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
            </label>
            <nav class="navbar">
                <a href="index.php" style="--i:0;">Home</a>
                <a href="#" style="--i:1;">About</a>
                <a href="#" style="--i:2;">Menu</a>
                <a href="contact.php" style="--i:3;">Contact</a>
                <a href="#" style="--i:4;">Cart</a>
            </nav>
    </header>
</body>
</html>