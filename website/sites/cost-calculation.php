<?php
    session_start();
    if(isset($_SESSION['User']))
    {
        //echo "Welcome " . $_SESSION['User'];
		// convert user mailadress to only first and lastname
        $mailid = $_SESSION['User'];
        // remove the @ sign
        $username = strstr($mailid, '@', true);
        // split the name.lastname
        $parts = explode(".", $username);
        // write the first letter uppercase
        $lastname = ucfirst(array_pop($parts));
        $firstname = ucfirst(implode(".", $parts));
    }
    else 
    {
        header("Location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>CRM Coiffeur Royal</title>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand text-center" href="dashboard.php">
					<span class="align-middle"><img src="../assets/img/logo/coiffeur_royal.png" width="50%"></span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Tagesgeschäft
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="visits.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Besuch</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="calendar.php">
							<i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Kalender</span>
						</a>
					</li>

					<li class="sidebar-header">
						Stammdaten
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="customers.php">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Kunden</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="products.php">
							<i class="align-middle" data-feather="package"></i> <span class="align-middle">Produkte</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="service-groups.php">
							<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Dienstleistungsgruppen</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="services.php">
							<i class="align-middle" data-feather="file"></i> <span class="align-middle">Dienstleistungen</span>
						</a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="cost-calculation.php">
							<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Kostenrechnung</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<?php
								if($mailid == "werder.steffanie@bluewin.ch")
								{
									echo "<img src='../assets/img/avatars/steffi.jpg' class='avatar img-fluid rounded me-1' alt='Steffanie Werder'/> <span class='text-dark'>" .$lastname . " " . $firstname;
								}
								
								elseif($mailid == "werder.romy@bluewin.ch")
								{
									echo "<img src='../assets/img/avatars/romy.jpg' class='avatar img-fluid rounded me-1' alt='Romy Werder'/> <span class='text-dark'>" . $lastname . " " . $firstname;
								}
								?>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Kostenberechnung</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Nebenkosten</h5>
								</div>
								<div class="card-body">
									<?php
										include 'db.php';
										$sql = "SELECT * FROM cost_calculation";
										$result = mysqli_query($db_conn, $sql);
										$row = mysqli_fetch_assoc($result);
									?>
									<!-- CONTENT GOES HERE -->
                                    <form action="cost_calculation_add_costs_edit.php" method="POST">
										<div class="row mb-3" hidden>
                                          <label for="editAdditionalCostCalculation_id" class="col-sm-2 col-form-label">ID</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" name="editAdditionalCostCalculation_id" id="editAdditionalCostCalculation_id" value="<?php echo $row['cost_calculation_id']?>">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="editAdditionalCostCalculation_room" class="col-sm-2 col-form-label">Raumkosten p. M.</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="editAdditionalCostCalculation_room" id="editAdditionalCostCalculation_room" value="<?php echo $row['cost_calculation_space']?>">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="editAdditionalCostCalculation_energy" class="col-sm-2 col-form-label">Strom</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="editAdditionalCostCalculation_energy" id="editAdditionalCostCalculation_energy" value="<?php echo $row['cost_calculation_energy']?>">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_water" class="col-sm-2 col-form-label">Wasser</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_water" id="editAdditionalCostCalculation_water" value="<?php echo $row['cost_calculation_water']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_waste" class="col-sm-2 col-form-label">Abfall</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_waste" id="editAdditionalCostCalculation_waste" value="<?php echo $row['cost_calculation_waste']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_office" class="col-sm-2 col-form-label">Büro (Admin)</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_office" id="editAdditionalCostCalculation_office" value="<?php echo $row['cost_calculation_office']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_officematerial" class="col-sm-2 col-form-label">Büromaterial</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_officematerial" id="editAdditionalCostCalculation_officematerial" value="<?php echo $row['cost_calculation_office_material']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_drinks" class="col-sm-2 col-form-label">Getränke</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_drinks" id="editAdditionalCostCalculation_drinks" value="<?php echo $row['cost_calculation_drinks']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_towel" class="col-sm-2 col-form-label">Frottiertücher - Service</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_towel" id="editAdditionalCostCalculation_towel" value="<?php echo $row['cost_calculation_towel']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <label for="editAdditionalCostCalculation_accountant" class="col-sm-2 col-form-label">Buchhalter</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="editAdditionalCostCalculation_accountant" id="editAdditionalCostCalculation_accountant" value="<?php echo $row['cost_calculation_accountant']?>">
                                            </div>
                                          </div>
                                          <div class="row mb-3">
										  	<?php
												include 'db.php';
												$sql_nk_sum = "SELECT SUM(cost_calculation_space + cost_calculation_energy + cost_calculation_water + cost_calculation_waste + cost_calculation_office + cost_calculation_office_material + cost_calculation_drinks + cost_calculation_towel + cost_calculation_accountant) FROM cost_calculation";
												$result_nk_sum = mysqli_query($db_conn, $sql_nk_sum);
												$res_nk_sum = mysqli_fetch_array($result_nk_sum);
											?>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nebenkosten p. M.</label>
                                            <div class="col-sm-10">
                                              <input type="number" class="form-control" id="inputPassword3" disabled value="<?php echo $res_nk_sum[0]?>">
                                            </div>
                                          </div>
                                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-success editadditionalcostcalculationbtn" type="submit">Speichern</button>
                                          </div>
                                      </form>
								</div>
							</div>
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Stundensatz</h5>
								</div>
								<div class="card-body">
									<?php
										include 'db.php';
										$sql_rates = "SELECT * FROM cost_calculation";
										$result_rates = mysqli_query($db_conn, $sql_rates);
										$row_rates = mysqli_fetch_assoc($result_rates);
									?>
									<!-- CONTENT GOES HERE -->
                                    <form action="cost_calculation_rates_costs_edit.php" method="POST" class="row g-3">
										<div class="row mb-3" hidden>
                                          <label for="editRatesCostCalculation_id" class="col-sm-2 col-form-label">ID</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" name="editRatesCostCalculation_id" id="editRatesCostCalculation_id" value="<?php echo $row_rates['cost_calculation_id']?>">
                                          </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="editRatesCostCalculation_socialcharges" class="form-label">Sozialabgaben</label>
                                            <input type="text" class="form-control" name="editRatesCostCalculation_socialcharges" id="editRatesCostCalculation_socialcharges" value="<?php echo $row_rates['cost_calculation_social_charges']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_gross_wage_full" class="form-label">Bruttolohn Pensum 100%</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_gross_wage_full" id="editRatesCostCalculation_gross_wage_full" disabled value="<?php echo $row_rates['cost_calculation_hour_rate_full'] * $row_rates['cost_calculation_work_hours_full'] * $row_rates['cost_calculation_social_charges']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_hour_rate_full" class="form-label">Stundensatz</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_hour_rate_full" id="editRatesCostCalculation_hour_rate_full" value="<?php echo $row_rates['cost_calculation_hour_rate_full']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_work_hours_full" class="form-label">Arbeitsstunden p. M.</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_work_hours_full" id="editRatesCostCalculation_work_hours_full" value="<?php echo $row_rates['cost_calculation_work_hours_full']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_gross_wage_half" class="form-label">Bruttolohn Pensum 50%</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_gross_wage_half" id="editRatesCostCalculation_gross_wage_half" disabled value="<?php echo $row_rates['cost_calculation_hour_rate_half'] * $row_rates['cost_calculation_work_hours_half'] * $row_rates['cost_calculation_social_charges']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_hour_rate_half" class="form-label">Stundensatz</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_hour_rate_half" id="editRatesCostCalculation_hour_rate_half" value="<?php echo $row_rates['cost_calculation_hour_rate_half']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editRatesCostCalculation_work_hours_half" class="form-label">Arbeitsstunden p. M.</label>
                                            <input type="number" class="form-control" name="editRatesCostCalculation_work_hours_half" id="editRatesCostCalculation_work_hours_half" value="<?php echo $row_rates['cost_calculation_work_hours_half']?>">
                                        </div>
                                        <div class="col-12">
                                          <label for="editRatesCostCalculation_fte" class="form-label">Kosten 2 Coiffeuse p. M.</label>
										  <?php
										  	$costs_calculated_fte = ($row_rates['cost_calculation_hour_rate_full'] * $row_rates['cost_calculation_work_hours_full'] * $row_rates['cost_calculation_social_charges']) + ($row_rates['cost_calculation_hour_rate_half'] * $row_rates['cost_calculation_work_hours_half'] * $row_rates['cost_calculation_social_charges']) + $res_nk_sum[0]
										  ?>
                                          <input type="text" class="form-control" name="editRatesCostCalculation_fte" id="editRatesCostCalculation_fte" disabled value="<?php echo number_format($costs_calculated_fte,2,'.',"'") ?>">
                                        </div>
                                        <div class="col-12 mb-3">
                                          <label for="editRatesCostCalculation_hour_rate_calc" class="form-label">Stundensatz berechnet</label>
											<?php
												$calculated_hour_rate = (($row_rates['cost_calculation_hour_rate_full'] * $row_rates['cost_calculation_work_hours_full'] * $row_rates['cost_calculation_social_charges']) + ($row_rates['cost_calculation_hour_rate_half'] * $row_rates['cost_calculation_work_hours_half'] * $row_rates['cost_calculation_social_charges']) + $res_nk_sum[0]) / ($row_rates['cost_calculation_work_hours_full'] + $row_rates['cost_calculation_work_hours_half'])
											?>
                                          <input type="text" class="form-control" name="editRatesCostCalculation_hour_rate_calc" id="editRatesCostCalculation_hour_rate_calc" disabled value="<?php echo number_format($calculated_hour_rate,2,'.','')?>">
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button class="btn btn-success editratescostcalculationbtn" type="submit">Speichern</button>
                                            </div>
                                        </div>
                                      </form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<h5 class="text-muted"><strong>Coiffeur Royal &copy; 2022</strong></h5>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../assets/js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


</body>

</html>