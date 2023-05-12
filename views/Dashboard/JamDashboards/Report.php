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
            <a href="/indieabode/dashboard/results?id=<?= $this->jam['gameJamID']; ?>">Results</a>
            <a href="/indieabode/dashboard/reports?id=<?= $this->jam['gameJamID']; ?>">Reports</a>
            <a href="/indieabode/dashboard/prizes?id=<?= $this->jam['gameJamID']; ?>">Prizes</a>

        </div>


        <div class="content-row">

            <?php foreach ($this->allReports as $report) { ?>
                <div class="report-card" id="report-card<?= $report['id'] ?>">
                    <div class="report-content" onclick="Expand(<?= $report['id'] ?>)">
                        <div class="complaint-id"><?= $report['id'] ?></div>
                        <div class="submission-name"><a href="<?php echo BASE_URL; ?>jam/ratesubmission?jam=<?= $report['jamID'] ?>&id=<?= $report['submissionID'] ?>"><?= $report['gameName'] ?></a></div>
                        <div class="complaint-reason"><?= $report['reason'] ?></div>
                        <div class="reporter"><?= $report['username'] ?></div>
                    </div>
                    <div class="report-description" id="report-description"><?= $report['description'] ?></div>
                </div>
            <?php } ?>



        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        function Expand(id) {
            document.getElementById('report-card' + id).classList.toggle('active');
        }
    </script>

</body>



</html>