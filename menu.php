<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cup Corner Menu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="cupcorner-logo.jpg" width="125px">
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Account</a></li>
                        <li><a href=""><img src="image4.png" width="30px" height="30px"></a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Our Menu</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="small-container">
        <h2 class="title">Coffee</h2>
        <div class="row">
            <?php
            // Sample data for coffee items
            $coffee_items = [
                [
                    'name' => 'Pumpkin Spice Latte',
                    'image' => 'new.coffee.png',
                    'desc' => 'Enjoy the rich blend of pumpkin spice flavors in this seasonal favorite.',
                    'price' => 'RM14.90'
                ],
                [
                    'name' => 'Caramel Apple Latte',
                    'image' => 'new.coffee2.png',
                    'desc' => 'Indulge in the sweet and creamy taste of caramel and apple in every sip.',
                    'price' => 'RM15.90'
                ],
                [
                    'name' => 'Caramel Apple Latte',
                    'image' => 'new.coffee2.png',
                    'desc' => 'Indulge in the sweet and creamy taste of caramel and apple in every sip.',
                    'price' => 'RM15.90'
                ],
                [
                    'name' => 'Caramel Apple Latte',
                    'image' => 'new.coffee2.png',
                    'desc' => 'Indulge in the sweet and creamy taste of caramel and apple in every sip.',
                    'price' => 'RM15.90'
                ],
                [
                    'name' => 'Pumpkin Spice Latte',
                    'image' => 'new.coffee.png',
                    'desc' => 'Enjoy the rich blend of pumpkin spice flavors in this seasonal favorite.',
                    'price' => 'RM14.90'
                ],
                [
                    'name' => 'Caramel Apple Latte',
                    'image' => 'new.coffee2.png',
                    'desc' => 'Indulge in the sweet and creamy taste of caramel and apple in every sip.',
                    'price' => 'RM15.90'
                ],
                [
                    'name' => 'Caramel Apple Latte',
                    'image' => 'new.coffee2.png',
                    'desc' => 'Indulge in the sweet and creamy taste of caramel and apple in every sip.',
                    'price' => 'RM15.90'
                ],
                // Add more coffee items here if needed
            ];
            
            // Display coffee items
            foreach ($coffee_items as $item) {
                echo '<div class="col-4">';
                echo '<img src="' . $item['image'] . '">';
                echo '<h4>' . $item['name'] . '</h4>';
                echo '<p>' . $item['desc'] . '</p>';
                echo '<p>' . $item['price'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    
    <!-- Repeat similar code blocks for other categories like non-coffee, hot meals, pastries, and cakes -->

</body>
</html>
