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

    <h2 id="heading"><?= $this->asset['assetName'] ?></h2>

    <div class="topics">
        <a href="/indieabode/asset?id=<?= $this->asset['assetID'] ?>">Overview
        </a>
        <a href="/indieabode/asset/reviews?id=<?= $this->asset['assetID'] ?>">Reviews</a>
    </div>
    <hr id="topic-break">



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


    <script src="<?php echo BASE_URL; ?>public/js/assets.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>



</html>