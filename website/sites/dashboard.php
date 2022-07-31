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

<?php
	$lastMonth = Date("F", strtotime("first day of previous month"));
	$beforelastMonth = Date("F", strtotime("-2 months"));
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>CRM Coiffeur Royal</title>

	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><strong>Analysen</strong></h1>

					<div class="row">
						
						<div class="col-xl-4 col-xxl-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Umsatz Produkte <?php echo $lastMonth ?></h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">14.212</h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
										<span class="text-muted">Seit <?php echo $beforelastMonth ?></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-4 col-xxl-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Umsatz Dienstleistungen <?php echo $lastMonth ?></h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">14.212</h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
										<span class="text-muted">Seit <?php echo $beforelastMonth ?></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-4 col-xxl-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Kundenbesuche <?php echo $lastMonth ?></h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<?php
										include 'db.php';
										// get the number of visitors from last month
										$sql_countVisitorslastMonth = "SELECT COUNT(*) as visitorlastmonth FROM visits WHERE MONTH(visits_datetime) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(visits_datetime) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)";
										$result_countVisitorslastMonth = mysqli_query($db_conn, $sql_countVisitorslastMonth);
										$data_countVisitorslastMonth = mysqli_fetch_assoc($result_countVisitorslastMonth);
										
										// get the number of visitors from the month before last month 
										$sql_countVisitorsbeforelastMonth = "SELECT COUNT(*) as visitorbeforelastmonth FROM visits WHERE MONTH(visits_datetime) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH) AND YEAR(visits_datetime) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH)";
										$result_countVisitorsbeforelastMonth = mysqli_query($db_conn, $sql_countVisitorsbeforelastMonth);
										$data_countVisitorsbeforelastMonth = mysqli_fetch_assoc($result_countVisitorsbeforelastMonth);

										// get the increase / decrease in percentage of visitors from last month to the month before the last month
										$percentage_inc_dec_visitors = round((1 - ($data_countVisitorsbeforelastMonth['visitorbeforelastmonth'] / $data_countVisitorslastMonth['visitorlastmonth'])) * 100, 2); 

									?>
									<h1 class="mt-1 mb-3"><?php echo $data_countVisitorslastMonth['visitorlastmonth'] ?></h1>
									<div class="mb-0">

										<?php

										if ($percentage_inc_dec_visitors > 0)
										{
											echo "<span class='text-success'> <i class='mdi mdi-arrow-bottom-right'></i>" . $percentage_inc_dec_visitors . "% </span>";
										}
										elseif ($percentage_inc_dec_visitors == 0)
										{
											echo "<span class='text-warning'> <i class='mdi mdi-arrow-bottom-right'></i>" . $percentage_inc_dec_visitors . "% </span>";
										}
										elseif ($percentage_inc_dec_visitors < 0)
										{
											echo "<span class='text-danger'> <i class='mdi mdi-arrow-bottom-right'></i>" . $percentage_inc_dec_visitors . "% </span>";
										}
										?>

										<span class="text-muted">Seit <?php echo $beforelastMonth ?></span>
									</div>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Letzte Besuche</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th style="display: none;">ID</th>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Datum</th>
											<th style="display: none;">Notizen</th>
											<th class="d-none d-md-table-cell">Betreut von</th>
										</tr>
									</thead>
									<tbody>
										<?php
											include 'db.php';
											$sql = "SELECT visits_id, DATE_FORMAT(visits_datetime, '%d.%m.%Y') visits_datetime_formatted, visits_datetime, visits_customer, visits_notes, visits_assignee FROM visits ORDER BY visits_datetime DESC LIMIT 10";
											$result = mysqli_query($db_conn, $sql);
											if (mysqli_num_rows($result) > 0)
											{
												while ($row = mysqli_fetch_assoc($result))
												{
													echo "<tr>";
														echo "<td style='display: none;'>" . $row['visits_id'] . "</td>";
														echo "<td>" . $row['visits_customer'] . "</td>";
														echo "<td>" . $row['visits_datetime_formatted'] . "</td>";
														echo "<td style='display: none;'>" . $row['visits_notes'] . "</td>";
														echo "<td>" . $row['visits_assignee'] . "</td>";
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>