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
                    <a href="/indieabode/settings/portfolio">
                        <div class="sub-topics">Portfolio</div>
                    </a>
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
                    <a href="/indieabode/settings/revenueshare">
                        <div class="sub-topics">Revenue Sharing</div>
                    </a>
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
                <h2>Email Notifications</h2>
                <form action="" method="post">

                    <div class="header">Configure how Indieabode is allowed to notify you here. You'll automatically receive an email with a digest of your unread notifications. Configure which ones will be sent to your inbox.</div>

                    <div class="labels"><span>Sends an email when...</span></div>
                    <div class="key-points">
                        <div class="key-point">
                            <input type="checkbox" name="point1" id="point1"> <label for="point1">Someone purchase a game that I published</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point2" id="point2"> <label for="point2">Someone orders a gig that I created</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point3" id="point3"> <label for="point3">Someone donates a crowdfund that I launched</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point4" id="point4"> <label for="point4">People interact with my devlog posts</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point5" id="point5"> <label for="point5">When I purchased some asset</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point5" id="point6"> <label for="point6">My jam submissions get comments</label>
                        </div>
                    </div>

                    <div class="labels"><span>Don't want any emails?</span></div>
                    <div class="key-points">
                        <div class="key-point">
                            <input type="checkbox" name="point1" id="pointX"> <label for="pointX">Never send any email to me</label>
                        </div>
                    </div>
                    <button type="submit" class="save">Save</button>
                </form>
            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>