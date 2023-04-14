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
                <div class=" form-box">

                    <div class="upload-content">
                        <form action="/indieabode/dashboard/editExistingDevlog?id=<?= $this->devlog['devLogID'] ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                            <div class="card-details">
                                <div class="upload-row">
                                    <div class="upload-col-left" id="devlog-left">
                                        <div class="card-box">

                                            <label for="">Title</label><br>
                                            <input type="text" name="title" value="<?= $this->devlog['name'] ?>"><br><br>
                                        </div>

                                        <div class="card-box">
                                            <label for="">Tagline</label>
                                            <p>One line summery of the devlog</p>
                                            <input type="text" name="tagline" placeholder="tagline" value="<?= $this->devlog['Tagline'] ?>"><br><br>
                                        </div>


                                        <div class="card-box">

                                            <label for="">Type</label><br>
                                            <select id="type" name="type" required>
                                                <?php foreach ($this->posttypes as $posttype) { ?>
                                                    <?php if ($posttype['postType'] == $this->devlog['Type']) { ?>
                                                        <option value="<?= $posttype['postType'] ?>" selected><?= $posttype['postType'] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $posttype['postType'] ?>"><?= $posttype['postType'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>

                                            </select><br><br>

                                        </div>


                                        <div class="card-box">
                                            <label for="">Content</label>
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
                                                <input type="hidden" name="devLog-details" id="description" value="<?= $this->devlog['description'] ?>">
                                            </div>
                                            <br>
                                        </div>

                                        <div class="card-box">
                                            <label for="">Game Name</label>
                                            <p>Game related with the devlog</p>
                                            <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                                            <select id="type" name="gname" disabled>

                                                <option value="<?= $this->devlog['gameName'] ?>" selected><?= $this->game['gameName'] ?></option>


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
                                            <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br>
                                            <p>Used when we link your devlog with other parts <br> of the site</p>
                                            <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br> -->

                                            <div class="image-upload-box">
                                                <figure class="image-container">
                                                    <img id="chosen-image" src="/indieabode/public/uploads/devlogs/<?= $this->devlog['devlogImg'] ?>">
                                                </figure>

                                                <input type="file" id="upload-button" name="devlog_ss" accept=".jpg,.jpeg,.png">
                                                <input type="hidden" name="old-devlog-ss" value="<?= $this->devlog['devlogImg'] ?>">
                                                <label for="upload-button" id="upload-label">
                                                    Upload Photo
                                                </label>
                                            </div>
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

        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>

    <script>
        $(document).ready(function() {
            $(".game-content").click(function() {
                let text = $(".game-content").html();
                $('#description').val(text);

            });
        });

        //for loading the saved game details in database to the rich text box
        let details = $('#description').val();
        $('.game-content').html(details);
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