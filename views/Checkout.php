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

    <div class="checkout-container">
        <h1>Checkout</h1>

        <div class="content">
            <div class="payment-details">
                <hr />
                <div class="heading">Payment Method</div>
                <div class="card-header">
                    <div class="card-logo">
                        <img src="/indieabode/public/images/checkout/card-logo.png" alt="" />
                    </div>
                    <div class="card-name">Credit Card</div>
                </div>
                <div class="card-details">
                    <div class="title">Card Details</div>
                    <hr />
                    <br />
                    <form action="" method="post">
                        <label for="card-name">Card Name</label><br />
                        <input type="text" id="card-name" name="card-number" class="creditCardText" />

                        <div class="second-input-row">
                            <div class="input">
                                <label for="ex-date">Expiration Date</label>
                                <input type="text" id="ex-date" name="expire-date" />
                            </div>

                            <div class="input">
                                <label for="cvv">CVV</label>
                                <input type="text" />
                            </div>
                        </div>
                        <input type="checkbox" name="" id="" /><label for="">Save my payment information so checkout is easy next time</label>
                    </form>
                </div>
            </div>
            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="checkout-items">
                    <div class="card">
                        <div class="card-image"><img src="/indieabode/public/uploads/assets/cover/<?= $this->asset['assetCoverImg'] ?>" alt="" /></div>
                        <div class="card-details">
                            <p><?= $this->asset['assetName']; ?></p>
                            <p>Developer Name</p>
                        </div>
                    </div>
                </div>
                <div class="checkout-details">
                    <div class="row">
                        <div class="label">Price</div>
                        <div class="value">$19.99</div>
                    </div>
                    <div class="row">
                        <div class="label">Sale Discount</div>
                        <div class="value">-$0.00</div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="label">Total</div>
                        <div class="value">$19.99</div>
                    </div>
                </div>
                <a href="/indieabode/asset/download?id=<?= $this->asset['assetID'] ?>">
                    <div class="order-button">Place Order</div>
                </a>
            </div>
        </div>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        document
            .querySelector(".creditCardText")
            .addEventListener("input", function(e) {
                var foo = this.value.split("-").join("");
                if (foo.length > 0) {
                    foo = foo.match(new RegExp(".{1,4}", "g")).join("-");
                }
                this.value = foo;
            });
    </script>

</body>



</html>