<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/devlog.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />
        <title>Document</title>
    </head>

    <body>
        <div class="cover-img">
            <img src="/indieabode/public/uploads/devlogs/<?= $this->devlog['devlogImg'] ?>" alt="" />
        </div>

        <div class="container">
            <div class="details">
                <div class="title"><?= $this->devlog['name']; ?></div>
                <div class="published-date">Published 2 days ago</div>
                <div class="content">
                    <?= $this->devlog['description']; ?>
                </div>
            </div>
            <div class="card">
                <div class="game-name"><?= $this->devlog['gameName']; ?></div>
                <div class="second-rows">
                    <div class="game-type">Base Game</div>
                    <div class="price">Free</div>
                </div>
                <div class="game-tagline">
                    <?= $this->game['gameTagline']; ?>
                </div>
                <div class="btn" onclick="ButtonClick()">Add to Library</div>
                <div class="overview">
                    <div class="row">
                        <p>Status</p>
                        <p><?= $this->game['releaseStatus']; ?></p>
                    </div>
                    <hr id="line-break">
                    <div class="row">
                        <p>Developer</p>
                        <p>Armor Games Studios</p>
                    </div>
                    <hr id="line-break">
                    <div class="row">
                        <p>Genre</p>
                        <p><?= $this->game['gameClassification']; ?></p>
                    </div>
                    <hr id="line-break">
                    <div class="row">
                        <p>Platform</p>
                        <p><?= $this->game['platform']; ?></p>
                    </div>
                    <hr id="line-break">
                    <div class="row">
                        <p>Release Date</p>
                        <p>5 Nov 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>




    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        function ButtonClick() {
            // document.getElementsByClassName("buy-btn");
            alert("Cant perform this action as a gamedeveloper");
        }
    </script>

</body>



</html>