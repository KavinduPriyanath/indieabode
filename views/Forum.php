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
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>




    <div class="empty-box">
        <div class="empty-icon"><img src="<?php echo BASE_URL; ?>public/images/empty/under-construction.png" alt=""></div>
        <div class="empty-text">This Page is Under Construction</div>
        <div class="empty-link"><a href="<?php echo BASE_URL; ?>/home/developer">Return to Home</a></div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>