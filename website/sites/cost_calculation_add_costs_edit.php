<?php
include 'db.php';


    $additionalcost_id              = $_POST['editAdditionalCostCalculation_id'];
    $additionalcost_room            = $_POST['editAdditionalCostCalculation_room'];
    $additionalcost_energy          = $_POST['editAdditionalCostCalculation_energy'];
    $additionalcost_water           = $_POST['editAdditionalCostCalculation_water'];
    $additionalcost_waste           = $_POST['editAdditionalCostCalculation_waste'];
    $additionalcost_office          = $_POST['editAdditionalCostCalculation_office'];
    $additionalcost_office_material = $_POST['editAdditionalCostCalculation_officematerial'];
    $additionalcost_drinks          = $_POST['editAdditionalCostCalculation_drinks'];
    $additionalcost_towel           = $_POST['editAdditionalCostCalculation_towel'];
    $additionalcost_accountant      = $_POST['editAdditionalCostCalculation_accountant'];


    $query = "UPDATE cost_calculation SET cost_calculation_space='$additionalcost_room', 
                                            cost_calculation_energy='$additionalcost_energy', 
                                            cost_calculation_water='$additionalcost_water', 
                                            cost_calculation_waste='$additionalcost_waste', 
                                            cost_calculation_office='$additionalcost_office', 
                                            cost_calculation_office_material='$additionalcost_office_material',
                                            cost_calculation_drinks='$additionalcost_drinks',
                                            cost_calculation_towel='$additionalcost_towel',
                                            cost_calculation_accountant='$additionalcost_accountant'
                                            WHERE cost_calculation_id='$additionalcost_id'";
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