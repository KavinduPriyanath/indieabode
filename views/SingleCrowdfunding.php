<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <title>Indieabode</title>
    <style>
        <?php
        include 'public/css/crowdfund.css';
        ?><?php include 'public/css/shareModal.css'; ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="heading">
        <div class="title"><?= $this->crowdfund['title']; ?></div>
        <div class="sub-title">
            <?= $this->crowdfund['tagline']; ?>
        </div>
    </div>
    <div class="crowdfund-details">
        <div class="image-slider">
            <div class="slider">
                <div class="slide active">
                    <img src="/indieabode/public/uploads/crowdfundings/screenshots/<?= $this->screenshots[0]; ?>" alt="" />
                </div>
                <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                    <div class="slide">
                        <img src="/indieabode/public/uploads/crowdfundings/screenshots/<?= $this->screenshots[$i]; ?>" alt="" />
                    </div>
                <?php } ?>

                <div class="navigation">
                    <i class="fas fa-chevron-left prev-btn"></i>
                    <i class="fas fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>
        </div>
        <div class="crowdfund-overview">
            <div class="amount-tracker">
                <span>$<?= $this->crowdfund['currentAmount']; ?></span> raised of $<?= $this->crowdfund['expectedAmount']; ?> goal
            </div>


            <div class="progress-bar">
                <div class="progress-bar-background">
                    <div class="progress"></div>
                </div>
            </div>
            <div class="backer-count"><?= $this->crowdfund['backers']; ?></div>
            <div class="backers">backers</div>
            <div class="days-left">3</div>
            <div class="days-caption">days to go</div>

            <br>
            <div class="btn" data-modal-target="#modal">Share</div>
            <div class="btn" data-modal-target="#donation-modal">Back this Game</div>
            <div class="semibtnbox">
                <div class="semi-btn">Remind Me<i class="fa fa-bookmark-o"></i></div>
                <div class="semi-btn">Notify me on Launch<i class="fa fa-bell-o"></i></div>
            </div>
            <div class="warning">
                After backing this project you will not be able to request for any
                refundss
            </div>
        </div>
    </div>
    <div class="crowdfund-content">
        <div class="details"><?= $this->crowdfund['details']; ?></div>
        <div class="backer-details">
            <h3>Backers</h3>
            <?php foreach ($this->backers as $backer) { ?>
                <div class="backer-info">
                    <div class="row-one">
                        <div class="backer-pp"><img src="public/images/avatars/<?= $backer['avatar'] ?>" alt=""></div>
                        <div class="right-side">
                            <div class="backer-name"><?= $backer['username']; ?></div>
                            <div class="row-two">
                                <div class="backed-amount">$<?= $backer['donationAmount']; ?></div>
                                <div class="backed-date"><i class="fa fa-circle"></i>10 days ago</div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="share-modal">
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Help by sharing</div>
                <button data-close-button class="close-button">&times;</button>
            </div>

            <div class="content">
                <p>Fundraisers shared on social networks raise up to 5x more.</p>
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
                    <input type="text" readonly value=" http://localhost/indieabode/crowdfund?id=<?= $this->crowdfund['crowdFundID']; ?>" id="copytext">
                    <button id="copy">Copy</button>
                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>


    <!-- Donation Modal -->
    <div class="share-modal">
        <div class="modal" id="donation-modal">
            <div class="modal-header">
                <div class="title">Make a Donation</div>
                <button data-close-button class="close-button">&times;</button>
            </div>

            <div class="content">
                <p>Support "game name" to "crowdfund goal - develop"</p>
                <input type="text" name="donation-amount" id="donation-amount">
                <div class="donation-presets">
                    <div class="preset" id="two" onclick="Donation('30.00')">
                        $30.00
                    </div>
                    <div class="preset" id="five" onclick="Donation('50.00')">
                        $50.00
                    </div>
                    <div class="preset" id="ten" onclick="Donation('100.00')">
                        $100.00
                    </div>
                    <div class="preset" id="fifty" onclick="Donation('150.00')">
                        $150.00
                    </div>
                    <div class="preset" id="hundred" onclick="Donation('200.00')">
                        $200.00
                    </div>
                </div>
                <div class="donate-btn" onclick="MakeADonation(<?= $this->crowdfund['crowdFundID'] ?>, document.getElementById('donation-amount').value)">
                    Donate
                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/gig.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>


    <script>
        let field = document.querySelector(".field");
        let input = document.getElementById('copytext');
        let copy = document.getElementById('copy');

        copy.onclick = () => {
            input.select(); //select input value
            if (document.execCommand("copy")) { //if the selected text copy
                field.classList.add("active");
                copy.innerText = "Copied";
                setTimeout(() => {
                    window.getSelection().removeAllRanges(); //remove selection from document
                    field.classList.remove("active");
                    copy.innerText = "Copy";
                }, 3000);
            }
        }
    </script>


    <script>
        const inputField = document.getElementById("donation-amount");

        function Donation(amount) {
            inputField.value = amount;
        }
    </script>


    <script>
        function MakeADonation(id, donationAmount) {

            var f = new FormData();

            f.append("donationAmount", donationAmount);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {

                if (xhr.readyState == 3) {
                    //console.log("processing");
                } else if (xhr.readyState == 4) {

                    var text = xhr.responseText;

                    var obj = JSON.parse(text);

                    //payment gateway goes here

                    // Payment completed. It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        // console.log("Payment completed. OrderID:" + orderId);
                        // alert("Payment Completed");
                        // Note: validate the payment and show success or failure page to the customer
                        // window.location = "/indieabode/paymentTest/purchaseSuccessful?id=" + id;
                        DonationSuccessful(id, obj['amount'], obj['order_id']);
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
                        "notify_url": "",
                        "order_id": obj['order_id'],
                        "items": "Door bell wireles",
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


            xhr.open("POST", "/indieabode/crowdfund/donation?id=" + id, true);
            xhr.send(f);

        }


        function DonationSuccessful(crowdfundID, amount, orderId) {

            var f = new FormData();

            f.append("orderID", orderId);
            f.append("amount", amount);


            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                if (xhr.readyState == 1) {
                    console.log("waiting");
                } else if (xhr.readyState == 4) {
                    var t = xhr.responseText;


                    if (t == "2") {
                        alert(t);
                    } else {
                        window.location = "/indieabode/crowdfund?id=" + crowdfundID;
                    }

                }

            }

            xhr.open("POST", "/indieabode/crowdfund/donationsuccessful?id=" + crowdfundID, true);
            xhr.send(f);

            // window.location = "/indieabode/paymentTest/purchaseSuccessful?id=" + assetID;


        }
    </script>

</body>



</html>