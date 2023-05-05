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
        include 'public/css/reportModal.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>

<body>

    <div class="flashMessage" id="flashMessage"></div>

    <div class="containerJam">


        <div class="box">
            <h1><?= $this->jam['jamTitle']; ?></h1>
        </div>

        <div class="topics">

            <a href="/indieabode/jam?id=<?= $this->jam['gameJamID'] ?>">Overview</a>
            <a href="/indieabode/jam/submission?id=<?= $this->jam['gameJamID'] ?>" id="submissionPage">Submissions</a>
            <a href="/indieabode/jam/results?id=<?= $this->jam['gameJamID'] ?>" id="resultPage">Results</a>
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
                <?php if (empty($this->isBanned)) { ?>

                    <?php if ($_SESSION['id'] == $this->jam['jamHostID']) { ?>
                        <div class="banned-btn">Ban this Submission</div>
                    <?php } else if ($_SESSION['userRole'] != "gamejam organizer") { ?>
                        <div class="report" data-modal-target="#modal">Report</div>
                    <?php } ?>

                <?php } else { ?>

                    <div class="banned-btn">This Submission has been banned</div>

                <?php } ?>

                <div class="download" id="download-btn">Download</div>

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
                        <div class="total-rating"><?= $this->totalRating['rating'] ?></div>
                        <div class="rank">Rank: <?= $this->rank ?></div>


                    </div>
                </div>


                <div class="voting-block">
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

                <div class="ranked-block">
                    <div class="total-rating-heading">Total Rating: <span><?= $this->totalRating['rating'] ?></span></div>
                    <div class="rank-text">This game is ranked at</div>
                    <div class="game-rank">#<?= $this->rank ?></div>
                    <div class="rank-text-bottom">out of <?= $this->totalSubmissions ?> games</div>
                </div>
            </div>



        </div>
    </div>


    <div class="report-modal">
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Report page "Game Name"</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <div class="report-heading">
                    Please complete this form if you need to contact the Bullet Hell Jam Organizers
                    about the content of this page. Your report may be
                    shared with the creator of the submission if necessary.
                </div>
                <div class="report-form">
                    <h3>Reasons</h3>

                    <div class="reasons">


                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Invalid Jam Submission" />
                            <label for="">Invalid Jam Submission - Mismatches with theme, breaks rules, etc</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Broken" />
                            <label for="">Broken - Doesn't run, download, and crashes</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Offensive Material" />
                            <label for="">Offensive Material</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Uploader Not Authorized to Distribute" />
                            <label for="">Uploader Not Authorized to Distribute</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Miscategorized" />
                            <label for="">Miscategorized - Shows up on wrong part of site, incorrect tags, incorrect platforms etc</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Spam" />
                            <label for="">Spam</label>
                        </div>
                        <div class="reason">
                            <input type="radio" name="reasons" id="" value="Other" />
                            <label for="">Other</label>
                        </div>


                    </div>

                    <h3>Descrption</h3>
                    <textarea name="" id="description" cols="30" rows="10"></textarea>

                    <br />
                    <button type="submit" id="report-submit">Submit Report</button>
                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/js/reportModal.js"></script>

    <script>
        <?php if ($this->jamEnded == false) { ?>
            document.getElementById("resultPage").style.color = "grey";
            document.getElementById("resultPage").style.pointerEvents = "none";
        <?php } ?>
    </script>

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
                $('.voting-block').hide();
                $('.ranked-block').hide();
            <?php } else if ($this->jam['submissionEndDate'] < date("Y-m-d H:i:s") && $this->jam['votingEndDate'] > date("Y-m-d H:i:s")) { ?>
                $('.rank-status').text("Voting in Progress");
                $('.voting-block').show();
                $('.ranked-block').hide();
            <?php } else { ?>
                $('.rank-status').text("Voting has ended");
                $('.voting-block').hide();
                $('.ranked-block').show();
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

    <script>
        $(document).ready(function() {

            <?php if (!empty($this->isBanned)) { ?>
                $('.banned-btn').css('pointer-events', 'none');
            <?php } ?>

            $('#report-submit').click(function() {



                var description = $('#description').val();
                var reason = $("input[name='reasons']:checked").val();
                var jamID = <?= $_GET['jam'] ?>;
                var submissionID = <?= $_GET['id'] ?>;

                var data = {
                    'description': description,
                    'reason': reason,
                    'jamID': jamID,
                    'submissionID': submissionID,
                    'report_submit': true,
                };

                $.ajax({
                    url: "/indieabode/jam/report",
                    method: "POST",
                    data: data,
                    success: function(response) {
                        alert(response);
                        $('#modal').removeClass("active");
                        $('#overlay').removeClass("active");

                        // alert(response);
                    }
                })

            });


            //Downloading the game and showing a flash message thanking
            $('#download-btn').click(function() {

                window.location.href = "/indieabode/jam/downloadSubmission?id=<?= $this->submission['gameID'] ?>";


                $("#flashMessage").html('Thanks for downloading');
                $("#flashMessage").fadeIn(2000);

                setTimeout(function() {
                    $("#flashMessage").fadeOut("slow");
                }, 4000);

            });

            $('.banned-btn').click(function() {

                let message = "Are you sure you want to ban the submission <?= $this->submission['gameName'] ?>";

                if (confirm(message) == true) {
                    $('.banned-btn').text("Please Wait...");

                    let submissionName = "<?= $this->submission['gameName'] ?>";
                    let submittedJam = "<?= $this->jam['jamTitle']; ?>";
                    let username = "<?= $this->submission['username'] ?>";
                    let email = "<?= $this->submission['email'] ?>";
                    let jamID = <?= $_GET['jam'] ?>;
                    let submissionID = <?= $_GET['id'] ?>;

                    var data = {
                        'submissionName': submissionName,
                        'submittedJam': submittedJam,
                        'username': username,
                        'email': email,
                        'jamID': jamID,
                        'submissionID': submissionID,
                        'banned_submission': true,
                    };

                    $.ajax({
                        url: "/indieabode/jam/banSubmission",
                        method: "POST",
                        data: data,
                        success: function(response) {
                            // alert(response);

                            $("#flashMessage").html('Email has been sent');
                            $("#flashMessage").fadeIn(2000);
                            $('.banned-btn').text("This Submission is already banned");

                            setTimeout(function() {
                                $("#flashMessage").fadeOut("slow");
                            }, 4000);
                        }
                    })

                } else {
                    //nothin happens
                }

            });


        });
    </script>

</body>

</html>