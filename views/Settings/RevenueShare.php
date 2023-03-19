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
                    <a href="/indieabode/settings/emailNotifications">
                        <div class="topics">Contact</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Email Notifications</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Website Support</div>
                    </a>
                </div>
                <div class="topics">Misc</div>
            </div>
            <div class="content-body">
                <h2>Revenue Sharing</h2>
                <div class="header">Indieabode is a marketplace for creators of all kind. It's our goal to support creators by giving them the tools to sell and market their work. As a way of saying thanks to those using Indieabode, we utilize an open revenue sharing model.</div><br>
                <div class="header">You can decide what percentage of your sales will go towards Indieabode. All money collected is used directly for running servers, paying for bandwidth, and supporting the development of new functionality. You can read more about Indieabode's mission on our</div><br>
                <form action="" method="post">

                    <div class="slidecontainer">
                        <div class="header">What percentage do you want to give to support Indieabode?</div>
                        <div class="revenue-share">
                            <div class="revenue-slider">
                                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                <div class="preset">Choose a preset: <span id="default" onclick="defaultShare()">Indieabode default(10%)</span>&nbsp;&nbsp;&nbsp;<span id="industry" onclick="industryStandard()">Industry standard(30%)</span></div>
                            </div>
                            <div class="revenue-percentage">
                                <p><span id="percent"></span> of each transaction</p>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="save">Save Revenue Split</button>
                </form>
            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("percent");
        output.innerHTML = slider.value + "%";

        slider.oninput = function() {
            output.innerHTML = this.value + "%";
        }

        function defaultShare() {
            var defaultPercentange = 10;
            output.innerHTML = defaultPercentange + "%";
            slider.value = defaultPercentange
        }

        function industryStandard() {
            var defaultPercentange = 30;
            output.innerHTML = defaultPercentange + "%";
            slider.value = defaultPercentange
        }
    </script>


</body>



</html>