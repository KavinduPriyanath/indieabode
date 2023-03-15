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

    <?php
    foreach ($this->myAssets as $myAsset) { ?>
        <h3><?= $myAsset['assetName']; ?></h3>
    <?php
    }
    ?>


    <div class="cart-container">
        <h2>My Cart</h2>
        <div class="content">
            <div class="cart-items">
                <hr>
                <div class="cart-item">
                    <div class="cart-left">
                        <div class="item-logo"><img src="" alt=""></div>
                        <div class="item-info">
                            <div class="item-category">3D Model</div>
                            <div class="item-name">Asset Name</div>
                        </div>
                    </div>
                    <div class="cart-right">
                        <div class="price">$19.90</div>
                        <div class="remove">Remove</div>
                    </div>
                </div>

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


</body>



</html>