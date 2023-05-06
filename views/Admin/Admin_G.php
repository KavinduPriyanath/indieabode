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
							<!-- <div class="game-db-total-tx">
								<div class="game-db-card">
								<h3>Total Transactions</h3>
								<p class="game-db-card-value">$10,000</p>
								</div>
							</div> -->
							<div class="game-db-doughnut-chart">
								<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
							</div>
							<div class="game-db-tx-card">
								<h3>Total Transactions</h3>
								<h2>$5678.00</h2>
							</div>
							<div class="game-db-view-games">
								<button class="game-db-btn">View All Games</button>
							</div>
						</div>
						<div class="game-db-second-row">
							<!-- <div class="game-db-calender">
								<input type="date" id="game-db-date-picker">
							</div> -->
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
									<td>2</td>
									<td>Game B</td>
									<td>himash</td>
									<td>2023-05-01</td>
									<td>$100</td>
									</tr>
								</tbody>
								</table>
							</div>
						</div>
						<div class="game-db-third-row">

						</div>
					</div>
					<script>
						window.onload = function() 
						{
							var gamePieChart = document.getElementById('game-db-pie-chart').getContext('2d');
							var myChart = new Chart(gamePieChart, {
								type: 'doughnut',
								backgroundColor: "#6997a4",
								data: {
									labels: ['Early Access Games', 'Upcoming Games', 'Released Games'],
									datasets: [{
										label: '# of Games',
										data: [25, 40, 35],
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
						}

					</script>
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
		window.onload = function() 
		{

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: ""
			},
			backgroundColor: "#6997a4",
			data: [{
				type: "pie",
				startAngle: 240,
				yValueFormatString: "##0",
				indexLabel: "{y} {label} ",
				dataPoints: [
					{y: <?php echo $this->developerCount; ?>, label: "Game Developers",color: "#208ba6"},
					{y: <?php echo $this->gamerCount; ?>, label: "Gamers",color: "#0d424f"},
					{y: <?php echo $this->publisherCount; ?>, label: "Game Publishers",color: "#bcf2ff"},
					{y: <?php echo $this->jamorganizerCount; ?>, label: "Game Jam Organizers",color: "#687679"},
					{y: <?php echo $this->assetcreatorCount; ?>, label: "Asset Creators",color: "#406687"}
				]
			}]
		});
		chart.render();


		var ctx = document.getElementById('userChart').getContext('2d');
			var userChart = new Chart(ctx, {
			type: 'horizontalBar',
			data: {
				labels: ['Active Users', 'Blocked Users'],
				datasets: [{
				label: 'User Status',
				data: [85, 15], // Replace with actual values
				backgroundColor: [
					'rgba(6, 96, 94, 0.5)',
					'rgba(84, 31, 46, 0.5)'
				],
				borderColor: [
					'rgba(6, 96, 94, 1)',
					'rgba(84, 31, 46, 1)'
				],
				borderWidth: 2
				}]
			},
			options: {
				scales: {
				xAxes: [{
					ticks: {
					beginAtZero: true,
					fontColor: 'white' // set font color for x-axis labels
					},
					gridLines: {
					display: false // hide x-axis grid lines
					}
				}],
				yAxes: [{
					ticks: {
					fontColor: 'white' // set font color for y-axis labels
					},
					gridLines: {
					display: false // hide y-axis grid lines
					}
				}]
				}
			}
			});
		// chart.render();

		var ctx2 = document.getElementById('myChart2').getContext('2d');
		var myChart2 = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
						label: 'Sales',
						data: [12, 19, 3, 5, 2, 3, 10],
						borderColor: 'rgba(75, 192, 192, 1)',
						backgroundColor: 'rgba(75, 192, 192, 0.2)',
						fill: false
					},
					{
						label: 'Expenses',
						data: [5, 2, 8, 1, 6, 9, 4],
						borderColor: 'rgba(255, 99, 132, 1)',
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						fill: false
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});

		//game transaction graph
		var ctx3 = document.getElementById('txChartGame').getContext('2d');
		var myChart2 = new Chart(ctx3, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
						label: 'Sales',
						data: [12, 19, 3, 5, 2, 3, 10],
						borderColor: 'rgba(75, 192, 192, 1)',
						backgroundColor: 'rgba(75, 192, 192, 0.2)',
						fill: false
					},
					{
						label: 'Expenses',
						data: [5, 2, 8, 1, 6, 9, 4],
						borderColor: 'rgba(255, 99, 132, 1)',
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						fill: false
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
		// chart.render();
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