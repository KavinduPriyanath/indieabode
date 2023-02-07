<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include('public/css/checkout.css');
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h1>Checkout</h1>
    <div class="content">
        <div class="payment-details"></div>
        <div class="order-summary">
            <a href="/indieabode/asset/download?id=<?= $this->asset['assetID'] ?>">
                <div class="order-button">
                    Place Order
                </div>
            </a>
        </div>
    </div>


    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>