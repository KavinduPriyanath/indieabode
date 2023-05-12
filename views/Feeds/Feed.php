<!DOCTYPE html>
<html lang="en">
<!--Including Navbar-->

<?php
include 'includes/navbar.php';
?>


<style>
    <?php
    include 'public/css/feed.css';
    ?>
</style>

<div class="title">
    <h1>Global Feed</h1>
</div>



<div class="box1">

    <?php foreach ($this->feed as $feedcol) { ?>
        <div class="activity">



            <h3>

                <?php if ($feedcol['ActivityCheck'] == 3) { ?>
                    <div class="activit">
                        <div class="logo1">
                            <img src="public/images/avatars/<?= $feedcol['avatar'] ?>" alt="" width="30px" height="30px" ;>
                        </div>
                        <div class="Uname">
                            <h3><?= $feedcol['username'] ?> </h3>
                        </div>
                        <div class="do">
                            upload game
                        </div>
                        <div class="GDCname">
                            <h3> <?= $feedcol['gameName'] ?> </h3>
                        </div>
                    </div>
                <?php } elseif ($feedcol['ActivityCheck'] == 4) { ?>
                    <div class="activit">
                        <div class="logo1">
                            <img src="/indieabode/public/uploads/games/cover/<?= $feedcol['avatar'] ?>" alt="" width="30px" height="30px" ;>
                        </div>
                        <div class="Uname">
                            <h3> <?= $feedcol['gameName'] ?> </h3>
                        </div>
                        <div class="do">
                            created gig
                        </div>
                        <div class="GDCname">
                            <h3><?= $feedcol['name'] ?> </h3>
                        </div>
                    </div>
                <?php } elseif ($feedcol['ActivityCheck'] == 5) { ?>
                    <div class="activit">
                        <div class="logo1">
                            <img src="/indieabode/public/uploads/games/cover/<?= $feedcol['avatar'] ?>" alt="" width="30px" height="30px" ;>
                        </div>
                        <div class="Uname">
                            <h3> <?= $feedcol['gameName'] ?> </h3>
                        </div>
                        <div class="do">
                            posted devlog
                        </div>
                        <div class="GDCname">
                            <h3><?= $feedcol['name'] ?> </h3>
                        </div>
                    </div>
                <?php } elseif ($feedcol['ActivityCheck'] == 6) { ?>
                    <div class="activit">
                        <div class="logo1">
                            <img src="/indieabode/public/uploads/games/cover/<?= $feedcol['avatar'] ?>" alt="" width="30px" height="30px" ;>
                        </div>
                        <div class="Uname">
                            <h3> <?= $feedcol['gameName'] ?> </h3>
                        </div>
                        <div class="do">
                            launched crowd
                        </div>
                        <div class="GDCname">
                            <h3><?= $feedcol['name'] ?> </h3>
                        </div>
                    </div>
                <?php } ?>




            </h3>

            <div class="time">
                <?php
                // convert the given time to a Unix timestamp
                $given_timestamp = strtotime($feedcol['created_at']);

                // calculate the time difference between the given time and the current time, in seconds
                $time_diff_seconds = time() - $given_timestamp + 12598;


                // calculate the number of hours and minutes in the time difference
                $hours = floor($time_diff_seconds / 3600);
                $minutes = floor(($time_diff_seconds % 3600) / 60);

                // format the time difference as a stringt
                if ($hours > 0) {
                    $time_diff_str = $hours . " hours " . $minutes . " minutes ago";
                } else {
                    $time_diff_str = $minutes . " minutes ago";
                }
                ?>
                <h3> <?= $time_diff_str ?> </h3>
            </div>

        </div>
    <?php } ?>




</div>



<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
<?php } else { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
<?php } ?>
<?php
include 'includes/footer.php';
?>


</html>