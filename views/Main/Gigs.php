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
        <form action="" method="GET">
            <p>Genre</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="checkbox" name="genre[]" id="action" class="checkbox" value="Action" />
                    <label for="action">Action</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="adventure" class="checkbox" value="Adventure" />
                    <label for="adventure">Adventure</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="rpg" class="checkbox" value="RPG" />
                    <label for="rpg">RPG</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="racing" class="checkbox" value="Racing" />
                    <label for="racing">Racing</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="simulation" class="checkbox" value="Simulation" />
                    <label for="simulation">Simulation</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="strategy" class="checkbox" value="Strategy" />
                    <label for="strategy">Strategy</label>
                </div>
            </div>

            <p>Current Stage</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="stage" id="1month" class="checkbox" value="1" />
                    <label for="1month">1 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="2month" class="checkbox" value="2" />
                    <label for="2month">2 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="3month" class="checkbox" value="3" />
                    <label for="3month">3 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="4month" class="checkbox" value="4" />
                    <label for="4month">4 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="5month" class="checkbox" value="5" />
                    <label for="5month">5 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="6month" class="checkbox" value="6" />
                    <label for="6month">6 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="12month" class="checkbox" value="12" />
                    <label for="12month">12 Month</label>
                </div>
            </div>

            <p>Expected Cost</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="cost" id="below500" class="checkbox" value="500-" />
                    <label for="below500">Below $500</label>
                </div>

                <div class="elements">
                    <input type="radio" name="cost" id="above500" class="checkbox" value="500+" />
                    <label for="above500">Above $500</label>
                </div>

                <div class="elements">
                    <input type="radio" name="cost" id="above1000" class="checkbox" value="1000+" />
                    <label for="above1000">Above $1000</label>
                </div>
            </div>

            <p>Estimated Share</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="share" id="below10" class="checkbox" value="10-" />
                    <label for="below10">0%-10%</label>
                </div>

                <div class="elements">
                    <input type="radio" name="share" id="10to50" class="checkbox" value="50-" />
                    <label for="10to50">10%-50%</label>
                </div>


                <div class="elements">
                    <input type="radio" name="share" id="above50" class="checkbox" value="50+" />
                    <label for="above50">>50%</label>
                </div>


            </div>
            <button type="submit" id="filter-button">Apply</button>
        </form>
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
            <a href="/indieabode/gig?id=<?= $gig['gigID'] ?>">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt="" />
                    </div>
                    <div class="gig-info">
                        <div class="left">
                            <div class="pp-icon"><img src="/indieabode/public/images/avatars/<?= $gig['avatar'] ?>" alt="" /></div>
                            <div class="pp-details">
                                <h3> <?= $gig['firstName'] . " " . $gig['lastName'] ?> </h3>
                                <p>Trust Rank: <?= $gig['trustrank'] ?></p>
                            </div>
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

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>