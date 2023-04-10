<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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



<div class="containerJam">


    <?php if ($this->jam) : ?>
        <div class="box">
            <h1><?= $this->jam['jamTitle']; ?></h1>
            <p><?= $this->jam['jamTagline']; ?></p>
        </div>

        <div class="topics">
            <a href="/indieabode/jam?id=<?= $this->jam['gameJamID'] ?>">Overview</a>
            <a href="/indieabode/jam/submission?id=<?= $this->jam['gameJamID'] ?>">Submissions</a>
        </div>

        <hr id="topic-break">
        <br>

        <div class="projectT">
            <h2>Submit Your Project Here</h2>
        </div>
    <?php endif;  ?>

    <form action="/indieabode/jam/submitproject?jamid= <?= $this->jam['gameJamID'] ?>" type="submit" method="POST">
        <div class="card-box">
            <span class="details">Select Your Game to Submit Here</span>

            <!-- <input type="text" name="gname" placeholder="Game name" required> -->
            <select id="type" name="gID" required>
                <?php foreach ($this->games as $game) { ?>
                    <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                <?php } ?>

            </select>
        </div>

        <div class="button">
            <input type="submit" name="submit" id="submit" value="Submit Project">
        </div>

        <br>
        <br>
        <hr id="topic-break">
        <div class="card-box">
            <span class="details">Submitted Projects</span>
        </div>

    </form>



    <div class="container2" id="card-container">

        <?php foreach ($this->sGames as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card2">
                    <div class="card-image2"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
                    </div>
                    <div class="game-intro">
                        <h3><?= $game['gameName'] ?></h3>
                        <p>Free</p>
                    </div>
                    <div class="tagline"><?= $game['gameTagline'] ?></div>
                </div>
            </a>
        <?php } ?>

    </div>



</div>


<?php
include 'includes/footer.php';
?>

<script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
<script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

</html>