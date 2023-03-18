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
        <h2>Checkout</h2>

        <div class="content">
            <div class="payment-details">
                <hr />
                <div class="heading">Payment Method</div>
                <div class="payment-content">
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
                            <div class="card-name">
                                <label for="card-name">Card Name</label><br />
                                <input type="text" id="card-name" name="card-number" class="creditCardText" />
                            </div>

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
            </div>
            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="checkout-items">
                    <div class="card">
                        <div class="card-image"><img src="/indieabode/public/uploads/assets/cover/<?= $this->asset['assetCoverImg'] ?>" alt="" /></div>
                        <div class="card-details">
                            <p id="itemName"><?= $this->asset['assetName']; ?></p>
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
                <div class="help">
                    <div class="need-help">Need Help?</div>
                    <div class="contact">Contact Us</div>
                </div>
                <hr id="btn-break">
                <!-- <a href="/indieabode/asset/download?id=<?= $this->asset['assetID'] ?>"> -->
                <div class="order-button" onclick="Test(<?= $this->asset['assetID'] ?>)">Place Order</div>
                <!-- </a> -->
            </div>
        </div>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

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

    <script>
        function Test(id) {

            var x = new XMLHttpRequest();
            x.onreadystatechange = function() {

                if (x.readyState == 4) {

                    var text = x.responseText;

                    if (text == "2") {
                        alert("Product Not found");
                    } else {
                        alert(text);

                        var obj = JSON.parse(text);

                        //payment gateway goes here

                        // Payment completed. It can be a successful failure.
                        payhere.onCompleted = function onCompleted(orderId) {
                            // console.log("Payment completed. OrderID:" + orderId);
                            alert("Payment Completed");
                            // Note: validate the payment and show success or failure page to the customer
                        };

                        // Payment window closed
                        payhere.onDismissed = function onDismissed() {
                            // Note: Prompt user to pay again or show an error page
                            alert("Payment dismissed");
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
                            "notify_url": "http://sample.com/notify",
                            "order_id": obj['order_id'],
                            "items": "Door bell wireles",
                            "amount": obj['amount'],
                            "currency": obj['currency'],
                            "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                            "first_name": "Saman",
                            "last_name": "Perera",
                            "email": "samanp@gmail.com",
                            "phone": "0771234567",
                            "address": "No.1, Galle Road",
                            "city": "Colombo",
                            "country": "Sri Lanka",
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

            x.open("GET", "/indieabode/paymentTest?id=" + id, true);
            x.send();

        }
    </script>

</body>



</html>