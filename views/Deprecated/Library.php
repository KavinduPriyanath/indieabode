<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
</head>

<style>
    <?php
    include 'public/css/library.css';
    ?>
</style>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    

    <div class="page-topic">
        <h1>-<?= $this->title ?>-</h1>
    </div>

    
        <div class="container" id="card-container"> 
            <?php foreach ($this->libraryd as $itemd) { ?>
                <div class="con">
                    <a href="/indieabode/game?id=<?= $itemd['gameID'] ?>">
                        <div class="card">
                            <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $itemd['gameCoverImg'] ?>" alt="">
                            </div>
                            <div class="game-intro">
                                <h3><?= $itemd['gameName'] ?></h3>
                                <p>Free</p>
                            </div>
                            <div class="tagline"><?= $itemd['gameTagline'] ?></div>
                            
                                
                        </div>
                    </a> 
                    <div class="download">
                        <button id="down" onclick="dddddd">Download</button>
                    </div>
                </div>        
            <?php } ?>
            
        </div>


    <?php
        include 'includes/footer.php';
    ?>



        <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>
    
</body>



</html>