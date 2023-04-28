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

<!-- <div class="title">
  <h1>Global Feed</h1>
</div> -->

<div class="filter">
    <div class="fil">
        <h1>Filter:</h1>
    </div>
    <div class="fil">
        <h1>New Projects</h1>
    </div>
    <div class="fil">
        <h1>Gigs</h1>
    </div>
    <div class="fil">
        <h1>Posts</h1>
    </div>
    <div class="fil">
        <h1>Ratings</h1>
    </div>
</div>



  
    <?php foreach ($this->feed as $feedcol) { ?>
            <div class="game1">
                <div class="logo1"> 
                    <img src="public/images/avatars/<?= $feedcol['avatar'] ?>" alt=""width="30px" height="30px" ;>      
                </div>
                <div class="Uname">
                    <h3><?= $feedcol['username'] ?>   </h3>
                </div>
                <div class="do">
                    <h3> 
                        <?php if ($feedcol['checkw']==1) { ?>
                            add cart
                        <?php } else { ?>
                            add library
                        <?php } ?>
                    </h3>
                </div>
                <div class="time">
                    <?php
                    // convert the given time to a Unix timestamp
                    $given_timestamp = strtotime($feedcol['time']);

                    // calculate the time difference between the given time and the current time, in seconds
                    $time_diff_seconds = time() - $given_timestamp;


                    // calculate the number of hours and minutes in the time difference
                    $hours = floor($time_diff_seconds / 3600);
                    $minutes = floor(($time_diff_seconds % 3600) / 60);

                    // format the time difference as a string
                    if ($hours > 0) {
                        $time_diff_str = $hours . " hours " . $minutes . " minutes ago";
                    } else {
                        $time_diff_str = $minutes . " minutes ago";
                    }
                    ?> 
                    <h3> <?= $time_diff_str ?> </h3>
                </div>
                <div class="rgame">
                    <h3> <?= $feedcol['gameName'] ?> </h3>
                </div>
            </div>  
    <?php } ?>








<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>
<!-- 
Including Footer
<style>
  <?php include('../src/css/footer.css'); ?>
</style>
<?php include("../components/footer.php"); ?>


 -->


</html>