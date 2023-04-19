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

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Creator Dashboard - <?= $this->asset['assetName'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->asset['assetID']; ?>">Edit Game</a>
            <a href="/indieabode/dashboard/assetanalytics?id=<?= $this->asset['assetID']; ?>">Analytics</a>
            <a href="/indieabode/dashboard/reviews?id=<?= $this->asset['assetID']; ?>">Reviews</a>

        </div>


        <div class="content-row">


            <div class="analytics-header">Views for <?= $this->asset['assetName'] ?></div>

            <div class="gameCharts">
                <canvas id="viewsChart"></canvas>
            </div>

            <div class="analytics-header">Downloads for <?= $this->asset['assetName'] ?></div>

            <div class="gameCharts">
                <canvas id="downloadsChart"></canvas>
            </div>


        </div>
    </div>



    </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        //setup block
        var views = <?= json_encode($this->allviews); ?>;
        var labelDates = <?= json_encode($this->labelDates); ?>;

        console.log(views);
        const viewData = {
            labels: labelDates,
            datasets: [{
                label: "views",
                data: views,
                borderWidth: 4,
            }, ]
        };

        //config block
        const viewConfig = {
            type: "line",
            data: viewData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            }
        };

        //render block
        const viewChart = new Chart(
            document.getElementById("viewsChart"),
            viewConfig
        );
    </script>

    <script>
        //setup block
        var downloads = <?= json_encode($this->alldownloads); ?>;
        var labelDates = <?= json_encode($this->labelDates); ?>;

        console.log(downloads);
        const downloadData = {
            labels: labelDates,
            datasets: [{
                label: "downloads",
                data: downloads,
                borderWidth: 4,
            }, ]
        };

        //config block
        const downloadConfig = {
            type: "line",
            data: downloadData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            }
        };

        //render block
        const myChart = new Chart(
            document.getElementById("downloadsChart"),
            downloadConfig
        );
    </script>

</body>



</html>