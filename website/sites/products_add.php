<?php
include 'db.php';

if(isset($_POST['createproductbtn']))
{
    $product_name          = $_POST['createProductModal_name'];
    $product_purch_price   = $_POST['createProductModal_purchaseprice'];
    $product_price_factor  = $_POST['createProductModal_pricefactor'];


    $query = "INSERT INTO products (product_name, product_purchase_price, product_price_factor) VALUES ('$product_name', '$product_purch_price', '$product_price_factor')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Updated');</script>";
        header('Location: products.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>