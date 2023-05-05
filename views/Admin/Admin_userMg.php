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
			<form class="form-search" action="/indieabode/Admin_userMg/searchUser" method="post">
				<div class="search-title">
					<h3>Search Users</h3>
				</div>
				
				<div class="search-user">
					<div class="search-user-element">
						<label>Email</label><br>
						<input type="text" name="search_email" placeholder="Search by Email" id="search-user-input">
					</div>
					<div class="search-user-element">
						<label>ID</label><br>
						<input type="text" name="search_id" placeholder="Search by ID" id="search-user-input">
					</div>
					<div class="search-user-element">
						<label>Username</label><br>
						<input type="text" name="search_username" placeholder="Search by Username" id="search-user-input">
					</div>
					<div class="search-user-element">
						<select name="search_user_role">
							<option value="">All User Roles</option>
							<option value="gamer">gamer</option>
							<option value="game developer">game developer</option>
							<option value="game publisher">game publisher</option>
							<option value="asset creator">asset creator</option>
							<option value="gamejam organizer">gamejam organizer</option>
						</select>
					</div>
					
					<input type="submit" name="search_user" value="Search User &#x1F50D" class="search-btn">
				</div>
			</form>
			
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
					
						<?php if (empty($this->users)) { ?>
							<tr>
								<td colspan="7" style="text-align: center; color: #a62247; font-size: 1.1em;">No results found.</td>
							</tr>
						<?php } else { ?>
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
						<?php } ?>
					</tbody>
				</table>
				<!-- display modal -->
				<div id="user-Modal" class="user-block-modal">
					<div class="user-modal-content">
						<span class="close">&times;</span>
						<p id="user-modal-text"></p>
					</div>
				</div>

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

	<script>
		// Get the modal
		var modal = document.getElementById("user-Modal");

		// Get the button that opens the modal
		var btn = document.querySelector(".del-user-btn, .unblock-btn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on the button, open the modal and set the text
		btn.onclick = function(event) {
		event.stopPropagation(); // Stop the click event from propagating to the window.onclick function
		modal.style.display = "block";
		var modalText = document.getElementById("user-modal-text");
		if (this.value == "Block") {
			document.querySelector(".user-modal-content").style.backgroundColor = "#f6d6e2";
			modalText.innerHTML = "User account has been blocked.";
		} else {
			document.querySelector(".user-modal-content").style.backgroundColor = "#84beb3";
			modalText.innerHTML = "User account has been unblocked.";
		}
		}

		// When the user clicks on <span> (x) or close button, close the modal
		span.onclick = function() {
		modal.style.display = "none";
		}
		var closeButton = document.querySelector(".close-button");
		closeButton.onclick = function() {
		modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		}

	</script>



</body>

</html>