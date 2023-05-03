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
        include 'public/css/organizerdashboard.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Organizer Dashboard - <?= $this->jam['jamTitle'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->jam['gameJamID']; ?>">Edit Jam</a>
            <a href="/indieabode/dashboard/submissions?id=<?= $this->jam['gameJamID']; ?>">Submissions</a>
            <a href="/indieabode/dashboard/reports?id=<?= $this->jam['gameJamID']; ?>">Reports</a>
            <a href="/indieabode/dashboard/results?id=<?= $this->jam['gameJamID']; ?>">Results</a>
            <a href="/indieabode/dashboard/prizes?id=<?= $this->jam['gameJamID']; ?>">Prizes</a>

        </div>


        <div class="content-row">

            <div class="all-ranks">
                <div class="title">Jam Results</div>
                <table>
                    <tr>
                        <th id="rank-table">Rank</th>
                        <th id="game-name-table">Game Name</th>
                        <th id="username">Username</th>
                        <th id="full-name">Full Name</th>
                    </tr>
                    <?php $rank = 0; ?>
                    <?php foreach ($this->jamResults as $result) { ?>
                        <?php $rank += 1; ?>
                        <tr>
                            <td><?= $rank ?></td>
                            <td><?= $result['gameName'] ?></td>
                            <td><?= $result['username'] ?></td>
                            <td><?= $result['firstName'] . " " . $result['lastName'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>


        </div>
    </div>



    </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>