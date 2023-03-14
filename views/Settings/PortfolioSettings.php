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
                    <a href="">
                        <div class="sub-topics">Billing Address</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Payout Mode</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Tax Information</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Revenue Sharing</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Support Email</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Contact</div>
                    <div class="sub-topics">Email Notifications</div>
                    <div class="sub-topics">Website Support</div>
                </div>
                <div class="topics">Misc</div>
            </div>
            <div class="content-body">
                <h2>Portfolio</h2>
                <form action="" method="post">
                    <div class="labels"><span>Display Name</span> - Used to show on your portfolio page, leave blank to default to username</div>
                    <input type="text">

                    <div class="labels"><span>Display Image</span> - Shown next to your name on portfolio page (square dimensions)</div>
                    <div class="display-image">
                        <div class="image-box"></div>
                        <div class="image-buttons"></div>
                    </div>

                    <div class="labels"><span>Website</span> - Optional URL to be shown on your portfolio page</div>
                    <input type="text">

                    <div class="labels"><span>Twitter</span> - Twitter account to show on your portfolio</div>
                    <input type="text">

                    <div class="labels"><span>LinkedIn</span> - LinkedIn account to show on your portfolio</div>
                    <input type="text">

                    <div class="labels"><span>Location</span> - The country you currently reside in</div>
                    <input type="text">

                    <div class="labels"><span>Telephone Number</span> - Your phone number</div>
                    <input type="text">

                    <div class="labels"><span>Showcase</span> - What you need to highlight?</div>

                    <div class="labels"><span>Introduction</span> - The content for your portfolio page</div>
                    <textarea name="" id="" cols="30" rows="10"></textarea>

                    <div class="labels"><span>Content</span> - What should be shown to your portfolio viewers?</div>
                    <div class="key-points">
                        <div class="key-point">
                            <input type="checkbox" name="point1" id="point1"> <label for="point1">Show only the items listed in my Showcase</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point2" id="point2"> <label for="point2">Display my location, and phone number</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point3" id="point3"> <label for="point3">Allow ads to display on my page</label>
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