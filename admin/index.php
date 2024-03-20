<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../menu.css">
</head>
<body>
    <!--------navbar-------->
    <div class="container-fluid">
        <!------first child--------->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-------- second child ----------->
        <div class="bg-light admin-listing-header">
            <h3>Manage Listing</h3>
        </div>

        <!----- third child ------->
        <div class="row">
            <div class="col-md-12 bg-secondary d-flex third-child">
                <div>
                    <a href=""><img src="../images/americano.jpg" alt="" class="admin-img"></a>
                    <p class="admin-name">admin name</p>
                </div>
                <div class="button admin-panel-button">
                    <button><a href="index.php?insert_product" class="nav-link">Insert Products</a></button>
                    <button><a href="" class="nav-link">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link">Insert Categories</a></button>
                    <button><a href="" class="nav-link">View Categories</a></button>
                    <button><a href="" class="nav-link">All Orders</a></button>
                    <button><a href="" class="nav-link">All Payments</a></button>
                    <button><a href="" class="nav-link">List Users</a></button>
                    <button><a href="" class="nav-link">Logout</a></button>
                </div>
            </div>
        </div>

        <!--------- forth child--------->
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }
            if(isset($_GET['insert_category'])){
                include('insert_category.php');
            }
            ?>
        </div>
    </div>

</body>
</html>