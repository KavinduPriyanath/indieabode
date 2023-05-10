<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/gamejam.css';
        include 'public/css/submissionModal.css';
        ?>
    </style>
</head>



<?php
include 'includes/navbar.php';
?>

<body>


    <div class="flashMessage" id="flashMessage"></div>

    <div class="containerJam">


        <div class="box">
            <h1><?= $this->gamejam['jamTitle']; ?></h1>
        </div>

        <div class="topics">

            <a href="/indieabode/jam?id=<?= $this->gamejam['gameJamID'] ?>">Overview</a>
            <a href="/indieabode/jam/submission?id=<?= $this->gamejam['gameJamID'] ?>" id="submissionPage">Submissions</a>
            <a href="/indieabode/jam/results?id=<?= $this->gamejam['gameJamID'] ?>" id="resultPage">Results</a>
        </div>

        <hr id="topic-break">
        <br>

        <div class="card-cover">

            <div class="timeline-heading">
                <div class="timrline-subheading">
                    Submissions open from &nbsp; <div id="monthStart"></div> &nbsp; <div id="dateStart"></div>
                    <div id="startPostfix"></div>&nbsp;<div id="yearStart"></div>&nbsp; at&nbsp; <div id="timeStart"></div> &nbsp;
                    to &nbsp; <div id="monthEnd"></div> &nbsp; <div id="dateEnd"></div>
                    <div id="endPostfix"></div> &nbsp; <div id="yearEnd"></div> &nbsp; <div id="timeEnd"> </div>
                </div>
                <hr>
            </div>
            <div class="card">



                <h2 id=startsEnd>Starts in</h2>

                <!-- <div class="launch-time">
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
             </div> -->


                <div class="jam-timeline">

                    <div>
                        <div class="count">
                            <p id="days">&nbsp;</p>
                        </div>
                        <div class="label">Days</div>
                    </div>
                    <div class="vl"></div>
                    <div>
                        <div class="count">
                            <p id="hours">&nbsp;</p>
                        </div>
                        <div class="label">Hours</div>
                    </div>
                    <div class="vl"></div>
                    <div>
                        <div class="count">
                            <p id="minutes">&nbsp;</p>
                        </div>
                        <div class="label">Minutes</div>
                    </div>
                    <div class="vl"></div>
                    <div>
                        <div class="count">
                            <p id="seconds">&nbsp;</p>
                        </div>
                        <div class="label">Seconds</div>
                    </div>
                </div>

                <!--  -->
                <div class="box">
                    <div class="button">

                        <div class="jamButtons jamBtn" id="gamerBtn"> </div>
                        <div class="submitted-text">You have already made a submission</div>
                        <div class="jamButtons jamBtn" id="dev-submit" data-modal-target="#modal">Submit</div>
                        <div class="jamButtons jamBtn" id="devBtn"></div>



                        <div class="jamStatus"></div>

                    </div>
                </div>

                <!-- </form> -->


            </div>
        </div>
        <div class="submissionStatus"></div>
    </div>


    <div class="containerJam">
        <img src="/indieabode/public/uploads/gamejams/covers/<?= $this->gamejam['jamCoverImg'] ?>" alt="" />
        <div class="content-theme">Theme of the GameJam</div>
        <div class="theme-container">
            <div class="theme-visibility">will be visible after the Jam Started</div>
            <div class="theme"><?= strtoupper($this->gamejam['jamTheme']) ?></div>
        </div>
        <div class="content-header">About The Jam</div>
        <div class="block">

            <div class="details">
                <?= $this->gamejam['jamContent']; ?>
            </div>
        </div>


    </div>


    <div class="box">

        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Submit Your Project Here</div>
                <button data-close-button class="close-button">&times;</button>
            </div>

            <div class="modal-body">

                <div class="note">Note: You will not be allowed to change a submission once you have submitted to the jam.</div>
                <div class="existing-project">
                    <div class="details">Existing Project</div>
                    <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                    <select id="type" name="gameID" required>
                        <?php foreach ($this->games as $game) { ?>
                            <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                        <?php } ?>

                    </select>
                    <br>

                    <!-- <input type="submit" name="submit" id="submit-submission" value="Submit Project"> -->
                    <div class="submission-btn" id="submit-submission">Submit</div>

                </div>
                <div class="new-project">
                    <div class="header-project">Create New Project</div>
                    <div class="upload-game-btn">Upload Game</div>
                </div>
                <div class="instruction">
                    Creating a new project? Remember to return to the jam page to make sure you've submitted.
                </div>





                </form>
            </div>
        </div>
        <div id="overlay"></div>

    </div>



    <?php
    include 'includes/footer.php';
    ?>


    <script>
        $(document).ready(function() {

            <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") { ?>
                <?php if (!$this->hasJoinedGamer) { ?>
                    $('#submissionPage').css('color', 'grey');
                    $('#submissionPage').css('pointer-events', 'none');
                <?php } ?>
            <?php } ?>

            //button for developers to join or leave
            $('#devBtn').click(function() {

                let gamejamID = <?= $_GET['id'] ?>;

                var data = {
                    'gamejamID': gamejamID,
                    'developer_attempt': true
                };

                $.ajax({
                    url: "/indieabode/jam/joinJam",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        if (response == "left") {
                            $('#devBtn').text("Join Jam");
                            $('.submissionStatus').hide();
                            $('#dev-submit').hide()
                        } else if (response == "joined") {
                            $('#devBtn').text("Leave Jam");

                            if (jamStart == false) {
                                $('.submissionStatus').show();
                                $('.submissionStatus').text("You've joined this jam. Come to this page after the jam starts to submit your project.");
                            } else if (jamStart == true) {
                                $('#dev-submit').show()
                            }
                        }
                    }
                })

            });


            //button for gamers to join or leave
            $('#gamerBtn').click(function() {

                let gamejamID = <?= $_GET['id'] ?>;

                var data = {
                    'gamejamID': gamejamID,
                    'gamer_attempt': true
                };

                $.ajax({
                    url: "/indieabode/jam/joinJamGamer",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        if (response == "left") {
                            $('#gamerBtn').text("Join Jam");
                            $('#submissionPage').css('color', 'grey');
                            $('#submissionPage').css('pointer-events', 'none');
                        } else if (response == "joined") {
                            $('#gamerBtn').text("Leave Jam");
                            $('#submissionPage').css('color', 'black');
                            $('#submissionPage').css('pointer-events', 'all');
                        }
                    }
                })

            });

            //adding a submission to the gamejam
            $('#submit-submission').click(function() {

                let gamejamID = <?= $_GET['id'] ?>;
                let submittedGame = $('select#type').children("option:selected").val();

                var data = {
                    'gamejamID': gamejamID,
                    'gameID': submittedGame,
                    'submission_made': true
                };

                $.ajax({
                    url: "/indieabode/jam/submitproject",
                    method: "POST",
                    data: data,
                    success: function(response) {

                        $('#modal').removeClass("active");
                        $('#overlay').removeClass("active");

                        $('.submitted-text').show();
                        $('#dev-submit').hide();
                        $('#devBtn').hide();

                        $("#flashMessage").html('Your Submission has been saved')
                        $("#flashMessage").fadeIn(1000);

                        setTimeout(function() {
                            $("#flashMessage").fadeOut("slow");
                        }, 4000);
                    }
                })

            });

            $('.upload-game-btn').click(function() {

                window.location.href = "<?php echo BASE_URL; ?>gameupload";

            });

            var count_id1 = "<?= $this->gamejam['submissionStartDate']; ?>";
            var count_id2 = "<?= $this->gamejam['submissionEndDate']; ?>";
            var count_id3 = "<?= $this->gamejam['votingEndDate']; ?>";

            console.log(count_id1);

            // var yearStart = count_id1.substr(0,4);
            // var yearEnd = count_id2.substr(0,4);
            // var dateStart = count_id1.substring(8,10);
            // var dateEnd = count_id2.substring(8,10);
            var timeStart = count_id1.substring(11, 16);
            var timeEnd = count_id2.substring(11, 16);


            // console.log(monthStart);
            var StartDate = new Date("<?= $this->gamejam['submissionStartDate']; ?>"),
                yearStart = StartDate.getFullYear(),
                monthStart = StartDate.getMonth(),
                dateStart = StartDate.getDate();

            var EndDate = new Date("<?= $this->gamejam['submissionEndDate']; ?>"),
                yearEnd = EndDate.getFullYear(),
                monthEnd = EndDate.getMonth(),
                dateEnd = EndDate.getDate();

            var months = ["January", "February", "March", "April", "May", "June", "July", "Äugust", "September", "Öctober", "November", "December"];


            document.getElementById("yearStart").innerHTML = yearStart;
            document.getElementById("yearEnd").innerHTML = yearEnd;
            document.getElementById("dateStart").innerHTML = dateStart;
            document.getElementById("dateEnd").innerHTML = dateEnd;
            document.getElementById("timeStart").innerHTML = timeStart;
            document.getElementById("timeEnd").innerHTML = timeEnd;
            document.getElementById("monthStart").innerHTML = months[monthStart];
            document.getElementById("monthEnd").innerHTML = months[monthEnd];

            if (dateStart == 01 || dateStart == 21 || dateStart == 31) {
                document.getElementById("startPostfix").innerHTML = "st";
            } else if (dateStart == 02 || dateStart == 22) {
                document.getElementById("startPostfix").innerHTML = "nd";
            } else if (dateStart == 03 || dateStart == 23) {
                document.getElementById("startPostfix").innerHTML = "rd";
            } else {
                document.getElementById("startPostfix").innerHTML = "th";
            }

            console.log(dateEnd);

            if (dateEnd == 01 || dateEnd == 21 || dateEnd == 31) {
                document.getElementById("endPostfix").innerHTML = "st";
            } else if (dateEnd == 02 || dateEnd == 22) {
                document.getElementById("endPostfix").innerHTML = "nd";
            } else if (dateEnd == 03 || dateEnd == 23) {
                document.getElementById("endPostfix").innerHTML = "rd";
            } else {
                document.getElementById("endPostfix").innerHTML = "th";
            }


            var countDownDate1 = new Date(count_id1).getTime();
            var countDownDate2 = new Date(count_id2).getTime();
            var countDownDate3 = new Date(count_id3).getTime();

            let jamStart = false;
            let votingStart = false;


            <?php if ($this->gamejam['submissionStartDate'] > date("Y-m-d H:i:s")) { ?>
                jamStart = false;
                votingStart = false;
            <?php } else if ($this->gamejam['submissionStartDate'] < date("Y-m-d H:i:s") && $this->gamejam['submissionEndDate'] > date("Y-m-d H:i:s")) { ?>
                jamStart = true;
                votingStart = false;
            <?php } else if ($this->gamejam['submissionEndDate'] < date("Y-m-d H:i:s") && $this->gamejam['votingEndDate'] > date("Y-m-d H:i:s")) { ?>
                jamStart = true;
                votingStart = true;
            <?php } else { ?>
                jamStart = false;
                votingStart = true;
            <?php } ?>

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

                    document.getElementById("submissionPage").style.color = "grey";
                    document.getElementById("submissionPage").style.pointerEvents = "none";
                    document.getElementById("resultPage").style.color = "grey";
                    document.getElementById("resultPage").style.pointerEvents = "none";


                } else if (startsIn <= 0 && endsIn > 0) {

                    document.getElementById("resultPage").style.color = "grey";
                    document.getElementById("resultPage").style.pointerEvents = "none";

                    // document.getElementById("submit3").style.display = 'none';
                    document.getElementById('startsEnd').innerHTML = "Ends In";
                    // document.getElementById("submit").style.display = 'block';
                    // clearInterval(x);
                    document.getElementById("days").innerHTML = daysEnd;
                    document.getElementById("hours").innerHTML = hoursEnd;
                    document.getElementById("minutes").innerHTML = minutesEnd;
                    document.getElementById("seconds").innerHTML = secondsEnd;


                } else if (endsIn < 0 && votingEndsIn > 0) {


                    document.getElementById("resultPage").style.color = "grey";
                    document.getElementById("resultPage").style.pointerEvents = "none";

                    // document.getElementById("submit2").style.display = 'none';
                    // document.getElementById('developerJoin').style.display = "none";

                    document.getElementById('startsEnd').innerHTML = "Voting Ends In";

                    document.getElementById("days").innerHTML = daysEndVote;
                    document.getElementById("hours").innerHTML = hoursEndVote;
                    document.getElementById("minutes").innerHTML = minutesEndVote;
                    document.getElementById("seconds").innerHTML = secondsEndVote;


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



            if (!jamStart && !votingStart) {
                //jam hasnt begun yet
                $('.theme-visibility').show();
                $('.theme').hide();

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer") { ?>
                    $('#devBtn').show();
                    $('#gamerBtn').hide();

                    <?php if ($this->hasJoinedDeveloper) { ?>

                        $('#devBtn').html("Leave Jam");
                        $('.submissionStatus').show();
                        $('.submissionStatus').text("You've joined this jam. Come to this page after the jam starts to submit your project.");


                    <?php } else if (!$this->hasJoinedDeveloper) { ?>


                        $('#devBtn').html("Join Jam");
                        $('.submissionStatus').hide();


                    <?php } ?>
                <?php } else { ?>
                    $('.jamStatus').show();
                    $('.jamStatus').text("Starting soon");
                <?php } ?>


            } else if (jamStart && !votingStart) {
                //jam submission period has started
                $('.theme-visibility').hide();
                $('.theme').show();

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "game developer") { ?>
                    $('#devBtn').show();
                    $('#gamerBtn').hide();

                    <?php if ($this->hasJoinedDeveloper) { ?>

                        <?php if (!empty($this->hasSubmitted)) { ?>
                            $('.submitted-text').show();
                            $('#dev-submit').hide();
                            $('#devBtn').hide();
                        <?php } else { ?>
                            $('#dev-submit').show();
                            $('#devBtn').html("Leave Jam");
                        <?php } ?>



                    <?php } else if (!$this->hasJoinedDeveloper) { ?>

                        $('#dev-submit').hide();
                        $('#devBtn').html("Join Jam");
                    <?php } ?>
                <?php } else { ?>
                    $('.jamStatus').show();
                    $('.jamStatus').text("Submission accepting in progress");
                <?php } ?>
            } else if (jamStart && votingStart) {
                //jam voting perioud has started
                $('.theme-visibility').hide();
                $('.theme').show();

                <?php if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") { ?>
                    $('#gamerBtn').show();
                    $('#devBtn').hide();


                    <?php if ($this->hasJoinedGamer) { ?>

                        $('#gamerBtn').html("Leave Jam");

                    <?php } else if (!$this->hasJoinedGamer) { ?>

                        $('#gamerBtn').html("Join Jam");

                    <?php } ?>

                <?php } else { ?>

                    $('.jamStatus').show();
                    $('.jamStatus').text("Voting in Progress");

                <?php } ?>
            } else if (!jamStart && votingStart) {
                //jam has ended.
                $('.jamStatus').show();
                $('.jamStatus').text("Jam Concluded");

                $('.theme-visibility').hide();
                $('.theme').show();
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

</body>

</html>