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

<body onload="scrollRight()">

    <?php
    include 'includes/navbar.php';
    ?>




    <div class="container" style="margin-top: 3rem">
        <h1 id="header-calender">Jam Calendar</h1>
        <div class="ofs-timeline" id="timeline-full">
            <div class="ofs-timeline-legend">
                <?php for ($m = 0; $m < 3; $m++) { ?>

                    <?php
                    ($m == 0) ? $i = 15 : $i = 1;
                    $l = 0; ?>

                    <?php if ($this->months[$m] == 'Jan' || $this->months[$m] == 'Mar' || $this->months[$m] == 'May' || $this->months[$m] == 'Jul' || $this->months[$m] == 'Aug' || $this->months[$m] == 'Oct' || $this->months[$m] == 'Dec') { ?>


                        <?php ($m == 2) ? $l = 15 : $l = 31; ?>
                        <?php for ($i; $i <= $l; $i++) { ?>
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

                        <?php ($m == 2) ? $l = 15 : $l = 29; ?>
                        <?php for ($i; $i <= $l; $i++) { ?>
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

                        <?php ($m == 2) ? $l = 15 : $l = 30; ?>
                        <?php for ($i; $i <= $l; $i++) { ?>
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

                <?php foreach ($this->firstRow as $row1) { ?>

                    <?php
                    $startMonth = substr($row1['submissionStartDate'], 5, 2);
                    $startDate = substr($row1['submissionStartDate'], 8, 2);
                    $endMonth = substr($row1['votingEndDate'], 5, 2);
                    $endDate = substr($row1['votingEndDate'], 8, 2);
                    $currentMonth = date('m');
                    ?>

                    <!-- If the jam started in previous month and ended in previous month -->
                    <?php if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>


                        <?php if ($startDate < 15) { ?>
                            <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row1['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row1['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>


                        <!-- If the jam starts in current month and ends in current month -->
                    <?php } else if ($startMonth == $currentMonth && $endMonth == $currentMonth) { ?>

                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row1['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam starts in next month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth + 1 && (int)$endMonth == $currentMonth + 1) { ?>

                        <?php if ($endDate > 15) { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-15-pm">
                                <h6><?= $row1['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                                <h6><?= $row1['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>



                        <!-- If the jam started in month before previous month and ended in previous month -->
                    <?php } else if ((int)$startMonth < $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>
                        <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                            <h6><?= $row1['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in previous month and ended in current month -->
                    <?php } else if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth) { ?>
                        <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row1['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in current month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth && (int)$endMonth == $currentMonth + 1) { ?>
                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                            <h6><?= $row1['jamTitle'] ?></h6>
                        </div>
                    <?php } ?>

                <?php } ?>



                <div class="scrollbar-enabler"></div>
            </div>
            <div class="ofs-timeline-track">
                <div class="row">
                    <div class="row-inner-wrap">
                        <h5 class="mt-3">Row 2</h5>
                    </div>
                </div>

                <?php foreach ($this->secondRow as $row2) { ?>

                    <?php
                    $startMonth = substr($row2['submissionStartDate'], 5, 2);
                    $startDate = substr($row2['submissionStartDate'], 8, 2);
                    $endMonth = substr($row2['votingEndDate'], 5, 2);
                    $endDate = substr($row2['votingEndDate'], 8, 2);
                    $currentMonth = date('m');
                    ?>

                    <!-- If the jam started in previous month and ended in previous month -->
                    <?php if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>


                        <?php if ($startDate < 15) { ?>
                            <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row2['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row2['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>


                        <!-- If the jam starts in current month and ends in current month -->
                    <?php } else if ($startMonth == $currentMonth && $endMonth == $currentMonth) { ?>

                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row2['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam starts in next month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth + 1 && (int)$endMonth == $currentMonth + 1) { ?>

                        <?php if ($endDate > 15) { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-15-pm">
                                <h6><?= $row2['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                                <h6><?= $row2['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>



                        <!-- If the jam started in month before previous month and ended in previous month -->
                    <?php } else if ((int)$startMonth < $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>
                        <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                            <h6><?= $row2['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in previous month and ended in current month -->
                    <?php } else if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth) { ?>
                        <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row2['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in current month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth && (int)$endMonth == $currentMonth + 1) { ?>
                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                            <h6><?= $row2['jamTitle'] ?></h6>
                        </div>
                    <?php } ?>

                <?php } ?>

                <div class="scrollbar-enabler"></div>
            </div>

            <div class="ofs-timeline-track">
                <div class="row">
                    <div class="row-inner-wrap">
                        <h5 class="mt-3">Row 3</h5>
                    </div>
                </div>

                <?php foreach ($this->thirdRow as $row3) { ?>

                    <?php
                    $startMonth = substr($row3['submissionStartDate'], 5, 2);
                    $startDate = substr($row3['submissionStartDate'], 8, 2);
                    $endMonth = substr($row3['votingEndDate'], 5, 2);
                    $endDate = substr($row3['votingEndDate'], 8, 2);
                    $currentMonth = date('m');
                    ?>

                    <!-- If the jam started in previous month and ended in previous month -->
                    <?php if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>


                        <?php if ($startDate < 15) { ?>
                            <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row3['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-p-<?= $endDate ?>-pm">
                                <h6><?= $row3['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>


                        <!-- If the jam starts in current month and ends in current month -->
                    <?php } else if ($startMonth == $currentMonth && $endMonth == $currentMonth) { ?>

                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row3['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam starts in next month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth + 1 && (int)$endMonth == $currentMonth + 1) { ?>

                        <?php if ($endDate > 15) { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-15-pm">
                                <h6><?= $row3['jamTitle'] ?></h6>
                            </div>
                        <?php } else { ?>
                            <div class="ofs-timeline-item start-n-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                                <h6><?= $row3['jamTitle'] ?></h6>
                            </div>
                        <?php } ?>



                        <!-- If the jam started in month before previous month and ended in previous month -->
                    <?php } else if ((int)$startMonth < $currentMonth - 1 && (int)$endMonth == $currentMonth - 1) { ?>
                        <div class="ofs-timeline-item start-p-15-am end-p-<?= $endDate ?>-pm">
                            <h6><?= $row3['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in previous month and ended in current month -->
                    <?php } else if ((int)$startMonth == $currentMonth - 1 && (int)$endMonth == $currentMonth) { ?>
                        <div class="ofs-timeline-item start-p-<?= $startDate ?>-am end-c-<?= $endDate ?>-pm">
                            <h6><?= $row3['jamTitle'] ?></h6>
                        </div>

                        <!-- If the jam started in current month and ends in next month -->
                    <?php } else if ((int)$startMonth == $currentMonth && (int)$endMonth == $currentMonth + 1) { ?>
                        <div class="ofs-timeline-item start-c-<?= $startDate ?>-am end-n-<?= $endDate ?>-pm">
                            <h6><?= $row3['jamTitle'] ?></h6>
                        </div>
                    <?php } ?>

                <?php } ?>

                <div class="scrollbar-enabler"></div>
            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script>
        var element = document.querySelector('.ofs-timeline');

        function scrollRight() {
            element.scrollLeft = 5500;
        }

        element.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            element.scrollLeft += evt.deltaY;
        });
    </script>


</body>



</html>