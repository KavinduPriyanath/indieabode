<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
</head>

<style>
    <?php
    include 'public/css/games.css';
    ?>
</style>

<body>

    <?php
    include 'includes/navbar.php';
    ?>






    <!-- Filters-->

    <div class="side-nav" id="side-menu">
        <p>Platform</p>

        <div class="type-filter">
            <div class="elements">
                <input type="checkbox" name="" id="Windows" class="checkbox" />
                <label for="Windows">Windows</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Mac" class="checkbox" />
                <label for="Mac">Mac</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Linux" class="checkbox" />
                <label for="Linux">Linux</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Android" class="checkbox" />
                <label for="Android">Android</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Web" class="checkbox" />
                <label for="Webx">Web</label>
            </div>
        </div>

        <p>Price</p>

        <div class="type-filter">
            <div class="elements">
                <input type="radio" name="" id="Released" class="checkbox" />
                <label for="Released">Free</label>
            </div>

            <div class="elements">
                <input type="radio" name="" id="Early" class="checkbox" />
                <label for="Early">5 or less</label>
            </div>

            <div class="elements">
                <input type="radio" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">10 or less</label>
            </div>
        </div>

        <p>Release Status</p>

        <div class="type-filter">
            <div class="elements">
                <input type="checkbox" name="" id="Released" class="checkbox" />
                <label for="Released">Released</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Early" class="checkbox" />
                <label for="Early">Early Access</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Upcoming</label>
            </div>
        </div>

        <p>Features</p>

        <div class="type-filter">
            <div class="elements">
                <input type="checkbox" name="" id="Released" class="checkbox" />
                <label for="Released">Single Player</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Early" class="checkbox" />
                <label for="Early">Multi-Player</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Co-op</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Puzzle</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Achievements</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Leaderboard</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Prologues</label>
            </div>
        </div>
    </div>
    <div class="upper-break">
        <div class="trigger" onclick="openSideMenu()">
            <i class="fa fa-angle-double-right" id="filter-off"></i>
            <i class="fa fa-angle-double-left" id="filter-on"></i> filters
        </div>
        <div class="sort" id="sort">
            <img src="../images/games/sort.png" alt="" /> sort by: <span>Release Date</span>
        </div>
    </div>

    <hr id="topic-break" />

    <!--Cards-->

    <div class="container" id="card-container">

        <?php foreach ($this->games as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>


    </div>

    <!--Pagination-->

    <div class="pagination">
        <a href="#"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#"><i class="fa fa-angle-right"></i></a>
    </div>


    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>

</html>