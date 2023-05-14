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
        include 'public/css/supportpages.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="settings-content">
        <div class="top-row">
            Legal Policies
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <a href="/indieabode/legal/privacy_policy">
                        <div class="sub-topics">Privacy Policy</div>
                    </a>
                    <a href="/indieabode/legal/terms_of_service">
                        <div class="sub-topics">Terms of Service</div>
                    </a>
                    <a href="/indieabode/legal/cookie_policy">
                        <div class="sub-topics">Cookies Policy</div>
                    </a>
                </div>


            </div>
            <div class="content-body">

                <div class="empty-box">
                    <div class="empty-icon"><img src="<?php echo BASE_URL; ?>public/images/empty/progress.png" alt=""></div>
                    <div class="empty-text">This Page will be Published Soon</div>
                    <div class="empty-link"><a href="<?php echo BASE_URL; ?>/home">Return to Home</a></div>
                </div>


            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>