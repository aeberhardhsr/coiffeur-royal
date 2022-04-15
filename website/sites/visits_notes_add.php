<?php
include 'db.php';

if(isset($_POST['createvisitnotebtn']))
{
    $visit_id       = $_POST['createVisitNoteModal_id'];
    $visit_note      = $_POST['createVisitNoteModal_name'];
    
    
    $query = "UPDATE visits SET visits_notes='$visit_note' WHERE visits_id='$visit_id'";
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