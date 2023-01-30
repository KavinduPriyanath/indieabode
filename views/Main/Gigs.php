<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gigs.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="page-topic">
        <h1>-Gigs-</h1>
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
            <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span>Release Date</span>
        </div>
    </div>

    <hr id="topic-break" />

    <!--Cards-->

    <div class="container" id="card-container">
        <?php foreach ($this->gigs as $gig) { ?>
            <a href="">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="card-image">
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
                    <div class="tagline"> <?= $gig['gigTagline'] ?> </div>
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