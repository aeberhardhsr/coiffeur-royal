<?php
include 'db.php';


    $additionalratescost_id                 = $_POST['editRatesCostCalculation_id'];
    $additionalratescost_social_charges     = $_POST['editRatesCostCalculation_socialcharges'];  
    $additionalratescost_hour_rate_full     = $_POST['editRatesCostCalculation_hour_rate_full'];
    $additionalratescost_work_hours_full    = $_POST['editRatesCostCalculation_work_hours_full'];
    $additionalratescost_hour_rate_half     = $_POST['editRatesCostCalculation_hour_rate_half'];
    $additionalratescost_work_hours_half    = $_POST['editRatesCostCalculation_work_hours_half'];
    $additionalratescost_hour_rate_three     = $_POST['editRatesCostCalculation_hour_rate_three'];
    $additionalratescost_work_hours_three    = $_POST['editRatesCostCalculation_work_hours_three'];
    $additionalratescost_hour_rate_calc     = $_POST['editRatesCostCalculation_hour_rate_calc'];
    


    $query = "UPDATE cost_calculation SET cost_calculation_social_charges='$additionalratescost_social_charges', 
                                            cost_calculation_hour_rate_full='$additionalratescost_hour_rate_full',
                                            cost_calculation_work_hours_full='$additionalratescost_work_hours_full',
                                            cost_calculation_hour_rate_half='$additionalratescost_hour_rate_half',
                                            cost_calculation_work_hours_half='$additionalratescost_work_hours_half',
                                            cost_calculation_hour_rate_three='$additionalratescost_hour_rate_three',
                                            cost_calculation_work_hours_three='$additionalratescost_work_hours_three'
                                            WHERE cost_calculation_id='$additionalratescost_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo "<script> alert('Data Updated');</script>";
        header('Location: cost-calculation.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
?>