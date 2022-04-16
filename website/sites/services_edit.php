<?php
include 'db.php';

if(isset($_POST['editservicebtn']))
{
    // get the calculated_hour_price from cost_calculation
    $sql = "SELECT cost_calculation_hour_rate_calculated FROM cost_calculation WHERE cost_calculation_id=1";
    $result = mysqli_query($db_conn, $sql);
    $result_cost = mysqli_fetch_array($result);

    $services_id            = $_POST['editServiceModal_id'];
    $services_name          = $_POST['editServiceModal_name'];
    $service_group_name     = $_POST['editServiceModal_DLGroup'];
    $services_duration      = $_POST['editServiceModal_duration'];
    $service_factor         = $_POST['editServiceModal_factor'];
    $service_consumption    = $_POST['editServiceModal_consumption'];
    $service_price_kg_liter = $_POST['editServiceModal_price_kg_liter'];
    $service_sales_price    = (($services_duration / 60 * $result_cost[0]) + (($service_price_kg_liter / 10) * $service_consumption)) * $service_factor;

    $query = "UPDATE services SET services_name='$services_name', services_service_group='$service_group_name', services_duration='$services_duration', services_factor='$service_factor', services_consumption='$service_consumption', services_price_kg_liter='$service_price_kg_liter', services_sales_price='$service_sales_price' WHERE services_id='$services_id'";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
        echo $customer_id;
        echo "<script> alert('Data Updated');</script>";
        header('Location: services.php');
    }
    else 
    {
        echo "<script> alert('Data not Updated');</script>";
        echo("Error Info: " .mysql_error($db_conn));
    }
}
?>