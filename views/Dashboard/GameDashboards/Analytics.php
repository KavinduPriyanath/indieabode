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
        include 'public/css/editDevlogForm.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Developer Dashboard - <?= $this->game['gameName'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->game['gameID']; ?>">Edit Game</a>
            <a href="/indieabode/dashboard/devlogs">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?gameid=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/publishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/sales">Crowdfundings</a>
            <a href="/indieabode/dashboard/gamejams">Metadata</a>

        </div>
        <div class="content-row">


            <div style="width: 600px; height: 600px">
                <canvas id="myChart"></canvas>
            </div>

            <div style="width: 600px; height: 600px">
                <canvas id="myViewChart"></canvas>
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
        var downloads = <?= json_encode($this->alldownloads); ?>;
        var labelDates = <?= json_encode($this->labelDates); ?>;

        console.log(downloads);
        const data = {
            labels: labelDates,
            datasets: [{
                label: "# of Votes",
                data: downloads,
                borderWidth: 4,
            }, ]
        };

        //config block
        const config = {
            type: "line",
            data,
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
            document.getElementById("myChart"),
            config
        );
    </script>



</body>



</html>