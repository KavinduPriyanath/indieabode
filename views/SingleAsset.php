<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/asset.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



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
                    <p>(246)</p>
                </div>
            </div>

            <div class="views-downloads">
                <img src="/indieabode/public/images/games/view.png" alt="" />
                <p id="views">200</p>
                <img src="/indieabode/public/images/games/download.png" alt="" />
                <p id="downloads">10</p>
            </div>

            <!--Rate & View All-->

            <div class="info-box">
                <button id="rate-btn" onclick="AddReview()">Rate this Asset</button>
                <button id="all-btn">View all by <?= $this->assetCreator['username']; ?></button>
            </div>
        </div>

        <!--Overview-->

        <div class="card">
            <h2 class="asset-name">
                <?= $this->asset['assetName']; ?>
            </h2>
            <div class="profile-info">
                <img src="/indieabode/public/images/games/profile.png" alt="" />
                <p><?= $this->assetCreator['username']; ?></p>
            </div>
            <div class="category"><?= $this->asset['assetType']; ?></div>
            <h1>Free</h1>
            <div class="buy-btn">Buy Now</div>
            <div class="buy-btn">Add to Cart</div>

            <div class="details">
                <div class="row">
                    <p class="title">Release Date</p>
                    <p class="sub-title">5 Nov 2021</p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">Latest Version</p>
                    <p class="sub-title">3.1</p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">File Size</p>
                    <p class="sub-title">113 MB</p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">Extension</p>
                    <p class="sub-title">.zip</p>
                </div>
                <hr />

                <div class="row">
                    <p class="title">License Type</p>
                    <p class="sub-title"><?= $this->asset['assetLicense']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!--Description-->

    <div class="description">
        <?= $this->asset['assetDetails']; ?>
    </div>

    <!--Reviews-->
    <div class="reviews">
        <h1>Reviews</h1>

        <div class="review">
            <div class="left">
                <img src="/indieabode/public/images/games/profile.png" alt="" />
                <p class="username">Kavindu&nbsp;Priyanath</p>
                <p class="assets-count">Assets:&nbsp;27</p>
                <p class="reviews-count">Reviews:&nbsp;11</p>
            </div>
            <div class="right">
                <div class="rating-stars">
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Blank Star.png" alt="" />
                    <p>12 Dec 2021</p>
                </div>
                <h3 class="review-title">Very Customizable</h3>
                <p class="review-detail">
                    Hey! The actual sprite without empty space in the image is about
                    38x20 pixels, but it depends on the animation as in some theres a
                    sword and stuff. So because of that I kept the image size as 120x80
                    pixels for every animation. And the character is centered correctly
                    to be in the middle/bottom of the whole image.
                </p>
            </div>
        </div>

        <div class="review">
            <div class="left">
                <img src="/indieabode/public/images/games/profile.png" alt="" />
                <p class="username">Kavindu&nbsp;Priyanath</p>
                <p class="assets-count">Assets:&nbsp;27</p>
                <p class="reviews-count">Reviews:&nbsp;11</p>
            </div>
            <div class="right">
                <div class="rating-stars">
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Blank Star.png" alt="" />
                    <p>12 Dec 2021</p>
                </div>
                <h3 class="review-title">Very Customizable</h3>
                <p class="review-detail">
                    Hey! The actual sprite without empty space in the image is about
                    38x20 pixels, but it depends on the animation as in some theres a
                    sword and stuff. So because of that I kept the image size as 120x80
                    pixels for every animation. And the character is centered correctly
                    to be in the middle/bottom of the whole image.
                </p>
            </div>
        </div>

        <div class="review">
            <div class="left">
                <img src="/indieabode/public/images/games/profile.png" alt="" />
                <p class="username">Kavindu&nbsp;Priyanath</p>
                <p class="assets-count">Assets:&nbsp;27</p>
                <p class="reviews-count">Reviews:&nbsp;11</p>
            </div>
            <div class="right">
                <div class="rating-stars">
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Filled Star.png" alt="" />
                    <img src="/indieabode/public/images/games/Blank Star.png" alt="" />
                    <p>12 Dec 2021</p>
                </div>
                <h3 class="review-title">Very Customizable</h3>
                <p class="review-detail">
                    Hey! The actual sprite without empty space in the image is about
                    38x20 pixels, but it depends on the animation as in some theres a
                    sword and stuff. So because of that I kept the image size as 120x80
                    pixels for every animation. And the character is centered correctly
                    to be in the middle/bottom of the whole image.
                </p>
            </div>
        </div>


    </div>


    <script src="public/js/assets.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="public/js/navbarcopy.js"></script>
    <?php } ?>

</body>



</html>