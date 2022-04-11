<?php
include 'db.php';

if(isset($_POST['deleteproductbtn']))
{
    $product_id     = $_POST['deleteProductModal_id'];
    $product_name   = $_POST['deleteProductModal_name'];

    $query = "DELETE FROM products WHERE product_id='$product_id' AND product_name='$product_name'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Deleted');</script>";
        header('Location: products.php');
    }
    else 
    {
        echo "<script> alert('Data not Deleted');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>