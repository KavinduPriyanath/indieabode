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
        include 'public/css/admin_userMg.css';
        ?>
    </style>
</head>

<body>
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a>
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>
			<li><a href="<?php echo BASE_URL; ?>GameDB" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
						class='bx bx-chevron-right icon-right'></i> </a></li>
			<ul class="side-dropdown">
				<li><a href="<?php echo BASE_URL; ?>Admin_G">Game Dashboard</a></li>
				<li><a href="#">Asset Dashboard</a></li>
				<li><a href="#">Gigs Dashboard</a></li>
				<li><a href="#">Crowdfund Dashboard</a></li>
				<li><a href="#">Devlogs Dashboard</a></li>
				<li><a href="#">Game Jam Dashboard</a></li>
			</ul>
			<li>
				<a href="#"><i class='bx bxs-message-square-error icon'></i> Complaints </a>
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
			<h1 class="title">User Management</h1>

			<div class="search-user">
				Username/email
				<form action="#">
					<div class="user-mg-search">
						<input type="text" placeholder="Search...">
						<i class='bx bx-search icon'></i>
					</div>
				</form>
			</div>

			<div class="search-user-type">
				<button class="btn active" onclick="filterSelection('all')"> Show all Users</button>
				<button class="btn" onclick="filterSelection('cars')"> Gamers</button>
				<button class="btn" onclick="filterSelection('animals')"> Game Developers</button>
				<button class="btn" onclick="filterSelection('fruits')"> Game Publishers</button>
				<button class="btn" onclick="filterSelection('colors')"> Asset Creators</button>
				<button class="btn" onclick="filterSelection('colors')"> Game Jam Organizers</button>
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
                        <th> Username</th>
                        <th> User Role</th>
                        <th> Email</th>
                        <!-- <th> View</th> -->
                        <th> Remove</th>
                    </tr>
                </thead>
                <tbody>
				
                    <?php foreach ($this->users as $user) { ?>
                        <tr>
                            <td>
								<?php echo $user['gamerID']; ?>
							</td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['userRole']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
							<form action="/indieabode/Admin_userMg/deleteUser/<?php echo $user['gamerID']; ?>" method="post"> 
          							<input type="submit" name="delete_user" value="Delete">
								</form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->



    <script src="<?php echo BASE_URL; ?>public/js/admin.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/admin_userMg.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>

</html>