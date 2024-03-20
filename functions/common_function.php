<?php

include ('./include/connect.php');


// getting products
function getProducts(){
    global $con;

    // conditon to check isset or not
if(!isset($_GET['category'])){

    $default_category_id = 1;

    $select_query="SELECT * FROM `products`  WHERE category_id = $default_category_id";
        $result_query=mysqli_query($con, $select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $category_id=$row['category_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            echo "<div class='col-md-4'>
                    <div class='card product' style='width: 18rem;' data-id='$product_id'>
                        <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <h5 class='card-subtitle'>RM $product_price</h5>
                            <a href='#' class='btn btn-primary'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}

// getting unique category

function getUniqueCategory(){
    global $con;

    // conditon to check isset or not
if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query=mysqli_query($con, $select_query);
        $num_rows=mysqli_num_rows($result_query);
        if($num_rows==0){
            echo "<h2 class='text-center text-danger'>There's no item in this categories.</h2>";
        }

        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $category_id=$row['category_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            echo "<div class='col-md-4'>
                    <div class='card product' style='width: 18rem;' data-id='$product_id'>
                        <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <h5 class='card-subtitle'>RM $product_price</h5>
                            <a href='#' class='btn btn-primary'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}

function getCategories(){
    global $con;

    $select_categories="SELECT * FROM `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    while($row=mysqli_fetch_assoc($result_categories)){
        $category_title=$row['category_title'];
        $category_id=$row['category_id'];

        echo "<li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
        </li>";
    }
}

function getProductPreview(){
    global $con;

    // conditon to check isset or not
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";
    } else {
        // If no specific category is requested, retrieve products from the default category
        $default_category_id = 1;
        $select_query = "SELECT * FROM `products` WHERE category_id = $default_category_id";
    }
        $result_query=mysqli_query($con, $select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $category_id=$row['category_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            echo "<div class='preview' data-target='$product_id'>
                    <i class='fa fa-times'></i>
                    <img src='./admin/product_images/$product_image'>
                    <h3>$product_title</h3>
                    <p>$product_description</p>
                    <div class='price'>RM$product_price</div>
                    <div class='buttons'>
                    <a href='#' class='cart'>add to cart</a>
                    </div>
                </div>";
        }
    }

?>