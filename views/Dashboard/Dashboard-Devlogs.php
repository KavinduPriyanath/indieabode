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
            <a href="/indieabode/dashboard/gigs">Gigs</a>
            <a href="/indieabode/dashboard/devlogs">Devlogs</a>
            <a href="/indieabode/dashboard/gamejams">Gamejams</a>
            <a href="/indieabode/dashboard/crowdfundings">Crowdfundings</a>
            <a href="/indieabode/dashboard/sales">Sales&nbsp;&&nbsp;Bundles</a>
            <a href="/indieabode/dashboard/analytics">Analytics</a>
            <a href="/indieabode/dashboard/payouts">Payouts</a>
        </div>
        <div class="content-row">

            <a href="/indieabode/makedevlog" id="devlog-btn">
                <div class="add-btn">
                    <div class="add-logo">
                        <img src="/indieabode/public/images/dashboard/add-devlog.png" alt="">
                    </div>
                    <div class="text">Write a new post</div>
                </div>
            </a>

            <h3 id="sub-topic">Previous Devlogs</h3>

            <div class="devlog-cards">
                <?php foreach ($this->devlogs as $devlog) { ?>
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/devlogs/<?= $devlog['devlogImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $devlog['name']; ?></div>
                                <div class="game-name">
                                    <?= $devlog['gameName']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                            <div class="views">
                                <div class="count"><?= $devlog['viewCount'] ?></div>
                                <div class="label">views</div>
                            </div>
                            <div class="downloads">
                                <div class="count"><?= $devlog['likeCount'] ?></div>
                                <div class="label">likes</div>
                            </div>
                            <div class="ratings">
                                <div class="count"><?= $devlog['commentCount'] ?></div>
                                <div class="label">comments</div>
                            </div>
                        </div>
                        <a href="/indieabode/dashboard/editdevlog?gameid=<?= $devlog['gameName']; ?>&postid=<?= $devlog['devLogID'] ?>">
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