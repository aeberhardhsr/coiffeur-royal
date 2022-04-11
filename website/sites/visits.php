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
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Besuche</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">	
								<div class="card-body">
									<!-- CONTENT GOES HERE -->
									<div class="table-responsive">
                                        <table id="example" class="table align-items-center mb-0">
                                          <thead>
                                            <tr>
                                              <th class="text-uppercase text-secondary opacity-7">Datum - Uhrzeit</th>
                                              <th class="text-uppercase text-secondary opacity-7">Name</th>
                                              <th class="text-uppercase text-secondary opacity-7">Vorname</th>
                                              <th class="text-uppercase text-secondary opacity-7">Info</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <p class="font-weight-bold">27.02.2022</p>
                                              </td>
                                              <td>
                                                <p class="font-weight-bold">Liras</p>
                                              </td>
                                              <td>
                                                <p class="font-weight-bold">Alex</p>
                                              </td>
                                              <td>
                                                <h6 class="font-weight-bold"><i class="align-middle" data-feather="message-square"></i> | <i class="align-middle" data-feather="book-open"></i></h6>
                                              </td>
                                            </tr>
                                            <tr>
												<td>
												  <p class="font-weight-bold">27.03.2022</p>
												</td>
												<td>
												  <p class="font-weight-bold">Payne</p>
												</td>
												<td>
												  <p class="font-weight-bold">Connor</p>
												</td>
												<td>
													<h6 class="font-weight-bold"><i class="align-middle" data-feather="message-square"></i> | <i class="align-middle" data-feather="book-open"></i></h6>
												</td>
											  </tr>
											  <tr>
												<td>
												  <p class="font-weight-bold">07.02.2022</p>
												</td>
												<td>
												  <p class="font-weight-bold">Rampling</p>
												</td>
												<td>
												  <p class="font-weight-bold">Maria</p>
												</td>
												<td>
													<h6 class="font-weight-bold"><i class="align-middle" data-feather="message-square"></i> | <i class="align-middle" data-feather="book-open"></i></h6>
												</td>
											  </tr>
											  <tr>
												<td>
												  <p class="font-weight-bold">04.05.2022</p>
												</td>
												<td>
												  <p class="font-weight-bold">Burgess</p>
												</td>
												<td>
												  <p class="font-weight-bold">Donna</p>
												</td>
												<td>
													<h6 class="font-weight-bold"><i class="align-middle" data-feather="message-square"></i> | <i class="align-middle" data-feather="book-open"></i></h6>
												</td>
											  </tr>
											  <tr>
												<td>
												  <p class="font-weight-bold">06.08.2022</p>
												</td>
												<td>
												  <p class="font-weight-bold">Hemsworth</p>
												</td>
												<td>
												  <p class="font-weight-bold">Liam</p>
												</td>
												<td>
													<h6 class="font-weight-bold"><i class="align-middle" data-feather="message-square"></i> | <i class="align-middle" data-feather="book-open"></i></h6>
												</td>
											  </tr>
                                          </tbody>
                                        </table>
										<button type="button" class="btn btn-secondary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Besuch hinzufügen</button>

										<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="accordion accordion-flush" id="accordionFlushExample">
														<div class="accordion-item">
														  <h2 class="accordion-header" id="flush-headingOne">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
															  Auftragspauschale
															</button>
														  </h2>
														  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
														  </div>
														</div>
														<div class="accordion-item">
														  <h2 class="accordion-header" id="flush-headingTwo">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
															  Damen Kurzhaar
															</button>
														  </h2>
														  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
														  </div>
														</div>
														<div class="accordion-item">
														  <h2 class="accordion-header" id="flush-headingThree">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
															  Damen Langhaar
															</button>
														  </h2>
														  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
														  </div>
														</div>
														<div class="accordion-item">
														  <h2 class="accordion-header" id="flush-headingFour">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
															  Gesichtsbehandlung
															</button>
														  </h2>
														  <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
														  </div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="flush-headingFive">
															  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
																Nägel- und Handpflege
															  </button>
															</h2>
															<div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
															  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="flush-headingSix">
															  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
																Herren
															  </button>
															</h2>
															<div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
															  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="flush-headingSeven">
															  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
																Studierende / Lernende
															  </button>
															</h2>
															<div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
															  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="flush-headingEight">
															  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
																Kinder
															  </button>
															</h2>
															<div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
															  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
															</div>
														</div>
													  </div>
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
												</div>
											</div>
											</div>
										</div>

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
            $('#example').DataTable();
        } );
    </script>

</body>

</html>