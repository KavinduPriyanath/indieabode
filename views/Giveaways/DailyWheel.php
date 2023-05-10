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
        include 'public/css/home.css';
        include 'public/css/spinwheel.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>



    <div class="spin-wheel-game">


        <div class="wrapper">
            <div class="container">
                <canvas id="wheel"></canvas>
                <button id="spin-btn">Spin</button>
                <img src="<?php echo BASE_URL; ?>public/images/spin-wheel/indicator.png" alt="spinner-arrow" />
            </div>
        </div>
        <div id="final-value">
            <p id="today-spin"></p>
        </div>
        <div class="my-details">
            <div class="heading">You Have:</div>
            <div class="coins">
                <div class="coin-icon"><img src="<?php echo BASE_URL; ?>public/images/spin-wheel/coin.png" alt=""></div>
                <div class="coin-count" id="total-coins"><?= $this->myDetails['indieCoins'] ?></div>
            </div>
        </div>
        <div class="chances">
            <p id="spinHead">Spins Left : </p>
            <p id="spinStatus"></p>
        </div>




    </div>

    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- Chart JS Plugin for displaying text over chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"></script>





    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            const wheel = document.getElementById("wheel");
            const spinBtn = document.getElementById("spin-btn");
            const finalValue = document.getElementById("final-value");

            <?php if (empty($this->hasSpinned)) { ?>
                spinBtn.disabled = false;
                $('#today-spin').text('Try your luck Today');
                $("#spinStatus").text("1");
            <?php } else { ?>
                spinBtn.disabled = true;
                $('#today-spin').text('Come Again Tomorrow');
                $("#spinStatus").text("0");
            <?php } ?>


            //Object that stores values of minimum and maximum angle for a value
            const rotationValues = [{
                    minDegree: 0,
                    maxDegree: 30,
                    value: 10
                },
                {
                    minDegree: 31,
                    maxDegree: 90,
                    value: 5
                },
                {
                    minDegree: 91,
                    maxDegree: 150,
                    value: 10
                },
                {
                    minDegree: 151,
                    maxDegree: 210,
                    value: 15
                },
                {
                    minDegree: 211,
                    maxDegree: 270,
                    value: 0
                },
                {
                    minDegree: 271,
                    maxDegree: 330,
                    value: 10
                },
                {
                    minDegree: 331,
                    maxDegree: 360,
                    value: 5
                },
            ];
            //Size of each piece
            const data = [16, 16, 16, 16, 16, 16];
            //background color for each piece
            var pieColors = [
                "#75CEF2",
                "#5490C3",
                "#48769C",
                "#246196",
                "#226BD0",
                "#3483EF",
            ];
            //Create chart
            let myChart = new Chart(wheel, {
                //Plugin for displaying text on pie chart
                plugins: [ChartDataLabels],
                //Chart Type Pie
                type: "pie",
                data: {
                    //Labels(values which are to be displayed on chart)
                    labels: [10, 5, 10, 15, "?", 10],
                    //Settings for dataset/pie
                    datasets: [{
                        backgroundColor: pieColors,
                        data: data,
                    }, ],
                },
                options: {
                    //Responsive chart
                    responsive: true,
                    animation: {
                        duration: 0
                    },
                    plugins: {
                        //hide tooltip and legend
                        tooltip: false,
                        legend: {
                            display: false,
                        },
                        //display labels inside pie chart
                        datalabels: {
                            color: "#ffffff",
                            formatter: (_, context) =>
                                context.chart.data.labels[context.dataIndex],
                            font: {
                                size: 24
                            },
                        },
                    },
                },
            });
            //display value based on the randomAngle
            const valueGenerator = (angleValue) => {
                for (let i of rotationValues) {
                    //if the angleValue is between min and max then display it
                    if (angleValue >= i.minDegree && angleValue <= i.maxDegree) {
                        finalValue.innerHTML = `<p>Value: ${i.value}</p>`;

                        var data = {
                            reward: i.value,
                        };

                        $.ajax({
                            type: "POST",
                            url: "/indieabode/giveaways/insertTodaysSpin",
                            data: data,
                            success: function(response) {
                                // alert(response);
                                if (response == "Success") {
                                    $('#today-spin').text('Come Again Tomorrow');
                                    $("#spinStatus").text("0");
                                    $('#total-coins').text(<?= $this->myDetails['indieCoins'] ?> + data.reward);
                                    spinBtn.disabled = true;
                                }
                            },
                        });

                        break;
                    }
                }
            };

            //Spinner count
            let count = 0;
            //100 rotations for animation and last rotation for result
            let resultValue = 101;
            //Start spinning
            spinBtn.addEventListener("click", () => {
                spinBtn.disabled = true;
                //Empty final value
                finalValue.innerHTML = `<p>Good Luck!</p>`;
                //Generate random degrees to stop at
                let randomDegree = Math.floor(Math.random() * (355 - 0 + 1) + 0);
                //Interval for rotation animation
                let rotationInterval = window.setInterval(() => {
                    //Set rotation for piechart
                    /*
    Initially to make the piechart rotate faster we set resultValue to 101 so it rotates 101 degrees at a time and this reduces by 1 with every count. Eventually on last rotation we rotate by 1 degree at a time.
    */
                    myChart.options.rotation = myChart.options.rotation + resultValue;
                    //Update chart with new value;
                    myChart.update();
                    //If rotation>360 reset it back to 0
                    if (myChart.options.rotation >= 360) {
                        count += 1;
                        resultValue -= 5;
                        myChart.options.rotation = 0;
                    } else if (count > 15 && myChart.options.rotation == randomDegree) {
                        valueGenerator(randomDegree);
                        clearInterval(rotationInterval);
                        count = 0;
                        resultValue = 101;
                    }
                }, 10);
            });
        });
    </script>

</body>



</html>