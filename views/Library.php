<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/library.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h3 id="heading"><?= $_SESSION['username'] . "'s Library" ?></h3>

    <hr id="topic-break" />


    <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == 'game developer') { ?>
        <div class="container" id="card-container">

            <?php foreach ($this->myAssets as $myAsset) { ?>
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/<?= $myAsset['assetCoverImg'] ?>" alt="">

                        <div class="asset-type"> <?= $myAsset['assetType']; ?> </div>
                    </div>
                    <div class="library-container">
                        <div class="library-left">
                            <div class="game-intro">
                                <h3><?= $myAsset['assetName']; ?></h3>
                            </div>
                            <div class="date">Added on <?= $myAsset['createdAt']; ?></div>
                        </div>
                        <div class="library-right">
                            <div class="dropdown">
                                <button class="dropbtn"><i class="fa fa-angle-down"></i></button>
                                <div class="dropdown-content">
                                    <div class="options">
                                        <a href="#">Download</a>
                                    </div>
                                    <div class="options">
                                        <a href="/indieabode/asset?id=<?= $myAsset['assetID']; ?>">Go to Store Page</a>
                                    </div>
                                    <div class="options">
                                        <a href="/indieabode/asset/reviews?id=<?= $myAsset['assetID']; ?>">View Reviews</a>
                                    </div>
                                    <div class="options">
                                        <a href="#">Hide Asset</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == 'gamer') { ?>
        <div class="container" id="card-container">

            <?php foreach ($this->myGames as $myGame) { ?>
                <div class="card">
                    <div class="card-image game"> <img src="/indieabode/public/uploads/games/cover/<?= $myGame['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="library-container">
                        <div class="library-left">
                            <div class="game-intro">
                                <h3><?= $myGame['gameName']; ?></h3>
                            </div>
                            <div class="date">Added on <?= $myGame['createdAt']; ?></div>
                        </div>
                        <div class="library-right">
                            <div class="dropdown">
                                <button class="dropbtn"><i class="fa fa-angle-down"></i></button>
                                <div class="dropdown-content">
                                    <div class="options">
                                        <a href="#">Download</a>
                                    </div>
                                    <div class="options">
                                        <a href="/indieabode/game?id=<?= $myGame['gameID']; ?>">Go to Store Page</a>
                                    </div>
                                    <div class="options">
                                        <a href="/indieabode/game/reviews?id=<?= $myGame['gameID']; ?>">View Reviews</a>
                                    </div>
                                    <div class="options">
                                        <a href="#">Hide Game</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    <?php } ?>


    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>