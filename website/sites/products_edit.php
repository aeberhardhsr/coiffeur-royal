<?php
include 'db.php';

if(isset($_POST['editproductbtn']))
{
    $product_id            = $_POST['editProductModal_id'];
    $product_name          = $_POST['editProductModal_name'];
    $product_amount        = $_POST['editProductModal_amount'];
    $product_purch_price   = $_POST['editProductModal_purchaseprice'];
    $product_price_factor  = $_POST['editProductModal_pricefactor'];

    $query = "UPDATE products SET product_name='$product_name', product_amount='$product_amount', product_purchase_price='$product_purch_price', product_price_factor='$product_price_factor' WHERE product_id='$product_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo $customer_id;
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