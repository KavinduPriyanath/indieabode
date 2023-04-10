<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gamejam.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>

<body>



    <div class="containerJam">


        <?php if ($this->gamejam) : ?>
            <div class="box">
                <h1><?= $this->gamejam['jamTitle']; ?></h1>
                <p><?= $this->gamejam['jamTagline']; ?></p>
            </div>

            <div class="topics">

                <a href="/indieabode/jam?id=<?= $this->gamejam['gameJamID'] ?>">Overview</a>
                <a href="/indieabode/jam/submission?id=<?= $this->gamejam['gameJamID'] ?>" id="submissionPage">Submissions</a>
            </div>

            <hr id="topic-break">
            <br>
            <div class="card">

                <h2 id=startsEnd>Starts in</h2>

                <div class="launch-time">



                    <div>
                        <p id="days">&nbsp;</p>
                        <span>Days &nbsp;</span>
                    </div>

                    <div>
                        <p id="hours">&nbsp;</p>
                        <span>Hours&nbsp;</span>
                    </div>

                    <div>
                        <p id="minutes">&nbsp;</p>
                        <span>Minutes&nbsp;</span>
                    </div>

                    <div>
                        <p id="seconds">&nbsp;</p>
                        <span>Seconds&nbsp;</span>
                    </div>
                </div>

                <!--  -->
                <div class="box">
                    <div class="button">


                        <a href="/indieabode/Jam/joinJam?id=<?= $this->gamejam['gameJamID'] ?>">
                            <div id="developerJoin" class="jamButtons">Join Jam</div>
                        </a>
                        <div id="addsubmission" class="jamButtons" data-modal-target="#modal">Submit</div>

                        <a href="/indieabode/Jam/joinJamGamer?id=<?= $this->gamejam['gameJamID'] ?>">
                            <div id="gamerJoin" class="jamButtons">Join Jam</div>
                        </a>

                    </div>
                </div>





                <div class="box">
                    <!-- <button data-modal-target="#modal">Submit</button> -->


                    <div class="modal" id="modal">
                        <div class="modal-header">
                            <div class="title">Submit Your Project Here</div>
                            <button data-close-button class="close-button">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="/indieabode/jam/submitproject?id=<?= $this->gamejam['gameJamID'] ?>" type="submit" method="POST">
                                <div class="card-box">
                                    <span class="details">Select Your Game to Submit Here</span>
                                    <br>
                                    <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                                    <select id="type" name="gameID" required>
                                        <?php foreach ($this->games as $game) { ?>
                                            <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="button">
                                    <input type="submit" name="submit" id="submit-submission" value="Submit Project">
                                </div>


                            </form>
                        </div>
                    </div>
                    <div id="overlay"></div>

                </div>


                <!-- </form> -->


            </div>
        <?php endif; ?>
    </div>


    <div class="containerJam">
        <img src="/indieabode/public/uploads/gamejams/covers/<?= $this->gamejam['jamCoverImg'] ?>" alt="" />
        <div class="block">
            <h2>About The Jam</h2>
            <p><?= $this->gamejam['jamContent']; ?></p>
        </div>


    </div>




    <?php
    include 'includes/footer.php';
    ?>


    <script>
        var count_id1 = "<?= $this->gamejam['submissionStartDate']; ?>";
        var count_id2 = "<?= $this->gamejam['submissionEndDate']; ?>";
        var count_id3 = "<?= $this->gamejam['votingEndDate']; ?>";

        var countDownDate1 = new Date(count_id1).getTime();
        var countDownDate2 = new Date(count_id2).getTime();
        var countDownDate3 = new Date(count_id3).getTime();


        var x = setInterval(function() {

            var now = new Date().getTime();

            var startsIn = countDownDate1 - now;
            var endsIn = countDownDate2 - now;
            var votingEndsIn = countDownDate3 - now;

            var days = Math.floor(startsIn / (1000 * 60 * 60 * 24));
            var hours = Math.floor((startsIn % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((startsIn % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((startsIn % (1000 * 60)) / 1000);

            var daysEnd = Math.floor(endsIn / (1000 * 60 * 60 * 24));
            var hoursEnd = Math.floor((endsIn % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutesEnd = Math.floor((endsIn % (1000 * 60 * 60)) / (1000 * 60));
            var secondsEnd = Math.floor((endsIn % (1000 * 60)) / 1000);

            var daysEndVote = Math.floor(votingEndsIn / (1000 * 60 * 60 * 24));
            var hoursEndVote = Math.floor((votingEndsIn % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutesEndVote = Math.floor((votingEndsIn % (1000 * 60 * 60)) / (1000 * 60));
            var secondsEndVote = Math.floor((votingEndsIn % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;



            if (startsIn > 0) {

                // document.getElementById("submit3").style.display='none';
                document.getElementById("addsubmission").style.display = 'none';
                document.getElementById("submissionPage").style.color = "grey";
                document.getElementById("submissionPage").style.pointerEvents = "none";

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer" && $this->hasJoinedDeveloper) { ?>
                    document.getElementById('developerJoin').innerHTML = "Leave Jam";
                <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer" && !$this->hasJoinedDeveloper) { ?>
                    document.getElementById('developerJoin').style.display = "block";
                <?php } else { ?>
                    document.getElementById('developerJoin').style.display = "none";
                    document.getElementById('developerJoin').innerHTML = "Join Jam";
                <?php } ?>


            } else if (startsIn <= 0 && endsIn > 0) {

                // document.getElementById("submit3").style.display = 'none';
                document.getElementById('startsEnd').innerHTML = "Ends In";
                // document.getElementById("submit").style.display = 'block';
                // clearInterval(x);
                document.getElementById("days").innerHTML = daysEnd;
                document.getElementById("hours").innerHTML = hoursEnd;
                document.getElementById("minutes").innerHTML = minutesEnd;
                document.getElementById("seconds").innerHTML = secondsEnd;

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer" && $this->hasJoinedDeveloper) { ?>
                    document.getElementById("addsubmission").style.display = "block";
                    document.getElementById('developerJoin').innerHTML = "Leave Jam";
                <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer" && !$this->hasJoinedDeveloper) { ?>
                    document.getElementById('developerJoin').style.display = "block";
                <?php } else { ?>
                    document.getElementById("addsubmission").style.display = 'none';
                    document.getElementById("gamerJoin").style.display = 'none';
                    document.getElementById('developerJoin').style.display = "none";
                    document.getElementById('developerJoin').innerHTML = "Join Jam";
                <?php } ?>

            } else if (endsIn < 0 && votingEndsIn > 0) {

                // document.getElementById("submit2").style.display = 'none';
                document.getElementById('developerJoin').style.display = "none";

                document.getElementById('startsEnd').innerHTML = "Voting Ends In";

                document.getElementById("days").innerHTML = daysEndVote;
                document.getElementById("hours").innerHTML = hoursEndVote;
                document.getElementById("minutes").innerHTML = minutesEndVote;
                document.getElementById("seconds").innerHTML = secondsEndVote;

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer" && $this->hasJoinedGamer) { ?>
                    document.getElementById("gamerJoin").style.display = 'block';
                    document.getElementById('gamerJoin').innerHTML = "Leave Jam";
                <?php } else if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer" && !$this->hasJoinedGamer) { ?>
                    document.getElementById("gamerJoin").style.display = 'block';
                <?php } else { ?>
                    document.getElementById("gamerJoin").style.display = 'none';
                    document.getElementById('gamerJoin').innerHTML = "Join Jam";
                <?php } ?>

            } else if (votingEndsIn < 0) {

                // document.getElementById("submit3").style.display='none';
                // document.getElementById("submit2").style.display = 'none';
                // document.getElementById("submit").style.display = 'none';
                document.getElementById('startsEnd').innerHTML = "Jam Ended";
                clearInterval(x);
                document.getElementById("days").innerHTML = 00;
                document.getElementById("hours").innerHTML = 00;
                document.getElementById("minutes").innerHTML = 00;
                document.getElementById("seconds").innerHTML = 00;

            }

        });
    </script>


    <script>
        const openModalButtons = document.querySelectorAll('[data-modal-target]')
        const closeModalButtons = document.querySelectorAll('[data-close-button]')
        const overlay = document.getElementById('overlay')

        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
            })
        })

        overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
        })

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal')
                closeModal(modal)
            })
        })

        function openModal(modal) {
            if (modal == null) return
            modal.classList.add('active')
            overlay.classList.add('active')
        }

        function closeModal(modal) {
            if (modal == null) return
            modal.classList.remove('active')
            overlay.classList.remove('active')
        }
    </script>








    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="../src/js/navbar.js"></script>
    <?php } else { ?>
        <script src="../src/js/navbarcopy.js"></script>
    <?php } ?>

</body>

</html>