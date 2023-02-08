<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
    <style>
        <?php
        include 'public/css/supportcenter.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h1 id="header">Indieabode Support Center</h1>

    <div class="support-cards">
        <div class="first-three">
            <a href="">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/general.png" alt="" />
                    <div class="card-topic">General Info</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>

            <a href="/indieabode/legal/">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/legal.png" alt="" />
                    <div class="card-topic">Legal Policies</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>

            <a href="">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/technical-issues.png" alt="" />
                    <div class="card-topic">Game Technical Issues</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>


        </div>
        <div class="second-three">
            <a href="">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/publishing.png" alt="" />
                    <div class="card-topic">Publishing</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>

            <a href="">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/payment.png" alt="" />
                    <div class="card-topic">Orders & Payments</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>

            <a href="">
                <div class="card">
                    <img src="/indieabode/public/images/support_center/additional-issues.png" alt="" />
                    <div class="card-topic">Additional Issues</div>
                    <div class="topic-tagline">
                        Have you experienced any problem while using the website?
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="bottom-topic">
        <h2>Popular Support Topics</h2>
    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <?php if (isset($_SESSION['logged']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>



</html>