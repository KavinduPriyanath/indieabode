<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gig.css';
        include 'public/css/shareModal.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!--Gig title goes here-->
    <h2 id="gig-title"><?= $this->gig['gigName']; ?></h2>

    <div class="first-row">
        <div class="image-slider">
            <div class="slider">
                <div class="slide active">
                    <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[0]; ?>" alt="" />
                </div>
                <?php for ($i = 1; $i < $this->ssCount; $i++) { ?>
                    <div class="slide">
                        <img src="/indieabode/public/uploads/gigs/screenshots/<?= $this->screenshots[$i]; ?>" alt="" />
                    </div>
                <?php } ?>


                <div class="navigation">
                    <i class="fa fa-chevron-left prev-btn"></i>
                    <i class="fa fa-chevron-right next-btn"></i>
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
        <div class="gig-summary">
            <h4>Game Summary</h4>
            <div class="summary-details">
                <div class="row">
                    <div class="col-1">Game Name</div>
                    <div class="col-2"><?= $this->gig['game']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Genre</div>
                    <div class="col-2">2D Platformer</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Platform</div>
                    <div class="col-2">Windows</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Current Stage</div>
                    <div class="col-2"><?= $this->gig['currentStage']; ?>6 Months</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Planned Release</div>
                    <div class="col-2"><?= $this->gig['plannedReleaseDate']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Expected Cost</div>
                    <div class="col-2">$<?= $this->gig['expectedCost']; ?></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Estimated Share</div>
                    <div class="col-2"><?= $this->gig['estimatedShare']; ?>%</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-1">Status</div>
                    <div class="col-2">Paused</div>
                </div>
                <hr />
            </div>
            <div class="buy-button" id="buy-order" data-modal-target="#purchase-modal">Buy Order</div>
            <div class="buy-button" id="see-dashboard">Go to Dashboard</div>
        </div>
    </div>


    <div class="accordion">
        <div class="contentBox" id="collapse" onclick="Accordion()">
            <div class="label">Details</div>
            <div class="content">
                <div class="second-row">
                    <div class="rich-text"><?= $this->gig['gigDetails']; ?></div>
                    <div class="developer-summary">
                        <h2>About Developer</h2>
                        <div class="dev-profile">
                            <div class="image">
                                <img src="" alt="" />
                            </div>
                            <div class="dev-name">
                                <h4>Kavindu Priyanath</h4>
                                <div class="trust-rank">Trust Rank: 2</div>
                            </div>
                        </div>

                        <div class="dev-row">
                            <h3>From</h3>
                            <div class="info">Sri Lanka</div>
                        </div>
                        <div class="dev-row">
                            <h3>Email</h3>
                            <div class="info">kavindupriyanath@gmail.com</div>
                        </div>
                        <div class="dev-row">
                            <h3>Avg. Response Time</h3>
                            <div class="info">2 hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="bottom-row">
        <div class="wrapper">
            <section class="chat-area">
                <div class="header">
                    <div class="name">Kavindu</div>
                    <div class="role">Game Developer</div>
                </div>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" class="incoming_id" name="incoming_id" value="<?php if ($_SESSION['userRole'] == "game publisher") {
                                                                                            echo $this->currentRequest['developerID'];
                                                                                        } else if ($_SESSION['userRole'] == "game developer") {
                                                                                            echo $this->currentRequest['publisherID'];
                                                                                        } ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                    <button class="sendBtn" onclick="sendMessage(<?= $_SESSION['id']; ?>, <?= $this->gig['gigID']; ?>)"><i class='fab fa-telegram-plane'></i></button>
                </form>
            </section>
        </div>
        <div class="customization-menu">

            <div class="customization-header">
                <h2>Customize Your Order</h2>
            </div>

            <div class="customization-table">
                <div class="customization1">
                    <div class="topic-custom-row">

                        <div class="column1">
                            Expected Cost
                        </div>
                        <div class="column2">
                            Publisher
                        </div>
                        <div class="column3">
                            Developer
                        </div>

                    </div>
                    <div class="first-custom-row">

                        <div class="column1">
                            <input type="text" name="cost" id="cost" value="<?= $this->currentRequest['cost'] ?>">
                        </div>
                        <div class="column2">
                            <div id="pub-cost">
                                <div class="accept-text" id="publisher-cost">
                                    Accept
                                </div>
                                <input type="hidden" name="pub-cost" id="pub-cost-input" value="<?= $this->currentRequest['publisherCostApproval'] ?>">
                            </div>
                            <div class="approved" id="publisher-cost-approval">
                                <img src="/indieabode/public/images/publisher/approved.png" alt="">
                            </div>
                        </div>
                        <div class="column3">
                            <div id="dev-cost">
                                <div class="accept-text" id="developer-cost">
                                    Accept
                                </div>
                                <input type="hidden" name="dev-cost" id="dev-cost-input" value="<?= $this->currentRequest['developerCostApproval'] ?>">
                            </div>
                            <div class="approved" id="developer-cost-approval">
                                <img src="/indieabode/public/images/publisher/approved.png" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="reset" id="reset-cost">Reset Cost Settings</div>
                </div>

                <div class="customization2">
                    <div class="topic-custom-row">

                        <div class="column1">
                            Estimated Share
                        </div>
                        <div class="column2">
                            Publisher

                        </div>
                        <div class="column3">
                            Developer
                        </div>

                    </div>
                    <div class="second-custom-row">

                        <div class="column1">
                            <input type="number" name="share" id="share" value="<?= $this->currentRequest['share'] ?>" min=1 max=100>
                        </div>
                        <div class="column2">
                            <div id="pub-share">
                                <div class="accept-text" id="publisher-share">
                                    Accept
                                </div>
                                <input type="hidden" name="pub-share" id="pub-share-input" value="<?= $this->currentRequest['publisherShareApproval'] ?>">
                            </div>
                            <div class="approved" id="publisher-share-approval">
                                <img src="/indieabode/public/images/publisher/approved.png" alt="">
                            </div>
                        </div>
                        <div class="column3">
                            <div id="dev-share">
                                <div class="accept-text" id="developer-share">
                                    Accept
                                </div>
                                <input type="hidden" name="dev-share" id="dev-share-input" value="<?= $this->currentRequest['developerShareApproval'] ?>">
                            </div>
                            <div class="approved" id="developer-share-approval">
                                <img src="/indieabode/public/images/publisher/approved.png" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="reset" id="reset-share">Reset Share Settings</div>
                </div>

            </div>

            <div class="negotiation-status" id="negotiation-success">
                <div class="success" id="success">
                    Negotiation Successful
                </div>
                <div class="updated-values">
                    <div class="value-type">Expected Cost</div>
                    <div class="gig-value"><span class="old-value">$<?= $this->gig['expectedCost']; ?></span><i class="fa fa-arrow-right"></i><span class="new-value" id="newCost"></span></div>
                </div>
                <div class="updated-values">
                    <div class="value-type">Estimated Share</div>
                    <div class="gig-value"><span class="old-value"><?= $this->gig['estimatedShare']; ?>%</span><i class="fa fa-arrow-right"></i><span class="new-value" id="newShare"></span></div>
                </div>
            </div>


        </div>
    </div>


    <!-- Purchase Modal -->
    <div class="share-modal">
        <div class="modal" id="purchase-modal">
            <div class="modal-header">
                <div class="title">Purchase this gig</div>
                <button data-close-button class="close-button">&times;</button>
            </div>

            <div class="content">
                <p>Support "game name" to "crowdfund goal - develop"</p>
                <div class="donate-btn" onclick="PurchaseGig(<?= $this->gig['gigID'] ?>, document.getElementById('cost').value)">
                    Proceed
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
        function PurchaseGig(id, publisherCost) {

            var f = new FormData();

            f.append("publisherCost", publisherCost);

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
                        // DonationSuccessful(id, obj['amount'], obj['order_id']);
                        console.log("purchase saved in payhere");
                        PurchaseSuccessful(id, document.getElementById('share').value, obj['order_id'], <?= $this->gig['gameDeveloperID'] ?>, publisherCost)
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


            xhr.open("POST", "/indieabode/gig/purchaseGig?id=" + id, true);
            xhr.send(f);

        }

        function PurchaseSuccessful(gigID, share, orderId, developerID, cost) {

            var f = new FormData();

            f.append("orderID", orderId);
            f.append("developerID", developerID);
            f.append("share", share);
            f.append("cost", cost);


            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                if (xhr.readyState == 1) {
                    console.log("waiting");
                } else if (xhr.readyState == 4) {
                    var t = xhr.responseText;

                    // alert(t);

                    if (t == "2") {
                        alert(t);
                    } else {
                        window.location = "/indieabode/gig/viewgig?id=" + gigID + "&token=" + gigID + "" + <?= $_SESSION['id'] ?>;
                    }

                }

            }

            xhr.open("POST", "/indieabode/gig/gigPurchaseSuccessful?id=" + gigID, true);
            xhr.send(f);

            // window.location = "/indieabode/paymentTest/purchaseSuccessful?id=" + assetID;


        }
    </script>


    <script>
        function ButtonClick() {
            alert("Cant perform this action as a gamedeveloper");
        }

        function Accordion() {
            document.getElementById('collapse').classList.toggle('active');
        }
    </script>

    <script>
        $(document).ready(function() {

            //if both publisher and developer has not come to an agreement on both cost and share then prevent the publisher from buying the gig
            <?php if ($this->currentRequest['eligible'] == 0) { ?>
                $('#buy-order').hide();
            <?php } else { ?>
                $('#buy-order').show();
            <?php } ?>



            <?php if ($this->currentRequest['publisherCostApproval'] == "Approved") { ?>
                $('#publisher-cost-approval').show();
                $('#publisher-cost').hide();
                $('#cost').prop("readonly", true);
            <?php } else if ($this->currentRequest['publisherCostApproval'] == "null") { ?>
                $('#publisher-cost-approval').hide();

            <?php } ?>


            <?php if ($this->currentRequest['developerCostApproval'] == "Approved") { ?>
                $('#developer-cost-approval').show();
                $('#developer-cost').hide();
                $('#cost').prop("readonly", true);
            <?php } else if ($this->currentRequest['developerCostApproval'] == "null") { ?>
                $('#developer-cost-approval').hide();
            <?php } ?>

            <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                <?php if ($this->currentRequest['eligible'] == 1 && $this->gig['gigStatus'] == 0) { ?>
                    $('#buy-order').show();
                    $('#newCost').html("$" + $('#cost').val());
                    $('#newShare').html($('#share').val() + "%");
                    $('#negotiation-success').show();
                <?php } else if ($this->currentRequest['eligible'] == 1 && $this->gig['gigStatus'] == 1) { ?>
                    $('#buy-order').hide();
                    $('#see-dashboard').show();
                <?php } else if ($this->currentRequest['eligible'] == 0) { ?>
                    $('#buy-order').hide();
                <?php } ?>
            <?php } else { ?>
                $('#buy-order').hide();
            <?php } ?>

            <?php if ($_SESSION['userRole'] == "game developer") { ?>
                <?php if ($this->currentRequest['eligible'] == 1) { ?>
                    $('#newCost').html("$" + $('#cost').val());
                    $('#newShare').html($('#share').val() + "%");
                    $('#negotiation-success').show();
                <?php } ?>
            <?php } ?>

            if ($('#pub-cost-input').val() == "Approved" && $('#dev-cost-input').val() == "Approved") {

                $('#reset-cost').css('pointer-events', 'none');
                $('#reset-cost').css('background-color', '#7897b5');

            }

            if ($('#pub-share-input').val() == "Approved" && $('#dev-share-input').val() == "Approved") {

                $('#reset-share').css('pointer-events', 'none');
                $('#reset-share').css('background-color', '#7897b5');

            }


            <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                $('#pub-cost').click(function() {

                    $('#pub-cost-input').val("Approved");

                    let gigToken = <?= $_GET['token'] ?>;
                    let cost = $('#cost').val();
                    let share = $('#share').val();
                    let publisherCostApproval = "Approved";
                    let developerCostApproval = $('#dev-cost-input').val();

                    let publisherShareApproval = $('#pub-share-input').val();
                    let developerShareApproval = $('#dev-share-input').val();

                    var data = {
                        'gigToken': gigToken,
                        'cost': cost,
                        'share': share,
                        'pubCostAppr': publisherCostApproval,
                        'devCostAppr': developerCostApproval,
                        'pubShareAppr': publisherShareApproval,
                        'devShareAppr': developerShareApproval,
                        'gig_request_update': true,
                    };

                    $.ajax({
                        url: "/indieabode/gig/updateCurrentRequest",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            $('#publisher-cost-approval').show();
                            $('#publisher-cost').hide();
                            $('#cost').prop("readonly", true);

                            if (response == "1") {

                                $('#newCost').html("$" + $('#cost').val());
                                $('#newShare').html($('#share').val() + "%");
                                $('#negotiation-success').show();

                                <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                                    $('#buy-order').show();
                                <?php } ?>

                                if (developerCostApproval == "Approved" && publisherCostApproval == "Approved") {
                                    $('#reset-cost').css('pointer-events', 'none');
                                    $('#reset-cost').css('background-color', '#7897b5');
                                }
                            }
                        }
                    })

                });
            <?php } ?>

            <?php if ($_SESSION['userRole'] == "game developer") { ?>
                $('#dev-cost').click(function() {

                    $('#dev-cost-input').val("Approved");

                    let gigToken = <?= $_GET['token'] ?>;
                    let cost = $('#cost').val();
                    let share = $('#share').val();
                    let publisherCostApproval = $('#pub-cost-input').val();
                    let developerCostApproval = "Approved";

                    let publisherShareApproval = $('#pub-share-input').val();
                    let developerShareApproval = $('#dev-share-input').val();

                    var data = {
                        'gigToken': gigToken,
                        'cost': cost,
                        'share': share,
                        'pubCostAppr': publisherCostApproval,
                        'devCostAppr': developerCostApproval,
                        'pubShareAppr': publisherShareApproval,
                        'devShareAppr': developerShareApproval,
                        'gig_request_update': true,
                    };

                    $.ajax({
                        url: "/indieabode/gig/updateCurrentRequest",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            $('#developer-cost-approval').show();
                            $('#developer-cost').hide();
                            $('#cost').prop("readonly", true);

                            if (response == "1") {

                                $('#newCost').html("$" + $('#cost').val());
                                $('#newShare').html($('#share').val() + "%");
                                $('#negotiation-success').show();

                                <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                                    $('#buy-order').show();
                                <?php } ?>

                                if (developerCostApproval == "Approved" && publisherCostApproval == "Approved") {
                                    $('#reset-cost').css('pointer-events', 'none');
                                    $('#reset-cost').css('background-color', '#7897b5');
                                }
                            }
                        }
                    })

                });
            <?php } ?>

            $('#reset-cost').click(function() {

                $('#dev-cost-input').val("null");
                $('#pub-cost-input').val("null");

                let gigToken = <?= $_GET['token'] ?>;
                let cost = <?= $this->gig['expectedCost']; ?>;
                let share = $('#share').val();
                let publisherCostApproval = "null";
                let developerCostApproval = "null";

                let publisherShareApproval = $('#pub-share-input').val();
                let developerShareApproval = $('#dev-share-input').val();

                var data = {
                    'gigToken': gigToken,
                    'cost': cost,
                    'share': share,
                    'pubCostAppr': publisherCostApproval,
                    'devCostAppr': developerCostApproval,
                    'pubShareAppr': publisherShareApproval,
                    'devShareAppr': developerShareApproval,
                    'gig_request_update': true,
                };

                $.ajax({
                    url: "/indieabode/gig/updateCurrentRequest",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        $('#developer-cost-approval').hide();
                        $('#publisher-cost-approval').hide();
                        $('#publisher-cost').show();
                        $('#developer-cost').show();
                        $('#cost').val(<?= $this->gig['expectedCost']; ?>)
                        $('#cost').prop("readonly", false);
                    }
                })

            });


            <?php if ($this->currentRequest['publisherShareApproval'] == "Approved") { ?>
                $('#publisher-share-approval').show();
                $('#publisher-share').hide();
                $('#share').prop("readonly", true);
            <?php } else if ($this->currentRequest['publisherShareApproval'] == "null") { ?>
                $('#publisher-share-approval').hide();

            <?php } ?>


            <?php if ($this->currentRequest['developerShareApproval'] == "Approved") { ?>
                $('#developer-share-approval').show();
                $('#developer-share').hide();
                $('#share').prop("readonly", true);
            <?php } else if ($this->currentRequest['developerShareApproval'] == "null") { ?>
                $('#developer-share-approval').hide();
            <?php } ?>


            <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                $('#pub-share').click(function() {

                    $('#pub-share-input').val("Approved");

                    let gigToken = <?= $_GET['token'] ?>;
                    let cost = $('#cost').val();
                    let share = $('#share').val();
                    let publisherCostApproval = $('#pub-cost-input').val();
                    let developerCostApproval = $('#dev-cost-input').val();

                    let publisherShareApproval = "Approved";
                    let developerShareApproval = $('#dev-share-input').val();

                    var data = {
                        'gigToken': gigToken,
                        'cost': cost,
                        'share': share,
                        'pubCostAppr': publisherCostApproval,
                        'devCostAppr': developerCostApproval,
                        'pubShareAppr': publisherShareApproval,
                        'devShareAppr': developerShareApproval,
                        'gig_request_update': true,
                    };

                    $.ajax({
                        url: "/indieabode/gig/updateCurrentRequest",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            $('#publisher-share-approval').show();
                            $('#publisher-share').hide();
                            $('#share').prop("readonly", true);

                            if (response == "1") {
                                $('#newCost').html("$" + $('#cost').val());
                                $('#newShare').html($('#share').val() + "%");
                                $('#negotiation-success').show();

                                <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                                    $('#buy-order').show();
                                <?php } ?>

                                if (developerShareApproval == "Approved" && publisherShareApproval == "Approved") {
                                    $('#reset-share').css('pointer-events', 'none');
                                    $('#reset-share').css('background-color', '#7897b5');
                                }
                            }
                        }
                    })

                });
            <?php } ?>


            <?php if ($_SESSION['userRole'] == "game developer") { ?>
                $('#dev-share').click(function() {

                    $('#dev-share-input').val("Approved");

                    let gigToken = <?= $_GET['token'] ?>;
                    let cost = $('#cost').val();
                    let share = $('#share').val();
                    let publisherCostApproval = $('#pub-cost-input').val();
                    let developerCostApproval = $('#dev-cost-input').val();

                    let publisherShareApproval = $('#pub-share-input').val();
                    let developerShareApproval = "Approved";

                    var data = {
                        'gigToken': gigToken,
                        'cost': cost,
                        'share': share,
                        'pubCostAppr': publisherCostApproval,
                        'devCostAppr': developerCostApproval,
                        'pubShareAppr': publisherShareApproval,
                        'devShareAppr': developerShareApproval,
                        'gig_request_update': true,
                    };

                    $.ajax({
                        url: "/indieabode/gig/updateCurrentRequest",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            $('#developer-share-approval').show();
                            $('#developer-share').hide();
                            $('#share').prop("readonly", true);

                            if (response == "1") {
                                $('#newCost').html("$" + $('#cost').val());
                                $('#newShare').html($('#share').val() + "%");
                                $('#negotiation-success').show();

                                <?php if ($_SESSION['userRole'] == "game publisher") { ?>
                                    $('#buy-order').show();
                                <?php } ?>

                                if (developerShareApproval == "Approved" && publisherShareApproval == "Approved") {
                                    $('#reset-share').css('pointer-events', 'none');
                                    $('#reset-share').css('background-color', '#7897b5');
                                }
                            }
                        }
                    })

                });
            <?php } ?>

            $('#reset-share').click(function() {

                $('#dev-share-input').val("null");
                $('#pub-share-input').val("null");

                let gigToken = <?= $_GET['token'] ?>;
                let cost = $('#cost').val();
                let share = <?= $this->gig['estimatedShare']; ?>;
                let publisherCostApproval = $('#pub-cost-input').val();
                let developerCostApproval = $('#dev-cost-input').val();

                let publisherShareApproval = "null";
                let developerShareApproval = "null";

                var data = {
                    'gigToken': gigToken,
                    'cost': cost,
                    'share': share,
                    'pubCostAppr': publisherCostApproval,
                    'devCostAppr': developerCostApproval,
                    'pubShareAppr': publisherShareApproval,
                    'devShareAppr': developerShareApproval,
                    'gig_request_update': true,
                };

                $.ajax({
                    url: "/indieabode/gig/updateCurrentRequest",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        $('#developer-share-approval').hide();
                        $('#publisher-share-approval').hide();
                        $('#publisher-share').show();
                        $('#developer-share').show();
                        $('#share').val(<?= $this->gig['estimatedShare']; ?>)
                        $('#share').prop("readonly", false);
                    }
                })

            });


        });
    </script>



    <script>
        const form = document.querySelector(".typing-area"),
            incoming_id = form.querySelector(".incoming_id").value,
            inputField = form.querySelector(".input-field"),
            sendBtn = form.querySelector(".sendBtn"),
            chatBox = document.querySelector(".chat-box");


        let receiverId = <?php if ($_SESSION['userRole'] == "game publisher") {
                                echo $this->currentRequest['developerID'];
                            } else if ($_SESSION['userRole'] == "game developer") {
                                echo $this->currentRequest['publisherID'];
                            } ?>;

        console.log(receiverId);

        form.onsubmit = (e) => {
            e.preventDefault();
        };

        inputField.focus();
        inputField.onkeyup = () => {
            if (inputField.value != "") {
                sendBtn.classList.add("active");
            } else {
                sendBtn.classList.remove("active");
            }
        };

        //sending messages
        function sendMessage(sender, gig) {
            var f = new FormData(form);

            f.append("senderID", sender);
            //f.append("receiverID", receiver);
            f.append("gigID", gig);

            for (const value of f.values()) {
                console.log(value);
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/indieabode/gig/sendMessages", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        inputField.value = "";
                        scrollToBottom();
                    }
                }
            };
            xhr.send(f);
        };
        chatBox.onmouseenter = () => {
            chatBox.classList.add("active");
        };

        chatBox.onmouseleave = () => {
            chatBox.classList.remove("active");
        };

        setInterval(() => {
            let gigId = <?= $_GET['id']; ?>;
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/indieabode/gig/viewMessages?id=" + gigId, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                        if (!chatBox.classList.contains("active")) {
                            scrollToBottom();
                        }
                    }
                }
            };
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("receiverId=" + receiverId);
        }, 500);

        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>

</body>



</html>