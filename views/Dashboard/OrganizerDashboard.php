<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css" />

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
                                <?php if($jam['joinedCount']  <= 0){ ?>
                                    <a class="delete-jam-btn" data-jam-id="<?= $jam['gameJamID'] ?>" data-jam-name="<?= $jam['jamTitle'] ?>">Delete</a>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="right-col">
                        <div class="views">
                            <div class="count"><?= $jam['joinedCount']; ?></div>
                            <div class="label">joined</div>
                        </div>
                        <div class="downloads">
                            <div class="count"><?= $jam['submissionsCount']; ?></div>
                            <div class="label">submissions</div>
                        </div>
                        <div class="ratings">
                            <div class="count"><?= $jam['ratings']; ?></div>
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

    

    <!-- <script>
        $(document).ready(function() {
            $('.delete-jam').click(function() {
                let message = "Are you sure you want to delete <?= $jam['jamTitle'] ?>?";
                if (confirm(message)) {
                    let gameJamID = <?= $jam['gameJamID'] ?>;
                    $.ajax({
                        url: "/indieabode/dashboard/deleteJam",
                        method: "POST",
                        data: { gameJamID: gameJamID },
                        success: function(response) {
                            window.location.href = "/indieabode/dashboard/";
                        }
                    })
                } else {
                    // Do nothing
                }
            });
        });
    </script> -->

    <script>
        $(document).ready(function() {
            $('.delete-jam-btn').click(function() {
                let gameJamName = $(this).data('jam-name');
                let message = "Are you sure you want to delete '" + gameJamName + "' game jam?";
                if (confirm(message)) {
                    let gameJamID = $(this).data('jam-id');
                    $.ajax({
                        url: "/indieabode/dashboard/deleteJam",
                        method: "POST",
                        data: { gameJamID: gameJamID },
                        success: function(response) {
                            window.location.href = "/indieabode/dashboard/";
                        }
                    })
                } else {
                    // Do nothing
                }
            });
        });          
    </script>

    

</body>

</html>