<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="/indieabode/dashboard/orders">Orders</a>
            <a href="/indieabode/dashboard/requests">Requests</a>
            <a href="/indieabode/dashboard/advertisements">Advertisements</a>
            <a href="/indieabode/dashboard/sales">Sales&nbsp;&&nbsp;Bundles</a>
            <a href="/indieabode/dashboard/analytics">Analytics</a>
            <a href="/indieabode/dashboard/payouts">Payouts</a>
        </div>
        <div class="content-row">

            <div class="devlog-cards all-gigs-cards">
                <h3>Gigs You've Bought</h3>
                <?php foreach ($this->gigs as $gig) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $gig['gigName']; ?></div>
                                <div class="game-name">
                                    <?= $gig['game']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                            <div class="views">
                                <div class="count">$<?= $gig['publisherCost']; ?></div>
                                <div class="label">cost</div>
                            </div>
                            <div class="downloads">
                                <div class="count"><?= $gig['sharePercentage']; ?>%</div>
                                <div class="label">share</div>
                            </div>
                            <div class="ratings">
                                <div class="count">$<?= $gig['publisherIncome']; ?></div>
                                <div class="label">income</div>
                            </div>
                        </div>
                        <a href="/indieabode/dashboard/editgig?gameid=<?= $gig['game'] ?>&gigid=<?= $gig['gigID'] ?>">
                            <div class="edit-btn">
                                Edit
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>