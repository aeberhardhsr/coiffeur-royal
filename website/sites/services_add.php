<?php
include 'db.php';

if(isset($_POST['createservicebtn']))
{
    $service_name       = $_POST['createServiceModal_name'];
    $service_group_name = $_POST['createServiceModal_DLGroup'];
    $service_duration   = $_POST['createServiceModal_duration'];
    $service_factor     = $_POST['createServiceModal_factor'];
    $service_consumption = $_POST['createServiceModal_consumption'];
    $service_price_kg_liter = $_POST['createServiceModal_price_kg_liter'];
    


    $query = "INSERT INTO services (services_name, services_service_group, services_duration, services_factor, services_consumption, services_price_kg_liter) VALUES ('$service_name', '$service_group_name', '$service_duration', '$service_factor', '$service_consumption', '$service_price_kg_liter')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
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