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
        include 'public/css/ratesubmissions.css';
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
        </div>

        <hr id="topic-break">
        <br>


    </div>


    <div class="game-details">
        <div class="left-details">
            <div class="game-image"><img src="/indieabode/public/uploads/games/cover/<?= $this->submission['gameCoverImg'] ?>" alt="" /></div>
            <div class="game-info">
                <div class="game-name"><?= $this->submission['gameName'] ?></div>
                <div class="submitted-by">Submitted by <?= $this->submission['username'] ?></div>
                <div class="view-game"><a href="/indieabode/game?id=<?= $this->submission['gameID'] ?>">View Game Page</a></div>
            </div>
        </div>
        <div class="right-details">
            <div class="game-buttons">
                <div class="download">Download</div>
            </div>
        </div>
    </div>
    <div class="more-game-details">
        <div class="screenshots">
            <div class="tagline"><?= $this->submission['gameTagline'] ?></div>
            <div class="screenshot-container">
                <?php foreach ($this->screenshots as $screenshot) { ?>
                    <div class="screenshot-img">
                        <img src="/indieabode/public/uploads/games/ss/<?= $screenshot ?>" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="ratings">
            <div class="rating-content">
                <div class="theme-bar">
                    Theme : <span id="theme">Stuck Together</span>
                </div>
                <div class="instruction-cover">
                    <div class="instructions">
                        <div class="topic">
                            Instructions for Voting:
                        </div>
                        <div class="instruction-list">
                            <ul>
                                <li>Download & Play the game before rating.</li>
                                <li>Check whether the submission matches with the theme of the gamejam</li>
                                <li>Check how much the submission valid with the given critierias</li>
                                <li>Then Vote</li>
                                <li>Remember: You cannot change your vote after you have voted on</li>
                            </ul>
                        </div>
                    </div>
                    <div class="rankings">

                        <div class="rank-status"></div>


                    </div>
                </div>


                <div class="rating-head">
                    <div class="rating-header">
                        Rate this Game
                    </div>
                    <div class="status" id="status"></div>
                </div>
                <div class="rating-block">
                    <div class="stars">
                        <i class="fa fa-star unchecked submit_star" id="submit_star_1" data-rating="1"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_2" data-rating="2"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_3" data-rating="3"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_4" data-rating="4"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_5" data-rating="5"></i>
                    </div>
                    <div class="save" id="save-my-vote">Save Vote</div>
                </div>
            </div>



        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            <?php if (isset($_SESSION['logged'])) { ?>
                <?php if ($_SESSION['userRole'] == "game developer") { ?>
                    $('#status').text("You do not have privilege to vote");
                    $('.ratings').css('pointer-events', 'none');
                    $('#save-my-vote').hide();
                <?php } ?>

                <?php if ($_SESSION['userRole'] == "gamer") { ?>
                    <?php if (!empty($this->ratingData)) { ?>
                        $('.ratings').css('pointer-events', 'none');
                        $('#status').text("You have voted on this game");
                        $('#save-my-vote').text("Saved");
                    <?php } else { ?>
                        $('#status').text("You haven't voted on this game yet");
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                $('#status').text("Log in to vote");
                $('.stars').css('pointer-events', 'none');
                $('#save-my-vote').hide();
            <?php } ?>

            <?php if ($this->jam['submissionStartDate'] < date("Y-m-d H:i:s") && $this->jam['submissionEndDate'] > date("Y-m-d H:i:s")) { ?>
                $('.rank-status').text("Voting has not begun yet");
                $('.ratings').css('pointer-events', 'none');
            <?php } else if ($this->jam['submissionEndDate'] < date("Y-m-d H:i:s") && $this->jam['votingEndDate'] > date("Y-m-d H:i:s")) { ?>
                $('.rank-status').text("Voting in Progress");
            <?php } else { ?>
                $('.rank-status').text("Voting has ended");
                $('.ratings').css('pointer-events', 'none');
            <?php } ?>



            var rating_data = 0;

            $(document).on("mouseenter", ".submit_star", function() {
                var rating = $(this).data("rating");

                resetBackground();

                for (var count = 1; count <= rating; count++) {
                    $("#submit_star_" + count).removeClass("unchecked");
                    $("#submit_star_" + count).addClass("checked");
                }
            });

            function resetBackground() {
                for (var count = 1; count <= 5; count++) {
                    $("#submit_star_" + count).addClass("unchecked");
                    $("#submit_star_" + count).removeClass("checked");
                }
            }

            $(document).on("mouseleave", ".submit_star", function() {
                resetBackground();

                for (var count = 1; count <= rating_data; count++) {
                    $("#submit_star_" + count).removeClass("unchecked");

                    $("#submit_star_" + count).addClass("checked");
                }
            });

            $(document).on("click", ".submit_star", function() {
                rating_data = $(this).data("rating");
            });

            $('#save-my-vote').click(function() {

                let jamID = <?= $_GET['jam'] ?>;
                let submissionID = <?= $_GET['id'] ?>;

                $.ajax({
                    url: "/indieabode/jam/saveRating",
                    method: "POST",
                    data: {
                        'jamID': jamID,
                        'submissionID': submissionID,
                        'rating_data': rating_data,
                        'save_rating': true,
                    },
                    success: function(data) {

                        $('.ratings').css('pointer-events', 'none');
                        $('#status').text("You have voted on this game");
                        $('#save-my-vote').text("Saved");
                        // load_rating_data();
                    }
                })

            });

            loadMyRating();

            function loadMyRating() {

                let jamID = <?= $_GET['jam'] ?>;
                let submissionID = <?= $_GET['id'] ?>;

                $.ajax({
                    url: "/indieabode/jam/loadGamerRating",
                    method: "POST",
                    data: {
                        'jamID': jamID,
                        'submissionID': submissionID,
                        'load_rating': true,
                    },
                    success: function(data) {

                        console.log(data);
                        // load_rating_data();

                        var count_submitted_star = 0;

                        $('.submit_star').each(function() {
                            count_submitted_star++;
                            if (Math.ceil(data) >= count_submitted_star) {
                                $(this).addClass('checked');
                                $(this).removeClass('unchecked');
                            }
                        });
                    }
                })

            }

        });
    </script>

</body>

</html>