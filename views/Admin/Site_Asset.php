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
                    <a href="javascript:history.back()" class="back-arrow">&#8592; Back</a>
					<h1>All Assets</h1>

                    <div class="jam-db-table all-game-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Asset ID</th>
                                    <th>Asset Name</th>
                                    <th>Asset Creator ID</th>
                                    <th>Views</th>
                                    <th>Downloads</th>
                                    <th>Ratings</th>
                                    <th>Revenue</th>
                                    <th>Free/Paid</th>
                                    <th class="total-income">Total Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->allassets as $asset) { ?>
                                    <tr class="<?php echo $asset['assetPrice'] == 0 ? 'free-asset' : 'paid-asset'; ?>">
                                        <td><?php echo $asset['assetID']; ?></td>
                                        <td><?php echo $asset['assetName']; ?></td>
                                        <td><?php echo $asset['assetCreatorID']; ?></td>
                                        <td><?php echo $asset['views']; ?></td>
                                        <td><?php echo $asset['downloads']; ?></td>
                                        <td><?php echo $asset['ratings']; ?></td>
                                        <td>$<?php echo $asset['revenue']; ?></td>
                                        <td><?php echo $asset['assetPrice'] == 0 ? 'Free' : '$' . $asset['assetPrice']; ?></td>
                                        <td class="total-income"><?php echo $asset['assetPrice'] == 0 ? '-' : '$' . $asset['downloads'] * $asset['assetPrice']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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