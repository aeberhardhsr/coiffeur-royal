<?php
include 'db.php';

if(isset($_POST['createvisitbtn']))
{
    $visit_name      = $_POST['createVisitModal_name'];
    //$visit_date      = date("d.m.Y", strtotime("today"));
    $visit_date     = $_POST['createVisitModal_date'];
    $visit_assignee = $_POST['createVisitModal_assignee'];

    $query = "INSERT INTO visits (visits_customer, visits_datetime, visits_assignee) VALUES ('$visit_name', CURDATE(), '$visit_assignee')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Updated');</script>";
        header('Location: visits.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>