<?php
include 'db.php';

if(isset($_POST['editcustomerbtn']))
{
    $customer_id        = $_POST['editCustomerModal_id'];
    $customer_name      = $_POST['editCustomerModal_name'];
    $customer_vorname   = $_POST['editCustomerModal_vorname'];
    $customer_location  = $_POST['editCustomerModal_wohnort'];
    $customer_zipcode   = $_POST['editCustomerModal_plz'];
    $customer_street    = $_POST['editCustomerModal_street'];
    $customer_phone     = $_POST['editCustomerModal_phone'];
    $customer_mail      = $_POST['editCustomerModal_mail'];

    $query = "UPDATE customer SET customer_name='$customer_name', customer_vorname='$customer_vorname', customer_city='$customer_location', customer_zipcode='$customer_zipcode', customer_street='$customer_street', customer_phone='$customer_phone', customer_mail='$customer_mail' WHERE customer_id='$customer_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo $customer_id;
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