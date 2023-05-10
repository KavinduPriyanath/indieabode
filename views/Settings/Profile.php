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

    <div class="flashMessage" id="flashMessage">Profile Updated</div>

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
                <h2>Profile</h2>
                <div class="labels"><span>Username</span> - Used to show with your products and you activities</div>
                <input type="text" id="username" name="username" value="<?= $this->user['username']; ?>">
                <div class="error-msg" id="username-check"></div>

                <div class="labels"><span>Avatar</span> - Shown along with your username on website</div>
                <div class="avatars">

                    <div class="container">
                        <input type="radio" id="avatar1" name="avatar" class="radio-btn" value="avatar1.png" />
                        <label for="avatar1">
                            <img src="/indieabode/public/images/avatars/avatar1.png" />
                        </label>
                    </div>
                    <div class="container">
                        <input type="radio" id="avatar2" name="avatar" class="radio-btn" value="avatar2.png" />
                        <label for="avatar2">
                            <img src="/indieabode/public/images/avatars/avatar2.png" />
                        </label>
                    </div>
                    <div class="container">
                        <input type="radio" id="avatar3" name="avatar" class="radio-btn" value="avatar3.png" />
                        <label for="avatar3">
                            <img src="/indieabode/public/images/avatars/avatar3.png" />
                        </label>
                    </div>
                    <div class="container">
                        <input type="radio" id="avatar4" name="avatar" class="radio-btn" value="avatar4.png" />
                        <label for="avatar4">
                            <img src="/indieabode/public/images/avatars/avatar4.png" />
                        </label>
                    </div>

                </div>

                <div class="labels"><span>Account Type</span> - How will you use your account</div>
                <select name="" id="" disabled>
                    <option value=""><?= $this->user['userRole']; ?></option>
                </select>

                <div class="labels"><span>Language</span> - Language of Indieabode user interface</div>
                <select name="" id="">
                    <option value="">English</option>
                </select>

                <div class="labels"><span>Content</span> - How content of Indieabode is shown to you</div>
                <div class="key-points">
                    <div class="key-point">
                        <input type="checkbox" name="point1" id="point1"> <label for="point1">Show content marked as adult in search</label>
                    </div>
                    <div class="key-point">
                        <input type="checkbox" name="point2" id="point2"> <label for="point2">Show warnings when redirecting to pages containing blood, gore and sexual content</label>
                    </div>
                    <div class="key-point">
                        <input type="checkbox" name="point3" id="point3"> <label for="point3">Open every link on a new tab</label>
                    </div>
                </div>
                <div id="saveBtn">Save</div>

            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        document.getElementById("<?= substr($this->user['avatar'], 0, 7) ?>").checked = true;
    </script>

    <script>
        $(document).ready(function() {

            $("#username-check").hide();

            $("#username").keyup(function() {
                validateUsername();
                existingUsername();
            });

            function validateUsername() {
                let username = $("#username").val();
                if (username.length < 3 || username.length > 10) {
                    $("#username-check").show();
                    $("#username-check").html("length of username must between 3 and 10");
                    return false;
                } else if (username.length > 3 || username.length < 10) {

                    $("#username-check").hide();
                    return true;



                }
            }

            function existingUsername() {
                let username = $("#username").val();
                var data = {
                    username: username,
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/settings/existingUsernameCheck",
                    data: data,
                    success: function(response) {
                        // alert(response);

                        if (response == 1) {
                            console.log("exists");
                            $("#username-check").show();
                            $("#username-check").html("this username already exists");
                            return false;
                            // return true;
                        } else if (response == 2) {
                            console.log("existsdddd");
                            return true;
                        }

                    },
                });
            }

            $("#saveBtn").click(function(e) {

                let username = $("#username").val();
                let avatar = $('input[name="avatar"]:checked').val();
                var data = {
                    username: username,
                    avatar: avatar,
                    save: true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/settings/updateProfileInfo",
                    data: data,
                    success: function(response) {
                        // alert("Changes Saved");

                        $("#flashMessage").fadeIn(500);

                        setTimeout(function() {
                            $("#flashMessage").fadeOut("slow");
                        }, 2000);

                    },
                });

            });

        });
    </script>


</body>



</html>