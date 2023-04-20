<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gamejam.css';
        include 'public/css/results.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>

<body>



    <div class="containerJam">


        <div class="box">
            <h1><?= $this->jam['jamTitle']; ?></h1>
        </div>

        <div class="topics">

            <a href="/indieabode/jam?id=<?= $this->jam['gameJamID'] ?>">Overview</a>
            <a href="/indieabode/jam/submission?id=<?= $this->jam['gameJamID'] ?>" id="submissionPage">Submissions</a>
            <a href="/indieabode/jam/results?id=<?= $this->jam['gameJamID'] ?>">Results</a>
        </div>

        <hr id="topic-break">
        <br>


    </div>

    <div class="winners">
        <?php $count = 0; ?>
        <?php foreach ($this->jamResults as $jamResult) { ?>
            <?php $count = $count + 1;
            if ($count == 4) {
                break;
            }
            ?>
            <div class="winner-card">
                <div class="winner-game-image"><img src="/indieabode/public/uploads/games/cover/<?= $jamResult['gameCoverImg'] ?>" alt="" /></div>
                <div class="winner-place"><?= $count ?>st Place</div>
                <div class="winner-game"><?= $jamResult['gameName'] ?></div>
            </div>
        <?php } ?>

    </div>

    <div class="all-ranks">
        <div class="title">Jam Results</div>
        <table>
            <tr>
                <th id="rank-table">Rank</th>
                <th id="game-name-table">Game Name</th>
            </tr>
            <?php $rank = 0; ?>
            <?php foreach ($this->jamResults as $result) { ?>
                <?php $rank += 1; ?>
                <tr>
                    <td><?= $rank ?></td>
                    <td><?= $result['gameName'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>



</body>

</html>