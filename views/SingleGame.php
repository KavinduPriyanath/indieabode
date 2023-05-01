<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/game.css';
        ?><?php include 'public/css/reportModal.css'; ?><?php include 'public/css/shareModal.css'; ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="flashMessage" id="flashMessage"></div>

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

        <div class="leftside-container">
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

            <div class="left-details">
                <div class="description">
                    <p>
                        <?= $this->game['gameDetails']; ?>
                    </p>
                </div>



                <!--Reviews-->
                <div class="specs-reviews">

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
            </div>
        </div>



        <!--Overview-->
        <div class="rightside-container">
            <div class="card">
                <div class="card-image game" style="background-image: url('<?php echo '/indieabode/public/uploads/games/cover/' . $this->game['gameCoverImg']; ?>')"></div>
                <h3 id="gametype"><?= $this->game['gameType']; ?></h3>

                <h3 id="price"><?= $this->gamePrice ?></h3>


                <div class="buy-btn" id="download-btn">Download</div>
                <div class="buy-btn" id="buy-btn">Buy Now</div>

                <div class="buy-btn" id="add-cart-btn">Add to Cart</div>
                <div class="buy-btn" id="view-cart-btn">View Cart</div>
                <div class="buy-btn" id="add-to-library">Add to Library</div>
                <div class="buy-btn" id="view-library">In Library</div>
                <div class="buy-btn" id="wishlist">Wishlist</div>

                <div class="cartbutton">

                    <!-- <?php if (!$this->hasClaimed && $this->game['gamePrice'] != "0") { ?>

                        <?php if ($this->hasInCart) { ?>

                            <a href="/indieabode/cart" style="text-decoration: none;">
                                <div class="buy-btn" id="cart-btn">View In Cart</div>
                            </a>
                        <?php } else { ?>

                            <a href="/indieabode/game/addToCart?id=<?= $this->game['gameID'] ?> " style="text-decoration: none;">
                                <div class="buy-btn" id="cart-btn">Add to cart</div>
                            </a>
                        <?php } ?>

                    <?php } else if (!$this->hasClaimed && $this->game['gamePrice'] == "0") { ?>

                        <div class="buy-btn" id="add-to-library">Add to Library</div>

                    <?php } else if ($this->hasClaimed) { ?>
                        <a href="/indieabode/library" style="text-decoration: none;">
                            <div class="buy-btn" id="cart-btn">In Library</div>
                        </a>
                    <?php } ?> -->

                </div>

                <div class="row" id="first-row-right">
                    <p class="title">Release Date</p>

                    <p class="sub-title" id="release-date"></p>

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
                    <p class="sub-title"><?= $this->publisher['username'] ?></p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">Platform</p>
                    <p class="sub-title">
                    <div class="platform-icons">
                        <?php foreach ($this->platforms as $platform) { ?>
                            <div class="icon"><img src="/indieabode/public/images/platforms/<?= $platform ?>.png" alt=""></div>
                        <?php } ?>
                    </div>
                    </p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">Game Status</p>
                    <p class="sub-title"><?= $this->game['releaseStatus']; ?></p>
                </div>
                <hr />
            </div>

            <div class="right-details">
                <div class="button-div">
                    <button data-modal-target="#share-modal" id="share-btn"><i class="fa fa-share-alt"></i>Share</button>
                    <button data-modal-target="#modal" id="report-btn"><i class="fa fa-flag"></i>Report</button>
                </div>
            </div>
        </div>


    </div>
    </div>

    <!--Description-->

    <div class="game-details">


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
                    <h3>Reasons</h3>

                    <div class="reasons">

                        <?php foreach ($this->reportReasons as $reportReason) { ?>
                            <div class="reason">
                                <input type="radio" name="reasons" id="" value="<?= $reportReason['reason']; ?>" />
                                <label for=""><?= $reportReason['reason']; ?></label>
                            </div>
                        <?php } ?>

                    </div>

                    <h3>Descrption</h3>
                    <textarea name="" id="description" cols="30" rows="10"></textarea>

                    <br />
                    <button type="submit" id="report-submit">Submit Report</button>
                </div>
            </div>
        </div>
        <div id="overlay"></div>
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

    <script src="<?php echo BASE_URL; ?>public/js/asset.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>

    <script>
        $(document).ready(function() {

            const months = ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            let releaseDate = "<?= $this->game['created_at'] ?>";

            let year = releaseDate.substr(0, 4);
            let month = releaseDate.slice(5, 7);
            let day = releaseDate.slice(8, 10);
            let monthName = months[parseInt(month) - 1];
            let formattedReleaseDate = day + " " + monthName + " " + year;

            $('#release-date').text(formattedReleaseDate);


            $('#report-submit').click(function() {

                console.log("Button Clicked");

                var description = $('#description').val();
                var reason = $("input[name='reasons']:checked").val();

                var data = {
                    'description': description,
                    'reason': reason,
                    'report_submit': true,
                };

                $.ajax({
                    url: "/indieabode/game/report?id=<?= $this->game['gameID']; ?>",
                    method: "POST",
                    data: data,
                    success: function(response) {
                        $('#modal').removeClass("active");
                        $('#overlay').removeClass("active");

                        // alert(response);
                    }
                })

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            //Manage the way buttons are shown for different users, and for those who havent logged in
            <?php if (isset($_SESSION['logged'])) { ?>
                <?php if (!$this->hasClaimed) { ?>
                    <?php if ($this->game['gamePrice'] == "0") { ?>
                        $('#download-btn').show();
                        $('#buy-btn').hide();
                    <?php } else if ($this->game['gamePrice'] != "0") { ?>
                        $('#download-btn').hide();
                        $('#buy-btn').show();
                    <?php } ?>
                <?php } else if ($this->hasClaimed && $this->game['gamePrice'] != "0") { ?>
                    $('#download-btn').show();
                    $('#buy-btn').hide();
                <?php } ?>


                //download buttons for free games
                <?php if ($this->game['gamePrice'] == "0") { ?>
                    $('#download-btn').show();
                    $('#buy-btn').hide();
                <?php } ?>

                //download buttons for paid games
                <?php if ($this->game['gamePrice'] != "0") { ?>
                    <?php if ($this->hasClaimed) { ?>
                        $('#download-btn').show();
                        $('#buy-btn').hide();
                    <?php } else if (!$this->hasClaimed) { ?>
                        $('#download-btn').hide();
                        $('#buy-btn').show();
                    <?php } ?>
                <?php } ?>

                //show library and cart buttons for free games
                <?php if ($this->game['gamePrice'] == "0") { ?>
                    $('#add-cart-btn').hide();
                    $('#view-cart-btn').hide();
                    <?php if ($this->hasClaimed) { ?>
                        $('#add-to-library').hide();
                        $('#view-library').show();
                    <?php } else if (!$this->hasClaimed) { ?>
                        $('#add-to-library').show();
                        $('#view-library').hide();
                    <?php } ?>
                <?php } ?>

                //show library and cart buttons for free games
                <?php if ($this->game['gamePrice'] != "0") { ?>
                    <?php if ($this->hasClaimed) { ?>
                        $('#add-to-library').hide();
                        $('#view-library').show();
                        $('#add-cart-btn').hide();
                        $('#view-cart-btn').hide();
                    <?php } else if (!$this->hasClaimed && $this->hasInCart) { ?>
                        $('#add-to-library').hide();
                        $('#view-library').hide();
                        $('#add-cart-btn').hide();
                        $('#view-cart-btn').show();
                    <?php } else if (!$this->hasClaimed && !$this->hasInCart) { ?>
                        $('#add-to-library').hide();
                        $('#view-library').hide();
                        $('#add-cart-btn').show();
                        $('#view-cart-btn').hide();
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <?php if ($this->game['gamePrice'] == "0") { ?>
                    $('#download-btn').show();
                    $('#buy-btn').hide();
                    $('#add-to-library').show();
                    $('#add-cart-btn').hide();
                <?php } else { ?>
                    $('#download-btn').hide();
                    $('#buy-btn').show();
                    $('#add-to-library').hide();
                    $('#add-cart-btn').show();
                <?php } ?>

                $('#view-library').hide();
                $('#view-cart-btn').hide();

            <?php } ?>


            //For gamers, add the item to library, for unprivileged logged users prompt an alert. Redirect users who havent logged in to login page
            $('#add-to-library').click(function() {


                <?php if (isset($_SESSION['logged'])) { ?>
                    <?php if ($_SESSION['userRole'] == "gamer") { ?>


                        let gameID = <?= $this->game['gameID']; ?>;

                        var data = {
                            'gameID': gameID,
                            'add_to_library': true,
                        };

                        $.ajax({
                            url: "/indieabode/game/addtoLibrary",
                            method: "POST",
                            data: data,
                            success: function(response) {

                                if (response == "1") {

                                    $('#add-to-library').hide();
                                    $('#view-library').show();

                                    $("#flashMessage").html('Added to the Library')
                                    $("#flashMessage").fadeIn(1000);

                                    setTimeout(function() {
                                        $("#flashMessage").fadeOut("slow");
                                    }, 4000);

                                }
                                // alert(response);
                            }
                        })


                    <?php } else { ?>
                        alert("Unauthorized User Role");
                    <?php } ?>
                <?php } else { ?>
                    window.location.href = "/indieabode/login";
                <?php } ?>




            });

            //Redirect gamers to their library
            $('#view-library').click(function() {

                window.location.href = "/indieabode/library";

            });

            //For gamers, add the item to cart, for unprivileged logged users prompt an alert. Redirect users who havent logged in to login page
            $('#add-cart-btn').click(function() {

                <?php if (isset($_SESSION['logged'])) { ?>
                    <?php if ($_SESSION['userRole'] == "gamer") { ?>

                        let gameID = <?= $this->game['gameID']; ?>;

                        var data = {
                            'gameID': gameID,
                            'add_to_cart': true,
                        };

                        $.ajax({
                            url: "/indieabode/game/AddToCart",
                            method: "POST",
                            data: data,
                            success: function(response) {

                                if (response == "1") {

                                    $('#add-cart-btn').hide();
                                    $('#view-cart-btn').show();

                                    $("#flashMessage").html('Added to the Cart')
                                    $("#flashMessage").fadeIn(1000);

                                    setTimeout(function() {
                                        $("#flashMessage").fadeOut("slow");
                                    }, 4000);

                                }
                            }
                        })


                    <?php } else { ?>
                        alert("Unauthorized User Role");
                    <?php } ?>
                <?php } else { ?>
                    window.location.href = "/indieabode/login";
                <?php } ?>



            });

            //Redirect gamers to their cart
            $('#view-cart-btn').click(function() {

                window.location.href = "/indieabode/cart";

            });

            //Redirect logged gamers to checkout while unprivileged users see an alert message. Users who hasnt logged in redirect to login page
            $('#buy-btn').click(function() {

                <?php if (isset($_SESSION['logged'])) { ?>
                    <?php if ($_SESSION['userRole'] == "gamer") { ?>
                        window.location.href = "/indieabode/game/checkout?id=<?= $this->game['gameID'] ?>";
                    <?php } else { ?>
                        alert("Unauthorized User Role");
                    <?php } ?>
                <?php } else { ?>
                    window.location.href = "/indieabode/login";
                <?php } ?>



            });

            //Downloading the game and showing a flash message thanking
            $('#download-btn').click(function() {

                window.location.href = "/indieabode/game/downloadGame?id=<?= $this->game['gameID'] ?>";


                $("#flashMessage").html('Thanks for downloading');
                $("#flashMessage").fadeIn(2000);

                setTimeout(function() {
                    $("#flashMessage").fadeOut("slow");
                }, 4000);

            });
        });
    </script>

</body>



</html>