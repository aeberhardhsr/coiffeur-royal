<?php
include 'db.php';

if(isset($_POST['deletecustomerbtn']))
{
    $id                 = $_POST['deleteCustomerModal_id'];
    $customer_name      = $_POST['deleteCustomerModal_name'];

    $query = "DELETE FROM customer WHERE customer_id='$id' AND customer_name='$customer_name'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Deleted');</script>";
        header('Location: customers.php');
    }
    else 
    {
        echo "<script> alert('Data not Deleted');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>