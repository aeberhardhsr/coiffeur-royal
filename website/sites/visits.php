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

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3">Besuche <button type='button' class='btn mr-1 createvisitbtn'><i class='align-middle' data-feather='plus-circle' style='width: 30px; height: 30px;'></i></button></h1>

					<div class="row">
						<div class="col-12">
							<div class="card">	
								<div class="card-body">

									<!-- Modal for add visit -->
									<div class="modal fade" id="createVisitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Besuch hinzufügen</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="visits_add.php" method="POST">
													<div class="modal-body">
														<div class="form-group row mb-3">
															<label for="createVisitModal_name" class="col-sm-3 col-form-label">Kunde</label>
															<div class="col-sm-9">
																<select name="createVisitModal_name" id="createVisitModal_name" class="form-select">
																	<option selected disabled>-- Auswählen --</option>
																	<?php
																	include 'db.php';
																	$sql_customer = "SELECT * FROM customer";
																	$result_customer = mysqli_query($db_conn, $sql_customer);
																	if (mysqli_num_rows($result_customer) > 0) 
																	{
																		while($row_customer = mysqli_fetch_assoc($result_customer))
																		{
																			echo '<option>' . $row_customer['customer_name'] . " " . $row_customer['customer_vorname'] . '</option>';
																		}
																		echo "</select>";
																	} else {
																		echo "0 results";
																	}
																	mysqli_close($db_conn);
																	?>
															</div>
														</div>
														<div style="display: none;" class="form-group row mb-3">
															<label for="createVisitModal_date" class="col-sm-3 col-form-label">Datum</label>
															<div class="col-sm-9">
																<input type="text" name="createVisitModal_date" class="form-control" id="createVisitModal_date">
															</div>
														</div>
														<div style="display: none;" class="form-group row mb-3">
															<label for="createVisitModal_assignee" class="col-sm-3 col-form-label">Betreuende Coiffeuse</label>
															<div class="col-sm-9">
																<input type="text" name="createVisitModal_assignee" class="form-control" id="createVisitModal_assignee" value="<?php echo $lastname . " " . $firstname ?>">
															</div>
														</div>
														
														<div class="accordion accordion-flush" id="accordionFlushExample">
															<?php
																include 'db.php';
																$sql_dl_groups = "SELECT * FROM service_groups";
																$result_dl_groups = mysqli_query($db_conn, $sql_dl_groups);
																
																if (mysqli_num_rows($result_dl_groups) > 0)
																{
																	$row_counter = 1;
																	while($row = mysqli_fetch_assoc($result_dl_groups))
																	{
																		echo "<div class='accordion-item'>";
																		echo "<h2 class='accordion-header' id='flush-heading".$row_counter."'>";
																		echo "<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse".$row_counter."' aria-expanded='false' aria-controls='flush-collapse".$row_counter."'>".$row['service_group_name']."</button>";
																		echo "</h2>";
																		echo "<div id='flush-collapse".$row_counter."'' class='accordion-collapse collapse' aria-labelledby='flush-heading".$row_counter."'data-bs-parent='#accordionFlushExample'>";
																		echo "<div class='accordion-body'>";
																			$sql_ass_prod = "SELECT * FROM services WHERE services_service_group LIKE '$row[service_group_name]'";
																			$result_ass_prod = mysqli_query($db_conn, $sql_ass_prod);

																			if (mysqli_num_rows($result_ass_prod) > 0)
																			{
																				while($row_ass_prod = mysqli_fetch_assoc($result_ass_prod))
																				{
																					echo "<div class='row'>";
																					echo 	"<div class='col-sm-6'><p class='float-start'>";
																					echo 		"<label class='form-check'>";
																					echo			"<input class='form-check-input' type='checkbox' name='addVisitModal_".$row['service_group_name']."' value='". $row['service_group_name'] . ";" . $row_ass_prod['services_name'] . ";" . $row_ass_prod['services_sales_price']."'>";
																					echo			"<span class='form-check-label'>";
																					echo			$row_ass_prod['services_name'];
																					echo			"</span>";
																					echo			"<span class='float-end'>";
																					echo			"</span>";
																					echo 		"</label>";
																					echo 	"</p></div>";
																					echo 	"<div class='col-sm-6'><p class='float-end'>";
																					echo 		$row_ass_prod['services_sales_price'];
																					echo 	"</p></div>";
																					echo "</div>";
																				}
																			}
																		echo "</div>";
																		echo "</div>";
																		echo "</div>";
																		++$row_counter;
																	}
																}
																else {
																	echo "Noch keine Dienstleistungsgruppen erfasst";
																}
															?>
															
															
														</div>
													</div>
												
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
														<button type="submit" name="createvisitbtn" class="btn btn-success">Hinzufügen</button>
													</div>
												</form>
											</div>
											</div>
										</div>
										<!-- END MODAL -->

										<!-- Modal for edit visit -->
										<div class="modal fade" id="editVisitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Besuch bearbeiten</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="visits_edit.php" method="POST">
													<div class="modal-body">
														<div class="form-group row mb-3">
																<label for="editVisitModal_id" class="col-sm-3 col-form-label">ID</label>
																<div class="col-sm-9">
																	<input type="text" name="editVisitModal_id" class="form-control" id="editVisitModal_id" readonly>
																</div>
															</div>
														<div class="form-group row mb-3">
															<label for="editVisitModal_name" class="col-sm-3 col-form-label">Kunde</label>
															<div class="col-sm-9">
																<select name="editVisitModal_name" id="editVisitModal_name" class="form-select">
																	<option selected disabled>-- Auswählen --</option>
																	<?php
																	include 'db.php';
																	$sql_customer = "SELECT * FROM customer";
																	$result_customer = mysqli_query($db_conn, $sql_customer);
																	if (mysqli_num_rows($result_customer) > 0) 
																	{
																		while($row_customer = mysqli_fetch_assoc($result_customer))
																		{
																			echo '<option>' . $row_customer['customer_name'] . " " . $row_customer['customer_vorname'] . '</option>';
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
															<label for="editVisitModal_date" class="col-sm-3 col-form-label">Datum</label>
															<div class="col-sm-9">
																<input type="text" name="editVisitModal_date" class="form-control" id="editVisitModal_date">
															</div>
														</div>
														
														<div class="accordion accordion-flush" id="accordionFlushExample">
															<?php
																include 'db.php';
																$sql_dl_groups = "SELECT * FROM service_groups";
																$result_dl_groups = mysqli_query($db_conn, $sql_dl_groups);
																
																if (mysqli_num_rows($result_dl_groups) > 0)
																{
																	$row_counter = 1;
																	while($row = mysqli_fetch_assoc($result_dl_groups))
																	{
																		echo "<div class='accordion-item'>";
																		echo "<h2 class='accordion-header' id='flush-heading".$row_counter."'>";
																		echo "<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse".$row_counter."' aria-expanded='false' aria-controls='flush-collapse".$row_counter."'>".$row['service_group_name']."</button>";
																		echo "</h2>";
																		echo "<div id='flush-collapse".$row_counter."'' class='accordion-collapse collapse' aria-labelledby='flush-heading".$row_counter."'data-bs-parent='#accordionFlushExample'>";
																		echo "<div class='accordion-body'>";
																			$sql_ass_prod = "SELECT * FROM services WHERE services_service_group LIKE '$row[service_group_name]'";
																			$result_ass_prod = mysqli_query($db_conn, $sql_ass_prod);

																			if (mysqli_num_rows($result_ass_prod) > 0)
																			{
																				while($row_ass_prod = mysqli_fetch_assoc($result_ass_prod))
																				{
																					echo "<div class='row'>";
																					echo 	"<div class='col-sm-6'><p class='float-start'>";
																					echo 		"<label class='form-check'>";
																					echo			"<input class='form-check-input' type='checkbox' name='addVisitModal_".$row['service_group_name']."' value='".$row_ass_prod['services_name']."'>";
																					echo			"<span class='form-check-label'>";
																					echo			$row_ass_prod['services_name'];
																					echo			"</span>";
																					echo			"<span class='float-end'>";
																					echo			"</span>";
																					echo 		"</label>";
																					echo 	"</p></div>";
																					echo 	"<div class='col-sm-6'><p class='float-end'>";
																					echo 		$row_ass_prod['services_sales_price'];
																					echo 	"</p></div>";
																					echo "</div>";
																				}
																			}
																		echo "</div>";
																		echo "</div>";
																		echo "</div>";
																		++$row_counter;
																	}
																}
																else {
																	echo "Noch keine Dienstleistungsgruppen erfasst";
																}
															?>
															
															
														</div>
													</div>
												
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
														<button type="submit" name="editvisitbtn" class="btn btn-success">Speichern</button>
													</div>
												</form>
											</div>
											</div>
										</div>
										<!-- END MODAL -->

										<!-- Modal for add visit note -->
										<div class="modal fade" id="createVisitNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Notiz hinzufügen</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form action="visits_notes_add.php" method="POST">
														<div class="modal-body">
															<div class="form-group row mb-3">
																<label for="createVisitNoteModal_id" class="col-sm-4 col-form-label">ID</label>
																<div class="col-sm-8">
																	<input type="text" name="createVisitNoteModal_id" class="form-control" id="createVisitNoteModal_id" readonly>
																</div>
															</div>
															<div class="form-group row mb-3">
																<label for="createVisitNoteModal_name" class="col-sm-4 col-form-label">Notizen</label>
																<div class="col-sm-8">
																	<textarea class="form-control" name="createVisitNoteModal_name" id="createVisitNoteModal_name" rows="4" placeholder="Notiz hinzufügen"></textarea>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
															<button type="submit" name="createvisitnotebtn" class="btn btn-success">Hinzufügen</button>
														</div>
													</form>
												</div>
											</div>
										</div>

										<!-- Modal for delete visit -->
										<div class="modal fade" id="deleteVisitNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Besuch löschen</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form action="visits_delete.php" method="POST">
														<div class="modal-body">
															<div class="form-group row mb-3">
																<label for="deleteVisitNoteModal_id" class="col-sm-3 col-form-label">ID</label>
																<div class="col-sm-9">
																	<input type="text" name="deleteVisitNoteModal_id" class="form-control" id="deleteVisitNoteModal_id" readonly>
																</div>
															</div>
															<div class="form-group row mb-3">
																<label for="deleteVisitModal_date" class="col-sm-3 col-form-label">Datum</label>
																<div class="col-sm-9">
																	<input type="text" name="deleteVisitModal_date" class="form-control" id="deleteVisitModal_date" readonly>
																</div>
															</div>
															<div class="form-group row mb-3">
																<label for="deleteVisitModal_name" class="col-sm-3 col-form-label">Kunde</label>
																<div class="col-sm-9">
																	<select name="deleteVisitModal_name" id="deleteVisitModal_name" class="form-select" disabled>
																		<option selected disabled>-- Auswählen --</option>
																		<?php
																		include 'db.php';
																		$sql_customer = "SELECT * FROM customer";
																		$result_customer = mysqli_query($db_conn, $sql_customer);
																		if (mysqli_num_rows($result_customer) > 0) 
																		{
																			while($row_customer = mysqli_fetch_assoc($result_customer))
																			{
																				echo '<option>' . $row_customer['customer_name'] . " " . $row_customer['customer_vorname'] . '</option>';
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
																<label for="deleteVisitNoteModal_note" class="col-sm-3 col-form-label">Notizen</label>
																<div class="col-sm-9">
																	<textarea class="form-control" name="deleteVisitNoteModal_note" id="deleteVisitNoteModal_note" rows="4" placeholder="Notiz hinzufügen" readonly></textarea>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
															<button type="submit" name="deletevisitbtn" class="btn btn-danger">Löschen</button>
														</div>
													</form>
												</div>
											</div>
										</div>


									<!-- Main CONTENT GOES HERE -->
									<div class="table-responsive">
                                        <table id="example" class="table align-items-center mb-0">
                                          <thead>
                                            <tr>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">ID</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Datum</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Kunde</th>
											  <th style="display: none;" class="text-uppercase text-secondary  font-weight-bolder opacity-7">Notizen</th>
                                              <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Info</th>
                                            </tr>
                                          </thead>
                                          <tbody>
											<?php
												include 'db.php';
												$sql = "SELECT visits_id, DATE_FORMAT(visits_datetime, '%d.%m.%Y') visits_datetime_formatted, visits_datetime, visits_customer, visits_notes, visits_assignee FROM visits ORDER BY visits_datetime";
												$result = mysqli_query($db_conn, $sql);
												if (mysqli_num_rows($result) > 0)
												{
													while ($row = mysqli_fetch_assoc($result))
													{
														echo "<tr>";
															echo "<td>" . $row['visits_id'] . "</td>";
															echo "<td>" . $row['visits_datetime_formatted'] . "</td>";
															echo "<td>" . $row['visits_customer'] . "</td>";
															echo "<td style='display: none;'>" . $row['visits_notes'] . "</td>";
															echo "<td class='text-right'>";
																echo "<button type='button' class='btn mr-1 editvisitbtn'><i class='align-middle' data-feather='edit' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn notevisitebtn'><i class='align-middle' data-feather='message-square' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn showofferbtn'><i class='align-middle' data-feather='book-open' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn mr-1 deletevisitbtn'><i class='align-middle' data-feather='trash' style='width: 25px; height: 25px;'></i></button>";
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