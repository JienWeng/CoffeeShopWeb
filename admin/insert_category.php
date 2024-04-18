<?php

include('../include/connect.php');
if(isset($_POST['insert_category'])){
    $category_title=$_POST['category'];
    
    // select data from database
    $select_query="SELECT * FROM `categories` WHERE category_title ='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is already existed.')</script>";
    }else{
        $insert_query="insert into `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Category has been inserted successfully!')</script>";
        }
    }
}

?>

<form action="" method="post">
    <label for="category">Enter Category: </label>
    <br>
    <input type="text" id="category" name="category" placeholder="Insert category here">
    <br>
    <input type="submit" id="insert_category" name="insert_category">
</form>