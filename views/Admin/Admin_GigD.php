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
					<h1>Gig Dashboard</h1>
					<div class="game-db-body">
						<h2>Gig Dashbord/Gigs</h2>
						<div class="crowdfund-first-row game-db-first-row">
							
							<div class="crowdfund-db-second">
								<h1>Ordered Gigs</h1>
								<div class="table-container">
									<table>
										<thead>
											<tr>
											<th>Gig ID</th>
											<th>Developer ID</th>
											<th>Publisher ID</th>
											<th>Share Percentage</th>
											<th>Publisher Income</th>
											<th>Purchased Date</th>
											<th>Publisher Cost</th>
											</tr>
										</thead>
										<tbody class="scrollable">
											<?php if (empty($this->orderedGigs)): ?>
											<tr>
												<td colspan="7">No donations available.</td>
											</tr>
											<?php else: ?>
											<?php foreach ($this->orderedGigs as $gig): ?>
												<tr>
												<td><?php echo $gig['gigID'];?></td>
												<td><?php echo $gig['developerID']; ?></td>
												<td><?php echo $gig['publisherID']; ?></td>
												<td><?php echo $gig['sharePercentage']; ?></td>
												<td><?php echo $gig['publisherIncome']; ?></td>
												<td><?php echo $gig['purchasedDate']; ?></td>
												<!-- <td><?php echo date('M d, Y', strtotime($gig['purchasedDate'])); ?></td> -->
												<td>$<?php echo $gig['publisherCost']; ?></td>
												</tr>
											<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>

								</div>
								
							</div>
							<div class="crowdfund-db-first">
								<div class="game-db-doughnut-chart">
									<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
								</div>
								<div class="total-donations">
									<h3>Total Transactions</h3>
									<h2>$<?php echo $this->allTransactions; ?></h2>
								</div>
							</div>
						</div>

						<div class="crowdfund-second-row">
							
						</div>

						<h2>Gig Dashbord/Revenue</h2>
						<div class="crowdfund-third-row">
							<div class="crowdfund-revenue-graph">
								<h3>Gig Revenue Graph</h3>
								<canvas id="game-tx-line-graph" style="height: 150px; width: 270px;"></canvas>
							</div>
							
							<div class="game-db-doughnut-chart">
								<canvas id="game-rev-chart" width="300" height="200"></canvas>
							</div>

							<div class="total-crowdfund-revenue">
								<h3>Total Revenues</h3>
								<?php if(empty($this->totalRevenue)): ?>
									<h4 style="color: #4bc0c0;">No Site Share</h4>
								<?php else: ?>
									<h2 style="color: #4bc0c0;">$<?php echo $this->totalRevenue; ?></h2>
								<?php endif; ?>
							</div>
						</div>

						<div class="crowdfund-fourth-row">
							<h1>Revenues shared gigs</h1>
							<div class="crowdfund-revenue-share-games">
								<table>
									<thead>
										<tr>
										<th>Gig ID</th>
										<th>Sale Date</th>
										<th>Site Share</th>
										</tr>
									</thead>
									<tbody style="overflow-y: scroll;">
										<?php foreach ($this->revenueGigs as $gig) { ?>
										<tr>
											<td><?php echo $gig['gigID']; ?></td>
											<td><?php echo $gig['sale_date']; ?></td>
											<td>$<?php echo $gig['siteShare']; ?></td>
											<!-- <td><?php echo '$' . number_format($crowdfund['revenue_share'], 2); ?></td> -->
										</tr>
										<?php } ?>
									</tbody>
								</table>
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

		var gamerevChart = document.getElementById('game-rev-chart').getContext('2d');
		var myChart = new Chart(gamerevChart, {
			type: 'doughnut',
			backgroundColor: "#6997a4",
			data: {
				labels: ['Game Revenue', 'Total Revenue'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data: [<?php echo json_encode($this->totalRevenue); ?>,1000],
					backgroundColor: [
						// 'rgba(55, 87, 102, 1)',
						'#36647b',
						'#6791a4'
					],
					borderColor: [
						// 'rgba(55, 87, 102, 0.7)',
						'#36647b',
						'#6791a4'
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

		var gamePieChart = document.getElementById('game-db-pie-chart').getContext('2d');
		var myChart = new Chart(gamePieChart, {
			type: 'doughnut',
			backgroundColor: "#6997a4",
			data: {
				labels: ['Ordered Gigs', 'Not Ordered Gigs'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data: [<?php echo json_encode($this->total_ended_gigs); ?>,<?php echo json_encode($this->total_ongoing_gigs); ?>],
					backgroundColor: [
						'#375766',
						'#608a9f'
					],
					borderColor: [
						'#375766',
						'#608a9f',
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
			labels:<?php echo json_encode($this->dates); ?>,
			datasets: [{
			data: <?php echo json_encode($this->revenueShares); ?>,
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