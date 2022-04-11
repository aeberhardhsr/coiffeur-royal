<?php
include 'db.php';

if(isset($_POST['editservicegroupbtn']))
{
    $servicegroup_id        = $_POST['editServiceGroupModal_id'];
    $servicegroup_name      = $_POST['editServiceGroupModal_name'];

    $query = "UPDATE service_groups SET service_group_name='$servicegroup_name' WHERE service_group_id='$servicegroup_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo $customer_id;
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