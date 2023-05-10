<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/devlog.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="flashMessage" id="flashMessage"></div>
    <div class="cover-img">
        <img src="/indieabode/public/uploads/devlogs/<?= $this->devlog['devlogImg'] ?>" alt="" />
    </div>

    <div class="container">
        <div class="details">
            <div class="details-top-bar">
                <div class="details-titlendate">
                    <div class="title"><?= $this->devlog['name']; ?></div>
                    <div class="published-date">Published 2 days ago</div>
                </div>
                <div class="devlog-like-btn">
                    <?php if ($this->likesStatus == "disliked" || $this->likesStatus == null) { ?>
                        <i class="fa fa-heart unliked like-btn" id="likeBtn"></i>
                    <?php } else if ($this->likesStatus == "liked") { ?>
                        <i class="fa fa-heart liked like-btn" id="likeBtn"></i>
                    <?php } ?>
                </div>
            </div>
            <div class="content">
                <?= $this->devlog['description']; ?>
            </div>
        </div>
        <div class="card">
            <div class="game-name"><?= $this->game['gameName']; ?></div>
            <div class="second-rows">
                <div class="game-type"><?= $this->game['gameType'] ?></div>
                <div class="price"><?= $this->gamePrice ?></div>
            </div>
            <div class="game-tagline modernWay">
                <?= $this->game['gameTagline']; ?>
            </div>
            <div class="btn" id="devlog-btn">Add to Library</div>
            <div class="overview">
                <div class="row">
                    <p>Status</p>
                    <p><?= $this->game['releaseStatus']; ?></p>
                </div>
                <hr id="line-break">
                <div class="row">
                    <p>Developer</p>
                    <p><?= $this->game['username']; ?></p>
                </div>
                <hr id="line-break">
                <div class="row">
                    <p>Genre</p>
                    <p><?= $this->game['gameClassification']; ?></p>
                </div>
                <hr id="line-break">
                <div class="row">
                    <p>Platform</p>
                    <p><?= $this->game['platform']; ?></p>
                </div>
                <hr id="line-break">
                <div class="row">
                    <p>Release Date</p>
                    <p id="release-date"></p>
                </div>
            </div>
        </div>
    </div>


    <div class="comments-box">

        <h3 id="comments-bar">Comments</h3>
        <?php if (isset($_SESSION['logged'])) { ?>
            <div class="main-comment">
                <textarea name="" id="" cols="30" rows="2" class="comment_textbox" placeholder="Write your comment..."></textarea>
                <br>
                <div class="add_comment_btn">Post Comment</div>
            </div>


        <?php } else { ?>


            <div class="login-link"><a href="/indieabode/login">Log in with Indieabode</a> to leave a comment.</div>
        <?php } ?>
        <div class="comment-container">
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>





    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            const months = ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            let releaseDate = "<?= $this->game['created_at'] ?>";

            let year = releaseDate.substr(0, 4);
            let month = releaseDate.slice(5, 7);
            let day = releaseDate.slice(8, 10);
            let monthName = months[parseInt(month) - 1];
            let formattedReleaseDate = day + " " + monthName + " " + year;

            $('#release-date').text(formattedReleaseDate);

            $(document).on('click', '.like-btn', function(e) {

                //e.preventDefault();

                // var thisClicked = $(this);
                // var cmt_id = thisClicked.closest('.comment').find('.reply-btn').attr("data-value");
                // var reply = thisClicked.closest('.comment').find('.reply_msg').val();


                var data = {
                    'cliked_like': true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                    data: data,
                    success: function(response) {
                        // alert(response);
                        // $('.reply').html("");
                        console.log(response);

                        if (response == '"liked"') {
                            $("#likeBtn").addClass("liked");
                            $("#likeBtn").removeClass("unliked");
                        } else if (response == '"disliked"') {
                            $("#likeBtn").addClass("unliked");
                            $("#likeBtn").removeClass("liked");
                        }

                    }
                })

            });


            $('.add_comment_btn').click(function(e) {

                var msg = $('.comment_textbox').val();

                if ($.trim(msg).length != 0) {

                    var data = {
                        'msg': msg,
                        'add_comment': true,
                    };

                    $.ajax({
                        type: "POST",
                        url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                        data: data,
                        success: function(response) {
                            // alert(response);
                            $('.comment_textbox').val("");

                        }
                    });
                }

            });

            load_comment();
            $('comment-container').html("");

            function load_comment() {

                $.ajax({
                    type: "POST",
                    url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                    data: {
                        'comment_load_data': true
                    },
                    success: function(response) {
                        $('comment-container').html("");
                        console.log(response);

                        $.each(response, function(key, value) {

                            $('.comment-container').
                            append('<div class="comment">\
                            <h4>' + value.user.username + '</h4>\
                            <div class="comment-content">' + value.cmt.comment + '</div>\
                            <div class="reply-btns">\
                                <div class="reply-btn" data-value="' + value.cmt.id + '">Reply</div>\
                                <div class="view-reply-btn" data-value="' + value.cmt.id + '">View Replies</div>\
                            </div>\
                            <div class="reply">\
                            </div>\
                            </div>\
                    ');

                        });
                    }
                })

            }



            $(document).on('click', '.reply-btn', function() {

                var thisClicked = $(this);
                var cmtID = thisClicked;


                $('.reply').html("");
                thisClicked.closest('.comment').find('.reply').
                html('<input type="text" class="reply_msg">\
                <div class="reply-end">\
                    <div class="reply-add-btn">Reply</div>\
                    <div class="reply-cancel-btn">Cancel</div>\
                </div>');

            });

            $(document).on('click', '.reply-cancel-btn', function() {
                $('.reply').html("");
            });

            $(document).on('click', '.reply-add-btn', function(e) {

                //e.preventDefault();

                var thisClicked = $(this);
                var cmt_id = thisClicked.closest('.comment').find('.reply-btn').attr("data-value");
                var reply = thisClicked.closest('.comment').find('.reply_msg').val();


                var data = {
                    'comment_id': cmt_id,
                    'reply_msg': reply,
                    'add_reply': true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                    data: data,
                    success: function(response) {
                        // alert(response);
                        $('.reply').html("");
                    }
                })

            });


            $(document).on('click', '.view-reply-btn', function(e) {
                // e.preventDefault();



                var thisClicked = $(this);
                var cmt_id = thisClicked.attr("data-value");

                // console.log(cmt_id);

                $.ajax({
                    type: "POST",
                    url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                    data: {
                        'cmt_id': cmt_id,
                        'view_comment_data': true
                    },
                    success: function(response) {
                        // console.log(response);

                        $('.reply').html("");
                        $.each(response, function(key, value) {

                            thisClicked.closest('.comment').find('.reply').
                            append('<div class="sub_comment">\
                                    <input type="hidden" class="get_username" value="' + value.replier.username + '"/>\
                                    <h4> ' + value.replier.username + ' </h4>\
                                    <div class="comment-content">' + value.reply.replyMsg + ' </div>\
                                    <div class="reply-btns">\
                                        <div class="sub-reply-btn" data-value="' + value.reply.id + '">Reply</div>\
                                    </div>\
                                    <div class="sub_reply">\
                                    </div>\
                                    </div>\ ');


                        });

                    }
                });

            });

            $(document).on('click', '.sub-reply-btn', function(e) {

                var thisChecked = $(this);
                var cmt_id = thisChecked.attr('data-value');

                var username = thisChecked.closest('.sub_comment').find('.get_username').val();

                $('.sub_reply').html("");
                thisChecked.closest('.sub_comment').find('.sub_reply').
                append('<input type="text" value="@' + username + ' " class="sub_reply_msg">\
                <div class="reply-end">\
                    <div class="sub-reply-add-btn">Reply</div>\
                    <div class="sub-reply-cancel-btn">Cancel</div>\
                </div>');

            });

            //add replies to an already published reply -- function to save that value into database
            $(document).on('click', '.sub-reply-add-btn', function() {

                var thisClicked = $(this);
                var cmt_id = thisClicked.closest('.comment').find('.reply-btn').attr('data-value');
                var reply = thisClicked.closest('.sub_reply').find('.sub_reply_msg').val();

                console.log(cmt_id);

                var data = {
                    'cmt_id': cmt_id,
                    'reply_msg': reply,
                    'add_subreplies': true
                }


                $.ajax({
                    type: "POST",
                    url: "/indieabode/devlogComments?id=<?= $this->devlog['devLogID']; ?>",
                    data: data,
                    success: function(response) {
                        $('.reply').html("");
                    }
                });

            });


            $(document).on('click', '.sub-reply-cancel-btn', function() {
                $('.sub_reply').html("");
            });


        });
    </script>



    <script>
        $(document).ready(function() {

            let btnStatus = 0;

            <?php if ($this->hasClaimed) { ?>
                $('#devlog-btn').text("In Library");
                btnStatus = 1;
            <?php } else { ?>
                <?php if ($this->game['gamePrice'] == "0") { ?>
                    $('#devlog-btn').text("Add to Library");
                    btnStatus = 2;
                <?php } else if ($this->game['gamePrice'] != "0") { ?>
                    <?php if ($this->hasInCart) { ?>
                        $('#devlog-btn').text("View Cart");
                        btnStatus = 3;
                    <?php } else { ?>
                        $('#devlog-btn').text("Add to Cart");
                        btnStatus = 4;
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            console.log(btnStatus);

            $('#devlog-btn').click(function() {

                if (btnStatus == 1) {
                    window.location.href = "/indieabode/library";
                } else if (btnStatus == 2) {

                    let gameID = <?= $this->game['gameID']; ?>;

                    var data = {
                        'gameID': gameID,
                        'add_to_library': true,
                    };

                    $.ajax({
                        url: "/indieabode/devlog/addtoLibrary",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            if (response == "1") {
                                btnStatus = 1;
                                $('#devlog-btn').text("In Library");

                                $("#flashMessage").html('Added to the Library')
                                $("#flashMessage").fadeIn(1000);

                                setTimeout(function() {
                                    $("#flashMessage").fadeOut("slow");
                                }, 4000);

                            }
                            // alert(response);
                        }
                    })

                } else if (btnStatus == 3) {
                    window.location.href = "/indieabode/cart";
                } else if (btnStatus == 4) {

                    let gameID = <?= $this->game['gameID']; ?>;

                    var data = {
                        'gameID': gameID,
                        'add_to_cart': true,
                    };

                    $.ajax({
                        url: "/indieabode/devlog/AddToCart",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            if (response == "1") {

                                btnStatus = 3;
                                $('#devlog-btn').text("View Cart");

                                $("#flashMessage").html('Added to the Cart')
                                $("#flashMessage").fadeIn(1000);

                                setTimeout(function() {
                                    $("#flashMessage").fadeOut("slow");
                                }, 4000);

                            }
                        }
                    })

                }

            });


        });
    </script>

</body>



</html>