<?php
include 'db.php';

if(isset($_POST['deleteservicegroupbtn']))
{
    $servicegroup_id    = $_POST['deleteServiceGroupModal_id'];
    $servicegroup_name  = $_POST['deleteServiceGroupModal_name'];

    $query = "DELETE FROM service_groups WHERE service_group_id='$servicegroup_id' AND service_group_name='$servicegroup_name'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Deleted');</script>";
        header('Location: service-groups.php');
    }
    else 
    {
        echo "<script> alert('Data not Deleted');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>