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
                Create a new project
            </div>
            <hr>

            <div class="upload-content">
                <form action="/indieabode/gameupload/uploadgame" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                    <div class="upload-row">
                        <div class="upload-col-left">

                            <div class="title-div">
                                <label id="game-title" for="game-title">Title</label><br>
                                <input type="text" name="game-title" id="game-title" /><br><br>
                            </div>

                            <div class="tagline-div">
                                <label id="game-tagline" for="game-tagline">Tagline</label><br>
                                <p>Shown when we link your game to other pages</p>
                                <input type="text" name="game-tagline" id="game-tagline" minlength="40" maxlength="70" placeholder="Short Description about your game" /><br><br>
                            </div>

                            <!--classification details-->
                            <div class="classification-div">
                                <label id="game-classification" for="game-classification">Classification</label><br>
                                <p>Choose the category your game suits the most</p>
                                <select id="game-classification" name="game-classification">
                                    <option value="adventure">Adventure Games</option>
                                    <option value="action" selected>Action Games</option>
                                    <option value="RPG">RPG Games</option>
                                    <option value="racing">Racing Games</option>
                                    <option value="simulation">Simulation Games</option>
                                    <option value="strategy">Strategy Games</option>
                                </select><br><br>
                            </div>

                            <!--Releasing status-->
                            <div class="release-div">
                                <label id="game-status" for="game-status">Release Status</label><br>
                                <select id="game-status" name="game-status">
                                    <option value="released" selected>Released</option>
                                    <option value="early access">Early Access</option>
                                    <option value="upcoming">Upcoming</option>
                                </select><br><br>
                            </div>

                            <!--Releasing status-->
                            <div class="platform-div">
                                <label id="" for="">Platform</label><br>
                                <p>Select for what platforms your game is designed to be played</p>
                                <!-- <select id="" name="game-platform">
                                    <option value="Windows" selected>Windows</option>
                                    <option value="MacOS">MacOS</option>
                                    <option value="Linux">Linux</option>
                                </select><br><br> -->
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
                                <br>
                            </div>

                            <div class="game-type-div">
                                <label id="" for="">Game Type</label><br>
                                <select id="" name="game-type">
                                    <option value="Base Game" selected>Base Game</option>
                                    <option value="DLC">DLC</option>
                                    <option value="Prologue">Prologue</option>
                                    <option value="Demo">Demo</option>
                                </select><br><br>
                            </div>

                            <div class="pricing-div">
                                <label id="game-price" for="game-price">Pricing</label><br><br>
                                <div class="price">
                                    <div class="price-free">
                                        <input type="radio" id="game-free" name="game-price" value="Free" checked>
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
                                    <input type="text" id="game-price-val" name="game-price-paid" />
                                </div>
                                <br><br>
                            </div>



                            <div class="details-div">
                                <label id="game-details" for="game-details">Details</label>
                                <p id="p">This will be the content of your game page</p>
                                <!-- <textarea id="game-details" name="game-details" rows="9" cols="50"></textarea><br><br> -->

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
                                    <input type="hidden" name="description" id="description">
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
                                <br>
                            </div>


                            <div class="trailer-div">
                                <label id="game-illustration-vedio" for="game-illustration-vedio">Trailer Video</label><br>
                                <p>Add the link to your Youtube video</p>
                                <input type="url" id="game-illustration-vedio" name="game-illustration-vedio" placeholder="eg: https://www.youtube.com/"><br><br>
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
                                                    <input type="text" name="min-game-OS" id="min-game-OS" placeholder="Windows 10" /><br><br>
                                                    <label id="min-game-processor" for="min-game-processor">Processor</label><br>
                                                    <input type="text" name="min-game-processor" id="min-game-processor" placeholder="Intel Core I5" /><br><br>
                                                    <label id="min-game-memory" for=" min-game-memory">Memory</label><br>
                                                    <input type="text" name="min-game-memory" id="min-game-memory" placeholder="8 GB" /><br><br>
                                                    <label id="min-game-storage" for="min-game-storage">Storage</label><br>
                                                    <input type="text" name="min-game-storage" id="min-game-storage" placeholder="14 GB" /><br><br>
                                                    <label id="min-game-graphics" for="min-game-graphics">Graphics</label><br>
                                                    <input type="text" name="min-game-graphics" id="min-game-graphics" placeholder="NVIDIA GeForce 1660" /><br><br>
                                                    <label id="min-game-other" for="min-game-other">Other</label><br>
                                                    <input type="text" name="min-game-other" id="min-game-other" placeholder="English Language Support" /><br><br>

                                                </div>
                                                <div class="game-spec-item-details">

                                                    <label id="game-OS" for="game-OS">OS</label><br>
                                                    <input type="text" name="game-OS" id="game-OS" placeholder="Windows 10" /><br><br>
                                                    <label id="game-processor" for="game-processor">Processor</label><br>
                                                    <input type="text" name="game-processor" id="game-processor" placeholder="Intel Core I5" /><br><br>
                                                    <label id="game-memory" for="game-memory">Memory</label><br>
                                                    <input type="text" name="game-memory" id="game-memory" placeholder="8 GB" /><br><br>
                                                    <label id="game-storage" for="game-storage">Storage</label><br>
                                                    <input type="text" name="game-storage" id="game-storage" placeholder="14 GB" /><br><br>
                                                    <label id="game-graphics" for="game-graphics">Graphics</label><br>
                                                    <input type="text" name="game-graphics" id="game-graphics" placeholder="NVIDIA GeForce 1660" /><br><br>
                                                    <label id="game-other" for="game-other">Other</label><br>
                                                    <input type="text" name="game-other" id="game-other" placeholder="English Language Support" /><br><br>

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
                                    <input type="radio" id="game-draft" name="game-visibility" value="draft" checked>
                                    <label for="game-draft">Draft - Only those who can edit the project can view the page</label><br>
                                    <input type="radio" id="game-public" name="game-visibility" value="public">
                                    <label for="game-public">Public - Anyone can view the page, you can enable this after you've saved</label><br><br>
                                </div>
                            </div>

                        </div>




                        <div class="upload-col-right">

                            <div class="coverImg-div">
                                <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br>
                                <p>Used when we link your game with other parts of the site</p>
                                <!-- <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br> -->

                                <div class="image-upload-box">
                                    <figure class="image-container">
                                        <img id="chosen-image">
                                    </figure>

                                    <input type="file" id="upload-button" name="game-upload-cover-img" accept=".jpg,.jpeg,.png">
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
                                <p>These will appear on your game's page. Optional but highly recommended. Upload 3 to 5 for best results</p><br>
                                <!-- <input type="file" id="game-screenshots" name="game-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br> -->


                                <div class="screenshot-container">

                                    <div id="screenshots"></div>
                                    <p id="num-of-files">No Files Chosen</p>
                                    <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" name="game-screenshots[]" multiple>
                                    <label for="file-input">
                                        Add Screenshots
                                    </label>

                                </div>
                            </div>


                        </div>


                    </div>
                    <button type="submit" class="submit-btn" name="game-submit">Save & View Page</button>
                </form>
            </div>


        </div>

    </div>


    <?php
    include 'includes/footer.php';
    ?>


    <script src=" <?php echo BASE_URL; ?>public/js/navbar.js">
    </script>
    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>
    <script src=" <?php echo BASE_URL; ?>public/js/tags.js"> </script>


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

            let file = uploadButtongame.files[0];
            console.log(file);

            let formdata = new FormData();
            formdata.append("file", file);

            let http = new XMLHttpRequest();
            http.upload.addEventListener("progress", function(event) {
                let percent = (event.loaded / event.total) * 100;
                document.querySelector("progress").value = Math.round(percent);
            });

            http.open("POST", "/indieabode/gameupload/file");
            http.send(formdata);
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