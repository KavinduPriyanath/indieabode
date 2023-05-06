<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gig.css';
        include 'public/css/gigs.css';
        include 'public/css/shareModal.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!--Gig title goes here-->
    <h2 id="gig-title"><?= $this->gig['gigName']; ?></h2>

    <div class="first-row-gig">
        <div class="left-gig-page">
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
                        <i class="fa fa-chevron-left prev-btn"></i>
                        <i class="fa fa-chevron-right next-btn"></i>
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
            <div class="gig-details-heading">More About the Gig</div>
            <div class="rich-text"><?= $this->gig['gigDetails']; ?></div>
        </div>
        <div class="right-gig-page">
            <div class="gig-summary">
                <h4>Order Summary</h4>
                <div class="summary-details">
                    <div class="row">
                        <div class="col-1">Game Name</div>
                        <div class="col-2"><?= $this->gig['gameName']; ?></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Genre</div>
                        <div class="col-2"><?= $this->gig['gameClassification']; ?></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Platform</div>
                        <div class="col-2"><?= $this->gig['platform']; ?></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Current Stage</div>
                        <div class="col-2"><?= $this->gig['currentStage']; ?> Months</div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Planned Release</div>
                        <div class="col-2" id="release-date"></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Expected Cost</div>
                        <div class="col-2">$<?= $this->gig['expectedCost']; ?></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Estimated Share</div>
                        <div class="col-2"><?= $this->gig['estimatedShare']; ?>%</div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-1">Status</div>
                        <div class="col-2">Paused</div>
                    </div>
                    <hr />
                </div>

                <div id="view-button">
                    <a href="/indieabode/gig/viewgig?id=<?= $this->gig['gigID']; ?>&token=<?= $this->gig['gigID'] . $_SESSION['id'] ?>">
                        <div class="view-button">View Request</div>
                    </a>
                </div>

                <div class="request-button" id="request-button">Request Order</div>


                <div class="share-button" data-modal-target="#share-modal">Share</div>
            </div>
            <div class="demo-download-button">
                <a href="/indieabode/gig/downloadDemo?id=<?= $this->gig['game'] ?>">
                    <div class="demo-download">
                        Download Demo
                    </div>
                </a>
            </div>
            <div class="developer-summary">
                <h2>About Developer</h2>
                <div class="dev-profile">
                    <div class="image">
                        <img src="/indieabode/public/images/avatars/<?= $this->gameDeveloper['avatar'] ?>" alt="" />
                    </div>
                    <div class="dev-name">
                        <h4><?= $this->gameDeveloper['firstName'] . " " . $this->gameDeveloper['lastName'] ?></h4>
                        <div class="trust-rank">Trust Rank: <?= $this->gameDeveloper['trustrank'] ?></div>
                    </div>
                </div>

                <div class="dev-row">
                    <h3>From</h3>
                    <div class="info">Sri Lanka</div>
                </div>
                <div class="dev-row">
                    <h3>Email</h3>
                    <div class="info"><?= $this->gameDeveloper['email'] ?></div>
                </div>
                <div class="dev-row">
                    <h3>Avg. Response Time</h3>
                    <div class="info">2 hours</div>
                </div>
            </div>
        </div>
    </div>


    <!--See Also -->
    <div class="more">
        <h3 id="more-heading">Recommended For You</h3>
        <div class="cards-container">

            <!--Cards-->

            <div class="bottom-container">

                <?php foreach ($this->recommendedGigs as $gig) { ?>
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
                            <div class="tagline"> <?= $gig['gigTagline'] ?> </div>
                        </div>
                    </a>
                <?php } ?>


            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="share-modal">
        <div class="modal" id="share-modal">
            <div class="modal-header">
                <div class="title">Help by sharing</div>
                <button data-close-button class="close-button">&times;</button>
            </div>

            <div class="content">
                <p>Shared this game with your friends.</p>
                <hr>
                <p>Share this link via</p>
                <ul class="icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-telegram-plane"></i></a>
                </ul>
                <p>Or copy link</p>
                <div class="field">
                    <i class="url-icon uil uil-link"></i>
                    <input type="text" readonly value=" http://localhost/indieabode/game?id=<?= $this->game['gameID'] ?>" id="copytext">
                    <button id="copy">Copy</button>
                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/gig.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>



    <script>
        $(document).ready(function() {

            const months = ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            let releaseDate = "<?= $this->gig['plannedReleaseDate']; ?>";

            let year = releaseDate.substr(0, 4);
            let month = releaseDate.slice(5, 7);
            let day = releaseDate.slice(8, 10);
            let monthName = months[parseInt(month) - 1];
            let formattedReleaseDate = day + " " + monthName + " " + year;

            $('#release-date').text(formattedReleaseDate);

            <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == 'game publisher') { ?>
                <?php if ($this->hasRequested) { ?>
                    $('#view-button').show();
                    $('#request-button').hide();
                <?php } else { ?>
                    $('#view-button').hide();
                    $('#request-button').show();
                <?php } ?>
            <?php } else { ?>
                $('.share-button').show();
            <?php } ?>


            $('#request-button').click(function() {

                let gigID = <?= $this->gig['gigID'] ?>;
                let estimatedShare = <?= $this->gig['estimatedShare'] ?>;
                let expectedCost = '<?= $this->gig['expectedCost'] ?>';

                var data = {
                    'gigID': gigID,
                    'estimatedShare': estimatedShare,
                    'expectedCost': expectedCost,
                    'gig_request_made': true,
                };

                $.ajax({
                    url: "/indieabode/gig/gigrequest",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        $('#view-button').show();
                        $('#request-button').hide();
                    }
                })

            });

        });
    </script>

</body>



</html>