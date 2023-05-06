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
			<li><a href="<?php echo BASE_URL; ?>Admin_addNew"><i class='bx bx-user-plus icon'></i> Add new admin</a></li>
			<li>
				<a href="<?php echo BASE_URL; ?>Admin_userMg"><i class='bx bxs-trash icon'></i> Remove user</a>
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
					<a href="<?php echo BASE_URL; ?>Admin_GigD" >Gigs Dashboard</a>
				</div>
				<div class="main-db-content">
					<h1>Game Dashboard</h1>
					<div class="game-db-body">
						<div class="game-db-first-row">
							<div class="game-db-doughnut-chart">
								<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
							</div>
							<div class="game-db-tx-card">
								<h3>Total Transactions</h3>
								<h2>$<?php echo $this->totalTxGames; ?></h2>
							</div>
							<div class=""></div>
							<div class="game-db-view-games">
								<button class="game-db-btn">View All Games</button>
							</div>
						</div>
						<div class="game-db-second-row">
							<div class="game-db-report-table">
								<input type="date" id="game-db-date-picker">
								<h3 class="game-db-table-heading">Payment Report on 2022.07.08th day</h3>
								<button class="game-db-btn game-db-download-btn">Download Report</button>
								<table>
								<thead>
									<tr>
									<th>Transaction ID</th>
									<th>Game Name</th>
									<th>Gamer Name</th>
									<th>Payment Date</th>
									<th>Payment Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<td>1</td>
									<td>Game A</td>
									<td>kavindu</td>
									<td>2023-04-30</td>
									<td>$50</td>
									</tr>
									<tr>
									<td>1</td>
									<td>Game A</td>
									<td>kavindu</td>
									<td>2023-04-30</td>
									<td>$50</td>
									</tr>
									<tr>
									<td>1</td>
									<td>Game A</td>
									<td>kavindu</td>
									<td>2023-04-30</td>
									<td>$50</td>
									</tr>
									<tr>
									<td>2</td>
									<td>Game B</td>
									<td>himash</td>
									<td>2023-05-01</td>
									<td>$100</td>
									</tr>
								</tbody>
								</table>
							</div>

							<div class="transaction-graph-game-tx">
								<h3>Transaction Graph</h3>
								<canvas id="game-tx-line-graph" style="height: 150px; width: 270px;"></canvas>
							</div>
						</div>
						<div class="game-db-third-row">
						<div class="downloads-uploads-graph">
							<h3>Total Downloads and Uploads</h3>
							<canvas id="downloads-uploads-bar-graph" style="height: 220px; width: 450px;"></canvas>
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
						'#509998',
						'#5c7777',
						'#245252'
					],
					borderColor: [
						'#509998',
						'#5c7777',
						'#245252'
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
				labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
				datasets: [{
					label: 'Total Downloads',
					data: [12, 19, 3, 5, 2],
					backgroundColor: 'rgba(55, 100, 123, 0.7)',
					borderColor: 'rgba(55,100,123,1)',
					borderWidth: 1
				}, {
					label: 'Total Uploads',
					data: [8, 12, 9, 7, 3],
					backgroundColor: 'rgba(36, 82, 82, 0.7)',
					borderColor: 'rgba(36, 82, 82, 1)',
					borderWidth: 1
				}]
			},
			// options: {
			// 	scales: {
			// 		yAxes: [{
			// 			ticks: {
			// 				beginAtZero: true
			// 			}
			// 		}]
			// 	}
			// }
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