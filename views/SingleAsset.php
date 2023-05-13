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
        include 'public/css/asset.css';
        ?><?php include 'public/css/reportModal.css'; ?><?php include 'public/css/shareModal.css'; ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h2 id="heading"><?= $this->asset['assetName'] ?></h2>

    <div class="topics">
        <a href="/indieabode/asset?id=<?= $this->asset['assetID'] ?>">Overview
        </a>
        <a href="/indieabode/asset/reviews?id=<?= $this->asset['assetID'] ?>">Reviews</a>
    </div>
    <hr id="topic-break">


    <!--Slideshow and Overview-->

    <div class="container">
        <!--Slideshow-->

        <div class="asset-left-side">
            <div class="carousel" data-carousel>
                <button class="carousel-button prev" data-carousel-button="prev">
                    &#8656;
                </button>
                <button class="carousel-button next" data-carousel-button="next">
                    &#8658;
                </button>
                <ul data-slides>
                    <li class="slide" data-active>
                        <img src="/indieabode/public/uploads/assets/ss/<?= $this->screenshots[0]; ?>" alt="Nature Image #1" />
                    </li>
                    <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                        <li class="slide">
                            <img src="/indieabode/public/uploads/assets/ss/<?= $this->screenshots[$i]; ?>" alt="Nature Image #2" />
                        </li>
                    <?php } ?>
                </ul>

                <!--Ratings, Views, Downloads-->

                <div class="ratings">
                    <div class="stars">
                        <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                        <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                        <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                        <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                        <img src="/indieabode/public/images/games/Blank Star.png" alt="" />
                        <p>(<?= $this->stats['ratingCount']; ?>)</p>
                    </div>
                </div>

                <div class="views-downloads">
                    <img src="/indieabode/public/images/games/view.png" alt="" />
                    <p id="views"><?= $this->stats['views']; ?></p>
                    <img src="/indieabode/public/images/games/download.png" alt="" />
                    <p id="downloads"><?= $this->stats['downloads']; ?></p>
                </div>

                <!--Rate & View All-->


            </div>

            <!--Description-->

            <div class="description">
                <?= $this->asset['assetDetails']; ?>
            </div>
        </div>

        <!--Overview-->

        <div class="asset-right-side">
            <div class="card-cover">
                <div class="card">
                    <h2 class="asset-name">
                        <?= $this->asset['assetName']; ?>
                    </h2>
                    <div class="profile-info">
                        <img src="/indieabode/public/images/games/profile.png" alt="" />
                        <a href="/indieabode/portfolio?profile=<?= $this->assetCreator['username']; ?>">
                            <p><?= $this->assetCreator['username']; ?></p>
                        </a>
                    </div>
                    <div class="price-flex">
                        <div class="category"><?= $this->asset['assetType']; ?></div>
                        <?php if ($this->asset['assetPrice'] == "0") { ?>
                            <h1>FREE</h1>
                        <?php } else { ?>
                            <h1><?= $this->assetPrice ?></h1>
                        <?php } ?>
                    </div>


                    <div class="buy-btn" id="download-btn">Download</div>
                    <div class="buy-btn" id="buy-btn">Buy Now</div>

                    <div class="buy-btn" id="add-cart-btn">Add to Cart</div>
                    <div class="buy-btn" id="view-cart-btn">View Cart</div>
                    <div class="buy-btn" id="add-to-library">Add to Library</div>
                    <div class="buy-btn" id="view-library">In Library</div>
                    <!-- <div id="not-claimed">
                        <a href="/indieabode/asset/checkout?id=<?= $this->asset['assetID'] ?>">
                            <div class="buy-btn">Buy Now</div>
                        </a>
                        <a href="/indieabode/asset/AddToCart?id=<?= $this->asset['assetID'] ?>" id="cart-link">
                            <div class="buy-btn" id="cart-btn">Add to Cart</div>
                        </a>
                    </div> -->

                    <!-- <div id="claimed">
                        <a href="/indieabode/library">
                            <div class="buy-btn">In Library</div>
                        </a>
                    </div> -->

                    <div class="details">
                        <div class="row">
                            <p class="title">Release Date</p>
                            <p class="sub-title" id="release-date"></p>
                        </div>
                        <hr />

                        <div class="row">
                            <p class="title">Latest Version</p>
                            <p class="sub-title"><?= $this->asset['version']; ?></p>
                        </div>
                        <hr />

                        <div class="row">
                            <p class="title">File Size</p>
                            <p class="sub-title"><?= $this->fileSize ?> MB</p>
                        </div>
                        <hr />

                        <div class="row">
                            <p class="title">Extension</p>
                            <p class="sub-title" id="file-extension"></p>
                        </div>
                        <hr />

                        <div class="row">
                            <p class="title">License Type</p>
                            <p class="sub-title"><?= $this->asset['assetLicense']; ?></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right-details">
                <div class="button-div">
                    <button data-modal-target="#share-modal" id="share-btn"><i class="fa fa-share-alt"></i>Share</button>
                    <button data-modal-target="#modal" id="report-btn"><i class="fa fa-flag"></i>Report</button>
                </div>
            </div>
        </div>
    </div>



    <!--See Also -->
    <div class="more">
        <h3 id="more-heading">You may also like</h3>
        <div class="cards-container">

            <!--Cards-->

            <div class="bottom-container">

                <?php foreach ($this->popularAssets as $popularAsset) { ?>



                    <a href="/indieabode/asset?id=<?= $popularAsset['assetID'] ?>">
                        <div class="popular-card">
                            <div class="popular-card-img"> <img src="/indieabode/public/uploads/assets/cover/<?= $popularAsset['assetCoverImg'] ?>" alt="">

                                <div class="asset-type"> <?= $popularAsset['assetType'] ?> </div>
                            </div>
                            <div class="pgame-intro">
                                <h3><?= $popularAsset['assetName'] ?></h3>
                                <p>Free</p>
                            </div>
                            <div class="ptagline modernWay"><?= $popularAsset['assetTagline'] ?></div>
                        </div>
                    </a>
                <?php } ?>


            </div>
        </div>
    </div>


    <div class="report-modal">
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Report page "Asset Name"</div>
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




    <!-- <?php if ($this->hasClaimed) { ?>
        <script>
            document.getElementById('not-claimed').style.display = 'none';
            document.getElementById('claimed').style.display = 'block';
        </script>
    <?php } else { ?>
        <script>
            document.getElementById('not-claimed').style.display = 'block';
            document.getElementById('claimed').style.display = 'none';
        </script>
    <?php } ?>

    <?php if ($this->hasInCart) { ?>
        <script>
            document.getElementById('cart-btn').innerHTML = "View In Cart";
            document.getElementById('cart-link').href = "/indieabode/cart";
        </script>
    <?php } else { ?>
        <script>
            document.getElementById('cart-btn').innerHTML = "Add to Cart";
            document.getElementById('cart-link').href = "/indieabode/asset/AddToCart?id=<?= $this->asset['assetID'] ?>";
        </script>
    <?php } ?> -->


    <script>
        $(document).ready(function() {


            $('#report-submit').click(function() {

                console.log("Button Clicked");

                var description = $('#description').val();
                var reason = $("input[name='reasons']:checked").val();
                var assetID = <?= $_GET['id'] ?>;

                var data = {
                    'description': description,
                    'reason': reason,
                    'assetID': assetID,
                    'report_submit': true,
                };

                $.ajax({
                    url: "/indieabode/asset/report?id=<?= $this->asset['assetID']; ?>",
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

            const months = ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            let releaseDate = "<?= $this->asset['created_at'] ?>";

            let year = releaseDate.substr(0, 4);
            let month = releaseDate.slice(5, 7);
            let day = releaseDate.slice(8, 10);
            let monthName = months[parseInt(month) - 1];
            let formattedReleaseDate = day + " " + monthName + " " + year;

            $('#release-date').text(formattedReleaseDate);


        });

        //getting file extension
        var filename = "<?= $this->asset['assetFile'] ?>";

        var filetype = filename.split('.').pop();

        $('#file-extension').text(filetype);


        $(document).ready(function() {
            //Manage the way buttons are shown for different users, and for those who havent logged in
            <?php if (isset($_SESSION['logged'])) { ?>
                <?php if (!$this->hasClaimed) { ?>
                    <?php if ($this->asset['assetPrice'] == "0") { ?>
                        $('#download-btn').show();
                        $('#buy-btn').hide();
                    <?php } else if ($this->asset['assetPrice'] != "0") { ?>
                        $('#download-btn').hide();
                        $('#buy-btn').show();
                    <?php } ?>
                <?php } else if ($this->hasClaimed && $this->asset['assetPrice'] != "0") { ?>
                    $('#download-btn').show();
                    $('#buy-btn').hide();
                <?php } ?>


                //download buttons for free games
                <?php if ($this->asset['assetPrice'] == "0") { ?>
                    $('#download-btn').show();
                    $('#buy-btn').hide();
                <?php } ?>

                //download buttons for paid games
                <?php if ($this->asset['assetPrice'] != "0") { ?>
                    <?php if ($this->hasClaimed) { ?>
                        $('#download-btn').show();
                        $('#buy-btn').hide();
                    <?php } else if (!$this->hasClaimed) { ?>
                        $('#download-btn').hide();
                        $('#buy-btn').show();
                    <?php } ?>
                <?php } ?>

                //show library and cart buttons for free games
                <?php if ($this->asset['assetPrice'] == "0") { ?>
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
                <?php if ($this->asset['assetPrice'] != "0") { ?>
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
                <?php if ($this->asset['assetPrice'] == "0") { ?>
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
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator") { ?>


                        let assetID = <?= $this->asset['assetID']; ?>;

                        var data = {
                            'assetID': assetID,
                            'add_to_library': true,
                        };

                        $.ajax({
                            url: "/indieabode/asset/addtoLibrary",
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
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator") { ?>

                        let assetID = <?= $this->asset['assetID']; ?>;

                        var data = {
                            'assetID': assetID,
                            'add_to_cart': true,
                        };

                        $.ajax({
                            url: "/indieabode/asset/AddToCart",
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
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator") { ?>
                        window.location.href = "/indieabode/asset/checkout?id=<?= $this->asset['assetID'] ?>";
                    <?php } else { ?>
                        alert("Unauthorized User Role");
                    <?php } ?>
                <?php } else { ?>
                    window.location.href = "/indieabode/login";
                <?php } ?>



            });

            //Downloading the game and showing a flash message thanking
            $('#download-btn').click(function() {

                window.location.href = "/indieabode/asset/downloadAsset?id=<?= $this->asset['assetID'] ?>";


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