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
        include 'public/css/admin_db.css';
        include 'public/css/login.css';
        // include('public/css/login.css');
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/A_navbar.php';
    ?>

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


		<!-- MAIN -->
		<main>
        <h1 class="title">- User Management -</h1>
            <div class="register-box addnew-admin-container">
                <div class="addnew-box">
                    <div class="addnew-topic">
                        <h2>Add New Admin</h2>
                    </div>

                    <form action="/indieabode/Admin_addNew/addAdmin" method="POST" id="form">
                        <!--register form-->
                        <label class="form-login-label">Username</label> <br>
                        <input type="text" name="username" id="user-name" placeholder="username" required /><br>


                        <label class="form-login-label">Email</label><br>
                        <input type="text" name="email" id="title" placeholder="email" required /><br>

                        <label class="form-login-label">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Password" required /><br>

                        <label class="form-login-label">Confirm Password</label><br>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" /><br><br>

                        <button type="submit" name="submit" class="add-new-btn">Add</button><br><br>

                    </form>

                </div>

                <div class="bg-edit">
                    <div class="bg-img-addnew">
                        <img src="/indieabode/public/images/Admin/addnew-bg.jpg">
                    </div>
                </div>
            </div>
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