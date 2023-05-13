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
				<div class="user-role"><?= $_SESSION['username']; ?></div>
				<div class="email-address">
					<div class="box"><?= $_SESSION['email']; ?></div>
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
			<!-- <li><a href="<?php echo BASE_URL; ?>Admin_addNew"><i class='bx bx-user-plus icon'></i> Add new admin</a></li> -->
			<li>
				<a href="<?php echo BASE_URL; ?>Admin_userMg"><i class='bx bxs-trash icon'></i>User Management</a>
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
						<th> Item Name(with ID)</th>
						<th> Complainer ID </th>
						<th> Status </th>
                    </tr>
                </thead>
				
				<tbody>
					<?php if (empty($this->complaint)) { ?>
						<tr>
							<td colspan="6" style="text-align: center; color: #a62247; font-size: 1.1em;">No results found.</td>
						</tr>
					<?php } else { ?>
						<?php foreach ($this->complaint as $complaint) { ?>
							<tr>
								<td><?php echo $complaint['complaintID']; ?></td>
								<td><?php echo $complaint['reason']; ?></td>
								<td><?php echo $complaint['description']; ?></td>
								<td><?php echo $complaint['type']; ?></td>
								<td><?php echo $complaint['name']; ?>(<?php echo $complaint['itemID']; ?>)</td>
								<!-- <td>Apex Legends(21)</td> -->
								<td><?php echo $complaint['gamerID']; ?></td>
								<td>
									<label class="switch">
										<input type="checkbox" id="toggle-switch" value="1" <?php echo $complaint['checked'] ? 'checked' : ''; ?> onclick="toggleSwitchClicked(this, <?php echo $complaint['complaintID']; ?>, this.checked ? 1 : 0)" data-previous-value="<?php echo $complaint['checked'] ? 1 : 0 ?>">
										<span class="slider round"></span>
									</label>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
            </table>
			</section>
		</main>
	</section>
	
	<!-- modal to display successful messages -->
	<div id="successModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Complaint status updated and email sent successfully!</p>
		</div>
	</div>

	<!-- modal to display error messages -->
	<div id="errorModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Cannot turn off the switch, the complaint has already been checked</p>

		</div>
	</div>

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

	<script>
		function toggleSwitchClicked(checkboxElem, complaintID, isChecked) {
			// Only send AJAX request if switch is turned on
			if (isChecked) {
				// Send AJAX request to update database
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '/indieabode/Admin_complaints/updateComplaintChecked');
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onload = function() {
				if (xhr.status === 200 && xhr.responseText) {
					console.log(xhr.responseText);
					// Display success message and open modal
					var successModal = document.getElementById('successModal');
					successModal.style.display = 'block';
				} else {
					console.log('Error updating database.');
					alert('Error updating complaint status.');
				}
				};
				xhr.send('complaintID=' + encodeURIComponent(complaintID) + '&isChecked=' + encodeURIComponent(isChecked));
			} else {
				// Display error message and prevent toggle switch from being turned off
				var errorModal = document.getElementById('errorModal');
				errorModal.style.display = 'block';
				checkboxElem.checked = true;
			}
		}

		// Close modal when user clicks on 'x' button
		var closeButtons = document.getElementsByClassName('close');
			for (var i = 0; i < closeButtons.length; i++) {
			closeButtons[i].addEventListener('click', function() {
				var modal = this.parentElement.parentElement;
				modal.style.display = 'none';
			});
		}

		// Close modal when user clicks outside of it
		window.onclick = function(event) {
			var modals = document.getElementsByClassName('modal');
			for (var i = 0; i < modals.length; i++) {
				if (event.target == modals[i]) {
				modals[i].style.display = 'none';
				}
			}
		}



		document.addEventListener('DOMContentLoaded', function() {
			var toggleSwitches = document.querySelectorAll('[id^="toggle-switch-"]');
			toggleSwitches.forEach(function(switchElem) {
				switchElem.addEventListener('change', function() {
					var isChecked = this.checked;
					var complaintID = this.dataset.complaintId;
					var previousValue = this.getAttribute('data-previous-value');
					if (isChecked && previousValue === '0') {
						this.setAttribute('data-previous-value', '1');
						toggleSwitchClicked(complaintID, isChecked);
					} else if (!isChecked && previousValue === '1') {
						alert('Cannot turn off the switch, the complaint has already been checked.');
						this.checked = true;
					}
				});
			});
		});
	</script>
</body>

</html>