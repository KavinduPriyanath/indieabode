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
        include 'public/css/portfolio.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="user-detail-container">
        <div class="left-container">
            <div class="user-detail-container-item">
                <img src="/indieabode/public/uploads/portfolio/pic.jpg" id="profile-pic">
            </div>

            <div class="name-role">
                <div class="upper-name-row">
                    <h1 id="user-name"><?= $this->developerDetails['username']; ?> </h1>
                    <?php if ($_GET['profile'] != $_SESSION['username']) { ?>
                        <span class="follow-btn">Follow</span>
                        <input type="hidden" name="followingID" id="followingID" value="<?= $this->developerDetails['gamerID'] ?>">
                    <?php } ?>
                </div>

                <h4 id="user-role"><?= ucwords($this->developerDetails['userRole']) ?></h4>
            </div>
        </div>


        <div class="user-follow-count-container">
            <div class="user-follow-post">
                <!--post counting-->
                <p class="value">
                    <?php if ($this->developerDetails['userRole'] == "game developer" || $this->developerDetails['userRole'] == "game publisher") { ?>
                        <?= count($this->games); ?>
                    <?php } else if ($this->developerDetails['userRole'] == "asset creator") { ?>
                        <?= count($this->assets); ?>
                    <?php } ?>

                </p>
                <p>Posts</p>
            </div>
            <div class="user-follow-follower">
                <!--follower counting-->
                <p class="value" id="followers"><?= $this->additionalDeveloperDetails['followers']; ?></p>
                <p>Followers</p>
            </div>
            <div class="user-follow-following">
                <!--following counting-->
                <p class="value"><?= $this->additionalDeveloperDetails['following']; ?></p>
                <p>Following</p>
            </div>
        </div>
    </div>


    <div class="portfolio-container-2">
        <p><?= $this->additionalDeveloperDetails['introduction']; ?>
        </p>
    </div>

    <hr id="topic-break">

    <?php if ($_SESSION['logged'] && $this->developerDetails['userRole'] == "game developer") { ?>
        <div class="game-developer">


            <div class="container" id="card-container">

                <?php foreach ($this->games as $game) { ?>
                    <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                        <div class="card">
                            <div class="card-image"><img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt=""></div>
                            <div class="game-intro">
                                <h3><?= $game['gameName']; ?></h3>
                            </div>
                            <div class="tagline modernWay">
                                <?= $game['gameTagline']; ?>
                            </div>
                            <div class="game-classification">
                                <?= $game['gameClassification']; ?> Game
                            </div>
                        </div>
                    </a>
                <?php } ?>



            </div>

        </div>
    <?php } else if ($_SESSION['logged'] && $this->developerDetails['userRole'] == "asset creator") { ?>

        <div class="asset-creator">


            <div class="container" id="card-container">

                <?php foreach ($this->assets as $asset) { ?>
                    <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                        <div class="card">
                            <div class="card-image"><img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt=""></div>
                            <div class="game-intro">
                                <h3><?= $asset['assetName']; ?></h3>
                            </div>
                            <div class="tagline modernWay">
                                <?= $asset['assetTagline']; ?>
                            </div>
                            <div class="game-classification">
                                Category: <?= $asset['assetClassification']; ?>
                            </div>
                        </div>
                    </a>
                <?php } ?>



            </div>

        </div>

    <?php } else if ($_SESSION['logged'] && $this->developerDetails['userRole'] == "game publisher") { ?>


        <div class="game-publisher">


            <div class="container" id="card-container">

                <?php foreach ($this->games as $game) { ?>
                    <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                        <div class="card">
                            <div class="card-image"><img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt=""></div>
                            <div class="game-intro">
                                <h3><?= $game['gameName']; ?></h3>
                            </div>
                            <div class="tagline modernWay">
                                <?= $game['gameTagline']; ?>
                            </div>
                            <div class="game-classification">
                                Developer: <?= $game['username']; ?>
                            </div>
                        </div>
                    </a>
                <?php } ?>



            </div>

        </div>

    <?php } ?>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            <?php if (empty($this->isFollowing)) { ?>
                $('.follow-btn').text("Follow");
            <?php } else { ?>
                $('.follow-btn').text("Following");
            <?php } ?>

            $(".follow-btn").click(function(e) {

                let follower = <?= $_SESSION['id'] ?>;
                let following = $('#followingID').val();


                var data = {
                    'follower': follower,
                    'following': following,
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/portfolio/followOthers",
                    data: data,
                    success: function(response) {
                        // alert(response);
                        $('.follow-btn').text("Following");

                        if (response == "Followed") {
                            $('.follow-btn').text("Following");
                        } else if (response == "UnFollowed") {
                            $('.follow-btn').text("Follow");
                        }

                    },
                });

            });

        });
    </script>

</body>



</html>