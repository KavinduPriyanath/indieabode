<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/game.css';
        ?><?php
            include 'public/css/game-review.css';
            ?><?php include 'public/css/review-modal.css' ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <h2 id="heading"><?= $this->game['gameName'] ?></h2>

    <div class="topics">
        <a href="/indieabode/game?id=<?= $this->game['gameID'] ?>">Overview
        </a>
        <a href="/indieabode/game/reviews?id=<?= $this->game['gameID'] ?>">Reviews</a>
    </div>
    <hr id="topic-break">

    <div class="review-header">
        <div class="review-title">Game Name</div>
        <div class="review-body">
            <div class="column-one">
                <div class="total-rating"><span id="average_rating">0.0</span> / 5</div>
                <div class="rated-stars">
                    <i class="fa fa-star unchecked main_star"></i>
                    <i class="fa fa-star unchecked main_star"></i>
                    <i class="fa fa-star unchecked main_star"></i>
                    <i class="fa fa-star unchecked main_star"></i>
                    <i class="fa fa-star unchecked main_star"></i>
                </div>
                <div class="review-count"><span id="total_review">0</span> Reviews</div>
            </div>
            <div class="column-two">
                <div class="review-progress">
                    <div class="rate-number">5</div>
                    <i class="fa fa-star checked"></i>
                    <div class="progress-bar-border">
                        <div class="progress-bar" id="five_star_progress"></div>
                    </div>
                    <div class="rate-count">(<span id="total_five_star_review"></span>)</div>
                </div>
                <div class="review-progress">
                    <div class="rate-number">4</div>
                    <i class="fa fa-star checked"></i>
                    <div class="progress-bar-border">
                        <div class="progress-bar" id="four_star_progress"></div>
                    </div>
                    <div class="rate-count">(<span id="total_four_star_review"></span>)</div>
                </div>
                <div class="review-progress">
                    <div class="rate-number">3</div>
                    <i class="fa fa-star checked"></i>
                    <div class="progress-bar-border">
                        <div class="progress-bar" id="three_star_progress"></div>
                    </div>
                    <div class="rate-count">(<span id="total_three_star_review"></span>)</div>
                </div>
                <div class="review-progress">
                    <div class="rate-number">2</div>
                    <i class="fa fa-star checked"></i>
                    <div class="progress-bar-border">
                        <div class="progress-bar" id="two_star_progress"></div>
                    </div>
                    <div class="rate-count">(<span id="total_two_star_review"></span>)</div>
                </div>
                <div class="review-progress">
                    <div class="rate-number">1</div>
                    <i class="fa fa-star checked"></i>
                    <div class="progress-bar-border">
                        <div class="progress-bar" id="one_star_progress"></div>
                    </div>
                    <div class="rate-count">(<span id="total_one_star_review"></span>)</div>
                </div>
            </div>
            <div class="column-three">
                <div class="write-text">Write Review Here</div>
                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") { ?>
                    <button data-modal-target="#modal" id="review-btn" class="UnReviewed">Add Review</button>
                <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] != "gamer") { ?>
                    <button data-modal-target="#modal-incorrectRole">Add Review</button>
                <?php } else { ?>
                    <div class="text"><a href="/indieabode/login">Log in with indieabode</a> to leave a review</div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--Reviews-->
    <div class="reviews">
        <h3>Ratings</h3>

        <div id="review_content"></div>


    </div>


    <div class="review-modal">
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Rate & Review "<?= $this->game['gameName'] ?>"</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <p>Please describe what you liked or disliked about this game and whether you recommend it to others.</p>
                <p>Please remember to be polite and follow the Rules and Guidelines</p>
                <div class="report-heading">
                    Choose a rating from 1 to 5

                    <div class="stars">
                        <i class="fa fa-star unchecked submit_star" id="submit_star_1" data-rating="1"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_2" data-rating="2"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_3" data-rating="3"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_4" data-rating="4"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_5" data-rating="5"></i>
                    </div>
                </div>
                <div class="report-form">


                    <h3>Review Topic</h3>
                    <input type="text" name="topic" id="topic">
                    <h3>Your Review</h3>
                    <textarea name="review" id="review" cols="30" rows="7"></textarea>

                    <input type="hidden" name="rating" id="ratingCount">

                    <h4>Do you recommend this game?</h4>
                    <input type="radio" name="recommendation" id="Yes" value="Yes"> Yes
                    <input type="radio" name="recommendation" id="No" value="No"> No
                    <br />
                    <div class="modal-bottom">
                        <div class="modal-submit">
                            <button type="submit" id="save-review" class="save-review">Post Review</button>
                        </div>
                        <div class="modal-delete">
                            <a href="" id="delete-review" onclick="DeleteConfirmation()">
                                Delete Rating & Review
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="overlay"></div>
    </div>

    <div class="incorrectRole-modal">
        <div class="modal" id="modal-incorrectRole">
            <div class="modal-header">
                <div class="title">Rate & Review "<?= $this->game['gameName'] ?>"</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">

                <div class="report-heading">
                    Sign-in As a Gamer


                </div>

            </div>
        </div>
        <div id="overlay"></div>
    </div>




    <script src="<?php echo BASE_URL; ?>public/js/assets.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/game-review.js"></script>


    <script>
        function DeleteConfirmation() {
            let message = "Are you sure you want to delete your rating & review?";
            let redirect = document.getElementById("delete-review");

            if (confirm(message) == true) {
                redirect.href = "/indieabode/gameReviews/DeleteReview?id=<?= $this->game['gameID'] ?>";
            } else {
                //nothin happens
            }
        }

        $(document).ready(function() {
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

            $('#save-review').click(function() {

                var review = $('#review').val();
                var topic = $('#topic').val();
                var recommendation = $("input[name='recommendation']:checked").val();
                var rating = $('#ratingCount').val();

                $.ajax({
                    url: "/indieabode/gameReviews?id=<?= $this->game['gameID'] ?>",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        review: review,
                        topic: topic,
                        recommendation: recommendation,
                        rating: rating
                    },
                    success: function(data) {
                        $('#modal').removeClass("active");
                        $('#overlay').removeClass("active");
                        $('#review-btn').html('Edit Review');

                        load_rating_data();
                    }
                })

            });


            load_rating_data();

            function load_rating_data() {
                $.ajax({
                    url: "/indieabode/gameReviews?id=<?= $this->game['gameID'] ?>",
                    method: "POST",
                    data: {
                        action: 'load_data'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);

                        if (data.has_reviewed) {
                            $('#review-btn').html('Edit Review');
                            $('#review-btn').addClass("Reviewed");
                            $('#review-btn').removeClass('UnReviewed');
                            $('#topic').val(data.thisUserReviewTopic);
                            $('#review').val(data.thisUserReviewContent);
                            $('#ratingCount').val(data.thisUserReviewAverageRating);
                            if (data.thisUserReviewRecommendation == "Yes") {
                                $("#Yes").prop("checked", true);
                            } else if (data.thisUserReviewRecommendation == "No") {
                                $("#No").prop("checked", true);
                            }

                            $('.modal-delete').css("display", "block");


                        } else {
                            $('#review-btn').html('Add Review');
                            $('#review-btn').removeClass('Reviewed');
                            $('#review-btn').addClass('UnReviewed');
                            $('.modal-delete').css("display", "none");
                        }

                        var count_submitted_star = 0;

                        $('.submit_star').each(function() {
                            count_submitted_star++;
                            if (Math.ceil(data.thisUserReviewAverageRating) >= count_submitted_star) {
                                $(this).addClass('checked');
                                $(this).removeClass('unchecked');
                            }
                        });

                        var count_star = 0;

                        $('.main_star').each(function() {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('checked');
                                $(this).removeClass('unchecked');
                            }
                        });


                        $('#total_five_star_review').text(data.five_star_review);

                        $('#total_four_star_review').text(data.four_star_review);

                        $('#total_three_star_review').text(data.three_star_review);

                        $('#total_two_star_review').text(data.two_star_review);

                        $('#total_one_star_review').text(data.one_star_review);

                        $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                        $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                        $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                        $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                        $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                        if (data.review_data.length > 0) {
                            var html = '';

                            for (var count = 0; count < data.review_data.length; count++) {


                                html += '<div class="review">';
                                html += '<div class="leftr">';
                                html += '<div class="left-icon">';
                                html += '<img src="/indieabode/public/images/games/profile.png" alt="" />';
                                html += '</div>';
                                html += '<div class="left-name">';
                                html += '<p class="username">' + data.username + '</p>';
                                html += '<p class="assets-count">114 games in account</p>';
                                html += '<p class="reviews-count">Reviews:&nbsp;11</p>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="right">';
                                html += '<div class="recommendation">';
                                html += '</div>';
                                html += '<div class="rating-stars">';

                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';

                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'checked';
                                    } else {
                                        class_name = 'unchecked';
                                    }
                                    html += '<i class="fa fa-star ' + class_name + ' "></i>';
                                }

                                html += '<p>12 Dec 2021</p>';
                                html += '</div>';
                                html += '<h3 class="review-title">' + data.review_data[count].reviewTopic + '</h3>';
                                html += '<p class="review-detail">' + data.review_data[count].review + '</p>';
                                html += '<div class="like-buttons">';
                                html += '<i class="fa fa-thumbs-up"></i>';
                                html += '<i class="fa fa-thumbs-down"></i>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                            }

                            $('#review_content').html(html);

                        }
                    }
                })
            }

        });
    </script>


</body>



</html>