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
                <div id="views">views</div>
                <div id="downloads">downloads</div>
                <div id="revenue">revenue</div>
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

            <?php foreach ($this->games as $game) { ?>
                <div class="game-card">
                    <div class="left-col">
                        <div class="icon"><img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt=""></div>
                        <div class="details">
                            <div class="game-name"><?= $game['gameName'] ?></div>
                            <div class="game-stat-tabs">
                                <a href="">Edit</a>
                                <a href="">Analytics</a>
                                <a href="">Devlogs</a>
                                <a href="">Publishers</a>
                                <a href="">Metadata</a>
                            </div>
                        </div>
                    </div>

                    <div class="right-col">
                        <div class="views">
                            <div class="count">10</div>
                            <div class="label">views</div>
                        </div>
                        <div class="downloads">
                            <div class="count">2</div>
                            <div class="label">downloads</div>
                        </div>
                        <div class="ratings">
                            <div class="count">8</div>
                            <div class="label">ratings</div>
                        </div>
                        <div class="revenue">
                            <div class="count">$0</div>
                            <div class="label">revenue</div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>