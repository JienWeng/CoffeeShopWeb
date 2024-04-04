<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
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
                <a href="#" style="--i:1;">Log In</a>
                <a href="menu.php" style="--i:2;">Menu</a>
                <a href="contact.php" style="--i:3;">Contact</a>
                <a href="#" style="--i:4;">Cart</a>
            </nav>
    </header>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.header{
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    padding: 1.3rem 10%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    background-image: url("bg2.png") ;
}

.header::before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0, .1);
    backdrop-filter: blur(50px);
    z-index: -1;
}

header::after{
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255, .4), transparent);
    z-index: -1;
    transition: .5s;
}

.header:hover::after{
    left: 100%;
}

.logo{
    font-size: 1.5rem;
    color: #fff;
    text-decoration: none;
    font-weight: 700;
}

.navbar a{
    font-size: 1.15rem;
    color: #7B241C;
    text-decoration: none;
    font-weight: 500;
    margin-left: 2.5rem;
    transition: color 0.3s ease;
}

#check{
    display: none;
}

.icons{
    position: absolute;
    right: 5%;
    font-size: 2.8rem;
    color: #7B241C;
    cursor: pointer;
    display: none;
}

@media(max-width: 992px){
    .header{
        padding: 1.3rem 5%;
    }
}

@media (max-width: 768px){
    .icons{
        display: inline-flex;
    }
    
    #check:checked~.icons #menu-icon{
        display: none;
    }   
    .icons #close-icon{
        display: none;
    }
    #check:checked~.icons #close-icon{
        display: block;
    }
    
    .navbar{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 0;
        background: rgba(0, 0, 0, .1);
        backdrop-filter: blur(50px);
        box-shadow: 0.5rem 1rem rgba(0,0,0, .1);
        overflow: hidden;
        transition: .3s ease;
    }
    
    #check:checked~.navbar{
    height: 17.7rem;
    }
    
    .navbar a{
    display: block;
    font-size: 1.1rem;
    margin: 1.5rem 0;
    text-align: center;
    transform: translateY(-50px);
    opacity: 0;
    transition: .3s ease;
    }
    
    #check:checked~.navbar a{
    transform: translateY(0);
    opacity: 1;
    transition-delay: calc(.15s * var(--i));
    }
}

    </style>
</body>
</html>