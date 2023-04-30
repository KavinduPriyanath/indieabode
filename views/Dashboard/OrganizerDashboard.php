<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/dashboard.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



    <div class="publisher-dashboard">
        <div class="top-row">
            <div class="heading">Publisher Dashboard</div>
            <div class="dev-main-stat">


            </div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard">
                Jams
            </a>
            <a href="/indieabode/dashboard/certificates">
                Certificates
            </a>

        </div>
        <div class="content-row">

            <h3>Hosted Jams</h3>
            <?php foreach ($this->jams as $jam) { ?>
                <div class="game-card">
                    <div class="left-col">
                        <div class="icon"><img src="/indieabode/public/uploads/gamejams/covers/<?= $jam['jamCoverImg'] ?>" alt=""></div>
                        <div class="details">
                            <div class="game-name"><?= $jam['jamTitle'] ?></div>
                            <div class="game-stat-tabs">
                                <a href="/indieabode/dashboard/edit?id=<?= $jam['gameJamID']; ?>">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="right-col">
                        <div class="views">
                            <div class="count">0</div>
                            <div class="label">joined</div>
                        </div>
                        <div class="downloads">
                            <div class="count">0</div>
                            <div class="label">submissions</div>
                        </div>
                        <div class="ratings">
                            <div class="count">0</div>
                            <div class="label">ratings</div>
                        </div>
                    </div>
                    <div class="edit-btn">
                        Status
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

</body>

</html>