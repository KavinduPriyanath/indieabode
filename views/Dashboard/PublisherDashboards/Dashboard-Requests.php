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
                <h3>Ongoing Requests</h3>
                <?php foreach ($this->ongoingrequests as $ongoingrequest) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/gigs/cover/<?= $ongoingrequest['gigCoverImg'] ?>" alt=""></div>
                            <div class="details">

                                <div class="devlog-name"><?= $ongoingrequest['gigName']; ?></div>

                                <div class="game-name">
                                    <?php if ($ongoingrequest['gigStatus'] == 0) {
                                        echo "Pending";
                                    } else {
                                        echo "Sold Out";
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                            <div class="gig-eligibility"><?php if ($ongoingrequest['eligible'] == 0) echo "Not Eligible Yet";
                                                            else echo "Eligible"; ?></div>
                        </div>
                        <div class="edit-btn">
                            <a href="/indieabode/gig/viewgig?id=<?= $ongoingrequest['gigID'] ?>&token=<?= $ongoingrequest['gigToken'] ?>">
                                View
                            </a>
                        </div>
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