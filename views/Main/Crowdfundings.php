<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/crowdfunding.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="page-topic">
        <h1>-Crowdfundings-</h1>
    </div>


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
                <input type="checkbox" name="released" id="Released" class="checkbox" />
                <label for="Released">Released</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="early" id="Early" class="checkbox" />
                <label for="Early">Early Access</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="upcoming" id="Upcoming" class="checkbox" />
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
            <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span>Release Date</span>

        </div>
    </div>

    <hr id="topic-break" />

    <!--Cards-->

    <div class="container" id="card-container">


        <?php foreach ($this->crowdfundings as $crowdfunding) { ?>
            <a href="/indieabode/crowdfund?id=<?= $crowdfunding['crowdFundID']; ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/crowdfundings/cover/<?= $crowdfunding['crowdfundCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $crowdfunding['gameName']; ?></h3>
                    </div>
                    <div class="fund-amount">
                        <p><?= $crowdfunding['fundingPercentage'] ?>% Funded</p>
                    </div>

                    <div class="last-row">
                        <?php if (substr($crowdfunding['daysLeft'], 0, 1) == "+" && substr($crowdfunding['daysLeft'], 1, 1) != "0") { ?>
                            <div class="deadline">Ends in <?= substr($crowdfunding['daysLeft'], 1) ?> days</div>
                        <?php } else { ?>
                            <div class="deadline">Ended</div>
                        <?php } ?>
                        <div class="dev">
                            By <?= $crowdfunding['username']; ?>
                        </div>

                    </div>

                </div>
            </a>
        <?php } ?>



    </div>

    <!--Pagination-->

    <div class="pagination" id="pagination-crowdfunds">
        <a href="/indieabode/crowdfundings?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->crowdfundsPagesCount; $i++) : ?>
            <a href="/indieabode/crowdfundings?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>

        <a href="/indieabode/crowdfundings?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>