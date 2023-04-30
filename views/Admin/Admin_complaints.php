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
			<h1 class="title">Complaints Handling</h1><br><br>

			<div class="search-user-type">
				<button class="<?php echo $this->active == 'all' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('all')"> Show all Complaints</button>
				<a class="<?php echo $this->active == 'Game' ? 'btn active' : 'btn'; ?>" href='/indieabode/Admin_complaints/viewFilteredComplaints/Game'"> Games</a>
				<button class=" <?php echo $this->active == 'Asset' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('Asset')">Assets</button>
					<button class="<?php echo $this->active == 'Gamejam' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('Gamejam')"> Game Jams</button>
					<button class="<?php echo $this->active == 'Gig' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('Gig')">Gigs</button>
					<button class="<?php echo $this->active == 'Crowdfund' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('Crowdfund')">Crowdfunds</button>
					<button class="<?php echo $this->active == 'Devlog' ? 'btn active' : 'btn'; ?>" onclick="filterSelection('Devlog')">Devlogs</button>
			</div>

			<section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Complaint Id</th>
                        <th> Reason</th>
                        <th> Description</th>
                        <th> Type</th>
						<th> Complainer ID </th>
                    </tr>
                </thead>
				
				<tbody>
					<?php foreach ($this->complaints as $complaint) { ?>
						<tr>
							<td><?php echo $complaint['complaintID']; ?></td>
							<td><?php echo $complaint['reason']; ?></td>
							<td><?php echo $complaint['description']; ?></td>
							<td><?php echo $complaint['type']; ?></td>
							<td><?php echo $complaint['gamerID']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
            </table>
			</section>
		</main>
	</section>

	<?php
    include 'includes/footer.php';
    ?>
	<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


	<script>
		function filterSelection(filter_text) {
			console.log(filter_text)

			if (filter_text === "all") {
				window.location.href = '/indieabode/Admin_complaints'
			} else {
				window.location.href = '/indieabode/Admin_complaints/viewFilteredComplaints/' + filter_text
			}



		}
	</script>
</body>

</html>