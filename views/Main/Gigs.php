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
                    <input type="checkbox" name="genre[]" id="action" class="checkbox" value="Action" <?php if (in_array("Action", $this->genreChecked)) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                    <label for="action">Action</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="adventure" class="checkbox" value="Adventure" <?php if (in_array("Adventure", $this->genreChecked)) {
                                                                                                                echo "checked";
                                                                                                            } ?> />
                    <label for="adventure">Adventure</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="rpg" class="checkbox" value="RPG" <?php if (in_array("RPG", $this->genreChecked)) {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="rpg">RPG</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="racing" class="checkbox" value="Racing" <?php if (in_array("Racing", $this->genreChecked)) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                    <label for="racing">Racing</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="simulation" class="checkbox" value="Simulation" <?php if (in_array("Simulation", $this->genreChecked)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                    <label for="simulation">Simulation</label>
                </div>

                <div class="elements">
                    <input type="checkbox" name="genre[]" id="strategy" class="checkbox" value="Strategy" <?php if (in_array("Strategy", $this->genreChecked)) {
                                                                                                                echo "checked";
                                                                                                            } ?> />
                    <label for="strategy">Strategy</label>
                </div>
            </div>

            <p>Current Stage</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="stage" id="1month" class="checkbox" value="1" <?php if ($this->currentStage == 1) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="1month">1 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="2month" class="checkbox" value="2" <?php if ($this->currentStage == 2) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="2month">2 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="3month" class="checkbox" value="3" <?php if ($this->currentStage == 3) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="3month">3 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="4month" class="checkbox" value="4" <?php if ($this->currentStage == 4) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="4month">4 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="5month" class="checkbox" value="5" <?php if ($this->currentStage == 5) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="5month">5 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="6month" class="checkbox" value="6" <?php if ($this->currentStage == 6) {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="6month">6 Month</label>
                </div>

                <div class="elements">
                    <input type="radio" name="stage" id="12month" class="checkbox" value="12" <?php if ($this->currentStage == 12) {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="12month">12 Month</label>
                </div>
            </div>

            <p>Expected Cost</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="cost" id="below500" class="checkbox" value="500-" <?php if ($this->expectedCost == "500-") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="below500">Below $500</label>
                </div>

                <div class="elements">
                    <input type="radio" name="cost" id="above500" class="checkbox" value="500+" <?php if ($this->expectedCost == "500+") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="above500">Above $500</label>
                </div>

                <div class="elements">
                    <input type="radio" name="cost" id="above1000" class="checkbox" value="1000+" <?php if ($this->expectedCost == "1000+") {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                    <label for="above1000">Above $1000</label>
                </div>
            </div>

            <p>Estimated Share</p>

            <div class="type-filter">
                <div class="elements">
                    <input type="radio" name="share" id="below10" class="checkbox" value="10-" <?php if ($this->estimatedShare == "10-") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="below10">0%-10%</label>
                </div>

                <div class="elements">
                    <input type="radio" name="share" id="10to50" class="checkbox" value="50-" <?php if ($this->estimatedShare == "50-") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                    <label for="10to50">10%-50%</label>
                </div>


                <div class="elements">
                    <input type="radio" name="share" id="above50" class="checkbox" value="50+" <?php if ($this->estimatedShare == "50+") {
                                                                                                    echo "checked";
                                                                                                } ?> />
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
        <form action="/indieabode/gigs" method="GET" name="myForm" id="myForm">
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
                    <div class="tagline modernWay"> <?= $gig['gigTagline'] ?> </div>
                </div>
            </a>
        <?php } ?>
    </div>

    <!--Pagination-->

    <div class="pagination" id="pagination-gigs">
        <a href="/indieabode/gigs?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->gigsPagesCount; $i++) : ?>
            <a href="/indieabode/gigs?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>

        <a href="/indieabode/gigs?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        <?php if (isset($_GET['genre']) || isset($_GET['stage']) || isset($_GET['cost']) || isset($_GET['share'])) { ?>
            document.getElementById("pagination-gigs").style.display = "none";
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