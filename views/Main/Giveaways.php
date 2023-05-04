<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>
</head>

<style>
    <?php
    include 'public/css/giveaways.css';
    include 'public/css/reportModal.css';
    ?>
</style>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



    <div class="page-topic">
        <h1>-GiveAways-</h1>
    </div>

    <!-- Filters-->


    <hr id="topic-break" />

    <!--Cards-->

    <div class="container" id="card-container">
        <?php foreach ($this->giveawayItems as $item) { ?>
            <div class="card">
                <a href="<?php echo BASE_URL; ?>game?id=<?= $item['gameID'] ?>">
                    <div class="card-image"> <img src="<?php echo BASE_URL; ?>public/uploads/games/cover/<?= $item['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-name">
                        <p><?= $item['gameName'] ?></p>
                    </div>
                    <div class="tagline"><?= $item['copiesLeft'] ?>/<?= $item['copiesCount'] ?> left</div>
                </a>
                <div class="bottom-btn">
                    <?php if ($item['copiesLeft'] == 0) { ?>
                        <div class="claim-btn" id="sold-out">Sold Out</div>
                    <?php } else { ?>
                        <?php if ($this->myDetails['indieCoins'] > $item['pieceWorth']) { ?>
                            <div class="claim-btn claim" id="claim<?= $item['gameID'] ?>" data-modal-target="#modal<?= $item['gameID'] ?>">Claim</div>
                        <?php } else { ?>
                            <div class="claim-btn claim" id="claim<?= $item['gameID'] ?>">Claim</div>
                        <?php } ?>

                    <?php } ?>
                </div>
            </div>

            <div class="report-modal">
                <div class="modal" id="modal<?= $item['gameID'] ?>">
                    <div class="modal-header">
                        <div class="title">Claim "<?= $item['gameName'] ?>"</div>
                        <button data-close-button class="close-button">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="report-heading">
                            Please complete this form if you need to contact the itch.io
                            moderation team about the content of this page. Your report may be
                            shared with the creator of the page if necessary.
                        </div>
                        <div class="report-form">
                            <h3>Reasons</h3>

                        </div>
                        <div class="claim-game" onclick="ClaimGame(<?= $item['gameID'] ?>, <?= $item['pieceWorth'] ?>)">Claim</div>
                    </div>
                </div>
                <div id="overlay<?= $item['gameID'] ?>"></div>
            </div>

        <?php } ?>
    </div>





    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>


    <script>
        function ClaimGame(gameID, PieceWorth) {

            var f = new FormData();

            f.append("gameID", gameID);
            f.append("pieceWorth", PieceWorth);

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                if (xhr.readyState == 1) {


                } else if (xhr.readyState == 4) {
                    var t = xhr.responseText;

                    if (t == "2") {
                        alert(t);
                    } else {
                        document.getElementById('modal' + gameID).classList.remove("active");
                        document.getElementById('overlay' + gameID).classList.remove("active");
                    }
                }

            }

            xhr.open("POST", "/indieabode/giveaways/claimGame", true);
            xhr.send(f);


        }
    </script>


</body>

</html>