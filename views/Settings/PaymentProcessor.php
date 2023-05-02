<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/profile.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



    <div class="settings-content">
        <div class="top-row">
            Account Settings
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <div class="topics">Basics</div>
                    <a href="/indieabode/settings/profile">
                        <div class="sub-topics">Profile</div>
                    </a>
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator" || $_SESSION['userRole'] == "game publisher") { ?>
                        <a href="/indieabode/settings/portfolio">
                            <div class="sub-topics">Portfolio</div>
                        </a>
                    <?php } ?>
                    <a href="/indieabode/settings/password">
                        <div class="sub-topics">Password</div>
                    </a>
                    <a href="/indieabode/settings/emailaddress">
                        <div class="sub-topics">Email Addresses</div>
                    </a>
                    <a href="/indieabode/settings/twofactorauth">
                        <div class="sub-topics">Two Factor Auth</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Payments</div>
                    <a href="">
                        <div class="sub-topics">Credit Cards</div>
                    </a>
                    <a href="/indieabode/settings/billingAddress">
                        <div class="sub-topics">Billing Address</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Payout Mode</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Tax Information</div>
                    </a>
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator" || $_SESSION['userRole'] == "game publisher") { ?>
                        <a href="/indieabode/settings/revenueshare">
                            <div class="sub-topics">Revenue Sharing</div>
                        </a>
                    <?php } ?>
                    <a href="/indieabode/settings/paymentprocessors">
                        <div class="sub-topics">Payment Processors</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Support Email</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Contact</div>
                    <a href="/indieabode/settings/emailNotifications">
                        <div class="sub-topics">Email Notifications</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Website Support</div>
                    </a>
                </div>
                <div class="topics">Misc</div>
            </div>
            <div class="content-body">
                <h2>Payment Processors</h2>
                <div class="header">grgr</div><br>


            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>