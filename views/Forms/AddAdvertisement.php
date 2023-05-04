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
        <div class=" form-box">

            <div class="upload-topic">
                Add New Advertisement
            </div>
            <hr>

            <div class="upload-content">
                <form action="/indieabode/makedevlog/makeDevlog" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                    <div class="card-details">
                        <div class="upload-row">
                            <div class="upload-col-left">
                                <div class="card-box">

                                    <label for="">Title</label><br>
                                    <input type="text" name="title" id="title" required><br>
                                    <div class="error-msg" id="devlogTitleCheck"></div><br>
                                </div>

                                <div class="card-box">
                                    <label for="">Advertisement Type</label>
                                    <p>One line summery of the devlog</p>
                                    <input type="text" name="tagline" placeholder="tagline" id="tagline" required><br>
                                    <div class="error-msg" id="devlogTaglineCheck"></div><br>
                                </div>

                                <div class="card-box">
                                    <label for="">Place</label>
                                    <p>One line summery of the devlog</p>
                                    <input type="text" name="tagline" placeholder="tagline" id="tagline" required><br>
                                    <div class="error-msg" id="devlogTaglineCheck"></div><br>
                                </div>


                                <div class="card-box">

                                    <label for="">Duration</label><br>
                                    <select id="type" name="type" required>
                                        <?php foreach ($this->posttypes as $posttype) { ?>
                                            <option value="<?= $posttype['postType'] ?>"><?= $posttype['postType'] ?></option>
                                        <?php } ?>

                                    </select><br><br>

                                </div>


                                <div class="card-box">
                                    <label for="">Description</label>
                                    <p>Write your content</p>
                                    <!-- <textarea id="devLog-details" name="devLog-details" rows="9" cols="64"></textarea><br><br> -->

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
                                        <input type="hidden" name="devLog-details" id="description">
                                    </div>
                                    <br>
                                </div>

                                <div class="card-box">
                                    <label for="">Cost</label>
                                    <p>Game related with the devlog</p>
                                    <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                                    <select id="type" name="gname" required>
                                        <?php foreach ($this->games as $game) { ?>
                                            <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                                        <?php } ?>

                                    </select>
                                    <br><br>
                                </div>


                                <div class="visibility-div">
                                    <label for="">Visibility</label>
                                    <div class="visibility">
                                        <p>Decide when is your page ready for the public.</p>
                                        <div class="category">
                                            <input type="radio" id="dev-draft" name="dev-visibility" value="draft" checked>
                                            <label for="dev-draft">Draft - Only those who can edit the project can view the page</label><br>
                                            <input type="radio" id="dev-public" name="dev-visibility" value="public">
                                            <label for="dev-public">Public - Anyone can view the page, you can enable this after you've saved</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="upload-col-right">

                                <div class="coverImg-div">
                                    <label id="game-upload-cover-img" for="game-upload-cover-img">Advertisement Image</label><br>
                                    <p>Used when we link your devlog with other parts of the site</p>
                                    <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br> -->

                                    <div class="image-upload-box">
                                        <figure class="image-container">
                                            <img id="chosen-image">
                                        </figure>

                                        <input type="file" id="upload-button" name="devlog_ss" accept=".jpg,.jpeg,.png">
                                        <label for="upload-button" id="upload-label">
                                            Upload Photo
                                        </label>
                                    </div>
                                    <div class="error-msg" id="devlogCoverImgCheck"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="button">
                        <input type="submit" name="submit" id="devsubmit" value="Save & View Page">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    include 'includes/footer.php';
    ?>


    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>
    <script src=" <?php echo BASE_URL; ?>public/js/makedevlog.js"> </script>

    <script>
        $(document).ready(function() {
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


</body>



</html>