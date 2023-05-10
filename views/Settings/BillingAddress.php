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

    <div class="flashMessage" id="flashMessage"></div>

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
                <?php if ($_SESSION['userRole'] != "gamejam organizer") { ?>
                    <div class="category">
                        <div class="topics">Payments</div>
                        <a href="">
                            <div class="sub-topics">Credit Cards</div>
                        </a>
                        <a href="/indieabode/settings/billingAddress">
                            <div class="sub-topics">Billing Address</div>
                        </a>
                        <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator" || $_SESSION['userRole'] == "game publisher") { ?>
                            <a href="">
                                <div class="sub-topics">Payout Mode</div>
                            </a>
                            <a href="">
                                <div class="sub-topics">Tax Information</div>
                            </a>
                            <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator") { ?>
                                <a href="/indieabode/settings/revenueshare">
                                    <div class="sub-topics">Revenue Sharing</div>
                                </a>
                            <?php } ?>
                            <a href="/indieabode/settings/paymentprocessors">
                                <div class="sub-topics">Payment Processors</div>
                            </a>
                        <?php } ?>
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
                <?php } ?>
            </div>
            <div class="content-body">
                <h2>Billing Address</h2>

                <div class="header">This may help our payment processors to identify you when you make your online transactions through our website. Also supports to prevent fraud and identity theft</div><br>
                <div class="header">You can set your billing address here so it's pre-filled out when you make any purchases that require it.</div>

                <div class="labels"><span>Full Name</span></div>
                <input type="text" placeholder="Required" name="fullName" id="fullName" value="<?= $this->userBilling['fullName']; ?>">

                <div class="labels"><span>Street Line 1</span></div>
                <input type="text" placeholder="Required" name="street1" id="street1" value="<?= $this->userBilling['streetLine1']; ?>">

                <div class="labels"><span>Street Line 2</span></div>
                <input type="text" placeholder="Optional" name="street2" id="street2" value="<?= $this->userBilling['streetLine2']; ?>">

                <div class="labels"><span>City</span></div>
                <input type="text" placeholder="Required" name="city" id="city" value="<?= $this->userBilling['city']; ?>">

                <div class="labels"><span>Province/State</span></div>
                <input type="text" placeholder="Optional" name="province" id="province" value="<?= $this->userBilling['province']; ?>">

                <div class="labels"><span>Zip/Postal Code</span></div>
                <input type="text" placeholder="Required" name="postalCode" id="postalCode" value="<?= $this->userBilling['zipCode']; ?>">


                <div class="labels"><span>Country</span></div>
                <select name="country" id="country">
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Singapore">Singapore</option>
                </select>

                <!-- <button type="submit" class="save" name="save">Save</button> -->
                <div class="save" id="updateBillingDetails">Save</div>
                </form>
            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            $("#updateBillingDetails").click(function(e) {

                let fullname = $('#fullName').val();
                let street1 = $('#street1').val();
                let street2 = $('#street2').val();
                let city = $('#city').val();
                let province = $('#province').val();
                let postalCode = $('#postalCode').val();
                let country = $("#country option:selected").val();



                var data = {
                    'fullName': fullname,
                    'street1': street1,
                    'street2': street2,
                    'city': city,
                    'province': province,
                    'postalCode': postalCode,
                    'country': country,
                    'billingdata_update': true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/settings/addBillingAddressData",
                    data: data,
                    success: function(response) {
                        // alert(response);

                        if (response == "1") {
                            $('#flashMessage').html("Billing Data Updated");
                            $("#flashMessage").fadeIn(500);

                            setTimeout(function() {
                                $("#flashMessage").fadeOut("slow");
                            }, 2000);
                        }

                    },
                });

            });

        });
    </script>


</body>



</html>