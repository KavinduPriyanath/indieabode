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
        include 'public/css/games.css';
        include 'public/css/assets.css';
        include 'public/css/devlogs.css';
        include 'public/css/devhome.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <?php if (isset($_SESSION['status'])) { ?>

        <div class="flashMessage" id="flashMessage"><?= $_SESSION['status']; ?></div>
        <?php unset($_SESSION['status']); ?>
    <?php } ?>


    <!-- Games -->
    <div class="topic-bar first-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Games</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->games as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <?php if ($game['gamePrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($game['gamePrice'] != "0") { ?>
                            <p>$<?= $game['gamePrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Assets -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Assets</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/assets">
                    View all
                </a>
            </div>
        </div>
    </div>

    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->assets as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>


    <!-- Devlogs -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Devlogs</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/devlogs">
                    View all
                </a>
            </div>
        </div>
    </div>

    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->devlogs as $devlog) { ?>
            <a href="/indieabode/devlog?id=<?= $devlog['devLogID'] ?>">
                <div class="card">
                    <div class="card-image game">
                        <img src="/indieabode/public/uploads/devlogs/<?= $devlog['devlogImg'] ?>" alt="">

                        <div class="dev-log-type">
                            <h4><?= $devlog['Type'] ?></h4>
                        </div>
                    </div>
                    <div class="post-title">
                        <div class="title">
                            <p><?= $devlog['gameName'] ?></p>
                        </div>
                        <div class="images">
                            <div class="like-image">
                                <div class="like-logo"><img src="/indieabode/public/images/devlogs/like.png" alt="" /></div>
                                <div class="like-count"><?= $devlog['likeCount'] ?></div>
                            </div>
                            <div class="comment-image">
                                <div class="cmt-logo"><img src="/indieabode/public/images/devlogs/comment.png" alt="" /></div>
                                <div class="cmt-count"><?= $devlog['commentCount'] ?></div>

                            </div>
                        </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $devlog['name'] ?></h3>
                    </div>

                    <div class="tagline modernWay">
                        <?= $devlog['Tagline'] ?>
                    </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Jams -->


    <!-- Gigs -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Gigs</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/gigs">
                    View all
                </a>
            </div>
        </div>
    </div>

    <hr class="topic-break" />

    <div class="container" id="card-container">
        <?php foreach ($this->gigs as $gig) { ?>
            <a href="/indieabode/gig?id=<?= $gig['gigID'] ?>">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="gig-card-image">
                        <img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt="" />
                    </div>
                    <div class="gig-info">
                        <div class="left">
                            <div class="pp-icon"><img src="/indieabode/public/images/cards/profile.png" alt="" /></div>
                            <div class="pp-details">
                                <h3>Prend</h3>
                                <p>Trust Rank: 2</p>
                            </div>
                        </div>
                        <div class="right">
                            <div class="stars">
                                <div class="star-logo"><img src="/indieabode/public/images/cards/star.png" alt="" /></div>
                                <div class="rating">4.9</div>
                            </div>
                            <div class="rating-count">(7)</div>
                        </div>
                    </div>
                    <div class="tagline modernWay"> <?= $gig['gigTagline'] ?> </div>
                </div>
            </a>
        <?php } ?>
    </div>



    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(function() {

            $("#flashMessage").fadeIn(1000);

            setTimeout(function() {
                $("#flashMessage").fadeOut("slow");
            }, 4000);
        });
    </script>
</body>



</html>