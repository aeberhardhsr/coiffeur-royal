<?php
include 'db.php';

if(isset($_POST['deleteservicebtn']))
{
    $services_id    = $_POST['deleteServiceModal_id'];
    $services_name  = $_POST['deleteServiceModal_name'];

    $query = "DELETE FROM services WHERE services_id='$services_id' AND services_name='$services_name'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Deleted');</script>";
        header('Location: services.php');
    }
    else 
    {
        echo "<script> alert('Data not Deleted');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>