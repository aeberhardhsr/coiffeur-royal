<?php
    session_start();
    if(isset($_SESSION['User']))
    {
        //echo "Welcome " . $_SESSION['User'];
		// convert user login to only first and lastname
        $mailid = $_SESSION['User'];
        // split the name.lastname
        $parts = explode(".", $mailid);
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

	<!-- BEGIN MODAL SECTION -->

	<!-- Modal for Create Service -->
	<div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Dienstleistung hinzufügen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="services_add.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label for="createServiceModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="createServiceModal_name" class="form-control" id="createServiceModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createServiceModal_DLGroup" class="col-sm-4 col-form-label">DL Gruppe</label>
                            <div class="col-sm-8">
								<select name="createServiceModal_DLGroup" id="createServiceModal_DLGroup" class="form-select">
									<option selected disabled>-- Auswählen --</option>
									<?php
									include 'db.php';
									$sql = "SELECT * FROM service_groups";
									$result = mysqli_query($db_conn, $sql);
									if (mysqli_num_rows($result) > 0) 
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo '<option>' . $row['service_group_name'] . '</option>';
										}
										echo "</select>";
									} else {
										echo "0 results";
									}
									mysqli_close($db_conn);
									?>
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createServiceModal_duration" class="col-sm-4 col-form-label">Dauer</label>
                            <div class="col-sm-8">
                                <input type="number" name="createServiceModal_duration" class="form-control" id="createServiceModal_duration">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createServiceModal_factor" class="col-sm-4 col-form-label">Faktor</label>
                            <div class="col-sm-8">
                                <input type="text" name="createServiceModal_factor" class="form-control" id="createServiceModal_factor">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createServiceModal_consumption" class="col-sm-4 col-form-label">Verbrauch (dl)</label>
                            <div class="col-sm-8">
                                <input type="text" name="createServiceModal_consumption" class="form-control" id="createServiceModal_consumption">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createServiceModal_price_kg_liter" class="col-sm-4 col-form-label">Preis pro kg/Liter</label>
                            <div class="col-sm-8">
                                <input type="text" name="createServiceModal_price_kg_liter" class="form-control" id="createServiceModal_price_kg_liter">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="createservicebtn" class="btn btn-success">Hinzufügen</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for edit service -->
	<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Dienstleistung bearbeiten</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="services_edit.php" method="POST">
                    <div class="modal-body">
					<div class="form-group row mb-3">
                            <label for="editServiceModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="editServiceModal_id" class="form-control" id="editServiceModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="editServiceModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="editServiceModal_name" class="form-control" id="editServiceModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editServiceModal_DLGroup" class="col-sm-4 col-form-label">DL Gruppe</label>
                            <div class="col-sm-8">
								<select name="editServiceModal_DLGroup" id="editServiceModal_DLGroup" class="form-select">
									<option selected disabled>-- Auswählen --</option>
									<?php
									include 'db.php';
									$sql = "SELECT * FROM service_groups";
									$result = mysqli_query($db_conn, $sql);
									if (mysqli_num_rows($result) > 0) 
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo '<option>' . $row['service_group_name'] . '</option>';
										}
										echo "</select>";
									} else {
										echo "0 results";
									}
									mysqli_close($db_conn);
									?>
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editServiceModal_duration" class="col-sm-4 col-form-label">Dauer</label>
                            <div class="col-sm-8">
                                <input type="number" name="editServiceModal_duration" class="form-control" id="editServiceModal_duration">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editServiceModal_factor" class="col-sm-4 col-form-label">Faktor</label>
                            <div class="col-sm-8">
                                <input type="text" name="editServiceModal_factor" class="form-control" id="editServiceModal_factor">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editServiceModal_consumption" class="col-sm-4 col-form-label">Verbrauch (dl)</label>
                            <div class="col-sm-8">
                                <input type="text" name="editServiceModal_consumption" class="form-control" id="editServiceModal_consumption">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editServiceModal_price_kg_liter" class="col-sm-4 col-form-label">Preis pro kg/Liter</label>
                            <div class="col-sm-8">
                                <input type="text" name="editServiceModal_price_kg_liter" class="form-control" id="editServiceModal_price_kg_liter">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="editservicebtn" class="btn btn-success">Speichern</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for delete service -->
	<div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Dienstleistung löschen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="services_delete.php" method="POST">
                    <div class="modal-body">
						<div class="form-group row mb-3">
                            <label for="deleteServiceModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteServiceModal_id" class="form-control" id="deleteServiceModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deleteServiceModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteServiceModal_name" class="form-control" id="deleteServiceModal_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="deleteservicebtn" class="btn btn-danger">Löschen</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
		
	<!-- END MODAL SECTION -->




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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="services.php">
							<i class="align-middle" data-feather="file"></i> <span class="align-middle">Dienstleistungen</span>
						</a>
					</li>

					<li class="sidebar-item">
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
								if($mailid == "werder.stefanie")
								{
									echo "<img src='../assets/img/avatars/steffi.jpg' class='avatar img-fluid rounded me-1' alt='Steffanie Werder'/> <span class='text-dark'>" .$lastname . " " . $firstname;
								}
								
								elseif($mailid == "weibel.romy")
								{
									echo "<img src='../assets/img/avatars/romy.jpg' class='avatar img-fluid rounded me-1' alt='Romy Werder'/> <span class='text-dark'>" . $lastname . " " . $firstname;
								}
								?>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profil</a>	
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Hife</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Abmelden</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Dienstleistungsübersicht <button type='button' class='btn mr-1 createservicebtn'><i class='align-middle' data-feather='plus-circle' style='width: 30px; height: 30px;'></i></button></h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">
									<!-- CONTENT GOES HERE -->
                                    <div class="table-responsive">
                                        <table id="example" class="table align-items-center mb-0">
                                          <thead>
                                            <tr>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">ID</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Name</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">DL Gruppe</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Dauer</th>
											  <th style="display: none;" class="text-uppercase text-secondary  font-weight-bolder opacity-7">Faktor</th>
											  <th style="display: none;" class="text-uppercase text-secondary  font-weight-bolder opacity-7">Verbrauch</th>
											  <th style="display: none;" class="text-uppercase text-secondary  font-weight-bolder opacity-7">Preis pro Kg/l</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Verkaufspreis</th>
                                              <th class="text-secondary opacity-7">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
											<?php
												include 'db.php';
												$sql = "SELECT * FROM services";
												$result = mysqli_query($db_conn, $sql);
												if (mysqli_num_rows($result) > 0)
												{
													while ($row = mysqli_fetch_assoc($result))
													{
														echo "<tr>";
															echo "<td>" . $row['services_id'] . "</td>";
															echo "<td>" . $row['services_name'] . "</td>";
															echo "<td>" . $row['services_service_group'] . "</td>";
															echo "<td>" . $row['services_duration'] . "</td>";
															echo "<td style='display: none;'>" . $row['services_factor'] . "</td>";
															echo "<td style='display: none;'>" . $row['services_consumption'] . "</td>";
															echo "<td style='display: none;'>" . $row['services_price_kg_liter'] . "</td>";
															echo "<td>" . $row['services_sales_price'] . "</td>";
															echo "<td class='text-right'>";
																echo "<button type='button' class='btn mr-1 editservicebtn'><i class='align-middle' data-feather='edit' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn mr-1 deleteservicebtn'><i class='align-middle' data-feather='trash' style='width: 25px; height: 25px;'></i></button>";
															echo "</td>";
													}
												}
												else 
												{
													echo "0 Results found";
												}
												mysqli_close($db_conn);
											?>
                                          </tbody>
                                        </table>
									</div>
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
				"lengthMenu": [[-1, 10, 25, 50, 100],["All", 10, 25, 50, 100]]
			});
        } );
    </script>
	<script src="../assets/js/modals.js"></script>


</body>

</html>