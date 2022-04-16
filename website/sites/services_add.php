<?php
include 'db.php';


if(isset($_POST['createservicebtn']))
{
    // get the calculated_hour_price from cost_calculation
    $sql = "SELECT cost_calculation_hour_rate_calculated FROM cost_calculation WHERE cost_calculation_id=1";
    $result = mysqli_query($db_conn, $sql);
    $result_cost = mysqli_fetch_array($result);
    
    $service_name           = $_POST['createServiceModal_name'];
    $service_group_name     = $_POST['createServiceModal_DLGroup'];
    $service_duration       = $_POST['createServiceModal_duration'];
    $service_factor         = $_POST['createServiceModal_factor'];
    $service_consumption    = $_POST['createServiceModal_consumption'];
    $service_price_kg_liter = $_POST['createServiceModal_price_kg_liter'];
    $service_sales_price    = (($service_duration / 60 * $result_cost[0]) + (($service_price_kg_liter / 10) * $service_consumption)) * $service_factor;


    $query = "INSERT INTO services (services_name, services_service_group, services_duration, services_factor, services_consumption, services_price_kg_liter, services_sales_price) VALUES ('$service_name', '$service_group_name', '$service_duration', '$service_factor', '$service_consumption', '$service_price_kg_liter', '$service_sales_price')";
    $query_run = mysqli_query($db_conn, $query);

    if($query_run)
    {
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

