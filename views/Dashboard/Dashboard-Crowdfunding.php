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
        include 'public/css/dashboard.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Developer Dashboard</div>
            <div class="dev-main-stat">
                <div id="views">
                    <div class="count">0</div>
                    <div class="label">views</div>
                </div>
                <div id="downloads">
                    <div class="count">0</div>
                    <div class="label">downloads</div>
                </div>
                <div id="revenue">
                    <div class="count">0</div>
                    <div class="label">revenue</div>
                </div>
            </div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/">
                Games
            </a>
            <a href="/indieabode/dashboard/gigs">Gigs</a>
            <a href="/indieabode/dashboard/devlogs">Devlogs</a>
            <a href="/indieabode/dashboard/gamejams">Gamejams</a>
            <a href="/indieabode/dashboard/crowdfundings">Crowdfundings</a>
            <a href="/indieabode/dashboard/sales">Sales&nbsp;&&nbsp;Bundles</a>
            <a href="/indieabode/dashboard/analytics">Analytics</a>
            <a href="/indieabode/dashboard/payouts">Payouts</a>
        </div>
        <div class="content-row">

            <a href="/indieabode/launchcrowdfunding" id="gig-btn">
                <div class="add-btn" id="crowdfundingbtn">
                    <div class="add-logo">
                        <img src="/indieabode/public/images/dashboard/add-devlog.png" alt="">
                    </div>
                    <div class="text">Launch a Crowdfunding</div>
                </div>
            </a>

            <div class="gig-tabs">
                <div class="topic" id="ongoing">Ongoing</div>

                <div class="topic" id="expired">Expired</div>

                <div class="topic" id="cancelled">Cancelled</div>
            </div>

            <hr id="tabs-break">

            <h3>Launched Crowdfundings</h3>

            <div class="all-crowdfund-cards">
                <?php foreach ($this->crowdfundings as $crowdfunding) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/crowdfundings/cover/<?= $crowdfunding['crowdfundCoverImg']; ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $crowdfunding['title']; ?></div>
                                <div class="game-name">
                                    <?= $crowdfunding['gameName']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                            <div class="views">
                                <div class="count"><?= $crowdfunding['viewCount']; ?></div>
                                <div class="label">views</div>
                            </div>
                            <div class="downloads">
                                <div class="count"><?= $crowdfunding['backers']; ?></div>
                                <div class="label">backers</div>
                            </div>
                            <div class="ratings">
                                <div class="count"><?= $crowdfunding['currentAmount']; ?></div>
                                <div class="label">revenue</div>
                            </div>
                        </div>
                        <div class="edit-btn">
                            Edit
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="expired-crowdfund-cards"></div>

            <div class="cancelled-crowdfund-cards"></div>


        </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            $('#ongoing').click(function() {

                $('.all-crowdfund-cards').show();
                $('.expired-crowdfund-cards').hide();
                $('.cancelled-crowdfund-cards').hide();
            });

            $('#expired').click(function() {

                $('.all-crowdfund-cards').hide();
                $('.expired-crowdfund-cards').show();
                $('.cancelled-crowdfund-cards').hide();
            });

            $('#cancelled').click(function() {

                $('.all-crowdfund-cards').hide();
                $('.expired-crowdfund-cards').hide();
                $('.cancelled-crowdfund-cards').show();
            });

        });
    </script>


</body>



</html>