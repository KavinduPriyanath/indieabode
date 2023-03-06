<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>


    <style>
        <?php
        include 'public/css/search.css';
        // include 'public/css/gigs.css';
        // include 'public/css/assets.css';
        ?>
    </style>



</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="search-topic">

        <div class="search-header">
            <div class="search-head">
                <p>Searched "
                    <span id="query"><?= $_GET['q']; ?></span>" in
                </p>
            </div>
            <div class="custom-select">
                <form action="/indieabode/search?q=<?= $_GET['q']; ?>" method="GET">
                    <!-- <select onchange="this.form.submit()"> -->
                    <select id="search_field">\
                        <option value="games" id="games">games</option>
                        <?php foreach ($this->options as $option) { ?>

                            <option value="<?= $option ?>" id="<?= $option ?>"><?= $option ?></option>
                        <?php } ?>

                    </select>
                </form>
            </div>
        </div>




    </div>

    <hr id="topic-break" />

    <div class="container" id="card-container">

        <?php foreach ($this->games as $game) { ?>
            <a href="/indieabode/game?id=<?= $game['gameID'] ?>">
                <div class="card">
                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/<?= $game['gameCoverImg'] ?>" alt="">
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





    <script>
        $(document).ready(function() {


            $("#search_field").change(function() {

                var id = $(this).children(":selected").attr("id");

                if ($.trim(id).length != 0) {

                    var data = {
                        'msg': id,
                        'filter_changed': true,
                    };

                    $.ajax({
                        type: "POST",
                        url: "/indieabode/search/result?q=<?= $_GET['q']; ?>",
                        data: data,
                        success: function(response) {
                            $('.container').html("");

                            console.log(response);
                            //$('.comment_textbox').val("");

                            $.each(JSON.parse(response), function(key, value) {

                                if (id == "gigs") {
                                    $('.container').
                                    append('<a href="/indieabode/gig?id= ' + value.gigID + '">\
                                                                    <div class="gcard">\
                                                                        <h3 id="gig-name">' + value.gigName + '</h3>\
                                                                        <div class="gcard-image">\
                                                                            <img src="/indieabode/public/uploads/gigs/cover/' + value.gigCoverImg + '" alt="" />\
                                                                        </div>\
                                                                        <div class="gig-info">\
                                                                            <div class="left">\
                                                                                <div class="pp-icon"><img src="/indieabode/public/images/cards/profile.png" alt="" /></div>\
                                                                                <div class="pp-details">\
                                                                                    <h3>Prend</h3>\
                                                                                    <p>Trust Rank: 2</p>\
                                                                                </div>\
                                                                            </div>\
                                                                            <div class="right">\
                                                                                <div class="gstars">\
                                                                                    <div class="star-logo"><img src="/indieabode/public/images/cards/star.png" alt="" /></div>\
                                                                                    <div class="rating">4.9</div>\
                                                                                </div>\
                                                                                <div class="rating-count">(7)</div>\
                                                                            </div>\
                                                                        </div>\
                                                                        <div class="gtagline"> ' + value.gigTagline + '</div>\
                                                                    </div>\
                                                                </a>\ ');
                                } else if (id == "assets") {

                                    $('.container').
                                    append('<a href="/indieabode/asset?id=' + value.assetID + '">\
                                                <div class="card">\
                                                    <div class="card-image game"> <img src="/indieabode/public/uploads/assets/cover/' + value.assetCoverImg + '" alt="">\
                                                        <div class="asset-type"> ' + value.assetType + ' </div>\
                                                    </div>\
                                                    <div class="game-intro">\
                                                        <h3>' + value.assetName + '</h3>\
                                                        <p>Free</p>\
                                                    </div>\
                                                    <div class="tagline">' + value.assetTagline + '</div>\
                                                </div>\
                                            </a>\ ');

                                } else if (id == "devlogs") {

                                    $('.container').
                                    append('<a href="/indieabode/devlog?id=' + value.devLogID + '">\
                                                <div class="dcard">\
                                                    <div class="dcard-image game">\
                                                        <img src="/indieabode/public/uploads/devlogs/' + value.devlogImg + '" alt="">\
                                                        <div class="dev-log-type">\
                                                            <h4>' + value.Type + '</h4>\
                                                        </div>\
                                                    </div>\
                                                    <div class="post-title">\
                                                        <div class="title">\
                                                            <p>' + value.gameName + '</p>\
                                                        </div>\
                                                        <div class="images">\
                                                            <div class="like-image">\
                                                                <div class="like-logo"><img src="/indieabode/public/images/devlogs/like.png" alt="" /></div>\
                                                                <div class="like-count">' + value.likeCount + '</div>\
                                                            </div>\
                                                            <div class="comment-image">\
                                                                <div class="cmt-logo"><img src="/indieabode/public/images/devlogs/comment.png" alt="" /></div>\
                                                                <div class="cmt-count">' + value.commentCount + '</div>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                    <div class="dgame-intro">\
                                                        <h3>' + value.name + '</h3>\
                                                    </div>\
                                                    <div class="dtagline">\
                                                    ' + value.Tagline + '\
                                                    </div>\
                                                </div>\
                                            </a>\ ');

                                } else if (id == "crowdfundings") {

                                    $('.container').
                                    append('<a href="/indieabode/crowdfund?id=' + value.crowdFundID + '">\
                                                <div class="ccard">\
                                                    <div class="ccard-image"> <img src="/indieabode/public/uploads/crowdfunds/covers/' + value.crowdfundCoverImg + '" alt="">\
                                                    </div>\
                                                    <div class="cgame-intro">\
                                                        <h3>' + value.gameName + '</h3>\
                                                    </div>\
                                                    <div class="fund-amount">\
                                                        <p>122% Funded</p>\
                                                    </div>\
                                                    <div class="dev">\
                                                        By ' + value.gameDeveloperName + '\
                                                    </div>\
                                                    <div class="last-row">\
                                                        <div class="deadline">Ends in 3 days</div>\
                                                        <div class="clikes">\
                                                            <div class="logo-likes"><img src="/indieabode/public/images/devlogs/like.png" alt=""></div>\
                                                            <div class="clike-count">11</div>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </a>\ ');
                                } else if (id == "games") {
                                    console.log("im here");
                                    $('.container').append('<a href="/indieabode/game?id=' + value.gameID + '">\
                                                                <div class="card">\
                                                                    <div class="card-image"> <img src="/indieabode/public/uploads/games/cover/' + value.gameCoverImg + '" alt="">\
                                                                    </div>\
                                                                    <div class="game-intro">\
                                                                        <h3>' + value.gameName + '</h3>\
                                                                        <p>Free</p>\
                                                                    </div>\
                                                                    <div class="tagline">' + value.gameTagline + '</div>\
                                                                </div>\
                                                            </a>\  ');
                                }

                            });

                        }
                    });
                }



                console.log(id);
            });



        });
    </script>


    <?php
    include 'includes/footer.php';
    ?>




</body>



</html>