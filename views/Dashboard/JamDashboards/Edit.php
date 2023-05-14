<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css" />
    <title>Indieabode</title>

    <style>
        <?php
        include 'public/css/dashboard.css';
        include 'public/css/updateJam.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Organizer Dashboard - <?= $this->jam['jamTitle'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->jam['gameJamID']; ?>">Edit Jam</a>
            <a href="/indieabode/dashboard/submissions?id=<?= $this->jam['gameJamID']; ?>">Submissions</a>
            <a href="/indieabode/dashboard/results?id=<?= $this->jam['gameJamID']; ?>">Results</a>
            <a href="/indieabode/dashboard/reports?id=<?= $this->jam['gameJamID']; ?>">Reports</a>
            <a href="/indieabode/dashboard/prizes?id=<?= $this->jam['gameJamID']; ?>">Prizes</a>

        </div>


        <div class="content-row">

            <div class="form-container">

                <div class="form">
                    <form action="/indieabode/dashboard/EditJam?id=<?= $this->jam['gameJamID'] ?>" method="POST" id="upload-jam" class="input-upload-group" enctype="multipart/form-data">
                        <div class="card-details">

                            <div class="left-form">
                                <div class="card-box">
                                    <span class="details">Title*</span>
                                    <p>Add unique name to stand out among other gamejams</p>
                                    <input type="text" name="title" id="jamTitle" value="<?= $this->jam['jamTitle'] ?>">
                                    <div class="error-msg" id="titleCheck"></div><br />
                                </div>

                                <div class="card-box">
                                    <span class="details">Jam Theme*</span>
                                    <p>This will visible to the participants during the submission period</p>
                                    <input type="text" name="jamTheme" value="<?= $this->jam['jamTheme'] ?>">

                                </div>

                                <div class="card-box">
                                    <span class="details">Tagline</span>
                                    <p>One line summery of the jam</p>
                                    <input type="text" name="tagline" id="jamTagline" value="<?= $this->jam['jamTagline'] ?>" placeholder="Optional">
                                    <div class="error-msg" id="taglineCheck"></div><br />
                                </div>

                                <div class="circle-form">
                                    <span class="circle-title">Type*</span>
                                    <p>Select the kind of gamejam you are going to host
                                    <p>
                                    <div class="category">
                                        <input type="radio" name="ranking" value="Non-Ranked" id="Non-Ranked" /> <label for="Non-Ranked">Non-Ranked</label> - Entries are just submitted<br>
                                        <input type="radio" name="ranking" value="Ranked" id="Ranked" checked /> <label for="Ranked">Ranked</label> - Entries are voted on and ranked
                                    </div>
                                    <br>
                                </div>

                                <div class="card-box">
                                    <span class="details">Start Date & Time*</span>
                                    <p>Date & time for the theme reveal and start submitting games</p>
                                    <input type="datetime-local" name="Sdate" class="datetime" id="Sdate" value="<?= $this->jam['submissionStartDate'] ?>">
                                    <div class="error-msg" id="startDateCheck"></div><br />
                                </div>

                                <div class="card-box">
                                    <span class="details">End Date & Time*</span>
                                    <p>Date & time to close submissions, and start voting</p>
                                    <input type="datetime-local" name="Edate" class="datetime" id="Edate" value="<?= $this->jam['submissionEndDate'] ?>">
                                    <div class="error-msg" id="endDateCheck"></div><br />
                                </div>

                                <div class="card-box" id="voting-date">
                                    <span class="details">Voting End Date & Time</span>
                                    <p>Date & time to cease voting, and publish results</p>
                                    <input type="datetime-local" name="V_E_Date" class="datetime" id="V-E_Date" value="<?= $this->jam['votingEndDate'] ?>">
                                </div>

                                <div class="card-box">
                                    <span class="details" id="jamContent" for="jamContent">Content*</span>
                                    <p>Makes up the content of your jam page</p>

                                    <div class="main-content">
                                        <div class="text-editor-header">
                                            <button type="button" class="btn" data-element="bold">
                                                <i class="fa fa-bold"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="italic">
                                                <i class="fa fa-italic"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="underline">
                                                <i class="fa fa-underline"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="insertUnorderedList">
                                                <i class="fa fa-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="insertOrderedList">
                                                <i class="fa fa-list-ol"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="createLink">
                                                <i class="fa fa-link"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="justifyLeft">
                                                <i class="fa fa-align-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="justifyCenter">
                                                <i class="fa fa-align-center"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="justifyRight">
                                                <i class="fa fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="justifyFull">
                                                <i class="fa fa-align-justify"></i>
                                            </button>
                                            <button type="button" class="btn" data-element="insertImage">
                                                <i class="fa fa-image"></i>
                                            </button>
                                        </div>

                                        <!--Content-->
                                        <div class="jamContent" contenteditable="true"></div>
                                        <input type="hidden" name="description" value="<?= $this->jam['jamContent'] ?>" id="description">
                                    </div>
                                </div>

                                <div class="circle-form" id="voting">
                                    <span class="circle-title">Jam Type</span>
                                    <p>who will be able to join the gamejam and see its submissions</p>
                                    <div class="category">
                                        <input type="radio" name="voters" id="Public" value="Public" checked>Public - Anyone can vote. <br>
                                        <input type="radio" name="voters" id="Private" value="Private">Private - Only users with passkey enter the jam
                                    </div>
                                    <br>
                                </div>

                                <div class="card-box" id="criteria">
                                    <span class="details">Criteria</span>
                                    <p>How should the entries of the jam should be ranked.</p>
                                    <input type="text" name="criteria" value="<?= $this->jam['jamCriteria'] ?>">
                                </div>

                                <div class="card-box">
                                    <span class="details">Twitter Hashtag</span>
                                    <p>Submitters will be prompted to tweet this tag after submitting.</p>
                                    <input type="text" name="twitter" value="<?= $this->jam['jamTwitter'] ?>" placeholder="Optional">
                                </div>


                                <div class="circle-form">
                                    <span class="circle-title">Visibility</span>
                                    <p>Decide when is your page ready for the public.</p>
                                    <div class="category">
                                        <input type="radio" name="visibility" id="Draft-Visibility" value="Draft" checked>Draft - Only those who are added as moderators can view the page.<br>
                                        <input type="radio" name="visibility" id="Public-Visibility" value="Public">Public - Anyone can view the page, you can enable this after you've saved.
                                    </div>
                                </div>
                            </div>

                            <div class="right-form">

                                <div class="card-box">

                                    <span class="details">
                                        <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br></span>
                                    <p>Used to link your gamejam to the other parts of the site</p>

                                    <div class="image-upload-box">
                                        <figure class="image-container">
                                            <img id="chosen-image" src="/indieabode/public/uploads/gamejams/covers/<?= $this->jam['jamCoverImg'] ?>">
                                        </figure>

                                        <input type="file" id="coverImg" name="coverImg" accept=".jpg,.jpeg,.png">
                                        <input type="hidden" name="old-coverImg" value="<?= $this->jam['jamCoverImg'] ?>">
                                        <label for="coverImg" id="upload-label">
                                            Upload Photo
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="submit" name="submit">Save & View Page</button>


                </div>

                </form>
            </div>

        </div>
    </div>



    </div>
    </div>


    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>





    <script>
        $(document).ready(function() {
            $(".jamContent").click(function() {
                let text = $(".jamContent").html();
                $('#description').val(text);

            });

            $("#<?= $this->jam['jamType'] ?>").attr("checked", true);
            $("#<?= $this->jam['jamVoters'] ?>").attr("checked", true);
            $('#<?= $this->jam['jamVisibility'] ?>-Visibility').attr("checked", true);

            //for loading the saved jam details in database to the rich text box
            let details = $('#description').val();
            $('.jamContent').html(details);
        });


        $('input[name="ranking"]').on("click", function() {

            if ($(this).val() == "Ranked") {
                $('#voting-date').show();
                $('#criteria').show();
            } else if ($(this).val() == "Non-Ranked") {
                $('#voting-date').hide();
                $('#criteria').hide();
            }
        });
    </script>

    <script>
        $(window).ready(function() {
            $("#tags").on("keypress", function(event) {
                var keyPressed = event.keyCode || event.which;
                if (keyPressed === 13) {
                    event.preventDefault();
                }
            });
        });
    </script>

    <script>
        let uploadButton = document.getElementById("coverImg");
        let chosenImage = document.getElementById("chosen-image");
        let uploadLabel = document.getElementById("upload-label");

        uploadButton.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = () => {
                chosenImage.setAttribute("src", reader.result);
            }
            console.log(reader);

            uploadLabel.innerText = "Replace Photo";
            //fileName.textContent = uploadButton.files[0].name;

        }
    </script>

    <script>
        $(document).ready(function() {
            let titleOkay = false;
            let taglineOkay = false;
            let startDateOkay = false;
            let endDateOkay = false;




            $("#jamTitle").keyup(function() {
                jamTitleAvailability();
            });

            $("#jamTagline").keyup(function() {
                jamTaglineAvailability();
            });

            $("#Sdate").change(function() {
                jamSdateAvailability();
            });

            $("#Edate").change(function() {
                jamEdateAvailability();
            });




            function jamTitleAvailability() {
                let jamTitle = $("#jamTitle").val();

                if (jamTitle.length == 0) {
                    $("#titleCheck").show();
                    $("#titleCheck").text("Jam Title Cannot be empty");
                    titleOkay = false;
                    scrollToJamTitle();
                } else if (jamTitle.length > 0 && jamTitle.length < 30) {
                    $("#titleCheck").hide();
                    titleOkay = true;
                } else if (jamTitle.length > 30) {
                    $("#titleCheck").show();
                    $("#titleCheck").text("Jam Title Cannot exceed 30 letters");
                    titleOkay = false;
                    scrollToJamTitle();
                }
            }

            function scrollToJamTitle() {
                $('html, body').animate({
                    scrollTop: $("#jamTitle").offset().top
                }, 100);
                $("#jamTitle").focus();
            }

            function jamTaglineAvailability() {
                let jamTagline = $("#jamTagline").val();

                if (jamTagline.length == 0) {
                    $("#taglineCheck").show();
                    $("#taglineCheck").text("Tagline cannot be empty");
                    taglineOkay = false;
                    scrollToJamTagline();
                } else if (jamTagline.length < 50) {
                    $("#taglineCheck").show();
                    $("#taglineCheck").text("Must use more than 50 characters");
                    taglineOkay = false;
                    scrollToJamTagline();
                } else if (jamTagline.length > 50 && jamTagline.length < 100) {
                    $("#taglineCheck").hide();
                    taglineOkay = true;
                } else {
                    $("#taglineCheck").show();
                    $("#taglineCheck").text("Cannot exceed 100 characters");
                    taglineOkay = false;
                    scrollToJamTagline();
                }
            }

            function scrollToJamTagline() {
                $('html, body').animate({
                    scrollTop: $("#jamTagline").offset().top
                }, 100);
                $("#jamTagline").focus();
            }

            function jamSdateAvailability() {
                let jamStartDate = $("#Sdate").val();

                if (jamStartDate.length == 0) {
                    $("#startDateCheck").show();
                    $("#startDateCheck").text("Start Date & Time cannot be empty");
                    scrollToJamSdate();
                    startDateOkay = false;
                } else if (jamStartDate.length > 0) {
                    $("#startDateCheck").hide();
                    startDateOkay = true;
                }
            }

            function scrollToJamSdate() {
                $('html, body').animate({
                    scrollTop: $("#Sdate").offset().top
                }, 100);
                $("#Sdate").focus();
            }

            function jamEdateAvailability() {
                let jamEndDate = $("#Edate").val();
                let jamStartDate = $("#Sdate").val();

                if (jamEndDate.length == 0) {
                    $("#endDateCheck").show();
                    $("#endDateCheck").text("End Date & Time cannot be empty");
                    endDateOkay = false;
                    scrollToJamEdate();
                } else if (jamEndDate == jamStartDate) {
                    $("#endDateCheck").show();
                    $("#endDateCheck").text("End Date & Time cannot be same as Start Date & Time");
                    endDateOkay = false;
                    scrollToJamEdate();
                } else if (jamEndDate < jamStartDate) {
                    $("#endDateCheck").show();
                    $("#endDateCheck").text("The end date and time cannot be prior to the start date and time");
                    endDateOkay = false;
                    scrollToJamEdate();
                } else {
                    $("#endDateCheck").hide();
                    endDateOkay = true;
                }
            }

            function scrollToJamEdate() {
                $('html, body').animate({
                    scrollTop: $("#Edate").offset().top
                }, 100);
                $("#Edate").focus();
            }


            $(".submit").click(function(e) {
                let formSubmit = false;

                jamEdateAvailability();
                jamSdateAvailability();
                jamTitleAvailability();
                jamTaglineAvailability();



                if (
                    titleOkay == false ||
                    taglineOkay == false ||
                    startDateOkay == false ||
                    endDateOkay == false
                ) {
                    formSubmit = false;
                } else {
                    formSubmit = true;
                }

                if (formSubmit == false) {
                    e.preventDefault();
                }
            });
        });
    </script>

</body>



</html>