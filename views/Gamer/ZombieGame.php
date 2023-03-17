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
        include 'public/css/zombiegame.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <canvas id="canvas1"></canvas>
    <img src="/indieabode/public/images/zombiegame/overlay.png" alt="" id="overlay" />
    <img src="/indieabode/public/images/zombiegame/obstacles.png" alt="" id="obstacles" />
    <img src="/indieabode/public/images/zombiegame/bull.png" alt="" id="bull" />



    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/zombiegame.js"></script>


</body>



</html>