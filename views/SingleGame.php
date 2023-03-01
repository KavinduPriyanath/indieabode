<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/game.css';
        ?><?php include 'public/css/reportModal.css'; ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h2 id="heading"><?= $this->game['gameName'] ?></h2>

    <div class="topics">
        <a href="/indieabode/game?id=<?= $this->game['gameID'] ?>">Overview
        </a>
        <a href="/indieabode/game/reviews?id=<?= $this->game['gameID'] ?>">Reviews</a>
    </div>
    <hr id="topic-break">


    <!--Slideshow and Overview-->

    <div class="container">
        <!--Slideshow-->

        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">
                &#8656;
            </button>
            <button class="carousel-button next" data-carousel-button="next">
                &#8658;
            </button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="/indieabode/public/uploads/games/ss/<?= $this->screenshots[0]; ?>" alt="Nature Image #1" />
                </li>
                <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                    <li class="slide">
                        <img src="/indieabode/public/uploads/games/ss/<?= $this->screenshots[$i]; ?>" alt="Nature Image #2" />
                    </li>
                <?php } ?>
            </ul>


            <div class="tagline">
                <p>
                    <?= $this->game['gameTagline']; ?>
                </p>
            </div>

            <div class="genre-feature">
                <div class="genre">
                    Genre<br>
                    <p><?= $this->game['gameClassification']; ?></p>
                </div>
                <div class="feature">
                    Feature<br>
                    <p><?= $this->game['gameFeatures']; ?></p>
                </div>
            </div>
        </div>


        <!--Overview-->

        <div class="card">
            <div class="card-image game" style="background-image: url('<?php echo '/indieabode/public/uploads/games/cover/' . $this->game['gameCoverImg']; ?>')"></div>
            <h3>Free</h3>
            <div class="buy-btn" onclick="ButtonClick()">Buy Now</div>
            <div class="buy-btn" onclick="ButtonClick()">Add to Cart</div>

            <div class="row">
                <p class="title">Release Date</p>
                <p class="sub-title">5 Nov 2021</p>
            </div>
            <hr />

            <div class="row">
                <p class="title">Developer</p>
                <a href="/indieabode/portfolio?profile=<?= $this->gameDeveloper['username']; ?>">
                    <p class="sub-title"><?= $this->gameDeveloper['username']; ?></p>
                </a>
            </div>
            <hr />

            <div class="row">
                <p class="title">Publisher</p>
                <p class="sub-title">miHiYo Studios</p>
            </div>
            <hr />

            <div class="row">
                <p class="title">Platform</p>
                <p class="sub-title"><?= $this->game['platform']; ?></p>
            </div>
            <hr />

            <div class="row">
                <p class="title">Game Status</p>
                <p class="sub-title"><?= $this->game['releaseStatus']; ?></p>
            </div>
            <hr />
            <button data-modal-target="#modal">Report</button>
        </div>

    </div>
    </div>

    <!--Description-->

    <div class="game-details">

    </div>

    <div class="description">
        <p>
            <?= $this->game['gameDetails']; ?>
        </p>
    </div>



    <!--Reviews-->
    <div class="reviews">

        <div class="game-specification">
            <h3>Specifications</h3>
            <div class="game-spec-details">
                <h3><?= $this->game['platform']; ?></h3>
                <hr>

                <table>
                    <tr>
                        <th>Minimum</th>
                        <th>Recommended</th>
                    </tr>
                    <tr>
                        <td>
                            <p>OS</p><?= $this->game['minOS']; ?>
                        </td>
                        <td>
                            <p>OS</p><?= $this->game['recommendOS']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Processor</p><?= $this->game['minProcessor']; ?>
                        </td>
                        <td>
                            <p>Processor</p><?= $this->game['recommendProcessor']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Memory</p><?= $this->game['minMemory']; ?>
                        </td>
                        <td>
                            <p>Memory</p><?= $this->game['recommendMemory']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Storage</p><?= $this->game['minStorage']; ?>
                        </td>
                        <td>
                            <p>Storage</p><?= $this->game['recommendStorage']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Graphics</p><?= $this->game['minGraphics']; ?>
                        </td>
                        <td>
                            <p>Graphics</p><?= $this->game['recommendGraphics']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Other</p><?= $this->game['other']; ?>
                        </td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

    <!--See Also -->
    <div class="more">
        <h3 id="more-heading">You may also like</h3>
        <div class="cards-container">

            <!--Cards-->

            <div class="bottom-container">

                <?php foreach ($this->popularGames as $popularGame) { ?>
                    <a href="/indieabode/game?id=<?= $popularGame['gameID'] ?>">
                        <div class="popular-card">
                            <div class="popular-card-img"> <img src="/indieabode/public/uploads/games/cover/<?= $popularGame['gameCoverImg'] ?>" alt="">
                            </div>
                            <div class="pgame-intro">
                                <h3><?= $popularGame['gameName'] ?></h3>
                                <p>Free</p>
                            </div>
                            <div class="ptagline"><?= $popularGame['gameTagline'] ?></div>
                        </div>
                    </a>
                <?php } ?>


            </div>
        </div>
    </div>


    <div class="report-modal">
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Report page "Game Name"</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <div class="report-heading">
                    Please complete this form if you need to contact the itch.io
                    moderation team about the content of this page. Your report may be
                    shared with the creator of the page if necessary.
                </div>
                <div class="report-form">
                    <form action="" method="post">
                        <h3>Reasons</h3>

                        <div class="reasons">

                            <?php foreach ($this->reportReasons as $reportReason) { ?>
                                <div class="reason">
                                    <input type="radio" name="reasons" id="" />
                                    <label for=""><?= $reportReason['reason']; ?></label>
                                </div>
                            <?php } ?>

                        </div>

                        <h3>Descrption</h3>
                        <textarea name="" id="" cols="30" rows="10"></textarea>

                        <p>
                            <span>Your email</span>— If your report needs a reply we'll use it
                            to communicate with you
                        </p>
                        <input type="text" />
                        <br />
                        <button type="submit">Submit Report</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/assets.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>


    <script>
        function ButtonClick() {
            alert("Cant perform this action as a gamedeveloper");
        }
    </script>

</body>



</html>