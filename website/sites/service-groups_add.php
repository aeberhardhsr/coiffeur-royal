<?php
include 'db.php';

if(isset($_POST['createservicegroupbtn']))
{
    $servicegroup_name      = $_POST['createServiceGroupModal_name'];

    $query = "INSERT INTO service_groups (service_group_name) VALUES ('$servicegroup_name')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Updated');</script>";
        header('Location: service-groups.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>