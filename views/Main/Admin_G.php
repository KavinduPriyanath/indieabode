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
        ?>
    </style>
</head>

<body>
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a>
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>
			<li><a href="../Main/GameDB.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
						class='bx bx-chevron-right icon-right'></i> </a></li>
			<ul class="side-dropdown">
				<li><a href="../Main/Admin_G.php">Game Dashboard</a></li>
				<li><a href="asset-db.html">Asset Dashboard</a></li>
				<li><a href="gigs-db.html">Gigs Dashboard</a></li>
				<li><a href="crowdfund-db.html">Crowdfund Dashboard</a></li>
				<li><a href="devlogs-db.html">Devlogs Dashboard</a></li>
				<li><a href="gamejam-db.html">Game Jam Dashboard</a></li>
			</ul>
			<li>
				<a href="complaints.html"><i class='bx bxs-message-square-error icon'></i> Complaints </a>
			</li>

			<li class="divider" data-text="Settings">Settings</li>
			<li><a href="addnew-admin.html"><i class='bx bx-user-plus icon'></i> Add new admin</a></li>
			<li>
				<a href="remove-user.html"><i class='bx bxs-trash icon'></i> Remove user</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		
		<!-- MAIN -->
		<main>
			<h1 class="title">Game Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#" class="active">Dashboard/Game Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="total-views">
						<div class="main-total-view-left">
							<h3>Uploaded Games</h3>
							<h1>13567</h1>
						</div>
						<div class="main-total-view-right">
							<i class='bx bx-upload view-icon'></i>
						</div>
					</div>
				</div>
				<div class="card">
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
				<div class="card">
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
			</div>
			<div class="data">
				<div class="content-data active-user">
					<div class="recentOrders">
						<div class="cardHeader">
							<h2>Recent Activities</h2>
							<a href="#" class="btn">View All</a>
						</div>

						<table>
							<thead>
								<tr>
									<td>Name</td>
									<td>User Role</td>
									<td>Task</td>
									<td>Time</td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>Kavindu Priyanath</td>
									<td>Game Developer</td>
									<td>Uploaded a Game</td>
									<td><span class="status delivered">07.39 a.m</span></td>
								</tr>

								<tr>
									<td>Himash Liyanage</td>
									<td>Game Publisher</td>
									<td>Ordered a Gig</td>
									<td><span class="status pending">08.23 a.m</span></td>
								</tr>

								<tr>
									<td>Yeshan Pasindu</td>
									<td>Asset Creator</td>
									<td>Uploaded an asset</td>
									<td><span class="status return">09.00 a.m</span></td>
								</tr>

								<tr>
									<td>Nadee Darshika</td>
									<td>Game Jam Organizer</td>
									<td>Organized a jam</td>
									<td><span class="status inProgress">09.12 a.m</span></td>
								</tr>

								<tr>
									<td>Prasad Darshana</td>
									<td>Gamer</td>
									<td>Downloaded a Game</td>
									<td><span class="status delivered">09.35 a.m</span></td>
								</tr>

								<tr>
									<td>Nethmi Imanya</td>
									<td>Game Developer</td>
									<td>Created a Gig</td>
									<td><span class="status pending">12.01 p.m</span></td>
								</tr>

								<tr>
									<td>Umasha Kaumadi</td>
									<td>Gamer</td>
									<td>Joined a crowdfund</td>
									<td><span class="status return">12.30 p.m</span></td>
								</tr>

								<tr>
									<td>Kaveesha Gimhani</td>
									<td>Game Developer</td>
									<td>Made a devlog</td>
									<td><span class="status inProgress">3.00 p.m</span></td>
								</tr>
							</tbody>
						</table>
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


    <script src="<?php echo BASE_URL; ?>public/js/admin.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>

</html>