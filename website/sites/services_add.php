<?php
include 'db.php';

if(isset($_POST['createservicebtn']))
{
    $service_name       = $_POST['createServiceModal_name'];
    $service_group_name = $_POST['createServiceModal_DLGroup'];
    $service_duration   = $_POST['createServiceModal_duration'];
    


    $query = "INSERT INTO services (services_name, services_service_group, services_duration) VALUES ('$service_name', '$service_group_name', '$service_duration')";
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