<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include('public/css/cart.css');
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="cart-container">
        <h2>My Cart</h2>
        <div class="content">
            <div class="cart-items">
                <hr>
                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer") { ?>
                    <?php foreach ($this->myAssets as $myAsset) { ?>
                        <div class="cart-item">
                            <div class="cart-left">
                                <div class="item-logo"><img src="/indieabode/public/uploads/assets/cover/<?= $myAsset['assetCoverImg']; ?>" alt=""></div>
                                <div class="item-info">
                                    <div class="item-category"><?= $myAsset['assetClassification']; ?></div>
                                    <div class="item-name"><?= $myAsset['assetName']; ?></div>
                                </div>
                            </div>
                            <div class="cart-right">
                                <div class="price"><?= "$" . $myAsset['assetPrice']; ?></div>
                                <a href="/indieabode/cart/removeAssetFromCart?id=<?= $myAsset['assetID']; ?>">
                                    <div class="remove">Remove</div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") { ?>
                    <?php foreach ($this->myGames as $myGame) { ?>
                        <div class="cart-item">
                            <div class="cart-left">
                                <div class="item-logo"><img src="/indieabode/public/uploads/games/cover/<?= $myGame['gameCoverImg']; ?>" alt=""></div>
                                <div class="item-info">
                                    <div class="item-category"><?= $myGame['gameType']; ?></div>
                                    <div class="item-name"><?= $myGame['gameName']; ?></div>
                                </div>
                            </div>
                            <div class="cart-right">
                                <div class="price"><?= "$" . $myGame['gamePrice']; ?></div>
                                <a href="/indieabode/cart/removeGameFromCart?id=<?= $myGame['gameID']; ?>">
                                    <div class="remove">Remove</div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
            <div class="order-summary">
                <h3>Order Summary</h3>

                <div class="order-content">
                    <div class="row">
                        <div class="label">Price</div>
                        <div class="value">$19.99</div>
                    </div>
                    <div class="row">
                        <div class="label">Sale Discount</div>
                        <div class="value">$00.00</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="label">Sub Total</div>
                        <div class="value">$19.99</div>
                    </div>
                </div>

                <a href="/indieabode/asset/download?id=<?= $this->asset['assetID'] ?>">
                    <div class="order-button">Checkout</div>
                </a>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {


            // $('.remove').click(function() {

            //     var review = $('#review').val();
            //     var assetID = ;
            //     var directUrl = "/indieabode/cart/removeFromCart?id=" + assetID;

            //     $.ajax({
            //         url: directUrl,
            //         method: "POST",
            //         data: {
            //             rating_data: rating_data,
            //             review: review,
            //             topic: topic,
            //             recommendation: recommendation,
            //             rating: rating
            //         },
            //         success: function(data) {
            //             $('#modal').removeClass("active");
            //             $('#overlay').removeClass("active");
            //             $('#review-btn').html('Edit Review');

            //             load_rating_data();
            //         }
            //     })

            // });

        });
    </script>


</body>



</html>