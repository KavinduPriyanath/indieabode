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



    <div class="publisher-dashboard">
        <div class="top-row">
            <div class="heading">Creator Dashboard</div>
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
                Assets
            </a>
            <a href="/indieabode/dashboard/sales">Sales&nbsp;&&nbsp;Bundles</a>
            <a href="/indieabode/dashboard/analytics">Analytics</a>
            <a href="/indieabode/dashboard/payouts">Payouts</a>

        </div>
        <div class="content-row">

            <h3>Published Assets</h3>
            <?php foreach ($this->assets as $asset) { ?>
                <div class="game-card">
                    <div class="left-col">
                        <div class="icon"><img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt=""></div>
                        <div class="details">
                            <div class="game-name"><?= $asset['assetName'] ?></div>
                            <div class="game-stat-tabs">
                                <a href="/indieabode/dashboard/edit?id=<?= $asset['assetID']; ?>">Edit</a>
                                <a href="/indieabode/dashboard/gameanalytics?id=<?= $asset['assetID']; ?>">Analytics</a>
                                <a href="">Reviews</a>
                            </div>
                        </div>
                    </div>

                    <div class="right-col">
                        <div class="views">
                            <div class="count"><?= $asset['views'] ?></div>
                            <div class="label">views</div>
                        </div>
                        <div class="downloads">
                            <div class="count"><?= $asset['downloads'] ?></div>
                            <div class="label">downloads</div>
                        </div>
                        <div class="ratings">
                            <div class="count"><?= $asset['ratings'] ?></div>
                            <div class="label">ratings</div>
                        </div>
                        <div class="revenue">
                            <div class="count">$<?= $asset['revenue'] ?></div>
                            <div class="label">revenue</div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

</body>

</html>