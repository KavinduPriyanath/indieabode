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
        include 'public/css/gigs.css';
        include 'public/css/organizerhome.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <?php if (isset($_SESSION['status'])) { ?>

        <div class="flashMessage" id="flashMessage"><?= $_SESSION['status']; ?></div>
        <?php unset($_SESSION['status']); ?>
    <?php } ?>


    <!-- Games -->
    <div class="topic-bar first-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Most Popular</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/games">
                    View all
                </a>
            </div>
        </div>
    </div>


    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->mostPopularGigs as $gig) { ?>
            <a href="/indieabode/gig?id=<?= $gig['gigID'] ?>">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt="" />
                    </div>
                    <div class="gig-info">
                        <div class="left">
                            <div class="pp-icon"><img src="/indieabode/public/images/avatars/<?= $gig['avatar'] ?>" alt="" /></div>
                            <div class="pp-details">
                                <h3> <?= $gig['firstName'] . " " . $gig['lastName'] ?> </h3>
                                <p>Trust Rank: <?= $gig['trustrank'] ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="tagline modernWay"> <?= $gig['gigTagline'] ?> </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Featured -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Latest Gigs</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/assets">
                    View all
                </a>
            </div>
        </div>
    </div>

    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->latestGigs as $gig) { ?>
            <a href="/indieabode/gig?id=<?= $gig['gigID'] ?>">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt="" />
                    </div>
                    <div class="gig-info">
                        <div class="left">
                            <div class="pp-icon"><img src="/indieabode/public/images/avatars/<?= $gig['avatar'] ?>" alt="" /></div>
                            <div class="pp-details">
                                <h3> <?= $gig['firstName'] . " " . $gig['lastName'] ?> </h3>
                                <p>Trust Rank: <?= $gig['trustrank'] ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="tagline modernWay"> <?= $gig['gigTagline'] ?> </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Past -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Most Demands</h3>
        </div>
        <div class="topic-bar-right">
            <div class="view-all">
                <a href="/indieabode/assets">
                    View all
                </a>
            </div>
        </div>
    </div>

    <hr class="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->mostDemandGigs as $gig) { ?>
            <a href="/indieabode/gig?id=<?= $gig['gigID'] ?>">
                <div class="card">
                    <h3 id="gig-name"><?= $gig['gigName'] ?></h3>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt="" />
                    </div>
                    <div class="gig-info">
                        <div class="left">
                            <div class="pp-icon"><img src="/indieabode/public/images/avatars/<?= $gig['avatar'] ?>" alt="" /></div>
                            <div class="pp-details">
                                <h3> <?= $gig['firstName'] . " " . $gig['lastName'] ?> </h3>
                                <p>Trust Rank: <?= $gig['trustrank'] ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="tagline modernWay"> <?= $gig['gigTagline'] ?> </div>
                </div>
            </a>
        <?php } ?>

    </div>


    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(function() {

            $("#flashMessage").fadeIn(1000);

            setTimeout(function() {
                $("#flashMessage").fadeOut("slow");
            }, 4000);
        });
    </script>
</body>



</html>