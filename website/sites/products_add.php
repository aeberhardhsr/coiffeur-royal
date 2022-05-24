<?php
include 'db.php';

if(isset($_POST['createproductbtn']))
{
    $product_name          = $_POST['createProductModal_name'];
    $product_amount        = $_POST['createProductModal_amount'];
    $product_purch_price   = $_POST['createProductModal_purchaseprice'];
    $product_sales_price   = $_POST['createProductModal_sales_price'];


    $query = "INSERT INTO products (product_name, product_amount, product_purchase_price, product_sales_price) VALUES ('$product_name', '$product_amount', '$product_purch_price', '$product_sales_price')";
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