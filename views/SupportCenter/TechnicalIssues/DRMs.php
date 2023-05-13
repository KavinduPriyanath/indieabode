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
            Game Technical Issues
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <a href="/indieabode/support_center/game_issues">
                        <div class="sub-topics">Overview</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=DRMs">
                        <div class="sub-topics">DRMs</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=IARCs">
                        <div class="sub-topics">IARCs</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=CreatorCodes">
                        <div class="sub-topics">Support a Creator</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=Giveaways">
                        <div class="sub-topics">Giveaways</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=PWYW">
                        <div class="sub-topics">PWYW Concept</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=Storages">
                        <div class="sub-topics">Storages</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=LimitedReleases">
                        <div class="sub-topics">Limited Releases</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=Reviews">
                        <div class="sub-topics">Reviews</div>
                    </a>
                    <a href="/indieabode/support_center/game_issues?topic=SearchTags">
                        <div class="sub-topics">Search Tags</div>
                    </a>
                </div>


            </div>
            <div class="content-body">

                <h2>Digital Rights Management</h2>

                <p>Indieabode is totally DRM free platform. All the assets, games and any other product it contains has no DRMs attached.</p>
                <br>

                <h3>Why DRM free?</h3>
                <p>Mostly DRM only favours the developers while consumers, in our case gamers hate them. They limit the fun and add restrictions to the product. Also having DRM embedded in indie games can vastly affect the sales of those games.
                    As Indiebaode is platform consisted mostly of indie games we have decided to go with no DRM policy.
                </p>

            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>