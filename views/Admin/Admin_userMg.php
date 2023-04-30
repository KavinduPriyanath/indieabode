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
		<ul class="side-menu">
			<li class="divider" data-text="main">Main</li>

			<li><a href="<?php echo BASE_URL; ?>SiteDashboard" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard <i
						class='bx bx-chevron-right icon-right'></i> </a></li>
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
			<h1 class="title">User Management</h1>

			<div class="search-user">
				<h2>Username/email</h2>
				<form action="#">
					<div class="user-mg-search">
						<input type="text" placeholder="Search...">
						<!-- <i class='fa fa-search icon search-role'></i> -->
					</div>
				</form>
			</div>

			<div class="filter-roles user-del-filter">
				<div class="search-user-type">
					<button class="<?php echo $this->active == 'all' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('all')"> Show all Users</button>
					<a class="<?php echo $this->active == 'gamer' ? 'btn active' : 'btn'; ?>" href='/indieabode/Admin_userMg/viewFilteredUser/gamer'"> Gamers</a>
					<button class=" <?php echo $this->active == 'game developer' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('gd')"> Game Developers</button>
						<button class="<?php echo $this->active == 'game publisher' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('gp')"> Game Publishers</button>
						<button class="<?php echo $this->active == 'asset creator' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('ac')"> Asset Creators</button>
						<button class="<?php echo $this->active == 'gamejam organizer' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('go')"> Game Jam Organizers</button>
				</div>
				<div class="blocked-users">
					<button class="#" onclick="viewBlockUsers('block')">Blocked Users</button>
				</div>
			</div>
			<section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id</th>
                        <th> Username</th>
                        <th> User Role</th>
                        <th> Email</th>
                        <th> View</th>
						<th> Download </th>
                        <th> Block</th>
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
								<form action="/indieabode/Admin_userMg/viewUser/<?php echo $user['gamerID']; ?>" method="post"> 
          							<input type="submit" name="view_user" value="view" class="download-user-btn">
								</form>
							</td>
							<td>
								<form action="/indieabode/Admin_userMg/downloadUser/<?php echo $user['gamerID']; ?>" method="post"> 
          							<input type="submit" name="download_user" value="download" class="download-user-btn">
								</form>
							</td>
							<td>
								<?php if($user['accountStatus'] == 1){ ?>
									<form action="/indieabode/Admin_userMg/deleteUser/<?php echo $user['gamerID']; ?>" method="post"> 
										<input type="submit" name="block_user" value="Block" class="del-user-btn">
									</form>
								<?php } else { ?>
									<form action="/indieabode/Admin_userMg/unblockUser/<?php echo $user['gamerID']; ?>" method="post"> 
										<input type="submit" name="unblock_user" value="Unblock" class="del-user-btn unblock-btn">
									</form>
								<?php } ?>
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

	<?php
    include 'includes/footer.php';
    ?>

	<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

	<script>
		function filterSelection(filter_text) {

			console.log(filter_text)

			if (filter_text === "all") {
				window.location.href = '/indieabode/Admin_userMg'
			} else {
				window.location.href = '/indieabode/Admin_userMg/viewFilteredUser/' + filter_text
			}
		}
		function viewBlockUsers(filter_text) {

			console.log(filter_text)
			window.location.href = '/indieabode/Admin_userMg/viewFilteredBlockUser/' + filter_text
		}
	</script>


</body>

</html>