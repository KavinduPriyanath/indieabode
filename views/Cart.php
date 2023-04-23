<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                <?php if (isset($_SESSION['logged']) && ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator")) { ?>
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
            <?php if (isset($_SESSION['logged']) && ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator")) { ?>
                <div class="order-summary">
                    <h3>Order Summary</h3>

                    <div class="order-content">
                        <div class="row">
                            <div class="label">Price</div>
                            <div class="value">$<?= $this->cartTotal ?></div>
                        </div>
                        <div class="row">
                            <div class="label">Sale Discount</div>
                            <div class="value">$<?= $this->discountTotal ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="label">Sub Total</div>
                            <div class="value">$<?= $this->subTotal ?></div>
                            <input type="hidden" name="checkout-total" value="<?= $this->subTotal ?>" id="asset-checkout-total">
                        </div>
                    </div>


                    <div class="order-button" id="asset-checkout-btn">Checkout</div>
                    <div class="order-button" id="find-assets-btn">Find Assets</div>

                </div>
            <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") { ?>
                <div class="order-summary">
                    <h3>Order Summary</h3>

                    <div class="order-content">
                        <div class="row">
                            <div class="label">Price</div>
                            <div class="value">$<?= $this->cartTotal ?></div>
                        </div>
                        <div class="row">
                            <div class="label">Sale Discount</div>
                            <div class="value">$<?= $this->discountTotal ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="label">Sub Total</div>
                            <div class="value">$<?= $this->subTotal ?></div>
                            <input type="hidden" name="checkout-total" value="<?= $this->subTotal ?>" id="checkout-total">
                        </div>
                    </div>


                    <div class="order-button" id="checkout-btn">Checkout</div>
                    <div class="order-button" id="find-games-btn">Find Games</div>

                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script>
        $(document).ready(function() {

            //if any games available in gamer's cart show checkout button, otherwise show find games button
            if ($('#checkout-total').val() == "0.00") {
                $('#checkout-btn').hide();
                $('#find-games-btn').show();
            } else {
                $('#checkout-btn').show();
                $('#find-games-btn').hide();
            }

            //checkout game cart
            $("#checkout-btn").click(function(e) {

                var x = new XMLHttpRequest();
                x.onreadystatechange = function() {

                    if (x.readyState == 4) {

                        var text = x.responseText;

                        console.log(text);

                        if (text == "2") {
                            alert("Product Not found");
                        } else {
                            //alert(text);

                            var obj = JSON.parse(text);

                            var buyerID = <?= $_SESSION['id']; ?>;

                            //payment gateway goes here

                            // Payment completed. It can be a successful failure.
                            payhere.onCompleted = function onCompleted(orderId) {
                                // console.log("Payment completed. OrderID:" + orderId);
                                // alert("Payment Completed");
                                // Note: validate the payment and show success or failure page to the customer
                                GameCartCheckoutSuccessful(obj['amount'], obj['order_id']);
                            };

                            // Payment window closed
                            payhere.onDismissed = function onDismissed() {
                                // Note: Prompt user to pay again or show an error page
                                //alert("Payment dismissed");
                            };

                            // Error occurred
                            payhere.onError = function onError(error) {
                                // Note: show an error page
                                // console.log("Error:" + error);
                                alert("Invalid Details");
                            };

                            // Put the payment variables here
                            var payment = {
                                "sandbox": true,
                                "merchant_id": "1222729", // Replace your Merchant ID
                                "return_url": "http://localhost/indieabode/assets", // Important
                                "cancel_url": "http://localhost/indieabode/assets", // Important
                                "notify_url": "",
                                "order_id": obj['order_id'],
                                "items": obj['item'],
                                "amount": obj['amount'],
                                "currency": obj['currency'],
                                "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                                "first_name": obj['firstName'],
                                "last_name": obj['lastName'],
                                "email": obj['email'],
                                "phone": "0771234567",
                                "address": obj['address'],
                                "city": obj['city'],
                                "country": obj['country'],
                                "delivery_address": "No. 46, Galle road, Kalutara South",
                                "delivery_city": "Kalutara",
                                "delivery_country": "Sri Lanka",
                                "custom_1": "",
                                "custom_2": ""
                            };

                            // Show the payhere.js popup, when "PayHere Pay" is clicked
                            // document.getElementById('payhere-payment').onclick = function(e) {
                            payhere.startPayment(payment);
                            // };
                        }

                    }

                };

                x.open("GET", "/indieabode/cart/cartGameCheckout", true);
                x.send();

            });

            //if game cart checkout succeeded
            function GameCartCheckoutSuccessful(amount, orderId) {

                var f = new FormData();

                f.append("orderID", orderId);
                f.append("amount", amount);


                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {

                    if (xhr.readyState == 4) {
                        var t = xhr.responseText;


                        if (t == "2") {
                            alert(t);
                        } else {
                            alert(t);
                        }

                    }

                }

                xhr.open("POST", "/indieabode/cart/cartGameCheckoutSuccessful", true);
                xhr.send(f);
            }


            //if any assets available in developer's cart show checkout button, otherwise show find assets button
            if ($('#asset-checkout-total').val() == "0.00") {
                $('#asset-checkout-btn').hide();
                $('#find-assets-btn').show();
            } else {
                $('#asset-checkout-btn').show();
                $('#find-assets-btn').hide();
            }

            //checkout assets cart
            $("#asset-checkout-btn").click(function(e) {

                var x = new XMLHttpRequest();
                x.onreadystatechange = function() {

                    if (x.readyState == 4) {

                        var text = x.responseText;

                        console.log(text);

                        if (text == "2") {
                            alert("Product Not found");
                        } else {
                            //alert(text);

                            var obj = JSON.parse(text);

                            var buyerID = <?= $_SESSION['id']; ?>;

                            //payment gateway goes here

                            // Payment completed. It can be a successful failure.
                            payhere.onCompleted = function onCompleted(orderId) {
                                // console.log("Payment completed. OrderID:" + orderId);
                                // alert("Payment Completed");
                                // Note: validate the payment and show success or failure page to the customer
                                //GameCartCheckoutSuccessful(obj['amount'], obj['order_id']);
                                AssetCartCheckoutSuccessful(obj['amount'], obj['order_id']);
                            };

                            // Payment window closed
                            payhere.onDismissed = function onDismissed() {
                                // Note: Prompt user to pay again or show an error page
                                //alert("Payment dismissed");
                            };

                            // Error occurred
                            payhere.onError = function onError(error) {
                                // Note: show an error page
                                // console.log("Error:" + error);
                                alert("Invalid Details");
                            };

                            // Put the payment variables here
                            var payment = {
                                "sandbox": true,
                                "merchant_id": "1222729", // Replace your Merchant ID
                                "return_url": "http://localhost/indieabode/assets", // Important
                                "cancel_url": "http://localhost/indieabode/assets", // Important
                                "notify_url": "",
                                "order_id": obj['order_id'],
                                "items": obj['item'],
                                "amount": obj['amount'],
                                "currency": obj['currency'],
                                "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                                "first_name": obj['firstName'],
                                "last_name": obj['lastName'],
                                "email": obj['email'],
                                "phone": "0771234567",
                                "address": obj['address'],
                                "city": obj['city'],
                                "country": obj['country'],
                                "delivery_address": "No. 46, Galle road, Kalutara South",
                                "delivery_city": "Kalutara",
                                "delivery_country": "Sri Lanka",
                                "custom_1": "",
                                "custom_2": ""
                            };

                            // Show the payhere.js popup, when "PayHere Pay" is clicked
                            // document.getElementById('payhere-payment').onclick = function(e) {
                            payhere.startPayment(payment);
                            // };
                        }

                    }

                };

                x.open("GET", "/indieabode/cart/cartAssetCheckout", true);
                x.send();

            });

            //if asset cart checkout succeeded
            function AssetCartCheckoutSuccessful(amount, orderId) {

                var f = new FormData();

                f.append("orderID", orderId);
                f.append("amount", amount);


                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {

                    if (xhr.readyState == 4) {
                        var t = xhr.responseText;


                        if (t == "2") {
                            alert(t);
                        } else {
                            alert("assets checked out");
                        }

                    }

                }

                xhr.open("POST", "/indieabode/cart/cartAssetCheckoutSuccessful", true);
                xhr.send(f);
            }


        });
    </script>


</body>



</html>