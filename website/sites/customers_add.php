<?php
include 'db.php';

if(isset($_POST['createcustomerbtn']))
{
    $customer_name      = $_POST['createCustomerModal_name'];
    $customer_vorname   = $_POST['createCustomerModal_vorname'];
    $customer_location  = $_POST['createCustomerModal_wohnort'];
    $customer_zipcode   = $_POST['createCustomerModal_plz'];
    $customer_street    = $_POST['createCustomerModal_street'];


    $query = "INSERT INTO customer (customer_name, customer_vorname, customer_city, customer_zipcode, customer_street) VALUES ('$customer_name', '$customer_vorname', '$customer_location', '$customer_zipcode', '$customer_street')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Updated');</script>";
        header('Location: customers.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>