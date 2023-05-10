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
                <h2>Reset Password</h2>
                <div class="header">Updating your password will cause all other browser sessions to be logged out.</div>
                <div class="update-password-form">
                    <div class="labels"><span>Current Password</span></div>
                    <input type="text" placeholder="Required" id="oldPassword">

                    <div class="error-msg" id="old-password-check"></div>

                    <div class="labels"><span>New Password</span></div>
                    <input type="text" placeholder="Required" id="newPassword">

                    <div class="error-msg" id="password-check"></div>

                    <div class="labels"><span>Repeat New Password</span></div>
                    <input type="text" placeholder="Required" id="confirmNewPassword">

                    <div class="error-msg" id="confirm-password-check"></div>



                    <button type="submit" class="save" id="updatePassword">Update</button>
                </div>

            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        $(document).ready(function() {

            $("#password-check").hide();
            $("#confirm-password-check").hide();
            $("#old-password-check").hide();

            $("#newPassword").keyup(function() {
                validatePassword();
            });

            $("#confirmNewPassword").keyup(function() {
                validateConfirmPassword();
            });



            function validatePassword() {
                let password = $("#newPassword").val();
                let strongPassword = false;

                let uppercase = /[A-Z]/.test(password);
                let lowercase = /[a-z]/.test(password);
                let number = /[0-9]/.test(password);
                let specialChars = /[^\w]/.test(password);

                if (password.length == 0) {
                    $("#password-check").show();
                    $("#password-check").css("background-color", "rgb(225, 132, 132)");
                    $("#password-check").html("Password cannot be empty");
                    return false;
                } else if (
                    !uppercase ||
                    !lowercase ||
                    !number ||
                    !specialChars ||
                    (password.length < 8 && password.length > 0)
                ) {
                    $("#password-check").show();
                    $("#password-check").css("background-color", "rgb(225, 132, 132)");
                    $("#password-check").html("Password is not strong enough");
                    return true;
                } else {
                    $("#password-check").show();
                    $("#password-check").css("background-color", "rgb(132, 225, 180)");
                    $("#password-check").html("Password is strong");
                    return true;
                }
            }


            function validateConfirmPassword() {
                let confirmPassword = $("#confirmNewPassword").val();
                let password = $("#newPassword").val();

                if (password == confirmPassword) {
                    $("#confirm-password-check").show();
                    $("#confirm-password-check").css("background-color", "rgb(132, 225, 180)");
                    $("#confirm-password-check").html("Passwords match");
                    return true;
                } else {
                    $("#confirm-password-check").show();
                    $("#confirm-password-check").css("background-color", "rgb(225, 132, 132)");
                    $("#confirm-password-check").html("Passwords do not match");
                    return false;
                }
            }


            $("#updatePassword").click(function(e) {

                let oldPassword = $('#oldPassword').val();
                let newPassword = $('#newPassword').val();
                let userID = <?= $_SESSION['id'] ?>;

                let passwordMatch = false;

                if (validatePassword() && validateConfirmPassword()) {
                    passwordMatch = true;
                }

                var data = {
                    'userID': userID,
                    'oldPassword': oldPassword,
                    'newPassword': newPassword,
                    'password_update': passwordMatch
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/settings/updatePassword",
                    data: data,
                    success: function(response) {
                        // alert(response);

                        if (response == "1") {

                            $("#password-check").hide();
                            $("#confirm-password-check").hide();
                            $("#old-password-check").hide();

                            $('#oldPassword').val("");
                            $('#newPassword').val("");
                            $('#confirmNewPassword').val("");


                            $('#flashMessage').html("Password Updated");
                            $("#flashMessage").fadeIn(500);

                            setTimeout(function() {
                                $("#flashMessage").fadeOut("slow");
                            }, 2000);

                        } else if (response == "2") {
                            $("#old-password-check").show();
                            $("#old-password-check").html("Wrong Password");
                        }
                    },
                });

            });

        });
    </script>


</body>



</html>