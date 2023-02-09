<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/singlejam.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>



<div class="container">


    <?php if ($this->gamejam) : ?>
        <div class="box">
            <h1><?= $this->gamejam['jamTitle']; ?></h1>
            <p><?= $this->gamejam['jamTagline']; ?></p>
        </div>
        <div class="card">

            <div class="launch-time">
                <h2>Starts in</h2>


                <div>
                    <p id="days">00</p>
                    <span>Days</span>
                </div>

                <div>
                    <p id="hours">00</p>
                    <span>Hours</span>
                </div>

                <div>
                    <p id="minutes">00</p>
                    <span>Minutes</span>
                </div>

                <div>
                    <p id="seconds">00</p>
                    <span>Seconds</span>
                </div>

                <div class="box">
                    <div class="button">
                        <input type="submit" value="Join Jam">
                    </div>
                </div>

            </div>
        </div>

</div>


<div class="container">
    <img src="/indieabode/public/uploads/gamejams/covers/<?= $this->gamejam['jamCoverImg'] ?>" alt="" />
    <div class="block">
        <h2>About The Jam</h2>
        <p><?= $this->gamejam['jamContent']; ?></p>
    </div>
    <div class="block">
        <h2>What is A "Lost Cartridge Game"</h2>
        <p>A Lost Cartridge Game is a game that's been both designed and stylized to look and feel like a vintage game; a game that
            gives the impression of having been lost in a drawer for decades only to be rediscovered in the present day. Emphasis is
            placed on believability, but it's up to you whether you want to express that through game design, aesthetics or both.</p>
    </div>
    <div class="block">
        <h2>Prizes</h2>
        <p>Submissions will be judged on the categories "Quality of Design", "Quality of Aesthetics", "Adherence to Platform" and
            "Going the Extra Mile." Whoever receives the highest score across all categories will be declared the winner, and will
            receive all the prizes</p>
    </div>



    <div class="card-box1">
        <h2>Sponsors</h2>
        <div class="card-box2">
            <div class="box">
                <img src="https://img.itch.zone/aW1nLzcxNDI2NTcucG5n/original/TgSOVb.png" loading="lazy">
            </div>
            <div class="box">
                <img src="https://img.itch.zone/aW1nLzcxNDI2NjAucG5n/original/OkvSIS.png" loading="lazy">
            </div>
            <div class="box">
                <img src="https://img.itch.zone/aW1nLzcxOTM4OTMucG5n/original/OcU5mW.png" loading="lazy">
            </div>
            <div class="box">
                <img src="https://img.itch.zone/aW1nLzcxNDI2NjIucG5n/original/TVDeqL.png" loading="lazy">
            </div>
            <div class="box">
                <img src="https://img.itch.zone/aW1nLzcyMzk1MjEucG5n/original/pME9bX.png" loading="lazy">
            </div>
        </div>

    <?php endif; ?>


    <?php
    include 'includes/footer.php';
    ?>



    </div>
    <script type="text/javascript">
        var count_id = "<?= $this->gamejam['submissionStartDate']; ?>";
        var countDownDate = new Date(count_id).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("days").innerHTML = 00;
                document.getElementById("hours").innerHTML = 00;
                document.getElementById("minutes").innerHTML = 00;
                document.getElementById("seconds").innerHTML = 00;

            }
        }, 1000);
    </script>





    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="../src/js/navbar.js"></script>
    <?php } else { ?>
        <script src="../src/js/navbarcopy.js"></script>
    <?php } ?>

</html>