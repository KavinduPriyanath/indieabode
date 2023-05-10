<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Indieabode</title>

	<style>
		<?php
		include 'public/css/admin.css';
		include 'public/css/admin_db.css';
		?>
	</style>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
</head>

<body>

	<?php
	include 'includes/navbar.php';
	?>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<div class="admin-card">
			<div class="profile-picture">
				<img src="/indieabode/public/images/Admin/admin-1.png" alt="user-image" class="rounded-circle" />
			</div>
			<div class="user-details">
				<div class="user-role"><?= $_SESSION['username']; ?></div>
				<div class="email-address">
					<div class="box"><?= $_SESSION['email']; ?></div>
				</div>
			</div>
		</div>

		<!-- <a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a> -->
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>
			<li><a href="<?php echo BASE_URL; ?>SiteDashboard" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i class='bx bx-chevron-right icon-right'></i> </a></li>
			<li>
				<a href="<?php echo BASE_URL; ?>Admin_complaints"><i class='bx bxs-message-square-error icon'></i> Complaints </a>
			</li>

			<li class="divider" data-text="Settings">Settings</li>
			<!-- <li><a href="<?php echo BASE_URL; ?>Admin_addNew"><i class='bx bx-user-plus icon'></i> Add new admin</a></li> -->
			<li>
				<a href="<?php echo BASE_URL; ?>Admin_userMg"><i class='bx bxs-trash icon'></i>User Management</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<main>
            <div class="dashboard-tabs-container">
				<div class="db-btn-container">
					<a href="<?php echo BASE_URL; ?>SiteDashboard">Main Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_G" >Game Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_assetD" >Assets Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_gameJamD" >Game Jam Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_crowdfundD" >Crowdfund Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_GigD" >Gigs Dashboard</a>
				</div>
				<div class="main-db-content">
					<h1>Asset Dashboard</h1>
					<div class="game-db-body">
						<h2>vsgsg</h2>
						<div class="game-db-first-row game-db-extra-first">
							<div class="transaction-graph-game-tx">
								<h3>Payments Graph</h3>
								<canvas id="game-tx-line-graph" style="height: 150px; width: 270px;"></canvas>
							</div>
							<div class="game-db-content-join">
								<div class="game-db-view-games">
									<button class="game-db-btn">View All Games</button>
								</div>
								<div class="game-db-tx-card">
									<h3>Total Payments</h3>
									<h2>$<?php echo $this->totalTxGames; ?></h2>
								</div>
							</div>
							

							<div class="downloads-uploads-graph">
								<h3>Total Uploads</h3>
								<canvas id="downloads-uploads-bar-graph" style="height: 220px; width: 400px;"></canvas>
							</div>
						</div>
						<div class="game-db-second-row">
							<div class="game-db-report-table">
								<!-- <input type="date" id="game-db-date-picker"> -->
								<h3 class="game-db-table-heading">Payment Report on <?php echo date('Y.m.dS'); ?><sup>th</sup> Day</h3>
								<button class="game-db-btn game-db-download-btn">Download Report</button>
								<div class="game-db-table-container">
									<?php if (!empty($this->gamePurchases)) { ?>
										<table>
											<thead>
											<tr>
												<th>Transaction ID</th>
												<th>Game ID</th>
												<th>Gamer ID</th>
												<th>Payment Date</th>
												<th>Payment Amount</th>
											</tr>
											</thead>
											<tbody>
											<?php foreach ($this->gamePurchases as $purchase) { ?>
												<tr>
												<td><?php echo $purchase['id']; ?></td>
												<td><?php echo $purchase['gameID']; ?></td>
												<td><?php echo $purchase['buyerID']; ?></td>
												<td><?php echo $purchase['purchasedDate']; ?></td>
												<td><?php echo $purchase['purchasedPrice']; ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
										<?php } else { ?>
										<td colspan="5" class="error-tr">No payments available</td>
									<?php } ?>

								</div>
								
							</div>
							<div class="game-db-doughnut-chart">
								<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
							</div>
						</div>
						<h2>Game Dashbord/Revenue</h2>
						<div class="game-db-third-row">
							<div class="game-revenue-graph">
								<h3>Game Revenue Graph</h3>
								<canvas id="game-revenue-line-graph" style="height: 150px; width: 270px;"></canvas>
							</div>

							<div class="game-revenue-total">
								<h3>Game Revenues</h3>
								<h2>$<?php echo $this->totalGameRevenue; ?></h2>
							</div>
						</div>

						<div class="game-db-fourth-row">
							<div class="game-db-report-table">
									<!-- <input type="date" id="game-db-date-picker"> -->
									<h3 class="game-db-table-heading">Game Revenue Report on <?php echo date('Y.m.dS'); ?><sup>th</sup> day</h3>
									<button class="game-db-btn game-db-download-btn">Download Report</button>
									<div class="game-db-table-container">
										<?php if (!empty($this->gameRevenues)) { ?>
											<table>
												<thead>
												<tr>
													<th>Transaction ID</th>
													<th>Game ID</th>
													<th>Sale Date</th>
													<th>Site Share</th>
												</tr>
												</thead>
												<tbody>
												<?php foreach ($this->gameRevenues as $revenue) { ?>
													<tr>
													<td><?php echo $revenue['id']; ?></td>
													<td><?php echo $revenue['gameID']; ?></td>
													<td><?php echo $revenue['sale_date']; ?></td>
													<td><?php echo $revenue['siteShare']; ?></td>
													</tr>
												<?php } ?>
												</tbody>
											</table>
											<?php } else { ?>
											<td colspan="4" class="error-tr">No crowdfunds available</td>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                
            </div>
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<?php
    include 'includes/footer.php';
    ?>

	<script>
	window.onload = function() {


		var gamePieChart = document.getElementById('game-db-pie-chart').getContext('2d');
		var myChart = new Chart(gamePieChart, {
			type: 'doughnut',
			backgroundColor: "#6997a4",
			data: {
				labels: ['Early Access Games', 'Upcoming Games', 'Released Games'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data: <?php echo json_encode($this->gameTypes); ?>,
					backgroundColor: [
						'rgba(55, 87, 102, 1)',
						'#36647b',
						'#608a9f'
					],
					borderColor: [
						'rgba(55, 87, 102, 0.7)',
						'#36647b',
						'#608a9f'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					position: 'right'
				}
			}
		});

		var ctx2 = document.getElementById('game-tx-line-graph').getContext('2d');
		var gameTxGraph = new Chart(ctx2, {
		type: 'line',
		data: {
			labels:<?php echo json_encode($this->txDates); ?>,
			datasets: [{
			data: <?php echo json_encode($this->txTotals); ?>,
			borderColor: 'rgba(75, 192, 192, 1)',
			backgroundColor: 'rgba(75, 192, 192, 0.2)',
			// fill: false
			fill: true, // fill the area under the graph
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // color of the area under the graph
			}]
		},
		options: {
			legend: {
			display: false
			},
			scales: {
			yAxes: [{
				display: false
			}],
			xAxes: [{
				gridLines: {
				display: false
				},
				ticks: {
				display: false
				}
			}]
			}
		}
		});

		var ctx3 = document.getElementById('downloads-uploads-bar-graph').getContext('2d');
		var downloadsUploadsGraph = new Chart(ctx3, {
			type: 'bar',
			data: {
				labels:<?php echo json_encode($this->txDates); ?>,
				datasets: [{
					label: 'Total Uploads',
					data:<?php echo json_encode($this->txTotals); ?>,
					backgroundColor: 'rgba(55, 87, 102, 0.7)',
					borderColor: 'rgba(55, 87, 102,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					xAxes: [{
					display: false,
					gridLines: {
						display: false,
						drawBorder: false
					}
					}],
					yAxes: [{
					display: false,
					gridLines: {
						display: false,
						drawBorder: false
					},
					ticks: {
						beginAtZero: true
					}
					}]
				}
			}
		});

		var ctx = document.getElementById('game-revenue-line-graph').getContext('2d');
		var gameRevenueGraph = new Chart(ctx, {
			type: 'line',
			data: {
				labels:<?php echo json_encode($this->revenueDates); ?>,
				datasets: [{
					data:<?php echo json_encode($this->revenueTotals); ?>,
					borderColor: 'rgba(75, 192, 192, 1)',
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					fill: true, // fill the area under the graph
					backgroundColor: 'rgba(75, 192, 192, 0.2)', // color of the area under the graph
				}]
			},
			options: {
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						display: false
					}],
					xAxes: [{
						gridLines: {
							display: false
						},
						ticks: {
							display: false
						}
					}]
				}
			}
		});

	}
	</script>


	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

	<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
	<script src="<?php echo BASE_URL; ?>public/js/admin.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/admin_db.js"></script>
	<!-- <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?> -->

</body>

</html>