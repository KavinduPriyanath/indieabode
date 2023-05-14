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
        include 'public/css/editGameForm.css';
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

            <a href="/indieabode/makedevlog?game=<?= $this->game['gameID']; ?>" id="devlog-btn">
                <div class="add-btn">
                    <div class="add-logo">
                        <img src="/indieabode/public/images/dashboard/add-devlog.png" alt="">
                    </div>
                    <div class="text">Write a new post</div>
                </div>
            </a>

            <h3 id="sub-topic">Previous Devlogs</h3>

            <?php if (!empty($this->devlogs)) { ?>
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
                            <a href="/indieabode/dashboard/editdevlog?gameid=<?= $this->game['gameID']; ?>&postid=<?= $devlog['devLogID']; ?>">
                                <div class="edit-btn">
                                    Edit
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="zero-icon"><img src="<?php echo BASE_URL; ?>public/images/empty/empty-folder.png" alt=""></div>
                <div class="empty-msg">- This game has not published any devlogs -</div>

            <?php } ?>


        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>