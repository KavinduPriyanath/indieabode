<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gamejam.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>



<div class="containerJam2">


    <?php if ($this->jam) : ?>
        <div class="box">
            <h1><?= $this->jam['jamTitle']; ?></h1>
        </div>

        <div class="topics">
            <a href="/indieabode/jam?id=<?= $this->jam['gameJamID'] ?>">Overview</a>
            <a href="/indieabode/jam/submission?id=<?= $this->jam['gameJamID'] ?>">Submissions</a>
            <a href="/indieabode/jam/results?id=<?= $this->jam['gameJamID'] ?>" id="resultPage">Results</a>
        </div>

        <hr id="topic-break">
        <br>


    <?php endif;  ?>



    <div class="heading-submission">
        <div class="details">Submitted Projects</div>
        <?php if (!empty($this->hasSubmitted)) { ?>
            <div class="my-submission">
                <a href="<?php echo BASE_URL; ?>jam/ratesubmission?jam=<?= $this->hasSubmitted['gameJamID'] ?>&id=<?= $this->hasSubmitted['submissionID'] ?>">
                    View Your Submission <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
        <?php } ?>

    </div>



    <div class="container2" id="card-container">

        <?php foreach ($this->submittedGames as $submittedGame) { ?>
            <a href="/indieabode/jam/ratesubmission?jam=<?= $this->jam['gameJamID'] ?>&&id=<?= $submittedGame['gameID'] ?>">
                <div class="card2">
                    <div class="card-image2"> <img src="/indieabode/public/uploads/games/cover/<?= $submittedGame['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $submittedGame['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline modernWay"><?= $submittedGame['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>

    <br>


</div>


<?php
include 'includes/footer.php';
?>

<script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

<script>
    <?php if ($this->jamEnded == false) { ?>
        document.getElementById("resultPage").style.color = "grey";
        document.getElementById("resultPage").style.pointerEvents = "none";
    <?php } ?>
</script>

</html>