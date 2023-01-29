<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/devlogs.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <!--Page Topic-->
    <div class="page-topic">
        <h1>-Devlogs-</h1>
    </div>

    <!-- Filters-->

    <div class="side-nav" id="side-menu">
        <form action="" method="GET">
            <button type="submit">Search</button>
            <p>Post Type</p>

            <div class="type-filter">

                <?php foreach ($this->posttypes as $posttype) { ?>
                    <div class="elements">
                        <input type="checkbox" name="posttypes[]" id="Windows" class="checkbox" value="<?= $posttype['postType']; ?>" <?php if (in_array($posttype['postType'], $this->checked)) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?> />
                        <label for="Windows"><?= $posttype['postType']; ?></label>
                    </div>
                <?php } ?>


            </div>
        </form>
    </div>
    <div class="upper-break">
        <div class="trigger" onclick="openSideMenu()">
            <i class="fa fa-angle-double-right" id="filter-off"></i>
            <i class="fa fa-angle-double-left" id="filter-on"></i> filters
        </div>
        <a href="/indieabode/pages/devlogForm.php">
            <button type="submit" name="submit" id="adddev">Add a devlog</button>
        </a>
    </div>

    <hr id="topic-break" />

    <!--Cards-->

    <div class="container" id="card-container">

        <?php foreach ($this->devlogs as $devlog) { ?>
            <a href="/indieabode/devlog?id=<?= $devlog['devLogID'] ?>">
                <div class="card">
                    <div class="card-image game">
                        <img src="/indieabode/public/uploads/devlogs/<?= $devlog['devlogImg'] ?>" alt="">

                        <div class="dev-log-type">
                            <h4><?= $devlog['Type'] ?></h4>
                        </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $devlog['name'] ?></h3>
                        <div class="cmts">
                            <img src="../uploads/devlog/<?= $devlog['devlogImg'] ?>" alt="">
                        </div>
                    </div>
                    <div class="post-title">
                        <h3><?= $devlog['gameName'] ?></h3>
                    </div>
                    <div class="tagline">
                        <h3><?= $devlog['Tagline'] ?></h3>
                    </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!--Pagination-->

    <div class="pagination">
        <a href="#"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#"><i class="fa fa-angle-right"></i></a>
    </div>


    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>

</body>



</html>