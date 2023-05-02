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
        include 'public/css/dashboard.css';
        include 'public/css/editGameForm.css';
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
            <a href="/indieabode/dashboard/gameanalytics?id=<?= $this->game['gameID']; ?>">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?id=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/publishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/gamecrowdfunds?id=<?= $this->game['gameID']; ?>">Crowdfundings</a>
            <a href="/indieabode/dashboard/metadata?id=<?= $this->game['gameID']; ?>">Metadata</a>
            <a href="/indieabode/dashboard/gamegiveaways?id=<?= $this->game['gameID']; ?>">Giveaways</a>

        </div>
        <div class="content-row">

            <div class="outer-box">
                <div class=" form-box">

                    <div class="upload-content">
                        <form action="/indieabode/dashboard/editExistingDevlog?id=<?= $this->devlog['devLogID'] ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                            <div class="card-details">
                                <div class="upload-row">
                                    <div class="upload-col-left" id="devlog-left">
                                        <div class="card-box">

                                            <label for="">Game Name</label><br>
                                            <input type="text" name="title" value="<?= $this->game['gameName']; ?>">
                                            <input type="hidden" name="gameID" value="<?= $this->game['gameID']; ?>"><br><br>
                                        </div>

                                        <div class="card-box">
                                            <label for="">Value of a Copy</label>
                                            <p>Intended giveaway value of your game in Indie Coins</p>
                                            <input type="text" name="copyValue" placeholder="Ex: 300" value=""><br><br>
                                        </div>


                                        <div class="card-box">

                                            <label for="">Copies Count</label><br>
                                            <input type="number" name="copyCount" value="">
                                            <br><br>

                                        </div>



                                    </div>

                                </div>
                            </div>

                            <div class="button">
                                <input type="submit" name="submit" id="devsubmit" value="Save & View Page">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>





</body>



</html>