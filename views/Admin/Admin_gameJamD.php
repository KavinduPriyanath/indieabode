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
					<h1>Game Jam Dashboard</h1>
					<div class="game-db-body">
						<div class="game-db-first-row game-db-extra-first">
							<div class="game-db-doughnut-chart">
								<canvas id="game-db-pie-chart" width="300" height="200"></canvas>
							</div>
						</div>

						<div class="jam-db-second-row">
						<div class="jam-db-table">
							<!--  -->
							<table>
								<thead>
									<tr>
										<th>Jam ID</th>
										<th>Cover Image</th>
										<th>Jam Name</th>
										<th>Jam Host ID</th>
										<th>Jam Status</th>
										<th>Rankings (with submission ID)</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($this->gamejams) > 0): ?>
										<?php foreach ($this->gamejams as $gamejam): ?>
											<tr <?php if ($gamejam['tag'] == 'Jam Ended') echo 'class="ended-jam"'; ?>>
												<td><?php echo $gamejam['gameJamID']; ?></td>
												<td><img src="/indieabode/public/images/Admin/jam/jam-3.png" alt="cover-image"/></td>
												<td><?php echo $gamejam['jamTitle']; ?></td>
												<td><?php echo $gamejam['jamHostID']; ?></td>
												<td><?php echo $gamejam['tag']; ?></td>
												<td>
													<?php if ($gamejam['tag'] == 'Jam Ended'): ?>
														<?php if (isset($gamejam['firstPlace'])): ?>
															<span style="color: #7b3737; font-weight: 1000;">1<sup>st</sup>Rank: <?php echo $gamejam['firstPlace']['submissionID']; ?></span><br>
														<?php else: ?>
															No submissions<br>
															<?php continue; ?>
														<?php endif; ?>
														<?php if (isset($gamejam['secondPlace'])): ?>
															<span style="color: #615f16; font-weight: 1000;">2<sup>nd</sup>Rank: <?php echo $gamejam['secondPlace']['submissionID']; ?></span><br>
														<?php else: ?>
															<span style="color: #615f16; font-weight: 1000;">2<sup>nd</sup>Rank:</span> Not available<br>
														<?php endif; ?>
														<?php if (isset($gamejam['thirdPlace'])): ?>
															<span style="color: #37647b; font-weight: 1000;">3<sup>rd</sup>Rank: <?php echo $gamejam['thirdPlace']['submissionID']; ?></span><br>
														<?php else: ?>
															<span style="color: #37647b; font-weight: 1000;">3<sup>rd</sup>Rank:</span> Not available<br>
														<?php endif; ?>
														<?php if (!isset($gamejam['firstPlace']) && !isset($gamejam['secondPlace']) && !isset($gamejam['thirdPlace'])): ?>
															No submissions
														<?php endif; ?>
													<?php elseif ($gamejam['status'] == 'ongoing'): ?>
														No rankings yet
													<?php else: ?>
														Jam is currently ongoing
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="6">No gamejams available</td>
										</tr>
									<?php endif; ?>
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
				labels: ['Ongoing Jams', 'Finished Jams', 'Upcoming Jams'],
				datasets: [{
					label: '# of Games',
					// data: [25, 40, 35],
					data:<?php echo json_encode($this->countJamArray); ?>,
					backgroundColor: [
						'#509998',
						'#36647b',
						'#6791a4'
					],
					borderColor: [
						'#509998',
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