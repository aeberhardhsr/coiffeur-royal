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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>CRM Coiffeur Royal</title>
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>

	<!-- BEGIN MODAL SECTION -->

	<!-- Modal for Create Customers -->
	<div class="modal fade" id="createCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kunde hinzufügen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="customers_add.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label for="createCustomerModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="createCustomerModal_name" class="form-control" id="createCustomerModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createCustomerModal_vorname" class="col-sm-4 col-form-label">Vorname</label>
                            <div class="col-sm-8">
                                <input type="text" name="createCustomerModal_vorname" class="form-control" id="createCustomerModal_vorname">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createCustomerModal_wohnort" class="col-sm-4 col-form-label">Wohnort</label>
                            <div class="col-sm-8">
                                <input type="text" name="createCustomerModal_wohnort" class="form-control" id="createCustomerModal_wohnort">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createCustomerModal_plz" class="col-sm-4 col-form-label">PLZ</label>
                            <div class="col-sm-8">
                                <input type="text" name="createCustomerModal_plz" class="form-control" id="createCustomerModal_plz">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createCustomerModal_street" class="col-sm-4 col-form-label">Strasse</label>
                            <div class="col-sm-8">
                                <input type="text" name="createCustomerModal_street" class="form-control" id="createCustomerModal_street">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="createcustomerbtn" class="btn btn-success">Hinzufügen</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for edit customer -->
	<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kunde bearbeiten</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="customers_edit.php" method="POST">
                    <div class="modal-body">
						<div class="form-group row mb-3">
                            <label for="editCustomerModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_id" class="form-control" id="editCustomerModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="editCustomerModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_name" class="form-control" id="editCustomerModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editCustomerModal_vorname" class="col-sm-4 col-form-label">Vorname</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_vorname" class="form-control" id="editCustomerModal_vorname">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editCustomerModal_wohnort" class="col-sm-4 col-form-label">Wohnort</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_wohnort" class="form-control" id="editCustomerModal_wohnort">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editCustomerModal_plz" class="col-sm-4 col-form-label">PLZ</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_plz" class="form-control" id="editCustomerModal_plz">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editCustomerModal_street" class="col-sm-4 col-form-label">Strasse</label>
                            <div class="col-sm-8">
                                <input type="text" name="editCustomerModal_street" class="form-control" id="editCustomerModal_street">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="editcustomerbtn" class="btn btn-success">Speichern</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for delete customer -->
	<div class="modal fade" id="deleteCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kunde löschen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="customers_delete.php" method="POST">
                    <div class="modal-body">
						<div class="form-group row mb-3">
                            <label for="deleteCustomerModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_id" class="form-control" id="deleteCustomerModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deleteCustomerModal_name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_name" class="form-control" id="deleteCustomerModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteCustomerModal_vorname" class="col-sm-4 col-form-label">Vorname</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_vorname" class="form-control" id="deleteCustomerModal_vorname">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteCustomerModal_wohnort" class="col-sm-4 col-form-label">Wohnort</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_wohnort" class="form-control" id="deleteCustomerModal_wohnort">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteCustomerModal_plz" class="col-sm-4 col-form-label">PLZ</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_plz" class="form-control" id="deleteCustomerModal_plz">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteCustomerModal_street" class="col-sm-4 col-form-label">Strasse</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteCustomerModal_street" class="form-control" id="deleteCustomerModal_street">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="deletecustomerbtn" class="btn btn-danger">Löschen</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
		
	<!-- END MODAL SECTION -->

	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand text-center" href="../dashboard.php">
					<span class="align-middle"><img src="../assets/img/logo/coiffeur_royal.png" width="50%"></span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Tagesgeschäft
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../dashboard.php">
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

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3">Kundenübersicht</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"></h5>
								</div>
								<div class="card-body">
									<!-- CONTENT GOES HERE -->
                                    <div class="table-responsive">
                                        <table id="example" class="table align-items-center mb-0 display">
                                          <thead>
                                            <tr>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">ID</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Name</th>
                                              <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Vorname</th>
                                              <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Wohnort</th>
											  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Postleitzahl</th>
											  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Strasse</th>
                                              <th class="text-secondary opacity-7">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
											  <?php
												include 'db.php';
												$sql = "SELECT * FROM customer";
												$result = mysqli_query($db_conn, $sql);
												if (mysqli_num_rows($result) > 0)
												{
													while ($row = mysqli_fetch_assoc($result))
													{
														echo "<tr>";
															echo "<td>" . $row['customer_id'] . "</td>";
															echo "<td>" . $row['customer_name'] . "</td>";
															echo "<td>" . $row['customer_vorname'] . "</td>";
															echo "<td>" . $row['customer_city'] . "</td>";
															echo "<td>" . $row['customer_zipcode'] . "</td>";
															echo "<td>" . $row['customer_street'] . "</td>";
															echo "<td class='text-right'>";
																echo "<button type='button' class='btn mr-1 editcustomerbtn'><i class='align-middle' data-feather='edit' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn mr-1 deletecustomerbtn'><i class='align-middle' data-feather='trash' style='width: 25px; height: 25px;'></i></button>";
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
                                    <button type="submit" class="btn btn-secondary mt-5 createcustomerbtn">Kunde hinzufügen</button>
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
            $('#example').DataTable();
        } );
    </script>
	<script src="../assets/js/modals.js"></script>

	

</body>

</html>