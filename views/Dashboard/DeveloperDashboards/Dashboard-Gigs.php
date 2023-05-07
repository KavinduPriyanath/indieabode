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
        include 'public/css/dashboard.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Developer Dashboard</div>
            <div class="dev-main-stat">
                <div id="views">
                    <div class="count">0</div>
                    <div class="label">views</div>
                </div>
                <div id="downloads">
                    <div class="count">0</div>
                    <div class="label">downloads</div>
                </div>
                <div id="revenue">
                    <div class="count">0</div>
                    <div class="label">revenue</div>
                </div>
            </div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/">
                Games
            </a>
            <a href="/indieabode/dashboard/gigs">Gigs</a>
            <a href="/indieabode/dashboard/devlogs">Devlogs</a>
            <a href="/indieabode/dashboard/gamejams">Gamejams</a>
            <a href="/indieabode/dashboard/crowdfundings">Crowdfundings</a>
            <a href="/indieabode/dashboard/sales">Sales&nbsp;&&nbsp;Bundles</a>
            <a href="/indieabode/dashboard/analytics">Analytics</a>
            <a href="/indieabode/dashboard/payouts">Payouts</a>
        </div>
        <div class="content-row">

            <a href="/indieabode/creategig" id="gig-btn">
                <div class="add-btn">
                    <div class="add-logo">
                        <img src="/indieabode/public/images/dashboard/add-devlog.png" alt="">
                    </div>
                    <div class="text">Create new Gig</div>
                </div>
            </a>

            <div class="gig-tabs">
                <div class="topic" id="all">All</div>

                <div class="topic" id="requests">Requests</div>

                <div class="topic" id="accepted">Accepted</div>
            </div>

            <hr id="tabs-break">

            <div class="devlog-cards all-gigs-cards">
                <h3>Published Gigs</h3>
                <?php if (!empty($this->gigs)) { ?>
                    <?php foreach ($this->gigs as $gig) { ?>
                        <div class="game-card">
                            <div class="left-col">
                                <div class="icon"><img src="/indieabode/public/uploads/gigs/cover/<?= $gig['gigCoverImg'] ?>" alt=""></div>
                                <div class="details">
                                    <div class="devlog-name"><?= $gig['gigName']; ?></div>
                                    <div class="game-name">
                                        <?= $gig['game']; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="right-col">
                                <div class="views">
                                    <div class="count"><?= $gig['viewCount']; ?></div>
                                    <div class="label">views</div>
                                </div>
                                <div class="downloads">
                                    <div class="count"><?= $gig['requests']; ?></div>
                                    <div class="label">requests</div>
                                </div>
                                <div class="ratings">
                                    <div class="count">8</div>
                                    <div class="label">comments</div>
                                </div>
                            </div>
                            <a href="/indieabode/dashboard/editgig?gameid=<?= $gig['game'] ?>&gigid=<?= $gig['gigID'] ?>">
                                <div class="edit-btn">
                                    Edit
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="empty-msg">- You have not published any gig orders -</div>
                <?php } ?>
            </div>



            <div class="ongoing-requests-cards">
                <h3>Ongoing Requests</h3>
                <?php if (!empty($this->ongoingrequests)) { ?>
                    <?php foreach ($this->ongoingrequests as $ongoingrequest) { ?>
                        <div class="game-card">
                            <div class="left-col" id="left-col-ongoing-gig">
                                <div class="icon"><img src="/indieabode/public/uploads/gigs/cover/<?= $ongoingrequest['gigCoverImg'] ?>" alt=""></div>
                                <div class="details">
                                    <div class="devlog-name"><?= $ongoingrequest['gigName']; ?></div>
                                    <div class="game-name">
                                        Requested on <?= $ongoingrequest['created_at'] ?> by <?= $ongoingrequest['firstName'] . " " . $ongoingrequest['lastName'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="right-col" id="right-col-ongoing-gig">
                                <div class="gig-eligibility"><?php if ($ongoingrequest['eligible'] == 0) echo "Not Eligible Yet";
                                                                else echo "Eligible"; ?></div>
                            </div>
                            <div class="edit-btn">
                                <a href="<?php echo BASE_URL; ?>gig/viewgig?id=<?= $ongoingrequest['gigID'] ?>&token=<?= $ongoingrequest['gigToken'] ?>">
                                    View
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="empty-msg">- You do not have any ongoing gig requests -</div>
                <?php } ?>
            </div>


            <div class="ordered-gigs-cards">
                <h3>Ordered Gigs</h3>
            </div>

        </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        $(document).ready(function() {

            $('#all').click(function() {

                $('.all-gigs-cards').show();
                $('.ongoing-requests-cards').hide();
                $('.ordered-gigs-cards').hide();
            });

            $('#requests').click(function() {

                $('.all-gigs-cards').hide();
                $('.ongoing-requests-cards').show();
                $('.ordered-gigs-cards').hide();
            });

            $('#accepted').click(function() {

                $('.all-gigs-cards').hide();
                $('.ongoing-requests-cards').hide();
                $('.ordered-gigs-cards').show();
            });

        });
    </script>


</body>



</html>