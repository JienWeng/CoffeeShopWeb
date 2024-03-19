<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cup Corner Menu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
<!---------navbar----------->
<?php include("include/navbar.php") ?>
    
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
