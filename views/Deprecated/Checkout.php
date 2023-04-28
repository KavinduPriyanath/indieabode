<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include('public/css/checkoutk.css');
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="checkout-container">
        <div class="checkout-head">
            <h1>Checkout</h1>
        </div>

        <div class="checkout-cards">
            <div class="card-details">
                <div class="chk-card">
                    <div class="card-desc">
                        <div class="crd-icon">
                            <i class="fa fa-credit-card fa-2x" aria-hidden="true"></i>
                        </div>

                        <div class="crd-desc-name">
                            <h2>Credit Card</h2>
                        </div>
                    </div>
                    <div class="chk-title">
                        <h3> Card Details </h3>
                        <hr>
                    </div>

                    <!-- <div class="chk-form">
                        <div class="chk-form-left">
                            <div class="chk-name chk">
                                <label for="cardholder">Cardholder's Name</label><br>
                                <input type="text" id="cardholder" />
                            </div>

                            <div class="chk-exp">
                                <div class="chk-month chk">
                                    <label for="date">Expiration Date</label><br>
                                    <select id="months" placeholder="MM"></label>
                                        <option value="none" selected disabled hidden>MM</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                </div>

                                <div class="chk-date chk">
                                    <input type="text" id="date" placeholder=" YY" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="chk-form-right">
                            <div class="chk-no chk">
                                <label for="cardnumber">Card Number</label>
                                <input type="text" id="cardnumber" />
                            </div>

                            <div class="chk-cvv">
                                <label for="verification">CVV</label><br>
                                <input type="password" id="verification" />
                            </div>
                        </div>
                    </div> -->

                    <div class="checkout-form">
                        <div class="form-name">
                            <label for="cardholder">Account Number</label><br>
                            <input type="text" id="cardholder" />
                        </div>

                        <div class="form-card-details">
                            <div class="form-exp">
                            <label for="exp-date">Expiration Date</label><br>
                                <input type="text" id="exp-date" placeholder="mm/yy" />
                            </div>
                            <div class="form-cvv">
                                <label for="verification">CVV</label><br>
                                <input type="text" id="verification" placeholder="123" />
                            </div>
                        </div>
                    </div>

                    <div class="checkbox-chk">
                        <input type="checkbox" id="html" name="fav_language" value="HTML">
                        <label for="html">Save my payment information so checkout is easy next time</label><br>
                    </div>
                </div>
            </div>
            
            <div class="order-summary">
                <div class="summary-title">
                    <h2>Order Summary</h2>
                </div>
                
                <?php $total=0; ?>

                <?php foreach ($this->checkout as $check) { ?>
                <div class="summary-img-card">
                    <div class="sum-cvr-img">
                        <img src="/indieabode/public/uploads/games/cover/<?= $check['gameCoverImg'] ?>" alt="" width="80" height="80">
                    </div>

                    <div class="sum-details">
                      <h3><?= $check['gameName'] ?></h3>
                      <span>
                        <?= $check['gameTagline'] ?>
                      </span>
                    </div>
                    <?php $total+=$check['gamePrice'] ?> 
                </div>
                <?php } ?>
            

                <div class="sum-price-details">
                    <div class="price-order">
                        <div class="price-title">
                            Price
                        </div>

                        <div class="price-sum">
                        <label for="pricev">$<?php echo $total ?></label>
                        </div>
                    </div>

                    <div class="price-order">
                        <div class="price-title">
                            Sale Discount
                        </div>

                        <div class="price-sum">
                            -$0.00
                        </div>
                    </div>
                </div>
                <hr>
                <div class="price-order">
                    <div class="price-title">
                        <h4>Total</h4>
                    </div>

                    <div class="price-sum">
                        $<?php echo $total ?>
                    </div>
                </div>
                
                <div class="order-help">
                    Need Help? <br>
                    <a href="#">Contact Us</a>
                </div>

                <div class="order-footer">
                    <div class="place-order-btn">
                        <!-- <input type="submit" id="place" value="Place Order"></button> -->
                        <!-- <button class="submit-button">Place Order</button> -->
                        <a href="#">
                            <div class="order-button">Place Order</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <!-- <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

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
    </script> -->

</body>

<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</html>