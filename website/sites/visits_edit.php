<?php
include 'db.php';

if(isset($_POST['editvisitbtn']))
{
    $visit_id       = $_POST['editVisitModal_id'];
    $visit_name     = $_POST['editVisitModal_name'];
    //$visit_date      = date("d.m.Y", strtotime("today"));
    $visit_date     = $_POST['editVisitModal_date'];
    
    $query = "UPDATE visits SET  visits_customer='$visit_name', visits_datetime='$visit_date' WHERE visits_id='$visit_id'";
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