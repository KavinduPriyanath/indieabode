<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
    <style>
        <?php
        include 'public/css/crowdfund.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="title"><?= $this->crowdfund['title']; ?></div>
    <div class="sub-title">
        <?= $this->crowdfund['tagline']; ?>
    </div>
    <div class="crowdfund-details">
        <div class="image-slider">
            <div class="slider">
                <div class="slide active">
                    <img src="images/1.jpg" alt="" />
                    <div class="info">
                        <h2>Winter Mountains</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="slide">
                    <img src="images/2.jpg" alt="" />
                    <div class="info">
                        <h2>Tropical Desert</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="slide">
                    <img src="/images/3.jpg" alt="" />
                    <div class="info">
                        <h2>Steaming Volcanoes</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>

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
            <span>$<?= $this->crowdfund['currentAmount']; ?></span> raised of $<?= $this->crowdfund['expectedAmount']; ?> goal

            <div class="backer-count"><?= $this->crowdfund['backers']; ?></div>
            <div class="backers">backers</div>
            <div class="days-left">3</div>
            <div class="days-caption">days to go</div>

            <div class="btn">Share</div>
            <div class="btn">Back this Game</div>
            <div class="warning">
                After backing this project you will not be able to request for any
                refundss
            </div>
        </div>
    </div>
    <div class="crowdfund-content">
        <div class="detials"><?= $this->crowdfund['details']; ?></div>
        <div class="backer-details">
            <h3>Backers</h3>
            <div class="backer-info">
                <div class="backer-pp">pp</div>
                <div class="backer-name">Kavindu Priyanath</div>
                <div class="backed-amount">$10</div>
                <div class="backed-date">10 days ago</div>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>