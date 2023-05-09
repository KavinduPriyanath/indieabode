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
					<a href="<?php echo BASE_URL; ?>Admin_crowdfundD" >Crowdfund Dashboard</a>
					<a href="<?php echo BASE_URL; ?>Admin_GigD" >Gigs Dashboard</a>
				</div>
				<div class="main-db-content">
					<h1>Crowdfund Dashboard</h1>
					<div class="game-db-body">
						<h2>Crowdfund Dashbord/Crowdfunds</h2>
						<div class="crowdfund-first-row game-db-first-row">
							<div class="crowdfund-db-first">
								<div class="game-db-doughnut-chart">
									<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
								</div>
								<div class="total-donations">
									<h3>Total Donations</h3>
									<h2>$<?php echo $this->allDonations; ?></h2>
								</div>
							</div>
							<div class="crowdfund-db-second">
								<h1>Crowdfund Donations</h1>
								<div class="table-container">
									<table>
										<thead>
											<tr>
											<th>Crowdfund ID</th>
											<th>Donor ID</th>
											<th>Donation Amount</th>
											<th>Donated Date</th>
											</tr>
										</thead>
										<tbody class="scrollable">
											<?php if (empty($this->donations)): ?>
											<tr>
												<td colspan="4">No donations available.</td>
											</tr>
											<?php else: ?>
											<?php foreach ($this->donations as $donation): ?>
												<tr>
												<td><?php echo $donation['crowdfundID']; ?></td>
												<td><?php echo $donation['donorID']; ?></td>
												<td>$<?php echo number_format($donation['donationAmount'], 2); ?></td>
												<td><?php echo date('M d, Y', strtotime($donation['donatedDate'])); ?></td>
												</tr>
											<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>

								</div>
								
							</div>
						</div>

						<div class="crowdfund-second-row">
							<h1>All Crowdfunds</h1>
							<div class="jam-db-table crowdfund-table-all">
							<table>
								<thead>
									<tr>
										<th>ID</th>
										<th>Cover Image</th>
										<th>Developer Name</th>
										<th>Game Name</th>
										<th>Status</th>
										<th>Expected Amount</th>
										<th>Current Amount</th>
										<th>Total Backers</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($this->crowdfunds) > 0): ?>
										<?php foreach ($this->crowdfunds as $crowdfund): ?>
											<tr>
												<td><?php echo $crowdfund['crowdFundID']; ?></td>
												<td><img src="/indieabode/public/uploads/crowdfunds/covers/<?= $crowdfund['crowdfundCoverImg'] ?>" alt="cover-image"/></td>
												<td><?php echo $crowdfund['gameDeveloperName']; ?></td>
												<td><?php echo $crowdfund['gameName']; ?></td>
												<!-- <td><?php echo $crowdfund['status']; ?></td> -->
												<td>
													<?php 
														$deadline = strtotime($crowdfund['deadline']);
														$now = new DateTime();
														if ($deadline >= $now->getTimestamp()) {
														echo 'Ongoing';
														} else {
														echo 'Ended';
														}
													?>
												</td>
												<td><?php echo $crowdfund['expectedAmount']; ?></td>
												<td><?php echo $crowdfund['currentAmount']; ?></td>
												<td><?php echo $crowdfund['backers']; ?></td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="8">No crowdfunds available</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
							</div>
						</div>

						<h2>Crowdfund Dashbord/Revenue</h2>
						<div class="crowdfund-third-row">
							<div class="crowdfund-revenue-graph">
								<h3>Crowdfund Revenue Graph</h3>
								<canvas id="game-tx-line-graph" style="height: 150px; width: 270px;"></canvas>
							</div>
							
							<div class="total-crowdfund-revenue">
								<h3>Total Revenues</h3>
								<h2 style="color: #4bc0c0;">$<?php echo $this->totalRevenue; ?></h2>
							</div>
						</div>

						<div class="crowdfund-fourth-row">
							<h1>crowdfund revenues shared games</h1>
							<div class="crowdfund-revenue-share-games">
								<table>
									<thead>
										<tr>
										<th>Crowdfund ID</th>
										<th>Game ID</th>
										<th>Developer ID</th>
										<th>Revenue Share</th>
										</tr>
									</thead>
									<tbody style="overflow-y: scroll;">
										<?php foreach ($this->revenueCrowdfunds as $crowdfund) { ?>
										<tr>
											<td><?php echo $crowdfund['crowdFundID']; ?></td>
											<td><?php echo $crowdfund['gameName']; ?></td>
											<td><?php echo $crowdfund['gameDeveloperName']; ?></td>
											<td><?php echo '$' . number_format($crowdfund['revenue_share'], 2); ?></td>
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


		var gamePieChart = document.getElementById('game-db-pie-chart').getContext('2d');
		var myChart = new Chart(gamePieChart, {
			type: 'doughnut',
			backgroundColor: "#6997a4",
			data: {
				labels: ['Ended Crowdfunds', 'Ongoing Crowdfunds'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data: [<?php echo json_encode($this->total_ended_crowdfunds); ?>,<?php echo json_encode($this->total_ongoing_crowdfunds); ?>],
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