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
    include 'public/css/alert-modal.css';
    ?>
</style>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <?php if (isset($_SESSION['add'])) { ?>

        <div class="flashMessage" id="flashMessage">Claimed Successfully</div>
        <?php unset($_SESSION['add']); ?>
    <?php } ?>


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
                    <div class="tagline">
                        <div class="copies">
                            <?= $item['copiesLeft'] ?>/<?= $item['copiesCount'] ?> left
                        </div>
                        <div class="price">
                            <div class="coin-icon"><img src="<?php echo BASE_URL; ?>public/images/spin-wheel/coin.png" alt=""></div>
                            <div class="coin-count"> <?= $item['pieceWorth'] ?></div>
                        </div>
                    </div>
                </a>
                <div class="bottom-btn">
                    <?php if ($item['copiesLeft'] == 0) { ?>
                        <div class="claim-btn" id="sold-out">Sold Out</div>
                    <?php } else { ?>
                        <?php if ($this->myDetails['indieCoins'] > $item['pieceWorth']) { ?>
                            <div class="claim-btn claim" id="claim<?= $item['gameID'] ?>" data-modal-target="#modal<?= $item['gameID'] ?>">Claim</div>
                        <?php } else { ?>
                            <div class="claim-btn claim" id="claim<?= $item['gameID'] ?>" data-modal-target="#modal-incorrectRole">Claim</div>
                        <?php } ?>

                    <?php } ?>
                </div>
            </div>

            <!-- <div class="report-modal">
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
            </div> -->

            <div class="incorrectRole-modal">
                <div class="modal-warning" id="modal<?= $item['gameID'] ?>">
                    <div class="modal-header-warning">

                        <div class="warning-logo">
                            <img src="<?php echo BASE_URL; ?>public/images/spin-wheel/coin.png" alt="">
                        </div>
                        <!-- <button data-close-button class="close-button">&times;</button> -->
                    </div>
                    <div class="modal-body-warning">

                        <div class="user-msg">Claim <br> <?= $item['gameName'] ?></div>
                        <div class="sub-text">Are you sure you want to claim<br> this game for <?= $item['pieceWorth'] ?> coins! </div>

                        <div class="close-btn-warning" onclick="ClaimGame(<?= $item['gameID'] ?>, <?= $item['pieceWorth'] ?>)">Claim</div>
                        <div class="close-btn-warning" data-warning-button>Close</div>

                    </div>
                </div>
                <div id="overlay<?= $item['gameID'] ?>"></div>
            </div>


            <div class="incorrectRole-modal">
                <div class="modal-warning" id="modal-incorrectRole">
                    <div class="modal-header-warning">

                        <div class="warning-logo">
                            <img src="<?php echo BASE_URL; ?>public/images/empty/warning.png" alt="">
                        </div>
                        <!-- <button data-close-button class="close-button">&times;</button> -->
                    </div>
                    <div class="modal-body-warning">

                        <div class="user-msg">Insufficient <br> Coins!</div>
                        <div class="sub-text">You don't have enough coins to<br> claim this game</div>

                        <div class="close-btn-warning" data-warning-button>Close</div>

                    </div>
                </div>
                <div id="overlay"></div>
            </div>



        <?php } ?>
    </div>





    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/warning.js"></script>


    <script>
        $(function() {

            $("#flashMessage").fadeIn(1000);

            setTimeout(function() {
                $("#flashMessage").fadeOut("slow");
            }, 2000);
        });
    </script>


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
                        <?php $_SESSION['add'] = "claimed"; ?>
                        location.reload(true);
                    }
                }

            }

            xhr.open("POST", "/indieabode/giveaways/claimGame", true);
            xhr.send(f);


        }
    </script>

    <script>
        const openBuyModal = document.querySelectorAll("[data-modal-target]");
        const closeBuyModal = document.querySelectorAll("[data-close-button]");
        const Modaloverlay = document.getElementById("overlay");

        openBuyModal.forEach((button) => {
            button.addEventListener("click", () => {
                const modal = document.querySelector(button.dataset.modalTarget);
                openModal(modal);
            });
        });

        Modaloverlay.addEventListener("click", () => {
            const modals = document.querySelectorAll(".modal.active");
            modals.forEach((modal) => {
                closeModal(modal);
            });
        });

        closeBuyModal.forEach((button) => {
            button.addEventListener("click", () => {
                const modal = button.closest(".modal");
                closeModal(modal);
            });
        });

        function openModal(modal) {
            if (modal == null) return;
            modal.classList.add("active");
            Modaloverlay.classList.add("active");
        }

        function closeModal(modal) {
            if (modal == null) return;
            modal.classList.remove("active");
            Modaloverlay.classList.remove("active");
        }
    </script>


</body>

</html>