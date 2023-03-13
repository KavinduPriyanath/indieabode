<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <!-- <img src="" id="profile-pic"> -->
            </div>

            <div class="name-role">
                <h1 id="user-name"><?= $this->developerDetails['username']; ?></h1>
                <h4 id="user-role"><?= $this->developerDetails['userRole']; ?></h4>
            </div>
        </div>


        <div class="user-follow-count-container">
            <div class="user-follow-post">
                <!--post counting-->
                <p class="value"><?= count($this->games); ?></p>
                <p>Posts</p>
            </div>
            <div class="user-follow-follower">
                <!--follower counting-->
                <p class="value">134</p>
                <p>Followers</p>
            </div>
            <div class="user-follow-following">
                <!--following counting-->
                <p class="value">13</p>
                <p>Following</p>
            </div>
        </div>
    </div>


    <div class="portfolio-container-2">
        <p><?= $this->additionalDeveloperDetails['tagline']; ?>
        </p>
    </div>

    <hr id="topic-break">

    <div class="container" id="card-container">

        <?php foreach ($this->games as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"><img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt=""></div>
                    <div class="game-intro">
                        <h3><?= $game['gameName']; ?></h3>
                    </div>
                    <div class="tagline">
                        <?= $game['gameTagline']; ?>
                    </div>
                    <div class="game-classification">
                        <?= $game['gameClassification']; ?> Game
                    </div>
                </div>
            </a>
        <?php } ?>



    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>