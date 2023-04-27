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
        include 'public/css/jamCalender.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>




    <div class="container" style="margin-top: 3rem">
        <h1>Jam Calendar</h1>
        <div class="ofs-timeline">
            <div class="ofs-timeline-legend">
                <?php for ($m = 0; $m < 3; $m++) { ?>

                    <?php if ($this->months[$m] == 'Jan' || $this->months[$m] == 'Mar' || $this->months[$m] == 'May' || $this->months[$m] == 'Jul' || $this->months[$m] == 'Aug' || $this->months[$m] == 'Oct' || $this->months[$m] == 'Dec') { ?>

                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <?php if ($i == 1 || $i == 21 || $i == 31) { ?>
                                <div class="day-label"><?= $i ?>st</div>
                            <?php } else if ($i == 2 || $i == 22) { ?>
                                <div class="day-label"><?= $i ?>nd</div>
                            <?php } else if ($i == 3 || $i == 23) { ?>
                                <div class="day-label"><?= $i ?>rd</div>
                            <?php } else { ?>
                                <div class="day-label"><?= $i ?>th</div>
                            <?php } ?>
                        <?php } ?>

                    <?php } else if ($this->months[$m] == 'Feb') { ?>

                        <?php for ($i = 1; $i <= 29; $i++) { ?>
                            <?php if ($i == 1 || $i == 21) { ?>
                                <div class="day-label"><?= $i ?>st</div>
                            <?php } else if ($i == 2 || $i == 22) { ?>
                                <div class="day-label"><?= $i ?>nd</div>
                            <?php } else if ($i == 3 || $i == 23) { ?>
                                <div class="day-label"><?= $i ?>rd</div>
                            <?php } else { ?>
                                <div class="day-label"><?= $i ?>th</div>
                            <?php } ?>
                        <?php } ?>

                    <?php } else { ?>

                        <?php for ($i = 1; $i <= 30; $i++) { ?>
                            <?php if ($i == 1 || $i == 21) { ?>
                                <div class="day-label"><?= $i ?>st</div>
                            <?php } else if ($i == 2 || $i == 22) { ?>
                                <div class="day-label"><?= $i ?>nd</div>
                            <?php } else if ($i == 3 || $i == 23) { ?>
                                <div class="day-label"><?= $i ?>rd</div>
                            <?php } else { ?>
                                <div class="day-label"><?= $i ?>th</div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                <?php } ?>
            </div>
            <div class="ofs-timeline-track">
                <div class="row">
                    <div class="row-inner-wrap">
                        <h5 class="mt-3">Row 1</h5>
                    </div>
                </div>
                <div class="ofs-timeline-item timeline-item start-01-01-am end-01-04-pm">
                    <h6>GMTK GameJam</h6>
                </div>
                <div class="ofs-timeline-item start-01-06-am end-01-07-pm">
                    <h6>Brackeys GameJam 2023</h6>
                </div>

                <div class="ofs-timeline-item start-01-10-am end-01-11-am">
                    <h6>BTP GameJam</h6>
                </div>

                <div class="scrollbar-enabler"></div>
            </div>
            <div class="ofs-timeline-track">
                <div class="row">
                    <div class="row-inner-wrap">
                        <h5 class="mt-3">Row 2</h5>
                    </div>
                </div>

                <div class="ofs-timeline-item start-01-03-pm end-01-06-am">
                    <h6>Windy Jam 2</h6>
                </div>
                <div class="ofs-timeline-item start-01-07-pm end-01-09-am">
                    <h6>Godot Official Jam</h6>
                </div>

                <div class="scrollbar-enabler"></div>
            </div>
        </div>
    </div>








    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>