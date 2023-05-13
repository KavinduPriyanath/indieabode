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
                        <input type="checkbox" name="platforms[]" id="<?= $platformFilter['filter']; ?>" class="checkbox" value="<?= $platformFilter['filter']; ?>" <?php if (in_array($platformFilter['filter'], $this->platformsChecked)) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?> />
                        <label for="<?= $platformFilter['filter']; ?>"><?= $platformFilter['filter']; ?></label>
                    </div>
                <?php } ?>

            </div>

            <p>Price</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="" id="" class="checkbox" />
                    <label for="Released">Free</label>
                </div>

                <div class="elements">
                    <input type="radio" name="" id="" class="checkbox" />
                    <label for="Early">5 or less</label>
                </div>

                <div class="elements">
                    <input type="radio" name="" id="" class="checkbox" />
                    <label for="Upcoming">10 or less</label>
                </div>
            </div>

            <p>Release Status</p>

            <div class="type-filter">

                <?php foreach ($this->releaseFilters as $releaseFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="releasestatus[]" id="<?= $releaseFilter['filter']; ?>" class="checkbox" value="<?= $releaseFilter['filter']; ?>" <?php if (in_array($releaseFilter['filter'], $this->releaseStatusChecked)) {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?> />
                        <label for="<?= $releaseFilter['filter']; ?>"><?= $releaseFilter['filter']; ?></label>
                    </div>
                <?php } ?>

            </div>

            <p>Type</p>

            <div class="type-filter">

                <?php foreach ($this->typeFilters as $typeFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="gametypes[]" id="<?= $typeFilter['filter']; ?>" class="checkbox" value="<?= $typeFilter['filter']; ?>" <?php if (in_array($typeFilter['filter'], $this->typesChecked)) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?> />
                        <label for="<?= $typeFilter['filter']; ?>"><?= $typeFilter['filter']; ?></label>
                    </div>
                <?php } ?>



            </div>



            <p>Features</p>

            <div class="type-filter">

                <?php foreach ($this->featureFilters as $featureFilter) { ?>
                    <div class="elements">
                        <input type="checkbox" name="features[]" id="<?= $featureFilter['filter']; ?>" class="checkbox" value="<?= $featureFilter['filter']; ?>" <?php if (in_array($featureFilter['filter'], $this->featuresChecked)) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?> />
                        <label for="<?= $featureFilter['filter']; ?>"><?= $featureFilter['filter']; ?></label>
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
        <form action="/indieabode/games" method="GET" name="myForm" id="myForm">
            <div class="sort" id="sort">
                <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span></span>

                <select name="sortWhat" class="sortselect" id="sortWhat" onchange="document.getElementById('myForm').submit();">
                    <option value="latest" id="latest" name="sortWhat" value="latest" selected>Latest Released</option>
                    <option value="priceLH" id="priceLH" name="sortWhat" value="priceLH">Price Low to High</option>
                    <option value="priceHL" id="priceHL" name="sortWhat" value="priceHL">Price High to Low</option>
                    <option value="nameA-Z" id="nameA-Z" name="sortWhat" value="nameA-Z">Name A-Z</option>
                    <option value="nameZ-A" id="nameZ-A" name="sortWhat" value="nameZ-A">Name Z-A</option>
                </select>
            </div>
        </form>
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
                            <p>$<?= number_format($game['gamePrice'], 2) ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>


    </div>



    <!--Pagination-->

    <div class="pagination" id="pagination-games">
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
        <?php if (!isset($_GET['page']) || $_GET['page'] == 1) { ?>
            document.getElementById("prev").style.pointerEvents = "none";
        <?php } else if ($_GET['page'] == $this->gamesPagesCount) { ?>
            document.getElementById("next").style.pointerEvents = "none";
        <?php  } ?>

        <?php if ($this->totalSelectedFilters == 0) { ?>
            document.getElementById("applied").style.display = "none";
        <?php } ?>

        <?php if (isset($_GET['sortWhat']) || isset($_GET['classification']) || isset($_GET['platforms']) || isset($_GET['releasestatus']) || isset($_GET['gametypes']) || isset($_GET['features'])) { ?>
            document.getElementById("pagination-games").style.display = "none";
        <?php } ?>

        // sort

        const dropdown = document.getElementById('sortWhat');
        const selectedOption = localStorage.getItem('selectedOption');
        if (selectedOption) {
            dropdown.value = selectedOption;
        } else {
            dropdown.selectedIndex = 0; // select the first option
        }
        dropdown.addEventListener('change', () => {
            localStorage.setItem('selectedOption', dropdown.value);
            document.getElementById('myForm').submit();
        });
        localStorage.clear();
    </script>

</body>

</html>