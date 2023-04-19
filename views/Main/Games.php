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



    <div class="page-topic">
        <h1>-<?= $this->title ?>-</h1>
    </div>

    <!-- Filters-->

    <div class="side-nav" id="side-menu">
        <form action="" method="GET">
            <p>Platform</p>

            <div class="type-filter">

                <?php foreach ($this->platformFilters as $platformFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="platforms[]" id="Windows" class="checkbox" value="<?= $platformFilter['filter']; ?>" <?php if (in_array($platformFilter['filter'], $this->platformsChecked)) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> />
                        <label for="Windows"><?= $platformFilter['filter']; ?></label>
                    </div>
                <?php } ?>

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

                <?php foreach ($this->releaseFilters as $releaseFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="releasestatus[]" id="Released" class="checkbox" value="<?= $releaseFilter['filter']; ?>" <?php if (in_array($releaseFilter['filter'], $this->releaseStatusChecked)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> />
                        <label for="Released"><?= $releaseFilter['filter']; ?></label>
                    </div>
                <?php } ?>

            </div>

            <p>Type</p>

            <div class="type-filter">

                <?php foreach ($this->typeFilters as $typeFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="gametypes[]" id="Released" class="checkbox" value="<?= $typeFilter['filter']; ?>" <?php if (in_array($typeFilter['filter'], $this->typesChecked)) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?> />
                        <label for="Released"><?= $typeFilter['filter']; ?></label>
                    </div>
                <?php } ?>



            </div>



            <p>Features</p>

            <div class="type-filter">

                <?php foreach ($this->featureFilters as $featureFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="features[]" id="Released" class="checkbox" value="<?= $featureFilter['filter']; ?>" <?php if (in_array($featureFilter['filter'], $this->featuresChecked)) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> />
                        <label for="Released"><?= $featureFilter['filter']; ?></label>
                    </div>
                <?php } ?>



            </div>
            <button type="submit" id="filter-button">Apply</button>
        </form>
    </div>
    <div class="upper-break">
        <div class="left-btn">
            <div class="trigger" onclick="openSideMenu()">
                <i class="fa fa-angle-double-right" id="filter-off"></i>
                <i class="fa fa-angle-double-left" id="filter-on"></i> filters
            </div>
            <div class="filter-on-text" id="applied">
                <span><?= $this->totalSelectedFilters; ?> applied <a href="<?php echo BASE_URL; ?>games"><i class="fa fa-times-circle-o"></i></a></span>
            </div>
        </div>

        <div class="sort" id="sort">
            <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span>Release Date</span>

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
                        <?php if ($game['gamePrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($game['gamePrice'] != "0") { ?>
                            <p>$<?= $game['gamePrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>


    </div>

    <!--Pagination-->

    <div class="pagination">
        <a href="/indieabode/games?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->gamesPagesCount; $i++) : ?>
            <a href="/indieabode/games?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>

        <?php if (!isset($_GET['classification'])) { ?>
            <a href="/indieabode/games?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>
        <?php } else { ?>
            <a href="/indieabode/games?classification=<?= $_GET['classification']; ?>&page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>
        <?php } ?>
    </div>

    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        <?php if (count($_GET) == 1 || $_GET['page'] == 1) { ?>
            document.getElementById("prev").style.pointerEvents = "none";
        <?php } else if ($_GET['page'] == $this->gamesPagesCount) { ?>
            document.getElementById("next").style.pointerEvents = "none";
        <?php  } ?>

        <?php if ($this->totalSelectedFilters == 0) { ?>
            document.getElementById("applied").style.display = "none";
        <?php } ?>
    </script>

</body>

</html>