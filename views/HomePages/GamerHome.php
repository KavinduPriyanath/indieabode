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
        include 'public/css/gamerhome.css';
        include 'public/css/games.css';
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

    <br>

    <!-- Top Sellers -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Top Sellers</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr id="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->topSellerGames as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>


    <!-- New Releases -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">New Releases</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr id="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->latestGames as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>


    <!-- Most Popular -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Most Popular</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr id="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->mostPopular as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>


    <!-- Top Rated -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Top Rated</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr id="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->topRated as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>


    <!-- Upcoming -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Coming Soon</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr id="topic-break" />


    <div class="container" id="card-container">

        <?php foreach ($this->comingSoon as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
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