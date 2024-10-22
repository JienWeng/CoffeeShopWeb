<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cup Coffee Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="menu.css">
    <script src='menu.js'></script>
</head>
<body>
<?php include("include/navbar.php") ?>
<?php 
include('./include/connect.php'); 
include('./functions/common_function.php');
?>

<!-----------contents---------->
<div class="row products-container">
    <div class="col-md-10">
        <!-----------products---------->
        <div class="row">
            <!----------fetching products--------->
            <?php 
            getProducts();
            getUniqueCategory();
            ?>
        </div>
    </div>
    <div class="side-nav col-md-2">
        <!-----------side nav---------->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="#" class="nav-link"><h4>Categories</h4></a>
            </li>
            <?php
            getCategories();
            ?>
        </ul>
    </div>
</div>

<div class='products-preview'>
    <?php 
        getProductPreview();
    ?>
</div>

<footer>
<?php
include('include/footer.php');
?>
</footer>

</body>
</html>
