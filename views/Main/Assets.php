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
        <form action="/indieabode/assets" method="GET" name="myForm" id="myForm">
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



        <?php foreach ($this->assets as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= ucfirst($asset['assetType']); ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <?php if ($asset['assetPrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($asset['assetPrice'] != "0") { ?>
                            <p>$<?= number_format($asset['assetPrice'], 2) ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
                </div>
            </a>
        <?php } ?>



    </div>

    <!--Pagination-->


    <div class="pagination" id="pagination-assets">
        <a href="/indieabode/assets?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->totalAssetPages; $i++) : ?>
            <a href="/indieabode/assets?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>

        <a href="/indieabode/assets?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
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

        <?php if (!isset($_GET['page']) || $_GET['page'] == 1) { ?>
            document.getElementById("prev").style.pointerEvents = "none";
        <?php  } ?>

        <?php if (!isset($_GET['page']) || $_GET['page'] == $this->totalAssetPages) { ?>
            document.getElementById("next").style.pointerEvents = "none";
        <?php  } ?>

        <?php if (isset($_GET['type']) || isset($_GET['price']) || isset($_GET['status']) || isset($_GET['style']) || isset($_GET['classification']) || isset($_GET['sortWhat'])) { ?>
            document.getElementById("pagination-assets").style.display = "none";
        <?php } ?>
    </script>

</body>

</html>