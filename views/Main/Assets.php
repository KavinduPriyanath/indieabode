<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/assets.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <!--Page Topic-->
    <div class="page-topic">
        <h1>-<?= $this->title ?>-</h1>
    </div>

    <!-- Filters-->

    <div class="side-nav" id="side-menu">
        <p>Types</p>

        <div class="type-filter">
            <div class="elements">
                <input type="checkbox" name="" id="Windows" class="checkbox" />
                <label for="Windows">Sprite</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Mac" class="checkbox" />
                <label for="Mac">Character</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Linux" class="checkbox" />
                <label for="Linux">Skybox</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Android" class="checkbox" />
                <label for="Android">Tileset</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Web" class="checkbox" />
                <label for="Webx">Engine</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Web" class="checkbox" />
                <label for="Webx">Font</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Web" class="checkbox" />
                <label for="Webx">Background</label>
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
                <label for="Early">Prototype</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Upcoming</label>
            </div>
        </div>

        <p>Styles</p>

        <div class="type-filter">
            <div class="elements">
                <input type="checkbox" name="" id="Released" class="checkbox" />
                <label for="Released">Pixel Art</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Early" class="checkbox" />
                <label for="Early">8-Bit</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">16-Bit</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Low Poly</label>
            </div>

            <div class="elements">
                <input type="checkbox" name="" id="Upcoming" class="checkbox" />
                <label for="Upcoming">Voxel</label>
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



        <?php foreach ($this->assets as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline"><?= $asset['assetTagline'] ?></div>
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