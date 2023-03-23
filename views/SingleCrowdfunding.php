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
            <div class="btn">Back this Game</div>
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
            <div class="backer-info">
                <div class="row-one">
                    <div class="backer-pp"><img src="" alt=""></div>
                    <div class="right-side">
                        <div class="backer-name">Kavindu Priyanath</div>
                        <div class="row-two">
                            <div class="backed-amount">$10</div>
                            <div class="backed-date"><i class="fa fa-circle"></i>10 days ago</div>
                        </div>
                    </div>

                </div>


            </div>
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

    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/gig.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>


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

</body>



</html>