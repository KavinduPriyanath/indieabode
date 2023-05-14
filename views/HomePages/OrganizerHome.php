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
        include 'public/css/jammain.css';
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
            <h3 class="home-topics">This Month Jams</h3>
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

        <?php foreach ($this->thismonthJams as $jam) { ?>

            <a href="/indieabode/jam?id=<?= $jam['gameJamID'] ?>">
                <div class="card">

                    <div class="jam-name">
                        <p><?= $jam['jamTitle'] ?></p>
                    </div>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gamejams/covers/<?= $jam['jamCoverImg'] ?>" alt="" />
                    </div>

                    <div class="tagline modernWay">
                        <p><?= $jam['jamTagline'] ?></p>
                    </div>

                    <div class="host">Hosted by,
                        <span class="host-name"><?= $jam['username'] ?></span>

                    </div>

                    <div class="details">
                        <div class="jam-type"><?= $jam['jamType'] ?></div>
                        <div class="count">
                            <div class="countNo"><?= $jam['joinedCount'] ?></div>
                            <div class="countname">joined</div>
                        </div>

                    </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Featured -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Upcoming Jams</h3>
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

        <?php foreach ($this->upcomingJams as $jam) { ?>

            <a href="/indieabode/jam?id=<?= $jam['gameJamID'] ?>">
                <div class="card">

                    <div class="jam-name">
                        <p><?= $jam['jamTitle'] ?></p>
                    </div>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gamejams/covers/<?= $jam['jamCoverImg'] ?>" alt="" />
                    </div>

                    <div class="tagline modernWay">
                        <p><?= $jam['jamTagline'] ?></p>
                    </div>

                    <div class="host">Hosted by,
                        <span class="host-name"><?= $jam['username'] ?></span>

                    </div>

                    <div class="details">
                        <div class="jam-type"><?= $jam['jamType'] ?></div>
                        <div class="count">
                            <div class="countNo"><?= $jam['joinedCount'] ?></div>
                            <div class="countname">joined</div>
                        </div>

                    </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!-- Past -->
    <div class="topic-bar">
        <div class="topic-bar-left">
            <h3 class="home-topics">Past Jams</h3>
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

        <?php foreach ($this->pastJams as $jam) { ?>

            <a href="/indieabode/jam?id=<?= $jam['gameJamID'] ?>">
                <div class="card">

                    <div class="jam-name">
                        <p><?= $jam['jamTitle'] ?></p>
                    </div>
                    <div class="card-image">
                        <img src="/indieabode/public/uploads/gamejams/covers/<?= $jam['jamCoverImg'] ?>" alt="" />
                    </div>

                    <div class="tagline modernWay">
                        <p><?= $jam['jamTagline'] ?></p>
                    </div>

                    <div class="host">Hosted by,
                        <span class="host-name"><?= $jam['username'] ?></span>

                    </div>

                    <div class="details">
                        <div class="jam-type"><?= $jam['jamType'] ?></div>
                        <div class="count">
                            <div class="countNo"><?= $jam['joinedCount'] ?></div>
                            <div class="countname">joined</div>
                        </div>

                    </div>
                </div>
            </a>
        <?php } ?>

    </div>
    <br>

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