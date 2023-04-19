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
            <div class="heading">Creator Dashboard - <?= $this->asset['assetName'] ?></div>
        </div>
        <div class="tabs-row">
            <a href="/indieabode/dashboard/edit?id=<?= $this->asset['assetID']; ?>">Edit Game</a>
            <a href="/indieabode/dashboard/assetanalytics?id=<?= $this->asset['assetID']; ?>">Analytics</a>
            <a href="/indieabode/dashboard/reviews?id=<?= $this->asset['assetID']; ?>">Reviews</a>

        </div>


        <div class="content-row">


            <div class="outer-box">
                <div class="form-box">


                    <!--upload assets form-->

                    <form action="/indieabode/dashboard/editAsset?id=<?= $this->asset['assetID'] ?>" method="POST" id="upload-asset-form" class="input-upload-group" enctype="multipart/form-data">
                        <!--Display error Messages-->
                        <div class="upload-row">

                            <!--Display error Messages-->



                            <div class="upload-col-left" id="gig-left">
                                <div class="title-div">
                                    <label id="asset-title" for="asset-title">Title</label><br>
                                    <input type="text" name="asset-title" id="asset-title" value="<?= $this->asset['assetName']; ?>" /><br><br>
                                </div>

                                <div class="tagline-div">
                                    <label id="asset-tagline" for="asset-tagline">Tagline</label><br>
                                    <input type="text" name="asset-tagline" id="asset-tagline" value="<?= $this->asset['assetTagline']; ?>" placeholder="Optional" /><br><br>
                                </div>

                                <!--classification details-->
                                <div class="classification-div">
                                    <label id="asset-classification" for="asset-classification">Classification</label><br>
                                    <select id="asset-classification" name="asset-classification">
                                        <option value="2d" id="2d">2D</option>
                                        <option value="3d" id="3d">3D</option>
                                        <option value="audio" id="audio">Audio</option>
                                        <option value="visualEffects" id="visualEffects">Visual Effects</option>
                                        <option value="textures" id="textures">Textures</option>
                                        <option value="maps" id="maps">Maps</option>
                                        <option value="tools" id="tools">Tools</option>
                                    </select><br><br>
                                </div>

                                <!--Releasing status-->
                                <div class="releasing-div">
                                    <label id="asset-status" for="asset-status">Release Status</label><br>
                                    <select id="asset-status" name="asset-status">
                                        <option value="Released" id="Released">Released</option>
                                        <option value="Prototype" id="Prototype">Prototype</option>
                                        <option value="Upcoming" id="Upcoming">Upcoming</option>
                                    </select><br><br>
                                </div>


                                <div class="details-div">
                                    <label for="asset-details">Details</label><br>
                                    <p id="p">This will be the content of your assets page</p>
                                    <!--<textarea id="asset-details" name="asset-details" rows="9" cols="50"></textarea>-->



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
                                        <!--Content-->
                                        <div class="game-content" contenteditable="true"></div>
                                        <input type="hidden" name="description" id="description" value="<?= $this->asset['assetDetails'] ?>">
                                    </div>
                                </div>
                                <br>

                                <div class="pricing-div">
                                    <label id="asset-price" for="asset-price">Pricing</label><br>
                                    <div class="price">
                                        <div class="price-free">
                                            <input type="radio" id="asset-free" name="asset-price" value="Free" checked>
                                            <label for="asset-free">Free</label>
                                        </div>
                                        <div class="price-pwyw">
                                            <input type="radio" id="asset-pwyw" name="asset-price" value="PWYW">
                                            <label for="asset-pwyw">Donate</label>
                                        </div>
                                        <div class="price-paid">
                                            <input type="radio" id="asset-paid" name="asset-price" value="Paid">
                                            <label for="asset-paid">Paid</label>
                                        </div>
                                    </div>
                                    <div id="free-asset-price-box">
                                        <p id="p">This asset will be available for free</p>
                                    </div>
                                    <div id="pwyw-asset-price-box" style="display: none">
                                        <p id="p">Someone downloading your asset will be asked for a donation before getting access. They can skip to download for free.</p>
                                        <br>
                                        <p>Suggested donation — Default donation amount</p>
                                        <input type="text" id="asset-price-val" name="asset-pwyw-default" value="$2.00" />
                                    </div>
                                    <div id="paid-asset-price-box" style="display: none">
                                        <p id="p">Set a price you need</p>
                                        <input type="text" id="asset-price-val" name="asset-price-paid" value="<?= $this->asset['assetPrice'] ?>" />
                                    </div>
                                    <br><br>
                                </div>




                                <div class="tags-div">
                                    <label id="asset-tags" for="asset-tags">Tags</label><br>
                                    <p id="p">Keywords that someone would search to find your assets</p>
                                    <!-- <input type="text" id="tags" name="asset-tags" /> <br><br> -->
                                    <div class="tags-wrapper">
                                        <input type="hidden" name="asset-tags" value="" id="gametagss">
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



                                <!--License-->
                                <div class="license-div">
                                    <label id="asset-license" for="asset-license">License</label><br>
                                    <p>Decide when is your page ready for the public</p>
                                    <select id="asset-license" name="asset-license">
                                        <option value="open-source" id="open-source">Open Source</option>
                                        <option value="proprietary" id="proprietary">Proprietary</option>
                                        <option value="permissive" id="permissive">Permissive</option>
                                        <option value="copyleft" id="copyleft">Copy Left</option>
                                    </select><br><br>
                                </div>

                                <!--AssetType-->
                                <div class="asset-type-div">
                                    <label id="asset-type" for="asset-type">Type</label><br>
                                    <p>Helps viewers to filter your asset. Select the most suitable one</p>
                                    <select id="asset-type" name="asset-type">
                                        <option value="sprite" id="sprite">Sprite</option>
                                        <option value="skybox" id="skybox">Skybox</option>
                                        <option value="character" id="character">Character</option>
                                        <option value="tileset" id="tileset">Tileset</option>
                                    </select><br><br>
                                </div>

                                <!--AssetStyle-->
                                <div class="asset-style-div">
                                    <label id="asset-style" for="asset-style">Style</label><br>
                                    <p>Helps viewers to filter your asset. Select the most suitable one</p>
                                    <select id="asset-style" name="asset-style">
                                        <option value="pixelart" id="pixelart">Pixel Art</option>
                                        <option value="8bit" id="8bit">8-Bit</option>
                                        <option value="16bit" id="16bit">16-Bit</option>
                                        <option value="lowpoly" id="lowpoly">Low Poly</option>
                                        <option value="voxel" id="voxel">Voxel</option>
                                    </select><br><br>
                                </div>

                                <div class="visibility-div">
                                    <label id="asset-visibility" for="asset-visibility">Visibility</label><br>
                                    <p>Decide when is your page ready for the public</p>
                                    <div class="visibility">
                                        <input type="radio" id="asset-draft" name="asset-visibility" value="draft" checked>
                                        <label for="asset-draft">Draft - Only those who can edit the project can view the page</label><br>
                                        <input type="radio" id="asset-public" name="asset-visibility" value="public">
                                        <label for="asset-public">Public - Anyone can view the page, you can enable this after you've saved</label><br>
                                    </div>
                                </div>

                            </div>

                            <div class="upload-col-right">

                                <div class="cover-img-div">
                                    <label id="asset-upload-cover-img" for="asset-upload-cover-img">Upload Cover Image</label><br>
                                    <p>This image will be shown and used to identify <br> your asset</p>
                                    <!-- <input type="file" id="asset-upload-cover-img" name="asset-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br> -->

                                    <div class="image-upload-box">
                                        <figure class="image-container">
                                            <img id="chosen-image" src="<?php echo BASE_URL; ?>public/uploads/assets/cover/<?= $this->asset['assetCoverImg'] ?>">
                                        </figure>

                                        <input type="file" id="upload-button" name="asset-upload-cover-img" accept=".jpg,.jpeg,.png">
                                        <input type="hidden" name="old-asset-upload-cover-img" value="<?= $this->asset['assetCoverImg'] ?>">
                                        <label for="upload-button" id="upload-label">
                                            Upload Photo
                                        </label>
                                    </div>
                                </div>

                                <div class="trailer-div" id="video-right">
                                    <label id="asset-illustration-vedio" for="asset-illustration-vedio">Asset Illustration Video</label><br>
                                    <p>Provide a link to youtube</p>
                                    <input type="url" id="asset-illustration-vedio" name="asset-illustration-video" value="<?= $this->asset['assetVideoURL']; ?>" placeholder="eg: https://www.youtube.com/"><br><br>
                                </div>



                                <div class="upload-file-div">
                                    <!-- <input type="file" id="upload-asset" name="upload-asset"><br><br> -->
                                    <div class="game-upload-box">
                                        <label>Upload Asset</label><br>
                                        <!-- <input type="file" id="upload-game" name="upload-game">  -->
                                        <input type="file" id="upload-asset" name="upload-asset" accept=".zip">
                                        <input type="hidden" name="old-upload-asset" id="old-upload-asset" value="<?= $this->asset['assetFile'] ?>">
                                        <label for="upload-asset" id="upload-label">
                                            Upload Asset File
                                        </label>
                                        <div class="progress-bar">
                                            <progress value="0" max="100"></progress>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                                <div class="screenshots-div">
                                    <label id="asset-screenshots" for="asset-screenshots">Screenshots</label><br>
                                    <p>These will appear on your asset's page. Optional <br> but highly recommended. Upload 3 to 5 for best <br> results<br>
                                        <!-- <input type="file" id="asset-screenshots" name="asset-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br> -->


                                    <div class="screenshot-container">

                                        <div id="screenshots"></div>
                                        <p id="num-of-files">No Files Chosen</p>
                                        <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="asset-screenshots[]" multiple>
                                        <input type="hidden" name="old-asset-screenshots" id="old-asset-screenshots" value="<?= $this->asset['assetScreenshots'] ?>">
                                        <label for="file-input">
                                            Add Screenshots
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="submit-btn" name="asset-submit" id="asset-submit">Save & View Page</button>
                        <div class="delete-btn" id="delete-asset">Delete Asset</div>
                    </form>
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
                let screenshots = $("#old-asset-screenshots").val();
                let ssArray = screenshots.split(',');

                imageContainer.innerHTML = "";
                numOfFiles.textContent = `${ssArray.length} Files Selected`;
                numOfFiles.style.display = "block";
                imageContainer.style.display = "block";

                for (let i = 0; i < ssArray.length; i++) {

                    let figure = document.createElement("figure");
                    let img = document.createElement("img");
                    img.setAttribute("src", "<?php echo BASE_URL; ?>public/uploads/assets/ss/" + ssArray[i]);
                    figure.appendChild(img);
                    imageContainer.appendChild(figure);

                }

            }

        }
    </script>

    <script>
        const ul = document.querySelector("ul"),
            input = document.getElementById("tags"),
            tagNumb = document.querySelector(".tags-details span");

        const hiddenInput = document.getElementById("gametagss");

        let maxTags = 10,
            tags = [];

        <?php foreach ($this->assetTags as $assetTag) { ?>
            tags.push("<?= $assetTag ?>");
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

            $('#delete-asset').click(function() {

                let message = "Are you sure you want to delete <?= $this->asset['assetName'] ?> ? ";

                if (confirm(message) == true) {

                    let assetID = <?= $this->asset['assetID'] ?>;

                    var data = {
                        'assetID': assetID,
                        'delete_asset': true,
                    };

                    $.ajax({
                        url: "/indieabode/dashboard/deleteAsset",
                        method: "POST",
                        data: data,
                        success: function(response) {

                            window.location.href = "/indieabode/dashboard/";
                        }
                    })

                } else {
                    //nothin happens
                }

            });

            <?php if ($this->assetPrice == "Free") { ?>
                document.getElementById("asset-free").checked = true;
            <?php } else if ($this->assetPrice == "Paid") { ?>
                document.getElementById("asset-paid").checked = true;
            <?php } else if ($this->assetPrice == "Pwyw") { ?>
            <?php } ?>

            existingPreview();

            //for loading the relevant pricing details when the page loads with the selected price value of the game
            if ($("input[name='asset-price']:checked").val() == "Free") {
                $("#free-asset-price-box").show();
                $("#paid-asset-price-box").hide();
                $("#pwyw-asset-price-box").hide();
            } else if ($("input[name='asset-price']:checked").val() == "Paid") {
                $("#paid-asset-price-box").show();
                $("#free-asset-price-box").hide();
                $("#pwyw-asset-price-box").hide();
            } else if ($("input[name='asset-price']:checked").val() == "PWYW") {
                $("#pwyw-asset-price-box").show();
                $("#free-asset-price-box").hide();
                $("#paid-asset-price-box").hide();
            }

            //for loading selected tags from database to the hidden input's value to be submitted in the case of no changes in tags
            hiddenInput.value = tags;

            //selecting the relevant classsification from the database
            $("#<?= $this->asset['assetClassification'] ?>").attr("selected", "selected");

            //selecting the relevant releaseStatus from the database
            $("#<?= $this->asset['assetReleaseStatus'] ?>").attr("selected", "selected");

            //selecting the relevant releaseStatus from the database
            $("#<?= $this->asset['assetLicense'] ?>").attr("selected", "selected");

            //selecting the relevant releaseStatus from the database
            $("#<?= $this->asset['assetType'] ?>").attr("selected", "selected");

            //selecting the relevant releaseStatus from the database
            $("#<?= $this->asset['assetStyle'] ?>").attr("selected", "selected");

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
        let uploadButtongame = document.getElementById("upload-asset");

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
        $(function() {
            $('input[name="asset-price"]').on("click", function() {
                if ($(this).val() == "Free") {
                    $("#free-asset-price-box").show();
                    $("#paid-asset-price-box").hide();
                    $("#pwyw-asset-price-box").hide();
                } else if ($(this).val() == "Paid") {
                    $("#paid-asset-price-box").show();
                    $("#free-asset-price-box").hide();
                    $("#pwyw-asset-price-box").hide();
                } else if ($(this).val() == "PWYW") {
                    $("#pwyw-asset-price-box").show();
                    $("#free-asset-price-box").hide();
                    $("#paid-asset-price-box").hide();
                }
            });
        });
    </script>



</body>



</html>