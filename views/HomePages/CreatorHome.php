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


        <?php foreach ($this->topSellerAssets as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <?php if ($asset['assetPrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($asset['assetPrice'] != "0") { ?>
                            <p>$<?= $asset['assetPrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
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


        <?php foreach ($this->latestAssets as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <?php if ($asset['assetPrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($asset['assetPrice'] != "0") { ?>
                            <p>$<?= $asset['assetPrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
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


        <?php foreach ($this->mostPopular as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <?php if ($asset['assetPrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($asset['assetPrice'] != "0") { ?>
                            <p>$<?= $asset['assetPrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
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


        <?php foreach ($this->topRated as $asset) { ?>
            <a href="/indieabode/asset?id=<?= $asset['assetID'] ?>">
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $asset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $asset['assetType'] ?> </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $asset['assetName'] ?></h3>
                        <?php if ($asset['assetPrice'] == "0") { ?>
                            <p>Free</p>
                        <?php } else if ($asset['assetPrice'] != "0") { ?>
                            <p>$<?= $asset['assetPrice'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="tagline modernWay"><?= $asset['assetTagline'] ?></div>
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