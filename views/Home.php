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

    <?php echo $_SESSION['session']; ?>
    <?php print_r($_SERVER['REMOTE_ADDR']); ?>


    <?php if (isset($_SESSION['status'])) { ?>

        <div class="flashMessage" id="flashMessage"><?= $_SESSION['status']; ?></div>



    <?php
        unset($_SESSION['status']);
    } ?>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(function() {

            $("#flashMessage").fadeIn(1000);

            setTimeout(function() {
                $("#flashMessage").fadeOut("slow");
            }, 4000);
        });
    </script>
</body>



</html>