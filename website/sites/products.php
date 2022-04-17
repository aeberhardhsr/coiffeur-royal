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

	<!-- Modal for Create Products -->
	<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Produkt hinzufügen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="products_add.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label for="createProductModal_name" class="col-sm-4 col-form-label">Produktname</label>
                            <div class="col-sm-8">
                                <input type="text" name="createProductModal_name" class="form-control" id="createProductModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createProductModal_amount" class="col-sm-4 col-form-label">Menge</label>
                            <div class="col-sm-8">
                                <input type="text" name="createProductModal_amount" class="form-control" id="createProductModal_amount">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createProductModal_purchaseprice" class="col-sm-4 col-form-label">Einkaufspreis</label>
                            <div class="col-sm-8">
                                <input type="text" name="createProductModal_purchaseprice" class="form-control" id="createProductModal_purchaseprice">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="createProductModal_pricefactor" class="col-sm-4 col-form-label">Faktor</label>
                            <div class="col-sm-8">
                                <input type="text" name="createProductModal_pricefactor" class="form-control" id="createProductModal_pricefactor">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="createproductbtn" class="btn btn-success">Hinzufügen</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for edit product -->
	<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Produkt bearbeiten</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="products_edit.php" method="POST">
                    <div class="modal-body">
						<div class="form-group row mb-3">
                            <label for="editProductModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="editProductModal_id" class="form-control" id="editProductModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="editProductModal_name" class="col-sm-4 col-form-label">Produktname</label>
                            <div class="col-sm-8">
                                <input type="text" name="editProductModal_name" class="form-control" id="editProductModal_name">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editProductModal_amount" class="col-sm-4 col-form-label">Menge</label>
                            <div class="col-sm-8">
                                <input type="text" name="editProductModal_amount" class="form-control" id="editProductModal_amount">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editProductModal_purchaseprice" class="col-sm-4 col-form-label">Einkaufspreis</label>
                            <div class="col-sm-8">
                                <input type="text" name="editProductModal_purchaseprice" class="form-control" id="editProductModal_purchaseprice">
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="editProductModal_pricefactor" class="col-sm-4 col-form-label">Faktor</label>
                            <div class="col-sm-8">
                                <input type="text" name="editProductModal_pricefactor" class="form-control" id="editProductModal_pricefactor">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="editproductbtn" class="btn btn-success">Speichern</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Modal for delete product -->
	<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Produkt löschen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="products_delete.php" method="POST">
                    <div class="modal-body">
						<div class="form-group row mb-3">
                            <label for="deleteProductModal_id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteProductModal_id" class="form-control" id="deleteProductModal_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deleteProductModal_name" class="col-sm-4 col-form-label">Produktname</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteProductModal_name" class="form-control" id="deleteProductModal_name" readonly>
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteProductModal_amount" class="col-sm-4 col-form-label">Menge</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteProductModal_amount" class="form-control" id="deleteProductModal_amount" readonly>
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteProductModal_purchaseprice" class="col-sm-4 col-form-label">Einkaufspreis</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteProductModal_purchaseprice" class="form-control" id="deleteProductModal_purchaseprice" readonly>
                            </div>
                        </div>
						<div class="form-group row mb-3">
                            <label for="deleteProductModal_pricefactor" class="col-sm-4 col-form-label">Faktor</label>
                            <div class="col-sm-8">
                                <input type="text" name="deleteProductModal_pricefactor" class="form-control" id="deleteProductModal_pricefactor" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="deleteproductbtn" class="btn btn-danger">Löschen</button>
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

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3">Produktübersicht <button type='button' class='btn mr-1 createproductbtn'><i class='align-middle' data-feather='plus-circle' style='width: 30px; height: 30px;'></i></button></h1>

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
                                              <th class="text-uppercase text-secondary opacity-7">ID</th>
                                              <th class="text-uppercase text-secondary opacity-7">Name</th>
											  <th class="text-uppercase text-secondary opacity-7">Menge</th>
                                              <th class="text-uppercase text-secondary opacity-7">Einkaufspreis</th>
                                              <th class="text-uppercase text-secondary opacity-7">Faktor</th>
                                              <th class="text-uppercase text-secondary opacity-7">Verkaufspreis</th>
                                              <th class="text-uppercase text-secondary opacity-7">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
										  <?php
												include 'db.php';
												$sql = "SELECT * FROM products";
												$result = mysqli_query($db_conn, $sql);
												if (mysqli_num_rows($result) > 0)
												{
													while ($row = mysqli_fetch_assoc($result))
													{
														echo "<tr>";
															echo "<td>" . $row['product_id'] . "</td>";
															echo "<td>" . $row['product_name'] . "</td>";
															echo "<td>" . $row['product_amount'] . "</td>";
															echo "<td>" . $row['product_purchase_price'] . "</td>";
															echo "<td>" . $row['product_price_factor'] . "</td>";
															echo "<td>" . $row['product_sales_price'] . "</td>"; //multiplication for sales price
															echo "<td class='text-right'>";
																echo "<button type='button' class='btn mr-1 editproductbtn'><i class='align-middle' data-feather='edit' style='width: 25px; height: 25px;'></i></button>";
																echo "<button type='button' class='btn mr-1 deleteproductbtn'><i class='align-middle' data-feather='trash' style='width: 25px; height: 25px;'></i></button>";
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