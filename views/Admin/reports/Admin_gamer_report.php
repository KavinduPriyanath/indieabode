<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
		body {
	background-image:url("<?php echo BASE_URL?>public/images/background/1.jpg");
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
				<img src="/indieabode/public/images/Admin/admin-1.png" alt="user-image" class="rounded-circle"/>
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
			<!-- <li><a href="<?php echo BASE_URL; ?>Admin_G"><i class='bx bxs-dashboard icon'></i>Game Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_assetD"><i class='bx bxs-dashboard icon'></i>Asset Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_GigD"><i class='bx bxs-dashboard icon'></i>Gigs Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_crowdfundD"><i class='bx bxs-dashboard icon'></i>Crowdfund Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_devlogsD"><i class='bx bxs-dashboard icon'></i>Devlogs Dashboard</a></li>
			<li><a href="<?php echo BASE_URL; ?>Admin_gameJamD"><i class='bx bxs-dashboard icon'></i>Game Jam Dashboard</a></li> -->
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
	
	<!-- NAVBAR -->

    <section id="content">


        <div class="report-header-all">
            <h1>INDIE ABODE</h1><br>
            <i>Game Publishing Platform</i><br>
            <span>Report on 2022-12-05 </span>
        </div>
		<!-- MAIN -->
		<main class="report-main">
            <section id="report-content">

                <div class="report-container">
                    <div class="reprot-header">
                        <div class="report-name">
                            Prasad Darshana (Gamer)<br>
                            <span class="user-mail-r">test@gmail.com</span>
                        </div>

                        <div class="report-dw">
                            <div class="view-summary">
                                <input type="submit" name="view-sum" value="View Summary" class="view-sum-btn">
                            </div>

                            <div class="report-print">
                                <input type="submit" name="print-r" value="Print" class="print-r">
                            </div>
                        </div>

                    </div>
<!-- 
                    <div class="report-input">

                    </div> -->

                    <div class="report-details">
                        <div class="dw-game-report report-all">
                            <table>
                                <div class="table-topic">Downloaded Games</div>
            
                                <thead>
                                    <tr>
                                        <th> Cover Image</th>
                                        <th> Game Name</th>
                                        <th> Downloaded date</th>
                                        <th> Price </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    
                                

                                    <tfoot>
                                        <tr id="total-price">
                                        <td colspan="3">Total Expenditure</td>
                                        <td>$1500.00</td>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>          
                        </div>

                        <div class="dw-asset-report report-all">
                            <table>
                                <div class="table-topic">Downloaded Assets</div>
                                <!-- <div class="list-items">
                                    <ul>
                                        <li><span class="circle green"></span>Created a gig</li>
                                        <li><span class="circle yellow"></span>Made a devlog</li>
                                        <li><span class="circle blue"></span>Organized Crowdfund</li>
                                    </ul>
                                </div> -->
                                <thead>
                                    <tr>
                                        <th> Cover Image</th>
                                        <th> Asset Name</th>
                                        <th> Downloaded date</th>
                                        <th> Price </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Himash Liyanage</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Himash Liyanage</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Himash Liyanage</span><br>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    
                                

                                    <tfoot>
                                        <tr id="total-price">
                                        <td colspan="3">Total Expenditure</td>
                                        <td>$1500.00</td>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>          
                        </div>

                        <div class="participate-crowdfund-report report-all">
                            <table>
                                <div class="table-topic">Participated Crowdfunds</div>
                                <div class="list-items">
                                    <ul>
                                        <li><span class="circle green"></span>Expired</li>
                                        <li><span class="circle yellow"></span>Not Expired</li>
                                    </ul>
                                </div>
                                <thead>
                                    <tr>
                                        <th> Cover Image</th>
                                        <th> Game Name</th>     <!-- include expire date -->
                                        <th> Total Backers</th>
                                        <th> Total Revenues </th>
                                        <th> Donated Date </th>
                                        <th> Donated Amount </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <!-- <span class="release-date exp-date-cwd">expires on<br>2022-12-05 11:09:02</span><br> -->
                                            <span>Kavindu Priyanath</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        
                                        <td>10</td>
                                        <td>$800</td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <!-- <span class="release-date exp-date-cwd">expires on<br>2022-12-05 11:09:02</span><br> -->
                                            <span>Kavindu Priyanath</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        
                                        <td>10</td>
                                        <td>$800</td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <!-- <span class="release-date exp-date-cwd">expires on<br>2022-12-05 11:09:02</span><br> -->
                                            <span>Kavindu Priyanath</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        
                                        <td>10</td>
                                        <td>$800</td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> $240.00 </td>
                                    </tr>

                                    <tfoot>
                                        <tr id="total-price">
                                        <td colspan="5">Total Expenditure</td>
                                        <td>$24000</td>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>
                        </div>

                        

                        <div class="join-jam-report report-all">
                            <table>
                                <div class="table-topic">Rated Jams</div>
                                <!-- <div class="list-items">
                                    <ul>
                                        <li><span class="circle green"></span>Ongoing</li>
                                        <li><span class="circle yellow"></span>Finished</li>
                                    </ul>
                                </div> -->
                                <thead>
                                    <tr>
                                        <th> Cover Image</th>
                                        <th> Jam Name</th> <!--organizer's name -->
                                        <th> Rated Submission</th>  <!-- developer's name -->
                                        <th> Rates</th>
                                        <th> Rank </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                            <span>Ended on 2022-12-05 11:09:02</span>
                                        </td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Kavindu Priyanath</span>
                                        </td>
                                        <td>
                                            <b>3</b><br>
                                            <span>2022-12-05 11:09:02</span>
                                        </td>

                                        <td id="rank">
                                            <b>2</b><br>
                                            <span>56 rates</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                            <span>Ended on 2022-12-05 11:09:02</span>
                                        </td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Kavindu Priyanath</span>
                                        </td>
                                        <td>
                                            <b>3</b><br>
                                            <span>2022-12-05 11:09:02</span>
                                        </td>

                                        <td id="rank">
                                            <b>2</b><br>
                                            <span>56 rates</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Yeshan Pasindu</span><br>
                                            <span>Ended on 2022-12-05 11:09:02</span>
                                        </td>
                                        <td>
                                            <b>Albion Online</b><br>
                                            <span>Kavindu Priyanath</span>
                                        </td>
                                        <td>
                                            <b>3</b><br>
                                            <span>2022-12-05 11:09:02</span>
                                        </td>

                                        <td id="rank">
                                            <b>2</b><br>
                                            <span>56 rates</span>
                                        </td>
                                    </tr>
                                    
                                    

                                    <!-- <tfoot>
                                        <tr id="total-price">
                                        <td colspan="4">Total Joined Jams</td>
                                        <td>3</td>
                                        </tr>
                                    </tfoot> -->
                                </tbody>
                            </table>
                        </div>

                        <div class="report-items report-all">
                            <table>
                                <div class="table-topic">Reported Complaints</div>
                                <div class="list-items">
                                    <ul>
                                        <li><span class="circle green"></span>Has Responded</li>
                                        <li><span class="circle yellow"></span>Not Responded</li>
                                    </ul>
                                </div>
                                <thead>
                                    <tr>
                                        <th> Cover Image</th>
                                        <th> Item Name</th>  <!--asset creator username -->
                                        <th> Reported Date</th>
                                        <th> Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online  (<label class="report-type">Game</label>)</b><br>
                                            <span>Himash Liyanage</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> unsupported format</td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online  (<label class="report-type">Asset</label>)</b><br>
                                            <span>Himash Liyanage</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> unsupported format</td>
                                    </tr>
                                    <tr>
                                        <td><img src="/indieabode/public/images/Admin/jam/jam-1.jpg"></td>
                                        <td>
                                            <b>Albion Online  (<label class="report-type">Game</label>)</b><br>
                                            <span>Himash Liyanage</span><br>
                                            <span class="circle green"></span>
                                            <span class="circle yellow"></span>
                                        </td>
                                        <td>2022-12-05 11:09:02</td>
                                        <td> unsupported format</td>
                                    </tr>

                                    <!-- <tfoot>
                                        <tr id="total-price">
                                        <td colspan="3">Total Expenditure</td>
                                        <td>$1500.00</td>
                                        </tr>
                                    </tfoot> -->
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>

            </section>

        </main>
		<!-- MAIN -->
	</section>
    <!-- <main>
        <section id="report-content">

            <div class="report-container">
                <div class="reprot-header">
                    <div class="report-name">
                        <h2>Prasad Darshana</h2><br>
                        <span>Game Developer</span>
                    </div>

                </div>

                <div class="report-input">

                </div>

                <div class="report-details">

                </div>
            </div>

        </section>

    </main> -->

	<?php
    include 'includes/footer.php';
    ?>

	<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

	<script>
		function filterSelection(filter_text) {
		// var x, i;
		// x = document.getElementsByClassName("filterDiv");
		// if (c == "all") c = "";
		// for (i = 0; i < x.length; i++) {
		//   w3RemoveClass(x[i], "show");
		//   if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
		// }

		console.log(filter_text)

		if (filter_text==="all"){
			window.location.href = '/indieabode/Admin_userMg'
		}

		else{
			window.location.href = '/indieabode/Admin_userMg/viewFilteredUser/'+ filter_text
		}

		

		}
	</script>


</body>

</html>