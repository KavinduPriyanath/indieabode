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
        include 'public/css/giveawaydashboard.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="flashMessage" id="flashMessage"></div>

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

            <?php if (empty($this->hasGiveaway)) { ?>
                <div class="outer-box">
                    <div class=" form-box">

                        <div class="upload-content">
                            <div id="upload-game-form">
                                <div class="card-details">
                                    <div class="upload-row">
                                        <div class="upload-col-left" id="devlog-left">
                                            <div class="card-box">

                                                <label for="">Game Name</label><br>
                                                <input type="text" name="title" value="<?= $this->game['gameName']; ?>">
                                                <input type="hidden" name="gameID" id="gameID" value="<?= $this->game['gameID']; ?>"><br><br>
                                            </div>

                                            <div class="card-box">
                                                <label for="">Value of a Copy</label>
                                                <p>Intended giveaway value of your game in Indie Coins</p>
                                                <input type="text" name="copyValue" id="copyValue" placeholder="Ex: 300" value=""><br><br>
                                            </div>


                                            <div class="card-box">

                                                <label for="">Copies Count</label><br>
                                                <input type="number" name="copyCount" id="copyCount" value="1" min="1" max="10">
                                                <br><br>

                                            </div>



                                        </div>

                                    </div>
                                </div>

                                <div class="button">
                                    <input type="submit" name="submit" id="save" value="Save & View Page">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="giveaway-item">
                    This game already has a give away.
                </div>
            <?php } ?>

        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            $("#save").click(function(e) {

                let gameID = $('#gameID').val();
                let copiesCount = $('#copyCount').val();
                let copyWorth = $('#copyValue').val();

                var data = {
                    'gameID': gameID,
                    'copiesCount': copiesCount,
                    'copyWorth': copyWorth,
                    'save_giveaway': true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/dashboard/addtoGiveaways",
                    data: data,
                    success: function(response) {
                        // alert(response);

                        $('.outer-box').hide();
                        $('.giveaway-item').show();

                        $('#flashMessage').html("Giveaway Added");
                        $("#flashMessage").fadeIn(500);

                        setTimeout(function() {
                            $("#flashMessage").fadeOut("slow");
                        }, 2000);

                    },
                });


            });

        });
    </script>



</body>



</html>