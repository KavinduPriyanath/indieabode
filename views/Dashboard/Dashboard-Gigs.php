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

            <a href="/indieabode/creategig" id="gig-btn">
                <div class="add-btn">
                    <div class="add-logo">
                        <img src="/indieabode/public/images/dashboard/add-devlog.png" alt="">
                    </div>
                    <div class="text">Create new Gig</div>
                </div>
            </a>

            <h3>Published Gigs</h3>

            <div class="devlog-cards">
                <?php foreach ($this->gigs as $gig) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/games/cover/<?= $devlog['devlogImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $gig['gigName']; ?></div>
                                <div class="game-name">
                                    <?= $gig['game']; ?>
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
                                <div class="label">likes</div>
                            </div>
                            <div class="ratings">
                                <div class="count">8</div>
                                <div class="label">comments</div>
                            </div>
                        </div>
                        <div class="edit-btn">
                            Edit
                        </div>
                    </div>
                <?php } ?>
            </div>

            <h3>Ongoing Requests</h3>

            <div class="ongoing-requests-cards">
                <?php foreach ($this->ongoingrequests as $ongoingrequest) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/gigs/cover/<?= $ongoingrequest['gigCoverImg'] ?>" alt=""></div>
                            <div class="details">
                                <a href="/indieabode/gig/viewgig?id=<?= $ongoingrequest['gigID'] ?>&token=<?= $ongoingrequest['gigToken'] ?>">
                                    <div class="devlog-name"><?= $ongoingrequest['gigName']; ?></div>
                                </a>
                                <div class="game-name">
                                    <?= $ongoingrequest['game']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                        </div>
                        <div class="edit-btn">
                            Edit
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