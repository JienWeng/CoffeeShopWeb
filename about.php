<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="include/navbar.css">
    <link rel="stylesheet" type="text/css" href="aboutUs.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
    
<!---------navbar----------->
<?php include("include/navbar.php") ?>
<!------------content----------->
<section class="about" id="about">
    <div class="section_container about_container">
        <div class="about_content">
            <h2 class="section_header">About us</h2>
            <p class="section_subheader">
                Cup Corner is founded by a group of coffee enthusiasts and has grown from humble beginnings to become a beloved destination for coffee lovers all over the world. Our journey began with a simple desire: to create a space where the rich aroma of freshly brewed coffee and the warmth of community could coexist seamlessly. Cup Corner stands today as a testament to our passion for coffee, serving a diverse selection of meticulously sourced and expertly crafted beverages. At the heart of our brand is a dedication to quality and a strong belief in building relationships over coffee. Join us at Cup Corner, where each sip reveals a story of passion and excellence. 
            </p>
            <div class="about_flex">
                <div class="about_card">
                    <h4>No.1</h4>
                    <p>Coffee Brand</p>
                </div>
                <div class="about_card">
                    <h4>2094</h4>
                    <p>Stores worldwide</p>
                </div>
                <div class="about_card">
                    <h4>3</h4>
                    <p>Michelin Stars</p>
                </div>
            </div>
        </div>
        <div class="about_image">
            <img src="images/backgroundabout.webp" alt="about"/>
        </div>
    </div>
    </section>
</body>
<footer>
<?php
include('include/footer.php');
?>
</footer>
</html>