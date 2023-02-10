<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gamejamform.css';
        ?>
    </style>

</head>

<script>
    function vote(x) {
        if (x == 0) document.getElementById("voting").style.display = "block";
        else document.getElementById("voting").style.display = "none";
        return;
    }
</script>



<?php include 'includes/navbar.php' ?>


<!-- Submission form -->
<div class="form-container">
    <div class="heading">Host a New Jam</div>
    <hr id="topic-break" />

    <form action="/indieabode/GameJamForm/hostgamejam" method="POST" id="upload-jam" class="input-upload-group" enctype="multipart/form-data">
        <div class="card-details">

            <div class="left">
                <div class="card-box">
                    <span class="details">Title*</span>
                    <input type="text" name="title" required>
                </div>

                <div class="card-box">
                    <span class="details">Tagline</span>
                    <p>One line summery of the jam</p>
                    <input type="text" name="tagline" placeholder="Optional">
                </div>

                <div class="circle-form">
                    <span class="circle-title">Type*</span>
                    <p>Select the kind of gamejam you are going to host
                    <p>
                    <div class="category">
                        <input type="radio" name="ranking" value="Non-Ranked" onclick="vote(1)" />Non-Ranked - Entries are just submitted<br>
                        <input type="radio" name="ranking" value="Ranked" onclick="vote(0)" checked />Ranked - Entries are voted on and ranked
                    </div>
                </div>

                <div class="card-box">
                    <span class="details">Start Date & Time*</span>
                    <input type="datetime_local" name="Sdate" placeholder="yyyy/mm/dd 00:00" required>
                </div>

                <div class="card-box">
                    <span class="details">End Date & Time*</span>
                    <input type="datetime_local" name="Edate" placeholder="yyyy/mm/dd 00:00" required>
                </div>

                <div class="card-box">
                    <span class="details">Voting End Date & Time</span>
                    <input type="datetime_local" name="V_E_Date" placeholder="yyyy/mm/dd 00:00">
                </div>

                <div class="card-box">
                    <span class="details">Content*</span>
                    <p>Makes up the content of your jam page</p>
                    <textarea id="game-details" name="game-details" rows="9" cols="64" required></textarea><br><br>
                </div>

                <div class="circle-form" id="voting">
                    <h3>Voter Settings</h3>

                    <span class="circle-title">Who can vote on entries?</span>
                    <div class="category">
                        <input type="radio" name="voters" value="Submitters Only">Submitters Only - Only ones who joined the game jam could vote.<br>
                        <input type="radio" name="voters" value="Moderators Only">Moderators Only - Only ones added as moderators could vote.<br>
                        <input type="radio" name="voters" value="Public" checked>Public - Anyone can vote.
                    </div>
                </div>

                <div class="box-form">
                    <span class="box-details">Rstrictions</span>
                    <div class="checkboxT">
                        <input type="checkbox" name="Rstrictions1">Can join once game-jam started<br>
                        <input type="checkbox" name="Rstrictions2">Limit Participant count
                    </div>
                    <p>Max. Participant Count</p>
                    <input type="number" name="Max" placeholder="eg: 20">
                </div>

                <h3>Jam Settings</h3>
                <div class="card-box">
                    <span class="details">Criteria</span>
                    <p>How should the entries of the jam should be ranked.</p>
                    <input type="text" name="criteria">
                </div>

                <div class="card-box">
                    <span class="details">Twitter Hashtag</span>
                    <p>Submitters will be prompted to tweet this tag after submitting.</p>
                    <input type="text" name="twitter" placeholder="Optional">
                </div>


                <div class="circle-form">
                    <span class="circle-title">Visibility</span>
                    <p>Decide when is your page ready for the public.</p>
                    <div class="category">
                        <input type="radio" name="visibility" value="Draft">Draft - Only those who are added as moderators can view the page.<br>
                        <input type="radio" name="visibility" value="Public">Public - Anyone can view the page, you can enable this after you've saved.
                    </div>
                </div>
            </div>

            <div class="right">

                <div class="card-box">
                    <span class="details">Upload Cover Image*</span>

                    <input type="file" id="coverImg" name="coverImg" required>
                </div>

            </div>
        </div>



        <!-- <div class="button"> -->
        <!-- <input type="submit" name="submit" value="Save & View Page"> -->
        <button class="submit" name="submit">Save & View Page</button>
        <!-- </div> -->

        <div class="conditions">
            <p>* These Fields must be filled.
            <p>
        </div>


    </form>
</div>


</div>

<?php
include 'includes/footer.php';
?>


<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
<?php } else { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
<?php } ?>

</html>