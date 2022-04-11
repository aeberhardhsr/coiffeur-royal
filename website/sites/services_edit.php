<?php
include 'db.php';

if(isset($_POST['editservicebtn']))
{
    $services_id          = $_POST['editServiceModal_id'];
    $services_name        = $_POST['editServiceModal_name'];
    $service_group_name   = $_POST['editServiceModal_DLGroup'];
    $services_duration    = $_POST['editServiceModal_duration'];

    $query = "UPDATE services SET services_name='$services_name', services_service_group='$service_group_name', services_duration='$services_duration' WHERE services_id='$services_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo $customer_id;
        echo "<script> alert('Data Updated');</script>";
        header('Location: services.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>