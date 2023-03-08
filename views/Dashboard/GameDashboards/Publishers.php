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
            <a href="/indieabode/dashboard/devlogs">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?gameid=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/publishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/sales">Crowdfundings</a>
            <a href="/indieabode/dashboard/gamejams">Metadata</a>

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
                <div class="game-card">
                    <div class="left-col">
                        <div class="icon"><img src="/indieabode/public/uploads/games/cover/<?= $this->gig['gigCoverImg'] ?>" alt=""></div>
                        <div class="details">
                            <div class="devlog-name"><?= $this->gig['gigName']; ?></div>
                            <div class="game-name">
                                <?= $this->gig['game']; ?>
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
                    <a href="/indieabode/dashboard/editgig?gameid=<?= $this->game['gameID']; ?>&gigid=<?= $this->gig['gigID']; ?>">
                        <div class="edit-btn">
                            Edit
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>