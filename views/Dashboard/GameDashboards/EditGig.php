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
        include 'public/css/editGameForm.css';
        ?>
    </style>

</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="developer-dashboard">
        <div class="top-row">
            <div class="heading">Developer Dashboard - <?= $this->game['gameName'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->game['gameID']; ?>">Edit Game</a>
            <a href="/indieabode/dashboard/gameanalytics?id=<?= $this->game['gameID']; ?>">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?id=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/publishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/gamecrowdfunds?id=<?= $this->game['gameID']; ?>">Crowdfundings</a>
            <a href="/indieabode/dashboard/metadata?id=<?= $this->game['gameID']; ?>">Metadata</a>
            <a href="/indieabode/dashboard/gamegiveaways?id=<?= $this->game['gameID']; ?>">Giveaways</a>

        </div>
        <div class="content-row">

            <div class="outer-box">
                <div class="form-box">

                    <div class="upload-content">
                        <form action="/indieabode/dashboard/editExistingGig?id=<?= $this->gig['gigID'] ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                            <div class="upload-row">
                                <div class="upload-col-left" id="gig-left">
                                    <div class="gig-title">
                                        <label for="gig-title">Gig Title</label><br />
                                        <input type="text" name="gig-title" id="gig-title" value="<?= $this->gig['gigName'] ?>" /><br />
                                        <div class="error-msg" id="gigTitleCheck"></div><br />
                                    </div>

                                    <div class="game">
                                        <label for="game-name">Game</label><br />
                                        <p>Choose the game that you are finding a publisher for</p>
                                        <select id="game-name" name="game-name" disabled>

                                            <option value="<?= $this->gig['game'] ?>"><?= $this->game['gameName'] ?></option>

                                        </select><br /><br />
                                    </div>

                                    <div class="tagline">
                                        <label for="gig-tagline">Tagline</label><br />
                                        <p>Shown when we link your gig to other pages</p>
                                        <input type="text" name="gig-tagline" id="gig-tagline" value="<?= $this->gig['gigTagline'] ?>" placeholder="Short Description about your game" max="250" /><br />
                                        <div class=" error-msg" id="gigTaglineCheck">
                                        </div><br />
                                    </div>

                                    <!--classification details-->
                                    <div class="stage">
                                        <label id="current-stage" for="current-stage">Current Stage</label><br />
                                        <p>How long have you been developing the game</p>
                                        <select id="current-stage" name="current-stage">
                                            <option value="1" id="1">1 months</option>
                                            <option value="2" id="2">2 months</option>
                                            <option value="3" id="3">3 months</option>
                                            <option value="4" id="4">4 months</option>
                                            <option value="5" id="5">5 months</option>
                                            <option value="6" id="6">6 months</option>

                                        </select><br /><br />
                                    </div>

                                    <!--Releasing status-->
                                    <div class="planned-release-date">
                                        <label for="planned-release">Planned Release Date</label><br />
                                        <input type="date" name="planned-release" id="planned-release" />
                                        <br /><br>
                                    </div>

                                    <div class="details">
                                        <label id="gig-details" for="gig-details">Details</label><br />
                                        <p id="p">This will be the content of your gig page</p>
                                        <!-- <textarea id="gig-details" name="gig-details" rows="9" cols="50"></textarea><br /><br /> -->

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
                                            <div class="gig-content" contenteditable="true"></div>
                                            <input type="hidden" name="gig-details" id="description" value="<?= $this->gig['gigDetails'] ?>">
                                        </div>
                                        <br>
                                    </div>

                                    <div class="estimated-share">
                                        <label id="est-share" for="est-share">Estimated Share</label><br />
                                        <p id="p">
                                            The assumed share to be given after initial payment is completed
                                        </p>
                                        <input type="text" id="est-share" name="est-share" value="<?= $this->gig['estimatedShare'] ?>" /> <br /><br />
                                    </div>

                                    <div class="expected-cost">
                                        <label for="expected-cost">Expected Cost</label><br />
                                        <p id="p">
                                            The assumed amount needed for the development of the game
                                        </p>
                                        <input type="text" id="expected-cost" name="expected-cost" value="<?= $this->gig['expectedCost'] ?>" />
                                        <br />
                                        <div class="error-msg" id="costCheck"></div><br />
                                    </div>

                                    <div class="gig-visibility">
                                        <label id="gig-visibility" for="gig-visibility">Visibility</label><br />
                                        <div class="visibility">
                                            <p>Decide when is your page ready for the public</p>
                                            <br />
                                            <input type="radio" id="game-draft" name="gig-visibility" value="draft" checked />
                                            <label for="game-draft">Draft - Only those who can edit the project can view the
                                                page</label><br />
                                            <input type="radio" id="game-public" name="gig-visibility" value="public" />
                                            <label for="game-public">Public - Anyone can view the page, you can enable this after
                                                you've saved</label><br /><br />
                                        </div>
                                    </div>
                                </div>

                                <div class="upload-col-right">
                                    <div class="gig-cover-img">
                                        <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br />
                                        <p>Used when we link your game with other parts <br> of the site</p>
                                        <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png" /><br /><br /> -->

                                        <div class="image-upload-box">
                                            <figure class="image-container">
                                                <img id="chosen-image" src="<?php echo BASE_URL; ?>public/uploads/gigs/cover/<?= $this->gig['gigCoverImg'] ?>">
                                            </figure>

                                            <input type="file" id="upload-button" name="gig-upload-cover-img" accept=".jpg,.jpeg,.png">
                                            <input type="hidden" name="old-gig-upload-cover-img" value="<?= $this->gig['gigCoverImg'] ?>">
                                            <label for="upload-button" id="upload-label">
                                                Upload Photo
                                            </label>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="gig-video" id="video-right">
                                        <label id="game-illustration-vedio" for="game-illustration-vedio">Gameplay Video</label><br />
                                        <p>Add the link to your Youtube video</p>
                                        <input type="url" id="game-illustration-vedio" name="gig-trailer" value="<?= $this->gig['gigTrailor'] ?>" placeholder="eg: https://www.youtube.com/" /><br /><br />
                                    </div>

                                    <div class="gig-screenshots">
                                        <label id="game-screenshots" for="game-screenshots">Screenshots</label><br />
                                        <p>
                                            These will appear on your game's page. Optional <br> but highly
                                            recommended. Upload 3 to 5 for best <br> results
                                        </p>
                                        <br />
                                        <!-- <input type="file" id="game-screenshots" name="gig-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple" /><br /><br /> -->


                                        <div class="screenshot-container">

                                            <div id="screenshots"></div>
                                            <p id="num-of-files">No Files Chosen</p>
                                            <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="gig-screenshots[]" multiple>
                                            <input type="hidden" name="old-gig-screenshots" id="old-gig-screenshots" value="<?= $this->gig['gigScreenshot'] ?>">
                                            <label for="file-input">
                                                Add Screenshots
                                            </label>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <button type="submit" class="submit-btn" id="update-btn" name="game-submit">
                                Save & View Page
                            </button>

                            <div class="delete-btn" id="delete-btn">Delete Gig</div>
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
        let fileInput = document.getElementById("file-input");
        let imageContainer = document.getElementById("screenshots");
        let numOfFiles = document.getElementById("num-of-files");

        function preview() {
            imageContainer.innerHTML = "";
            numOfFiles.textContent = `${fileInput.files.length} Files Selected`;
            numOfFiles.style.display = "block";
            imageContainer.style.display = "block";

            for (i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                // let figCap = document.createElement("figcaption");
                // figCap.innerText = i.name;
                // figure.appendChild(figCap);
                reader.onload = () => {
                    let img = document.createElement("img");
                    img.setAttribute("src", reader.result);
                    // figure.insertBefore(img, figCap);
                    figure.appendChild(img);
                }
                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }

        function existingPreview() {

            if (fileInput.files.length == 0) {
                let screenshots = $("#old-gig-screenshots").val();
                let ssArray = screenshots.split(',');

                imageContainer.innerHTML = "";
                numOfFiles.textContent = `${ssArray.length} Files Selected`;
                numOfFiles.style.display = "block";
                imageContainer.style.display = "block";

                for (let i = 0; i < ssArray.length; i++) {

                    let figure = document.createElement("figure");
                    let img = document.createElement("img");
                    img.setAttribute("src", "<?php echo BASE_URL; ?>public/uploads/gigs/screenshots/" + ssArray[i]);
                    figure.appendChild(img);
                    imageContainer.appendChild(figure);

                }

            }

        }
    </script>

    <script>
        $(document).ready(function() {

            existingPreview();

            //selecting the relevant current stage from the database
            $("#<?= $this->gig['currentStage'] ?>").attr("selected", "selected");

            //loading value to planned release date from database
            var date = "<?= $this->gig['plannedReleaseDate'] ?>";
            var savedDate = date.split("/").reverse().join("-");
            $('#planned-release').val(savedDate);

            //for loading the saved game details in database to the rich text box
            let details = $('#description').val();
            $('.gig-content').html(details);


            $(".gig-content").click(function() {
                let text = $(".gig-content").html();
                $('#description').val(text);

            });
        });
    </script>

    <script>
        let uploadButton = document.getElementById("upload-button");
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

            $('#delete-btn').click(function() {

                let message = "Are you sure you want to delete the gig <?= $this->gig['gigName'] ?> ? ";

                if (confirm(message) == true) {

                    let gigID = <?= $_GET['gigid'] ?>;

                    var data = {
                        'gigID': gigID,
                        'delete_gig': true,
                    };

                    $.ajax({
                        url: "/indieabode/dashboard/deleteGig",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            if (response == "deleted") {
                                window.location.href = "/indieabode/dashboard/";
                            } else if (response == "has requests") {
                                alert("cannot delete");
                            }

                        }
                    })

                } else {
                    //nothin happens
                }

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            let gigTitleOkay = true;
            let gigTaglineOkay = true;
            let expectedCostOkay = true;

            $("#gig-title").keyup(function() {
                gigTitleAvailability();
            });

            $("#gig-tagline").keyup(function() {
                gigTaglineAvailability();
            });

            $("#expected-cost").on("input", function(e) {
                gigCostValidation();
            });

            function gigTitleAvailability() {
                let gigTitle = $("#gig-title").val();

                if (gigTitle.length == 0) {
                    $("#gigTitleCheck").show();
                    $("#gigTitleCheck").text("Gig Title Cannot be empty");
                    gigTitleOkay = false;
                } else if (gigTitle.length > 0 && gigTitle.length < 29) {
                    $("#gigTitleCheck").hide();
                    gigTitleOkay = true;
                } else if (gigTitle.length > 29) {
                    $("#gigTitleCheck").show();
                    $("#gigTitleCheck").text("Gig Title Cannot exceed 29 letters");
                    gigTitleOkay = false;
                }
            }

            function gigTaglineAvailability() {
                let gigTagline = $("#gig-tagline").val();

                if (gigTagline.length < 40) {
                    $("#gigTaglineCheck").show();
                    $("#gigTaglineCheck").text("Must use more than 40 characters");
                    gigTaglineOkay = false;
                } else if (gigTagline.length > 40 && gigTagline.length < 250) {
                    $("#gigTaglineCheck").hide();
                    gigTaglineOkay = true;
                } else {
                    $("#gigTaglineCheck").show();
                    $("#gigTaglineCheck").text("Cannot exceed 250 characters");
                    gigTaglineOkay = false;
                }
            }

            function gigCostValidation() {
                var regex = /^\d*[.]?\d*$/;
                let inputtedCost = $("#expected-cost").val();

                if (regex.test(inputtedCost)) {
                    if (parseInt(inputtedCost) < 100) {
                        $("#costCheck").show();
                        $("#costCheck").text(
                            "Only allowed to create gigs for orders greater than $100"
                        );
                        expectedCostOkay = false;
                    } else if (parseInt(inputtedCost) > 10000) {
                        $("#costCheck").show();
                        $("#costCheck").text(
                            "Only allowed to create gigs for orders less than $10000"
                        );
                        expectedCostOkay = false;
                    } else {
                        $("#costCheck").hide();
                        expectedCostOkay = true;
                    }
                } else if (inputtedCost.length == 0) {
                    $("#costCheck").show();
                    $("#costCheck").text("Cannot be empty");
                    expectedCostOkay = false;
                } else {
                    $("#costCheck").show();
                    $("#costCheck").text("Only numeric values are allowed");
                    expectedCostOkay = false;
                }
            }

            $("#update-btn").click(function(e) {
                let formSubmit = false;

                gigTitleAvailability();
                gigTaglineAvailability();
                gigCostValidation();

                if (
                    gigTitleOkay == false ||
                    gigTaglineOkay == false ||
                    expectedCostOkay == false
                ) {
                    formSubmit = false;
                } else {
                    formSubmit = true;
                }

                console.log(gigTitleOkay + " " + gigTaglineOkay + " " + expectedCostOkay);

                if (formSubmit == false) {
                    e.preventDefault();
                }
            });

        });
    </script>

</body>



</html>