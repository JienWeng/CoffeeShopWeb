<?php 
include('../include/connect.php');
?>

<form action="" method="post" enctype="multipart/form-data">
    <!-------title--------->
    <label for="product_title">Enter Product Title: </label>
    <br>
    <input type="text" id="product_title" name="product_title" placeholder="Insert Product Title here" required="required" class="form-control">
    <br>
    <!-------description--------->
    <label for="product_description">Enter Product Description: </label>
    <br>
    <textarea id="product_description" name="product_description" placeholder="Insert Product description here" required="required" class="form-select"></textarea>
    <br>

    <!------category--------->
    <label for="product_category">Select a Product Category: </label>
    <select name="product_category" id="product_category" class="form-select">
        <option value="">Select a category</option>
        <?php 
        $select_query="SELECT * FROM `categories`";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query))
        {
            $category_titles=$row['category_title'];
            $category_id=$row['category_id'];
            echo "<option value='$category_id'>$category_titles</option>";
        }
        ?>
    </select>
    <br>

    <!-----------image------------->
    <label for="product_image">Product Image: </label>
    <input type="file" name="product_image" id="product_image" required="required" class="form-control">
    <br>

    <!-------price----------->
    <label for="poduct_price">Product Price: </label>
    <input type="text" name="product_price" id="product_price" placeholder="RM 0.00" required="required" class="form-control" >
    <br>

    <!--------input-------->
    <input type="submit" name="insert_product" id="insert_product" value="Insert Product">
</form>

<?php 
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];

    //accessing images
    $product_image=$_FILES['product_image']['name'];

    // accessing images tmp name
    $temp_image=$_FILES['product_image']['tmp_name'];

    // checking empty condition
    if($product_title=='' or $product_description=='' or $product_category=='' or $product_price=='' or $product_image==''){
        echo "<script>alert('Please fill all the available fields.')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"./product_images/$product_image");

        //insert query
        $insert_products="INSERT INTO `products` (product_title, product_description, category_id, product_image, product_price) 
        VALUES('$product_title','$product_description','$product_category','$product_image','$product_price')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted product!')</script>";
        }
    }
}
?>