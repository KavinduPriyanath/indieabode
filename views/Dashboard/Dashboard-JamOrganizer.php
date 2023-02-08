<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/dashboard-jamO.css';
        ?>
    </style>

</head>

<body>


    <?php
    include 'includes/navbar.php';
    ?>

    <div class="card1">
        <div class="card1-left">
            <h1>Organizer Dashboard &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            
        </div>
        <div class="card1-right">
            <div class="right1">
                <h1>334&nbsp;&nbsp;</h1>
                <p>Join</p>
                <p>Count</p>
            </div>
            <div class="right1">
             <h1>334</h1>
                <p>Submission&nbsp;&nbsp;</p>
                <p>count</p>
            </div>
            <div class="right1">
                <h1>334&nbsp;&nbsp;</h1>
                <p>Rating</p>
                <p>Count</p>
            </div>
        </div>
    </div>

    <div class="card2">
        <div class="right1">
            <h3>GameJams&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
        </div>
        <div class="right2">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settings</h3>
        </div>
    </div>

    <div class="card3">
        <div class="card3-1">
            <p><a href="/indieabode/gamejamform">Write a New Post</a></p>
        </div>


        <div class="card3-2">
            <p>Previous Devlogs</p>
        </div>


        <div class="card3-3">

            <div class="card3-3-Left">
                <img src="https://th.bing.com/th/id/R.8d9374b8c6051a2a28d0fe46e0d11929?rik=B9Q0DmkLf33nZA&pid=ImgRaw&r=0">
            </div>

            <div class="card3-3-center">
                <h3>Finishing Utility Inventory</h3><br>
                <p>Almighty Sheild</p>
            </div>

            <div class="card3-3-right">
                <div class="r1">
                    <h1>74</h1>
                    <p>Views</p>
                </div>
                <div class="r2">
                    <h1>41</h1>
                    <p>Likes</p>
                </div>
                <div class="r3">
                    <h1>10</h1>
                    <p>Comments</p>
                </div>
            </div>

            <div class="card3-3-right2">
                <h3>Edit</h3>
            </div>
        </div>

        <div class="card3-3">

            <div class="card3-3-Left">
                <img src="https://th.bing.com/th/id/R.8d9374b8c6051a2a28d0fe46e0d11929?rik=B9Q0DmkLf33nZA&pid=ImgRaw&r=0">
            </div>

            <div class="card3-3-center">
                <h3>Finishing Utility Inventory</h3><br>
                <p>Almighty Sheild</p>
            </div>

            <div class="card3-3-right">
                <div class="r1">
                    <h1>74</h1>
                    <p>Views</p>
                </div>
                <div class="r2">
                    <h1>41</h1>
                    <p>Likes</p>
                </div>
                <div class="r3">
                    <h1>10</h1>
                    <p>Comments</p>
                </div>
            </div>

            <div class="card3-3-right2">
                <h3>Edit</h3>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>
</html>

