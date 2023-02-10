<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Indieabode</title>

	<style>
		body {
			background-image: url("<?php echo BASE_URL ?>public/images/background/1.jpg");
		}

		<?php
		include 'public/css/admin.css';
		include 'public/css/admin_userMg.css';
		include 'public/css/admin_db.css';
		?>
	</style>
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
				<div class="user-role">Admin</div>
				<div class="email-address">
					<div class="box">admin@gmail.com</div>
				</div>
			</div>
		</div>
		<!-- <a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a> -->
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>

			<li><a href="<?php echo BASE_URL; ?>SiteDashboard" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
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


		<!-- MAIN -->
		<main>
			<h1 class="title">Complaints Handling</h1>

			<!-- <div class="search-user">
				Username/email
				<form action="#">
					<div class="user-mg-search">
						<input type="text" placeholder="Search...">
						<i class='bx bx-search icon'></i>
					</div>
				</form>
			</div> -->

			<div class="search-user">
				<h2>Username/email</h2>
				<form action="#">
					<div class="user-mg-search">
						<input type="text" placeholder="Search...">
						<i class='fa fa-search icon search-role'></i>
					</div>
				</form>
			</div>

			<div class="search-user-type">
				<button class="<?php echo $this->active == 'all' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('all')"> Show all Complaints</button>
				<a class="<?php echo $this->active == 'gamer' ? 'btn active' : 'btn'; ?>" href='/indieabode/Admin_userMg/viewFilteredUser/gamer'"> Games</a>
				<button class=" <?php echo $this->active == 'game_developer' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('game_developer')">Assets</button>
					<button class="<?php echo $this->active == 'game_publisher' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('game_publisher')"> Game Jams</button>
					<button class="<?php echo $this->active == 'assets_creator' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('assets_creator')">Gigs</button>
					<button class="<?php echo $this->active == 'gamejam_organizer' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('gamejam_organizer')">Crowdfunds</button>
					<button class="<?php echo $this->active == 'gamejam_organizer' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('gamejam_organizer')">Devlogs</button>
			</div>
			<!--
			<div class="container">
				<div class="filterDiv cars">BMW</div>
				<div class="filterDiv colors fruits">Orange</div>
				<div class="filterDiv cars">Volvo</div>
				<div class="filterDiv colors">Red</div>
				<div class="filterDiv cars animals">Mustang</div>
				<div class="filterDiv colors">Blue</div>
				<div class="filterDiv animals">Cat</div>
				<div class="filterDiv animals">Dog</div>
				<div class="filterDiv fruits">Melon</div>
				<div class="filterDiv fruits animals">Kiwi</div>
				<div class="filterDiv fruits">Banana</div>
				<div class="filterDiv fruits">Lemon</div>
				<div class="filterDiv animals">Cow</div>
			</div> -->


			<section class="table__body">

            <table>
                <thead>
                    <tr>
                        <th> Id</th>
                        <th> Reason</th>
                        <th> Description</th>
                        <th> Type</th>
                        <!-- <th> View</th> -->
                        <!-- <th> Remove</th> -->
                    </tr>
                </thead>
                <tbody>

                        <tr>
                            <td>12</td>
                            <td>Broken-Doesn't run,download or crashes</td>
                            <td>Downloaded game doesn't work</td>
                            <td>Game</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Offensive Material</td>
                            <td>none</td>
                            <td>Asset</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>Miscategorized</td>
                            <td>Jam has an incorrect tags</td>
                            <td>Game Jam</td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>Spam</td>
                            <td>none</td>
                            <td>Gig</td>
                        </tr>

                </tbody>
            </table>
        </section>


		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<?php
    include 'includes/footer.php';
    ?>
	<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>

</html>