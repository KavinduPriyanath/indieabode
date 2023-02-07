<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gig.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!--Gig title goes here-->
    <h2 id="gig-title"><?= $this->gig['gigName']; ?></h2>

    <div class="first-row">
        <div class="image-slider">
            <div class="slider">
                <div class="slide active">
                    <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[0]; ?>" alt="" />
                </div>
                <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                    <div class="slide">
                        <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[$i]; ?>" alt="" />
                    </div>
                <?php } ?>


                <div class="navigation">
                    <i class="fas fa-chevron-left prev-btn"></i>
                    <i class="fas fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>
        </div>
        <div class="gig-summary">
            <h4>Game Summary</h4>
            <div class="summary-details">
                <div class="row">
                    <div class="col-1">Game Name</div>
                    <div class="col-2"><?= $this->gig['game']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Genre</div>
                    <div class="col-2">2D Platformer</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Platform</div>
                    <div class="col-2">Windows</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Current Stage</div>
                    <div class="col-2"><?= $this->gig['currentStage']; ?>6 Months</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Planned Release</div>
                    <div class="col-2"><?= $this->gig['plannedReleaseDate']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Expected Cost</div>
                    <div class="col-2"><?= $this->gig['expectedCost']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Estimated Share</div>
                    <div class="col-2"><?= $this->gig['estimatedShare']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Status</div>
                    <div class="col-2">Paused</div>
                </div>
                <hr />
            </div>
            <div class="order-button" onclick="ButtonClick()">Request Order</div>
        </div>
    </div>

    <div class="second-row">
        <div class="rich-text"><?= $this->gig['gigDetails']; ?></div>
        <div class="developer-summary">
            <h2>About Developer</h2>
            <div class="dev-profile">
                <div class="image">
                    <img src="/images/profile.png" alt="" />
                </div>
                <div class="dev-name">
                    <h4>Kavindu Priyanath</h4>
                    <div class="trust-rank">Trust Rank: 2</div>
                </div>
            </div>

            <div class="dev-row">
                <h3>From</h3>
                <div class="info">Sri Lanka</div>
            </div>
            <div class="dev-row">
                <h3>Email</h3>
                <div class="info">kavindupriyanath@gmail.com</div>
            </div>
            <div class="dev-row">
                <h3>Avg. Response Time</h3>
                <div class="info">2 hours</div>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/gig.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        function ButtonClick() {
            alert("Cant perform this action as a gamedeveloper");
        }
    </script>

</body>



</html>