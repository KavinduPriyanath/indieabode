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

				<!-- Main Dashboard -->
                <div class="main-db-content">
					<h1>Site Dashboard</h1>
					<div class="db-panel">
						<div class="first-row-db">
							
							
							<div class="total-revenue-site">
								<h3>Total Transactions</h3>
								<h2>$<?php echo $this->Tx; ?></h2>
							</div>
							<div class="downloads-uploads-graph">
								<!-- <h3>Total Game Uploads</h3> -->
								<canvas id="downloads-uploads-bar-graph" style="height: 220px; width: 400px;"></canvas>
							</div>
							<div class="total-revenue-site">
								<h3>Total Revenue</h3>
								<h2>$<?php echo $this->allRevenue; ?></h2>
							</div>
						</div>
						<div class="second-row-db site-db-second-row">
							<div class="second-first-site-db">
								<h3>Revenue Shares</h3>
								<div class="game-db-doughnut-chart">
									<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
								</div>
							</div>
							<div class="first-pie-chart-db">
								<h3>User Chart </h3>
								<div id="chartContainer" style="height: 100%; width: 100%;"></div>
							</div>
							<div class="line-chart-db">
								<h3> Active & Block Users </h3><br>
								<div class="horizontal-chart">
									<canvas id="userChart" style="height: 150px; width: 100%;"></canvas>
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
				// data: [<?php echo json_encode($this->usercounts['active_users']); ?>, <?php echo json_encode($this->usercounts['blocked_users']); ?>], // Replace with actual values
				data: [<?php echo json_encode($this->usercounts['active_users']); ?>, <?php echo json_encode($this->usercounts['blocked_users']); ?>],
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
		chart.render();

		var gamePieChart = document.getElementById('game-db-pie-chart').getContext('2d');
		var myChart = new Chart(gamePieChart, {
			type: 'doughnut',
			backgroundColor: "#6997a4",
			data: {
				labels: ['Game Revenue', 'Asset Revenue', 'Gig Revenue', 'Crowdfund Revenue'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data:<?php echo json_encode($this->revenues); ?> ,
					backgroundColor: [
						'#36647b',
						'#608a9f',
						'#3f5564',
						'#527289'
					],
					borderColor: [
						'#36647b',
						'#608a9f',
						'#3f5564',
						'#527289'
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

		var ctx3 = document.getElementById('downloads-uploads-bar-graph').getContext('2d');
		var downloadsUploadsGraph = new Chart(ctx3, {
			type: 'bar',
			data: {
				labels:['Games','Assets', 'Crowdfunds', 'Gigs'],
				datasets: [{
					label: 'Total Transactions',
					data: <?php echo json_encode($this->allTxdetail); ?>,
					backgroundColor: '#608a9f',
					borderColor: '#608a9f',
					borderWidth: 1,
					barPercentage: 0.9,
					categoryPercentage: 0.9
				}, {
					label: 'All Revenue',
					data: <?php echo json_encode($this->allRevdetail); ?>,
					backgroundColor: '#3f5564',
					borderColor: '#3f5564',
					borderWidth: 1,
					barPercentage: 0.9,
					categoryPercentage: 0.9
				}]

			},
			options: {
				legend: {
					display: true,
					labels: {
						fontColor: 'black',
						fontSize: 14
					}
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							fontColor: 'black',
							fontSize: 16
						},
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