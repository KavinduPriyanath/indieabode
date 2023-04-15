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

            <div class="jam-tabs">
                <div class="topic" id="joined">Jams Joined</div>

                <div class="topic" id="submitted">Jams Submitted</div>

            </div>

            <hr id="tabs-break">

            <div class="devlog-cards joined-jams">
                <h3>Game Jams You've Joined</h3>
                <?php foreach ($this->gamejamsJoined as $gamejamJoined) { ?>
                    <div class="game-card">
                        <div class="left-col" id="gamejams-left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/gamejams/covers/<?= $gamejamJoined['jamCoverImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $gamejamJoined['jamTitle']; ?></div>
                                <div class="game-name">
                                    <?= $gamejamJoined['jamType']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col" id="gamejams-right-col">
                            <div class="downloads">
                                <div class="count"><?= $gamejamJoined['joinedCount']; ?></div>
                                <div class="label">joined</div>
                            </div>
                            <div class="ratings">
                                <div class="count"><?= $gamejamJoined['submissionsCount']; ?></div>
                                <div class="label">submissions</div>
                            </div>
                        </div>

                        <div class="edit-btn" id="jam-status">
                            Jam Status
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="jams-submitted">
                <h3>Game Jams You've Submitted To</h3>
                <?php foreach ($this->gamejamsSubmitted as $jamSubmitted) { ?>
                    <div class="game-card">
                        <div class="left-col" id="gamejams-left-col">
                            <div class="icon"><img src="/indieabode/public/uploads/gamejams/covers/<?= $jamSubmitted['jamCoverImg'] ?>" alt=""></div>
                            <div class="details">
                                <div class="devlog-name"><?= $jamSubmitted['jamTitle']; ?></div>
                                <div class="game-name">
                                    <?= $jamSubmitted['jamType']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="right-col" id="gamejams-right-col">
                            <div class="downloads">
                                <div class="count"><?= $jamSubmitted['joinedCount']; ?></div>
                                <div class="label">joined</div>
                            </div>
                            <div class="ratings">
                                <div class="count"><?= $jamSubmitted['submissionsCount']; ?></div>
                                <div class="label">submissions</div>
                            </div>
                        </div>

                        <div class="edit-btn" id="jam-status-submissions">
                            View Submission
                        </div>

                    </div>
                <?php } ?>
            </div>

        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


    <script>
        $(document).ready(function() {

            $('#joined').click(function() {

                $('.joined-jams').show();
                $('.jams-submitted').hide();
            });

            $('#submitted').click(function() {

                $('.joined-jams').hide();
                $('.jams-submitted').show();
            });


        });
    </script>



</body>



</html>