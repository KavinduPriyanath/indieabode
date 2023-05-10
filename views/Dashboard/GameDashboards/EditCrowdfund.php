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

                    <form action="/indieabode/dashboard/editExistingCrowdfund?id=<?= $this->crowdfund['crowdFundID'] ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                        <div class="upload-row">
                            <div class="upload-col-left" id="crowdfund-left">
                                <div class="title-div">
                                    <label for="gig-title">Crowdfund Title</label><br />
                                    <input type="text" name="crowdfund-title" id="gig-title" value="<?= $this->crowdfund['title'] ?>" /><br />
                                    <div class="error-msg" id="titleCheck"></div><br />
                                </div>

                                <div class="game-div">
                                    <label for="game-name">Game</label><br />
                                    <p>Choose the game that you are finding a publisher for</p>
                                    <select id="game-name" name="game-name" disabled>
                                        <option value="<?= $this->game['gameID'] ?>"><?= $this->game['gameName'] ?></option>

                                    </select><br /><br />
                                </div>

                                <div class="tagline-div">
                                    <label for="gig-tagline">Tagline</label><br />
                                    <p>Shown when we link your gig to other pages</p>
                                    <input type="text" name="crowdfund-tagline" id="gig-tagline" value="<?= $this->crowdfund['tagline'] ?>" placeholder="Short Description about your game" required /><br />
                                    <div class="error-msg" id="taglineCheck"></div><br />

                                </div>

                                <div class="expectedAmount-div">
                                    <label for="expected-amount">Expected Amount</label><br />
                                    <p id="p">
                                        The assumed amount needed for the development of the game
                                    </p>
                                    <input type="text" id="expected-cost" name="expected-amount" value="<?= $this->crowdfund['expectedAmount'] ?>" readonly />
                                    <br />
                                    <div class="error-msg" id="expectedAmountCheck"></div><br />
                                </div>

                                <!--Releasing status-->
                                <div class="release-status-div">
                                    <label for="planned-release">End Date</label><br />
                                    <input type="date" name="end-date" id="end-date" value="<?= $this->crowdfund['deadline'] ?>" readonly />
                                    <br /><br>
                                </div>

                                <div class="details-div">
                                    <label id="gig-details" for="gig-details">Details</label><br />
                                    <p id="p">This will be the content of your gig page</p>
                                    <!-- <textarea id="gig-details" name="crowdfund-details" rows="9" cols="50"></textarea><br /><br /> -->
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
                                        <div class="game-content" contenteditable="true"></div>
                                        <input type="hidden" name="crowdfund-details" id="description" value="<?= $this->crowdfund['details'] ?>">
                                    </div>
                                    <br>
                                </div>

                                <div class="visibility-div">
                                    <label id="gig-visibility" for="gig-visibility">Visibility</label><br />
                                    <div class="visibility">
                                        <p>Decide when is your page ready for the public</p>
                                        <input type="radio" id="game-draft" name="crowdfund-visibility" value="draft" checked />
                                        <label for="game-draft">Draft - Only those who can edit the project can view the
                                            page</label><br />
                                        <input type="radio" id="game-public" name="crowdfund-visibility" value="public" />
                                        <label for="game-public">Public - Anyone can view the page, you can enable this after
                                            you've saved</label><br /><br />
                                    </div>
                                </div>
                            </div>

                            <div class="upload-col-right">
                                <div class="coverimg-div">
                                    <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br />
                                    <p>Used when we link your game with other parts <br> of the site</p>
                                    <!-- <input type="file" id="game-upload-cover-img" name="crowdfund-upload-cover-img" accept=".jpg,.jpeg,.png" /><br /><br /> -->

                                    <div class="image-upload-box">
                                        <figure class="image-container">
                                            <img id="chosen-image" src="/indieabode/public/uploads/crowdfundings/cover/<?= $this->crowdfund['crowdfundCoverImg'] ?>">
                                        </figure>

                                        <input type="file" id="upload-button" name="crowdfund-upload-cover-img" accept=".jpg,.jpeg,.png">
                                        <input type="hidden" name="old-crowdfund-upload-cover-img" value="<?= $this->crowdfund['crowdfundCoverImg'] ?>">
                                        <label for="upload-button" id="upload-label">
                                            Upload Photo
                                        </label>
                                    </div>
                                </div>

                                <div class="trailer-div" id="video-right">
                                    <label id="game-illustration-vedio" for="game-illustration-vedio">Crowdfund Trailer</label><br />
                                    <p>Add the link to your Youtube video</p>
                                    <br />
                                    <input type="url" id="game-illustration-vedio" name="crowdfund-trailer" value="<?= $this->crowdfund['crowdfundTrailer'] ?>" placeholder="eg: https://www.youtube.com/" /><br /><br />
                                </div>



                                <div class="screenshots-div">
                                    <label id="game-screenshots" for="game-screenshots">Screenshots</label><br />
                                    <p>
                                        These will appear on your game's page. Optional <br> but highly
                                        recommended. Upload 3 to 5 for best <br> results
                                    </p>
                                    <!-- <input type="file" id="game-screenshots" name="crowdfund-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple" /><br /><br /> -->
                                    <div class="screenshot-container">

                                        <div id="screenshots"></div>
                                        <p id="num-of-files">No Files Chosen</p>
                                        <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="crowdfund-screenshots[]" multiple>
                                        <input type="hidden" name="old-crowdfund-screenshots" id="old-crowdfund-screenshots" value="<?= $this->crowdfund['crowdfundSS'] ?>">
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
                    </form>
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
                let screenshots = $("#old-crowdfund-screenshots").val();
                let ssArray = screenshots.split(',');

                imageContainer.innerHTML = "";
                numOfFiles.textContent = `${ssArray.length} Files Selected`;
                numOfFiles.style.display = "block";
                imageContainer.style.display = "block";

                for (let i = 0; i < ssArray.length; i++) {

                    let figure = document.createElement("figure");
                    let img = document.createElement("img");
                    img.setAttribute("src", "<?php echo BASE_URL; ?>public/uploads/crowdfundings/screenshots/" + ssArray[i]);
                    figure.appendChild(img);
                    imageContainer.appendChild(figure);

                }

            }

        }
    </script>

    <script>
        $(document).ready(function() {

            existingPreview();


            //for loading the saved game details in database to the rich text box
            let details = $('#description').val();
            $('.game-content').html(details);


            $(".game-content").click(function() {
                let text = $(".game-content").html();
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

            let titleOkay = true;
            let taglineOkay = true;
            let expectedAmountOkay = true;


            $("#gig-title").keyup(function() {
                crowdfundTitleAvailability();
            });

            $("#gig-tagline").keyup(function() {
                crowdfundTaglineAvailability();
            });

            $("#expected-cost").keyup(function() {
                crowdfundAmountValidation();
            });


            function crowdfundTitleAvailability() {
                let crowdfundTitle = $("#gig-title").val();

                if (crowdfundTitle.length == 0) {
                    $("#titleCheck").show();
                    $("#titleCheck").text("Crowdfund Title Cannot be empty");
                    titleOkay = false;
                } else if (crowdfundTitle.length > 0 && crowdfundTitle.length < 29) {
                    $("#titleCheck").hide();
                    titleOkay = true;
                } else if (crowdfundTitle.length > 29) {
                    $("#titleCheck").show();
                    $("#titleCheck").text("Crowdfund Title Cannot exceed 29 letters");
                    titleOkay = false;
                }
            }

            function crowdfundTaglineAvailability() {
                let gigTagline = $("#gig-tagline").val();

                if (gigTagline.length < 70) {
                    $("#taglineCheck").show();
                    $("#taglineCheck").text("Must use more than 70 characters");
                    taglineOkay = false;
                } else if (gigTagline.length > 70 && gigTagline.length < 100) {
                    $("#taglineCheck").hide();
                    taglineOkay = true;
                } else {
                    $("#taglineCheck").show();
                    $("#taglineCheck").text("Cannot exceed 100 characters");
                    taglineOkay = false;
                }
            }

            function crowdfundAmountValidation() {
                var regex = /^\d*[.]?\d*$/;
                let inputtedCost = $("#expected-cost").val();

                console.log(inputtedCost.length);

                if (inputtedCost.length == 0) {
                    $("#expectedAmountCheck").show();
                    $("#expectedAmountCheck").text("Cannot be empty");
                    expectedAmountOkay = false;
                } else {
                    if (regex.test(inputtedCost)) {
                        if (parseInt(inputtedCost) < 50) {
                            $("#expectedAmountCheck").show();
                            $("#expectedAmountCheck").text(
                                "Only allowed to launch crowdfunds for greater than $50"
                            );
                            expectedAmountOkay = false;
                        } else if (parseInt(inputtedCost) > 1000) {
                            $("#expectedAmountCheck").show();
                            $("#expectedAmountCheck").text(
                                "Only allowed to launch crowdfunds for orders less than $1000"
                            );
                            expectedAmountOkay = false;
                        } else {
                            $("#expectedAmountCheck").hide();
                            expectedAmountOkay = true;
                        }
                    } else {
                        $("#expectedAmountCheck").show();
                        $("#expectedAmountCheck").text("Only numeric values are allowed");
                        expectedAmountOkay = false;
                    }
                }
            }

            $("#update-btn").click(function(e) {
                let formSubmit = false;

                crowdfundTitleAvailability();
                crowdfundTaglineAvailability();
                crowdfundAmountValidation();

                if (
                    titleOkay == false ||
                    taglineOkay == false ||
                    expectedAmountOkay == false
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