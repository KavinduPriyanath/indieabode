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
        // include('public/css/login.css');
        ?>
    </style>
</head>

<body>
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Indie Abode</a>
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>
			<li><a href="index.html" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
						class='bx bx-chevron-right icon-right'></i> </a></li>
			<ul class="side-dropdown">
				<li><a href="game-db.html">Game Dashboard</a></li>
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
        <h1 class="title">User Management</h1>

            <div class="wrapper register-box">
                <form action="/indieabode/Admin_addNew/addAdmin" method="POST" id="form">
                    <!--register form-->
                    <div class="full-name">
                        <div class="first-name">
                            <label class="form-login-label" id="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" placeholder="firstname" required />
                        </div>
                        <div class="last-name">
                            <label class="form-login-label" id="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" placeholder="lastname" required /><br>
                        </div>
                    </div>
                    <label class="form-login-label">Username</label> <br>
                    <input type="text" name="username" id="user-name" placeholder="username" required /><br>


                    <label class="form-login-label">Email</label><br>
                    <input type="text" name="email" id="title" placeholder="email" required /><br>




                    <label class="form-login-label">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="Password" required /><br>





                    <label class="form-login-label">Confirm Password</label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" /><br><br>




                    <input type="checkbox" name="" id="checkbox" value="" onclick="checkboxClicked()">
                    <label for="" id="tos">I accept the terms of service </label><br>

                    <button type="submit" name="submit" id="register">Register</button><br><br>

                </form>

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