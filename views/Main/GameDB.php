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
</head>

<body>
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<div class="admin-card">
			<div class="profile-picture">
				<img src="/indieabode/public/images/Admin/admin-1.png" alt="user-image" class="rounded-circle"/>
			</div>
			<div class="user-details">
				<div class="user-role">Admin</div>
				<div class="email-address">
				<div class="box">admin@gmail.com</div>
				</div>
			</div>
		</div>

		<!-- <a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a> -->
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>
			<li><a href="<?php echo BASE_URL; ?>GameDB" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
						class='bx bx-chevron-right icon-right'></i> </a></li>
			<!-- <ul class="side-dropdown"> -->
			<li><a href="<?php echo BASE_URL; ?>Admin_G"><i class='bx bxs-dashboard icon'></i>Game Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_assetD"><i class='bx bxs-dashboard icon'></i>Asset Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_GigD"><i class='bx bxs-dashboard icon'></i>Gigs Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_crowdfundD"><i class='bx bxs-dashboard icon'></i>Crowdfund Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_devlogsD"><i class='bx bxs-dashboard icon'></i>Devlogs Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_gameJamD"><i class='bx bxs-dashboard icon'></i>Game Jam Dashboard</a></li>
			<!-- </ul> -->
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
			<h1 class="title">Dashboard</h1>
			
			<div class="info-data">
				<div class="card db-card">
					<div class="total-views">
						<div class="main-total-view-left">
							<h3>Registered Users</h3>
							<h1><?= $this->userCount ?></h1>
						</div>
						<div class="main-total-view-right">
							<i class='bx bx-user view-icon'></i>
						</div>
					</div>
				</div>
				<div class="card db-card">
					<div class="total-views">
						<div class="main-total-view-left">
							<h3>Total Transactions</h3>
							<h1>1356700.00</h1>
						</div>
						<div class="main-total-view-right">
							<i class='bx bx-money view-icon'></i>
						</div>
					</div>
				</div>
				<div class="card db-card">
					<div class="total-views">
						<div class="main-total-view-left">
							<h3>Total Downloads</h3>
							<h1>135</h1>
						</div>
						<div class="main-total-view-right">
							<i class='bx bx-download view-icon'></i>
						</div>
					</div>
				</div>
			</div>
			<div class="data">
				<div class="content-data active-user">
					<div class="recentOrders">
						<?php
							$data = array(12, 19, 3, 5, 2, 3);
							$data_js = json_encode($data);
							?>

							<script>
							var data = <?php echo $data_js; ?>;
							</script>

						<canvas id="myChart"></canvas>
					</div>
				</div>
				<div class="content-data popular-games">
					<div class="popular-header">
						<h2>Most Popular Games</h2>
					</div>
					<div class="popular-cards">

						<div class="popular-game-card">
							<div class="game-cvr-img">
								<img src="gm-2.jpg">
							</div>

							<div class="game-name gm-crd">
								The spirit and the Mouse
							</div>

							<div class="game-count gm-crd">
								250+
							</div>
						</div>

						<div class="popular-game-card">
							<div class="game-cvr-img">
								<img src="gm-2.jpg">
							</div>

							<div class="game-name gm-crd">
								The spirit and the Mouse
							</div>

							<div class="game-count gm-crd">
								250+
							</div>
						</div>

						<div class="popular-game-card">
							<div class="game-cvr-img">
								<img src="gm-2.jpg">
							</div>

							<div class="game-name gm-crd">
								The spirit and the Mouse
							</div>

							<div class="game-count gm-crd">
								250+
							</div>
						</div>

					</div>
				</div>


				<div class="content-data popular-assets">
					<div class="popular-header">
						<h2>Most Popular Assets</h2>
					</div>
					<div class="popular-asset-card">
						<div class="asset-cvr-img">
							<img src="gm-2.jpg">
						</div>

						<div class="asset-name gm-crd">
							The spirit and the Mouse
						</div>

						<div class="asset-count ast-crd">
							250+
						</div>
					</div>

					<div class="popular-asset-card">
						<div class="asset-cvr-img">
							<img src="gm-2.jpg">
						</div>

						<div class="asset-name gm-crd">
							The spirit and the Mouse
						</div>

						<div class="asset-count ast-crd">
							250+
						</div>
					</div>

					<div class="popular-asset-card">
						<div class="asset-cvr-img">
							<img src="gm-2.jpg">
						</div>

						<div class="asset-name gm-crd">
							The spirit and the Mouse
						</div>

						<div class="asset-count ast-crd">
							250+
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

	<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?php echo json_encode($this->labels); ?>,
			datasets: [{
				label: 'Downloaded Assests',
				data: <?php echo json_encode($this->downloadasset_data); ?>,
				borderColor: 'rgba(75, 192, 192, 1)',
				backgroundColor: 'rgba(75, 192, 192, 0.2)',
				fill: false
			},
			{
				label: 'Downloaded Games',
				data: <?php echo json_encode($this->downloadgame_data); ?>,
				borderColor: 'rgba(0, 0, 0, 1)',
				backgroundColor: 'rgba(0, 0, 0, 0.2)',
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
	</script>

    <script src="<?php echo BASE_URL; ?>public/js/admin.js"></script>
    <!-- <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?> -->

</body>

</html>