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

				<!-- Main Dashboard -->
                <div class="main-db-content">
					<div class="db-panel">
						<div class="first-row-db">
							<div class="first-pie-chart-db">
								<h3>User Chart </h3>
								<div id="chartContainer" style="height: 370px; width: 100%;"></div>
								<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
							</div>
							<div class="top-details-db">
								<div class="most-popular-game popular-items">
									<div class="popular-topic">
										Most Popular Game
									</div>
									<div class="popular-item-detail">
										<div class="popular-item-cover-img">
											<img src="/indieabode/public/uploads/games/cover/Cover-aaaaaa.jpg"><br>
											Alboanion onLine<br>
											Yeshan Pasindu
										</div>
									</div>
									<div class="popular-item-downloads">
										Total Downloads<br>
										<h1>34</h1>
									</div>
								</div>
								<div class="most-popular-asset popular-items">
									<div class="popular-topic">
										Most Popular Game
									</div>
									<div class="popular-item-detail">
										<div class="popular-item-cover-img">
											<img src="/indieabode/public/uploads/games/cover/Cover-aaaaaa.jpg"><br>
											Alboanion onLine<br>
											Yeshan Pasindu
										</div>
									</div>
									<div class="popular-item-downloads">
										Total Downloads<br>
										<h1>34</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="second-row-db">
							<div class="line-chart-db">
								<h3> Active & Block Users </h3><br>
								<div class="horizontal-chart">
									<canvas id="userChart" style="height: 150px; width: 100%;"></canvas>
								</div>
							</div>
							<div class="second-pie-chart-db">
								<canvas id="myChart2"></canvas>
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