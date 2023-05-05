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
            <p>Post Type</p>

            <div class="type-filter">

                <?php foreach ($this->posttypes as $posttype) { ?>
                    <div class="elements">
                        <input type="checkbox" name="posttypes[]" id="<?= $posttype['id']; ?>" class="checkbox" value="<?= $posttype['postType']; ?>" <?php if (in_array($posttype['postType'], $this->checked)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?> />
                        <label for="<?= $posttype['id']; ?>"><?= $posttype['postType']; ?></label>
                    </div>
                <?php } ?>


            </div>
            <button type="submit" id="filter-button">Apply</button>
        </form>
    </div>
    <div class="upper-break">
        <div class="trigger" onclick="openSideMenu()">
            <i class="fa fa-angle-double-right" id="filter-off"></i>
            <i class="fa fa-angle-double-left" id="filter-on"></i> filters
        </div>
        <div class="sort" id="sort">
            <img src="/indieabode/public/images/games/sort.png" alt="" /> sort by: <span>Release Date</span>
        </div>
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
                    <div class="post-title">
                        <div class="title">
                            <p><?= $devlog['gameName'] ?></p>
                        </div>
                        <div class="images">
                            <div class="like-image">
                                <div class="like-logo"><img src="/indieabode/public/images/devlogs/like.png" alt="" /></div>
                                <div class="like-count"><?= $devlog['likeCount'] ?></div>
                            </div>
                            <div class="comment-image">
                                <div class="cmt-logo"><img src="/indieabode/public/images/devlogs/comment.png" alt="" /></div>
                                <div class="cmt-count"><?= $devlog['commentCount'] ?></div>

                            </div>
                        </div>
                    </div>
                    <div class="game-intro">
                        <h3><?= $devlog['name'] ?></h3>
                    </div>

                    <div class="tagline">
                        <?= $devlog['Tagline'] ?>
                    </div>
                </div>
            </a>
        <?php } ?>

    </div>

    <!--Pagination-->

    <div class="pagination">
        <a href="/indieabode/devlogs?page=<?= $this->prevPage; ?>" id="prev"><i class="fa fa-angle-left"></i></a>
        <?php for ($i = 1; $i <= $this->devlogPagesCount; $i++) : ?>
            <a href="/indieabode/devlogs?page=<?= $i; ?>" class="active"><?= $i ?></a>
        <?php endfor; ?>


        <a href="/indieabode/devlogs?page=<?= $this->nextPage; ?>" id="next"><i class="fa fa-angle-right"></i></a>

    </div>

    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        <?php if (!isset($_GET['page']) || $_GET['page'] == 1) { ?>
            document.getElementById("prev").style.pointerEvents = "none";
        <?php  } ?>

        <?php if (!isset($_GET['page']) || $_GET['page'] == $this->devlogPagesCount) { ?>
            document.getElementById("next").style.pointerEvents = "none";
        <?php  } ?>
    </script>


</body>



</html>