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
        include 'public/css/editDevlogForm.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Developer Dashboard - <?= $this->game['gameName'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->game['gameID']; ?>">Edit Game</a>
            <a href="/indieabode/dashboard/gameanalytics?id=<?= $this->game['gameID']; ?>">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?id=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/publishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/gamecrowdfunds?id=<?= $this->game['gameID']; ?>">Crowdfundings</a>
            <a href="/indieabode/dashboard/metadata?id=<?= $this->game['gameID']; ?>">Metadata</a>
            <?php if ($this->game['gamePrice'] != "0") { ?>
                <a href="/indieabode/dashboard/gamegiveaways?id=<?= $this->game['gameID']; ?>">Giveaways</a>
            <?php } ?>

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

            <h3>Launched Crowdfunding</h3>

            <?php if (!empty($this->crowdfund)) { ?>
                <div class="devlog-cards">
                    <div class="game-card">
                        <div class="left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/crowdfundings/cover/<?= $this->crowdfund['crowdfundCoverImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $this->crowdfund['title']; ?></div>
                                <div class="game-name">
                                    <?= $this->crowdfund['gameName']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col">
                            <div class="views">
                                <div class="count"><?= $this->crowdfund['viewCount']; ?></div>
                                <div class="label">views</div>
                            </div>
                            <div class="downloads">
                                <div class="count"><?= $this->crowdfund['backers']; ?></div>
                                <div class="label">backers</div>
                            </div>
                            <div class="ratings">
                                <div class="count"><?= $this->crowdfund['currentAmount']; ?></div>
                                <div class="label">revenue</div>
                            </div>
                        </div>
                        <a href="/indieabode/dashboard/editCrowdfund?gameid=<?= $this->game['gameID']; ?>&crowdfundid=<?= $this->crowdfund['crowdFundID']; ?>">
                            <div class="edit-btn">
                                Edit
                            </div>
                        </a>
                    </div>
                </div>
            <?php } else { ?>

                <div class="empty-msg">- This game has no ongoing crowdfunding -</div>

            <?php } ?>

        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>