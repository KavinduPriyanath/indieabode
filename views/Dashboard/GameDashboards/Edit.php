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
            <?php if ($this->game['gamePrice'] != "0") { ?>
                <a href="/indieabode/dashboard/gamegiveaways?id=<?= $this->game['gameID']; ?>">Giveaways</a>
            <?php } ?>

        </div>


        <div class="content-row">

            <div class="outer-box">
                <div class=" form-box">

                    <div class="upload-content">
                        <form action="/indieabode/dashboard/editGame?id=<?= $this->game['gameID'] ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                            <div class="upload-row">
                                <div class="upload-col-left">

                                    <div class="title-div">
                                        <label for="game-title">Title</label><br>
                                        <input type="text" name="game-title" id="game-title-edit" value="<?= $this->game['gameName'] ?>" />
                                        <input type="hidden" name="gameID" id="gameID" value="<?= $this->game['gameID'] ?>"><br>
                                        <div class="error-msg" id="gameNameCheck"></div><br>
                                    </div>

                                    <div class="tagline-div">
                                        <label for="game-tagline">Tagline</label><br>
                                        <p>Shown when we link your game to other pages</p>
                                        <input type="text" name="game-tagline" id="game-tagline" minlength="40" maxlength="200" value="<?= $this->game['gameTagline'] ?>" placeholder="Short Description about your game" /><br>
                                        <div class="error-msg" id="gameTaglineCheck"></div><br>
                                    </div>

                                    <!--classification details-->
                                    <div class="classification-div">
                                        <label id="game-classification" for="game-classification">Classification</label><br>
                                        <p>Choose the category your game suits the most</p>
                                        <select id="game-classification" name="game-classification">
                                            <?php foreach ($this->classifications as $classification) { ?>
                                                <?php if ($classification['filter'] == $this->game['gameClassification']) { ?>
                                                    <option value="<?= $classification['filter']; ?>" selected><?= $classification['filter']; ?> Games</option>
                                                <?php } else { ?>
                                                    <option value="<?= $classification['filter']; ?>"><?= $classification['filter']; ?> Games</option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select><br><br>
                                    </div>

                                    <!--Releasing status-->
                                    <div class="release-div">
                                        <label id="game-status" for="game-status">Release Status</label><br>
                                        <select id="game-status" name="game-status">
                                            <?php foreach ($this->releaseStatus as $releaseStatus) { ?>
                                                <?php if ($releaseStatus['filter'] == $this->game['releaseStatus']) { ?>
                                                    <option value="<?= $releaseStatus['filter']; ?>" selected><?= $releaseStatus['filter']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $releaseStatus['filter']; ?>"><?= $releaseStatus['filter']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select><br><br>
                                    </div>

                                    <!--Releasing status-->
                                    <div class="platform-div">
                                        <label id="" for="">Platform</label><br>
                                        <p>Select for what platforms your game is designed to be played</p>
                                        <div class="platform-checkboxes">
                                            <div class="platform">
                                                <input type="checkbox" name="platform[]" value="Windows" id="windows">
                                                <label for="windows">Windows</label>
                                            </div>
                                            <div class="platform">
                                                <input type="checkbox" name="platform[]" value="MacOS" id="macOS">
                                                <label for="macOS">MacOS</label>
                                            </div>
                                            <div class="platform">
                                                <input type="checkbox" name="platform[]" value="Linux" id="linux">
                                                <label for="linux">Linux</label>
                                            </div>
                                            <div class="platform">
                                                <input type="checkbox" name="platform[]" value="Android" id="android">
                                                <label for="android">Android</label>
                                            </div>
                                            <div class="platform">
                                                <input type="checkbox" name="platform[]" value="iOS" id="ios">
                                                <label for="ios">iOS</label>
                                            </div>
                                        </div>
                                        <div class="error-msg" id="platformCheck"></div>
                                        <br>
                                    </div>

                                    <div class="game-type-div">
                                        <label id="" for="">Game Type</label><br>
                                        <select id="" name="game-type">
                                            <?php foreach ($this->gameTypes as $gameType) { ?>
                                                <?php if ($gameType['filter'] == $this->game['gameType']) { ?>
                                                    <option value="<?= $gameType['filter'] ?>" selected><?= $gameType['filter'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $gameType['filter'] ?>"><?= $gameType['filter'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select><br><br>
                                    </div>

                                    <div class="pricing-div">
                                        <label id="game-price" for="game-price">Pricing</label><br><br>
                                        <div class="price">
                                            <div class="price-free">
                                                <input type="radio" id="game-free" name="game-price" value="Free">
                                                <label for="game-free">Free</label>
                                            </div>
                                            <div class="price-pwyw">
                                                <input type="radio" id="game-pwyw" name="game-price" value="PWYW">
                                                <label for="game-pwyw">Donate</label>
                                            </div>
                                            <div class="price-paid">
                                                <input type="radio" id="game-paid" name="game-price" value="Paid">
                                                <label for="game-paid">Paid</label>
                                            </div>
                                        </div>
                                        <div id="free-game-price-box" class="price-box">
                                            <p id="p">This game will be available for free</p>
                                        </div>
                                        <div id="pwyw-game-price-box" style="display: none" class="price-box">
                                            <p id="p">Someone downloading your game will be asked for a donation before getting access. They can skip to download for free.</p>
                                            <br>
                                            <p>Suggested donation — Default donation amount</p>
                                            <input type="text" id="game-price-val" name="game-pwyw-default" value="$2.00" />
                                        </div>
                                        <div id="paid-game-price-box" style="display: none" class="price-box">
                                            <p id="p">Set a price you need</p>
                                            <input type="text" id="game-price-val" name="game-price-paid" value="<?= $this->game['gamePrice'] ?>" />
                                        </div>
                                        <br><br>
                                    </div>



                                    <div class="details-div">
                                        <label id="game-details" for="game-details">Details</label>
                                        <p id="p">This will be the content of your game page</p>

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
                                            <input type="hidden" name="description" id="description" value="<?= $this->game['gameDetails'] ?>">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="tags-div">
                                        <label id="game-tags" for="game-tags">Tags</label>
                                        <p id="p">Keywords that someone would search to find your game</p>
                                        <!-- <input type="text" id="game-tags" name="game-tags" /> <br><br> -->

                                        <div class="tags-wrapper">
                                            <input type="hidden" name="game-tags" value="" id="gametagss">
                                            <div class="tags-content">
                                                <p>Press enter or add a comma after each tag</p>
                                                <ul>
                                                    <input type="text" spellcheck="false" id="tags" />
                                                </ul>
                                            </div>
                                            <div class="tags-details">
                                                <p><span>10</span> tags are remaining</p>
                                                <div class="remove-btn">Remove All</div>
                                            </div>
                                        </div><br>
                                    </div>





                                    <div class="features-div">
                                        <label id="game-features" for="game-features">Features</label>
                                        <p id="p">Special features your game has that players would prefer</p>
                                        <!-- <input type="text" id="game-features" name="game-features" /> <br><br> -->
                                        <div class="feature-checkboxes">
                                            <?php foreach ($this->features as $feature) { ?>
                                                <div class="feature">
                                                    <input type="checkbox" name="game-features[]" value="<?= $feature['filter'] ?>" id="<?= $feature['filter'] ?>">
                                                    <label for="<?= $feature['filter'] ?>"><?= $feature['filter'] ?></label>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="error-msg" id="featureCheck"></div>
                                        <br>
                                    </div>


                                    <div class="trailer-div">
                                        <label id="game-illustration-vedio" for="game-illustration-vedio">Trailer Video</label><br>
                                        <p>Add the link to your Youtube video</p>
                                        <input type="url" id="game-illustration-vedio" name="game-illustration-vedio" value="<?= $this->game['gameTrailor'] ?>" placeholder="eg: https://www.youtube.com/"><br><br>
                                    </div>


                                    <div class="accordion">
                                        <div class="contentBox" id="collapse">
                                            <div class="label" onclick="Accordion()">Game Specifications</div>
                                            <div class="content">
                                                <div class="specification-div">
                                                    <!-- <label>Game Specification</label><br><br> -->
                                                    <div class="platform-name">Windows</div>
                                                    <div class="game-spec-type">
                                                        <p class="game-spec-item">Minimum</p>
                                                        <p class="game-spec-item">Recommended</p><br>
                                                    </div>
                                                    <div class="game-spec-type">
                                                        <div class="game-spec-item-details">


                                                            <label id="min-game-OS" for="min-game-OS">OS</label><br>
                                                            <input type="text" name="min-game-OS" id="min-game-OS" placeholder="Windows 10" value="<?= $this->game['minOS'] ?>" /><br><br>
                                                            <label id="min-game-processor" for="min-game-processor">Processor</label><br>
                                                            <input type="text" name="min-game-processor" id="min-game-processor" value="<?= $this->game['minProcessor'] ?>" placeholder="Intel Core I5" /><br><br>
                                                            <label id="min-game-memory" for=" min-game-memory">Memory</label><br>
                                                            <input type="text" name="min-game-memory" id="min-game-memory" value="<?= $this->game['minMemory'] ?>" placeholder="8 GB" /><br><br>
                                                            <label id="min-game-storage" for="min-game-storage">Storage</label><br>
                                                            <input type="text" name="min-game-storage" id="min-game-storage" value="<?= $this->game['minStorage'] ?>" placeholder="14 GB" /><br><br>
                                                            <label id="min-game-graphics" for="min-game-graphics">Graphics</label><br>
                                                            <input type="text" name="min-game-graphics" id="min-game-graphics" value="<?= $this->game['minGraphics'] ?>" placeholder="NVIDIA GeForce 1660" /><br><br>
                                                            <label id="game-other" for="game-other">Other</label><br>
                                                            <input type="text" name="game-other" id="game-other" value="<?= $this->game['other'] ?>" placeholder="English Language Support" /><br><br>

                                                        </div>
                                                        <div class="game-spec-item-details">

                                                            <label id="game-OS" for="game-OS">OS</label><br>
                                                            <input type="text" name="game-OS" id="game-OS" placeholder="Windows 10" value="<?= $this->game['recommendOS'] ?>" /><br><br>
                                                            <label id="game-processor" for="game-processor">Processor</label><br>
                                                            <input type="text" name="game-processor" id="game-processor" value="<?= $this->game['recommendProcessor'] ?>" placeholder="Intel Core I5" /><br><br>
                                                            <label id="game-memory" for="game-memory">Memory</label><br>
                                                            <input type="text" name="game-memory" id="game-memory" value="<?= $this->game['recommendMemory'] ?>" placeholder="8 GB" /><br><br>
                                                            <label id="game-storage" for="game-storage">Storage</label><br>
                                                            <input type="text" name="game-storage" id="game-storage" value="<?= $this->game['recommendStorage'] ?>" placeholder="14 GB" /><br><br>
                                                            <label id="game-graphics" for="game-graphics">Graphics</label><br>
                                                            <input type="text" name="game-graphics" id="game-graphics" value="<?= $this->game['recommendGraphics'] ?>" placeholder="NVIDIA GeForce 1660" /><br><br>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="visibility-div">
                                        <label id="game-visibility" for="game-visibility">Visibility</label>
                                        <div class="visibility">
                                            <p>Decide when is your page ready for the public</p>
                                            <input type="radio" id="draft" name="game-visibility" value="draft">
                                            <label for="draft">Draft - Only those who can edit the project can view the page</label><br>
                                            <input type="radio" id="public" name="game-visibility" value="public">
                                            <label for="public">Public - Anyone can view the page, you can enable this after you've saved</label><br><br>
                                        </div>
                                    </div>

                                </div>




                                <div class="upload-col-right">

                                    <div class="coverImg-div">
                                        <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br>
                                        <p>Used when we link your game with other parts <br> of the site</p>
                                        <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br> -->

                                        <div class="image-upload-box">
                                            <figure class="image-container">
                                                <img id="chosen-image" src="<?php echo BASE_URL; ?>public/uploads/games/cover/<?= $this->game['gameCoverImg'] ?>">
                                            </figure>

                                            <input type="file" id="upload-button" name="game-upload-cover-img" accept=".jpg,.jpeg,.png">
                                            <input type="hidden" name="old-game-upload-cover-img" value="<?= $this->game['gameCoverImg'] ?>">
                                            <label for="upload-button" id="upload-label">
                                                Upload Photo
                                            </label>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="gamefile-div">
                                        <div class="game-upload-box">
                                            <label>Upload Game</label><br>
                                            <!-- <input type="file" id="upload-game" name="upload-game">  -->
                                            <input type="file" id="upload-game" name="upload-game" accept=".zip">
                                            <input type="hidden" name="old-upload-game" id="old-upload-game" value="<?= $this->game['gameFile'] ?>">
                                            <label for="upload-game" id="upload-label">
                                                Upload Game File
                                            </label>
                                            <div class="progress-bar">
                                                <progress value="0" max="100"></progress>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="screenshots-div">
                                        <label id="game-screenshots" for="game-screenshots">Screenshots</label><br>
                                        <p>These will appear on your game's page. Optional <br> but highly recommended. Upload 3 to 5 for best <br> results</p><br>
                                        <!-- <input type="file" id="game-screenshots" name="game-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br> -->

                                        <!-- <input type="file" name="fef" id="fef" value="pic.jpg"> -->
                                        <div class="screenshot-container">

                                            <div id="screenshots"></div>
                                            <p id="num-of-files">No Files Chosen</p>
                                            <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="game-screenshots[]" multiple>
                                            <input type="hidden" name="old-game-screenshots" id="old-game-screenshots" value="<?= $this->game['gameScreenshots'] ?>">
                                            <label for="file-input">
                                                Add Screenshots
                                            </label>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <button type="submit" class="update-btn" id="update-btn" name="game-submit">Save & View Page</button>
                        </form>
                    </div>


                </div>

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

    <script src=" <?php echo BASE_URL; ?>public/js/gameupload.js"></script>

    <script>
        const ul = document.querySelector("ul"),
            input = document.getElementById("tags"),
            tagNumb = document.querySelector(".tags-details span");

        const hiddenInput = document.getElementById("gametagss");

        let maxTags = 10,
            tags = [];

        <?php foreach ($this->gameTags as $gameTag) { ?>
            tags.push("<?= $gameTag ?>");
        <?php } ?>

        countTags();
        createTag();

        function countTags() {
            // input.focus();
            tagNumb.innerText = maxTags - tags.length;
        }

        function createTag() {
            ul.querySelectorAll("li").forEach((li) => li.remove());
            tags
                .slice()
                .reverse()
                .forEach((tag) => {
                    let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
                    ul.insertAdjacentHTML("afterbegin", liTag);
                });
            countTags();
        }

        function remove(element, tag) {
            let index = tags.indexOf(tag);
            tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
            element.parentElement.remove();
            hiddenInput.value = tags;
            countTags();
        }

        function addTag(e) {
            if (e.key == "Enter") {
                let tag = e.target.value.replace(/\s+/g, " ");
                if (tag.length > 1 && !tags.includes(tag)) {
                    if (tags.length < 10) {
                        tag.split(",").forEach((tag) => {
                            tags.push(tag);

                            // input.value = tags;
                            hiddenInput.value = tags;
                            createTag();
                        });
                    }
                }
                e.target.value = "";

                console.log(tags);
            }
        }

        input.addEventListener("keyup", addTag);

        const removeBtn = document.querySelector(".tags-details .remove-btn");
        removeBtn.addEventListener("click", () => {
            tags.length = 0;
            hiddenInput.value = tags;
            ul.querySelectorAll("li").forEach((li) => li.remove());
            countTags();
        });
    </script>



    <script>
        $(document).ready(function() {
            $(".game-content").click(function() {
                let text = $(".game-content").html();
                $('#description').val(text);

            });
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
        function Accordion() {
            document.getElementById('collapse').classList.toggle('active');
        }
    </script>

    <script>
        $(function() {
            $('input[name="game-price"]').on("click", function() {
                if ($(this).val() == "Free") {
                    $("#free-game-price-box").show();
                    $("#paid-game-price-box").hide();
                    $("#pwyw-game-price-box").hide();
                } else if ($(this).val() == "Paid") {
                    $("#paid-game-price-box").show();
                    $("#free-game-price-box").hide();
                    $("#pwyw-game-price-box").hide();
                } else if ($(this).val() == "PWYW") {
                    $("#pwyw-game-price-box").show();
                    $("#free-game-price-box").hide();
                    $("#paid-game-price-box").hide();
                }
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
        let uploadButtongame = document.getElementById("upload-game");

        uploadButtongame.onchange = () => {

            let percent = 0;

            let file = uploadButtongame.files[0];
            console.log(file);

            let formdata = new FormData();
            formdata.append("file", file);

            let http = new XMLHttpRequest();
            http.upload.addEventListener("progress", function(event) {
                percent = (event.loaded / event.total) * 100;
                document.querySelector("progress").value = Math.round(percent);
            });

            http.open("POST", "/indieabode/gameupload/file");
            http.send(formdata);
        }

        if ($("#old-upload-game").val() != "") {
            percent = 100;
            document.querySelector("progress").value = Math.round(percent);
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

            console.log(fileInput.files.length);
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
                let screenshots = $("#old-game-screenshots").val();
                let ssArray = screenshots.split(',');

                imageContainer.innerHTML = "";
                numOfFiles.textContent = `${ssArray.length} Files Selected`;
                numOfFiles.style.display = "block";
                imageContainer.style.display = "block";

                for (let i = 0; i < ssArray.length; i++) {

                    let figure = document.createElement("figure");
                    let img = document.createElement("img");
                    img.setAttribute("src", "<?php echo BASE_URL; ?>public/uploads/games/ss/" + ssArray[i]);
                    figure.appendChild(img);
                    imageContainer.appendChild(figure);

                }

            }

        }
    </script>


    <script>
        <?php if ($this->gamePrice == "Free") { ?>
            document.getElementById("game-free").checked = true;
        <?php } else if ($this->gamePrice == "Paid") { ?>
            document.getElementById("game-paid").checked = true;
        <?php } else if ($this->gamePrice == "Pwyw") { ?>
        <?php } ?>


        $(document).ready(function() {

            //selecting the relevant game visibility from the database
            $("#<?= $this->game['gameVisibility'] ?>").attr("checked", true);

            //If the game is a submission to a gamejam then it cannot be made non-free later
            <?php if ($this->game['jamSubmission'] != 0) { ?>
                $('.pricing-div input:radio:not(:checked)').attr('disabled', true);
            <?php } ?>

            // <?php foreach ($this->gameScreenshots as $gameScreenshot) { ?>

            //     fileInput.files.push("<?= $gameScreenshot; ?>");

            // <?php } ?>


            existingPreview();

            //for loading selected tags from database to the hidden input's value to be submitted in the case of no changes in tags
            hiddenInput.value = tags;


            //for loading the relevant pricing details when the page loads with the selected price value of the game
            if ($("input[name='game-price']:checked").val() == "Free") {
                $("#free-game-price-box").show();
                $("#paid-game-price-box").hide();
                $("#pwyw-game-price-box").hide();
            } else if ($("input[name='game-price']:checked").val() == "Paid") {
                $("#paid-game-price-box").show();
                $("#free-game-price-box").hide();
                $("#pwyw-game-price-box").hide();
            } else if ($("input[name='game-price']:checked").val() == "PWYW") {
                $("#pwyw-game-price-box").show();
                $("#free-game-price-box").hide();
                $("#paid-game-price-box").hide();
            }

            //for loading the selected game features from the database
            <?php foreach ($this->platforms as $platform) { ?>
                if ($('#windows').val() == "<?= $platform ?>") {
                    $('#windows').prop("checked", true);
                } else if ($('#macOS').val() == "<?= $platform ?>") {
                    $('#macOS').prop("checked", true);
                } else if ($('#linux').val() == '<?= $platform ?>') {
                    $('#linux').prop("checked", true);
                } else if ($('#android').val() == "<?= $platform ?>") {
                    $('#android').prop("checked", true);
                } else if ($('#ios').val() == "<?= $platform ?>") {
                    $('#ios').prop("checked", true);
                }
            <?php } ?>

            //for loading the selected game features from the database to the edit form
            <?php foreach ($this->selectedFeatures as $selectedFeature) { ?>
                $('#<?= $selectedFeature ?>').prop("checked", true);

            <?php } ?>


            //for loading the saved game details in database to the rich text box
            let details = $('#description').val();
            $('.game-content').html(details);

        });
    </script>


    <script>
        $(document).ready(function() {

            //A validation only for game edit form
            let editGameNameOkay = true;
            let platformOkay = true;
            let featuresOkay = true;

            //Check for the availability of game name the developer chose
            $("#game-title-edit").keyup(function() {
                editGameNameAvailability();
            });

            $("#game-tagline").keyup(function() {
                taglineValidity();
            });

            $(".platform-checkboxes").click(function() {
                if ($("[name='platform[]']:checked").length != 0) {
                    $("#platformCheck").hide();
                    platformOkay = true;
                }
            });


            $(".feature-checkboxes").click(function() {
                if ($("[name='game-features[]']:checked").length != 0) {
                    $("#featureCheck").hide();
                    featuresOkay = true;
                }
            });

            function featureSelectorCheck() {
                let featureSelectorCount = $("[name='game-features[]']:checked").length;

                if (featureSelectorCount == 0) {
                    $("#featureCheck").show();
                    $("#featureCheck").text("Must select atleast one feature");
                    featuresOkay = false;
                }
            }

            function platformSelectorCheck() {
                let checkedPlatformCount = $("[name='platform[]']:checked").length;

                if (checkedPlatformCount == 0) {
                    $("#platformCheck").show();
                    $("#platformCheck").text("Must select atleast one platform");
                    platformOkay = false;
                }
            }

            function editGameNameAvailability() {
                let editGameName = $("#game-title-edit").val();
                let gameID = $("#gameID").val();
                let thisGameName = "<?= $this->game['gameName'] ?>";

                var data = {
                    gameName: editGameName,
                    gameID: gameID,
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/dashboard/editGameNameAvailability",
                    data: data,
                    success: function(response) {
                        if (editGameName.length == 0) {
                            $("#gameNameCheck").show();
                            $("#gameNameCheck").text("Game Name Cannot be empty");
                            editGameNameOkay = false;
                        } else if (editGameName == thisGameName) {
                            $("#gameNameCheck").hide();
                            editGameNameOkay = true;
                        } else if (response == "available") {
                            $("#gameNameCheck").hide();
                            editGameNameOkay = true;
                        } else if (response == "unavailable") {
                            $("#gameNameCheck").show();
                            $("#gameNameCheck").css("background-color", "rgb(225, 132, 132)");
                            $("#gameNameCheck").text("You alreay have a game with this name");
                            editGameNameOkay = false;
                        } else if (response == "warning") {
                            $("#gameNameCheck").show();
                            $("#gameNameCheck").css("background-color", "#ffff80");
                            $("#gameNameCheck").text(
                                "Warning: Platform already has a game with this name"
                            );
                            editGameNameOkay = true;
                        }
                    },
                });
            }


            function taglineValidity() {
                let tagline = $("#game-tagline").val();

                if (tagline.length < 40) {
                    $("#gameTaglineCheck").show();
                    $("#gameTaglineCheck").text("Must use more than 40 characters");
                    taglineOkay = false;
                } else if (tagline.length > 40 && tagline.length < 200) {
                    $("#gameTaglineCheck").hide();
                    taglineOkay = true;
                } else {
                    $("#gameTaglineCheck").show();
                    $("#gameTaglineCheck").text("Cannot exceed 200 characters");
                    taglineOkay = false;
                }
            }

            $("#update-btn").click(function(e) {
                let formSubmit = false;
                editGameNameAvailability();
                taglineValidity();
                platformSelectorCheck();
                featureSelectorCheck();

                if (
                    editGameNameOkay == false ||
                    taglineOkay == false
                ) {
                    formSubmit = false;
                } else {
                    formSubmit = true;
                }

                if (formSubmit == false) {
                    e.preventDefault();
                }
            });

            //end of game edit form validation

        });
    </script>


</body>



</html>