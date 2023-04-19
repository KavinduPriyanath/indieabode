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
        include 'public/css/upload.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="outer-box">
        <div class="form-box">
            <div class="upload-topic">Create a Gig</div>
            <hr />
            <br />

            <form action="/indieabode/creategig/makeNewGig" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                <div class="upload-row">
                    <div class="upload-col-left">
                        <div class="gig-title">
                            <label id="gig-title" for="gig-title">Gig Title</label><br />
                            <input type="text" name="gig-title" id="gig-title" /><br /><br />
                        </div>

                        <div class="game">
                            <label id="game-name" for="game-name">Game</label><br />
                            <p>Choose the game that you are finding a publisher for</p>
                            <select id="game-name" name="game-name" required>
                                <?php foreach ($this->games as $game) { ?>
                                    <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                                <?php } ?>
                            </select><br /><br />
                        </div>

                        <div class="tagline">
                            <label id="gig-tagline" for="gig-tagline">Tagline</label><br />
                            <p>Shown when we link your gig to other pages</p>
                            <input type="text" name="gig-tagline" id="gig-tagline" placeholder="Short Description about your game" required /><br /><br />
                        </div>

                        <!--classification details-->
                        <div class="stage">
                            <label id="current-stage" for="current-stage">Current Stage</label><br />
                            <p>How long have you been developing the game</p>
                            <select id="current-stage" name="current-stage">
                                <option value="1">1 month</option>
                                <option value="2" selected>2 month</option>
                                <option value="3">3 month</option>
                                <option value="4">4 month</option>
                                <option value="5">5 month</option>
                                <option value="6">6 month</option>
                                <option value="12">12 month</option>
                            </select><br /><br />
                        </div>

                        <!--Releasing status-->
                        <div class="planned-release-date">
                            <label id="planned-release" for="planned-release">Planned Release Date</label><br />
                            <input type="date" name="planned-release" id="planned-release" required />
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
                                <input type="hidden" name="gig-details" id="description">
                            </div>
                            <br>
                        </div>

                        <div class="estimated-share">
                            <label id="est-share" for="est-share">Estimated Share</label><br />
                            <p id="p">
                                The assumed share to be given after initial payment is completed
                            </p>
                            <input type="text" id="est-share" name="est-share" /> <br /><br />
                        </div>

                        <div class="expected-cost">
                            <label id="expected-cost" for="expected-cost">Expected Cost</label><br />
                            <p id="p">
                                The assumed amount needed for the development of the game
                            </p>
                            <input type="text" id="expected-cost" name="expected-cost" />
                            <br /><br />
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
                            <p>Used when we link your game with other parts of the site</p>
                            <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png" /><br /><br /> -->

                            <div class="image-upload-box">
                                <figure class="image-container">
                                    <img id="chosen-image">
                                </figure>

                                <input type="file" id="upload-button" name="game-upload-cover-img" accept=".jpg,.jpeg,.png">
                                <label for="upload-button" id="upload-label">
                                    Upload Photo
                                </label>
                            </div>
                            <br>
                        </div>

                        <div class="gig-video">
                            <label id="game-illustration-vedio" for="game-illustration-vedio">Gameplay Video</label><br />
                            <p>Add the link to your Youtube video</p>
                            <input type="url" id="game-illustration-vedio" name="gig-trailer" placeholder="eg: https://www.youtube.com/" /><br /><br />
                        </div>

                        <div class="gig-screenshots">
                            <label id="game-screenshots" for="game-screenshots">Screenshots</label><br />
                            <p>
                                These will appear on your game's page. Optional but highly
                                recommended. Upload 3 to 5 for best results
                            </p>
                            <br />
                            <!-- <input type="file" id="game-screenshots" name="gig-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple" /><br /><br /> -->


                            <div class="screenshot-container">

                                <div id="screenshots"></div>
                                <p id="num-of-files">No Files Chosen</p>
                                <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="gig-screenshots[]" multiple>
                                <label for="file-input">
                                    Add Screenshots
                                </label>

                            </div>

                        </div>
                    </div>
                </div>
                <br /><br />
                <button type="submit" class="submit-btn" name="game-submit">
                    Save & View Page
                </button>
            </form>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>

    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>

    <script>
        $(document).ready(function() {
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
    </script>

</body>



</html>