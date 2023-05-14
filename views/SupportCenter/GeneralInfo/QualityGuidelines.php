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
            General
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <a href="/indieabode/support_center/general?page=about">
                        <div class="sub-topics">About Indieabode</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=gettingstarted">
                        <div class="sub-topics">Getting Started</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=FAQ">
                        <div class="sub-topics">FAQ</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=followers">
                        <div class="sub-topics">Followers</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=community-rules">
                        <div class="sub-topics">Community Rules</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=quality-guidelines">
                        <div class="sub-topics">Quality Guidelines</div>
                    </a>
                    <a href="/indieabode/support_center/general?page=support-contact">
                        <div class="sub-topics">Support & Contact</div>
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