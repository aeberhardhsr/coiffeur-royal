<?php
include 'db.php';

if(isset($_POST['deletevisitbtn']))
{
    $visit_id      = $_POST['deleteVisitNoteModal_id'];
    $visit_date    = $_POST['deleteVisitModal_date'];
    
    $query = "DELETE FROM visits WHERE visits_id='$visit_id'";
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