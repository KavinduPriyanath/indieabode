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

                    <form action="/indieabode/assetupload/uploadasset" method="POST" id="upload-asset-form" class="input-upload-group" enctype="multipart/form-data">
                        <!--Display error Messages-->
                        <div class="upload-row">

                            <!--Display error Messages-->



                            <div class="upload-col-left" id="gig-left">
                                <div class="title-div">
                                    <label id="asset-title" for="asset-title">Title</label><br>
                                    <input type="text" name="asset-title" id="asset-title" /><br><br>
                                </div>

                                <div class="tagline-div">
                                    <label id="asset-tagline" for="asset-tagline">Tagline</label><br>
                                    <input type="text" name="asset-tagline" id="asset-tagline" placeholder="Optional" /><br><br>
                                </div>

                                <!--classification details-->
                                <div class="classification-div">
                                    <label id="asset-classification" for="asset-classification">Classification</label><br>
                                    <select id="asset-classification" name="asset-classification">
                                        <option value="2d">2D</option>
                                        <option value="3d" selected>3D</option>
                                        <option value="audio">Audio</option>
                                        <option value="visualEffects">Visual Effects</option>
                                        <option value="textures">Textures</option>
                                        <option value="maps">Maps</option>
                                        <option value="tools">Tools</option>
                                    </select><br><br>
                                </div>

                                <!--Releasing status-->
                                <div class="releasing-div">
                                    <label id="asset-status" for="asset-status">Release Status</label><br>
                                    <select id="asset-status" name="asset-status">
                                        <option value="released" selected>Released</option>
                                        <option value="Prototype">Prototype</option>
                                        <option value="Upcoming">Upcoming</option>
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
                                        <input type="hidden" name="description" id="description">
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
                                        <input type="text" id="asset-price-val" name="asset-price-paid" />
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
                                        <option value="open-source" selected>Open Source</option>
                                        <option value="proprietary">Proprietary</option>
                                        <option value="permissive">Permissive</option>
                                        <option value="copyleft">Copy Left</option>
                                    </select><br><br>
                                </div>

                                <!--AssetType-->
                                <div class="asset-type-div">
                                    <label id="asset-type" for="asset-type">Type</label><br>
                                    <p>Helps viewers to filter your asset. Select the most suitable one</p>
                                    <select id="asset-type" name="asset-type">
                                        <option value="sprite" selected>Sprite</option>
                                        <option value="skybox">Skybox</option>
                                        <option value="character">Character</option>
                                        <option value="tileset">Tileset</option>
                                    </select><br><br>
                                </div>

                                <!--AssetStyle-->
                                <div class="asset-style-div">
                                    <label id="asset-style" for="asset-style">Style</label><br>
                                    <p>Helps viewers to filter your asset. Select the most suitable one</p>
                                    <select id="asset-style" name="asset-style">
                                        <option value="pixelart" selected>Pixel Art</option>
                                        <option value="8bit">8-Bit</option>
                                        <option value="16bit">16-Bit</option>
                                        <option value="lowpoly">Low Poly</option>
                                        <option value="voxel">Voxel</option>
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
                                            <img id="chosen-image">
                                        </figure>

                                        <input type="file" id="upload-button" name="asset-upload-cover-img" accept=".jpg,.jpeg,.png">
                                        <label for="upload-button" id="upload-label">
                                            Upload Photo
                                        </label>
                                    </div>
                                </div>

                                <div class="trailer-div" id="video-right">
                                    <label id="asset-illustration-vedio" for="asset-illustration-vedio">Asset Illustration Video</label><br>
                                    <p>Provide a link to youtube</p>
                                    <input type="url" id="asset-illustration-vedio" name="asset-illustration-video" placeholder="eg: https://www.youtube.com/"><br><br>
                                </div>



                                <div class="upload-file-div">
                                    <!-- <input type="file" id="upload-asset" name="upload-asset"><br><br> -->
                                    <div class="game-upload-box">
                                        <label>Upload Asset</label><br>
                                        <!-- <input type="file" id="upload-game" name="upload-game">  -->
                                        <input type="file" id="upload-asset" name="upload-asset" accept=".zip">
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
                                        <label for="file-input">
                                            Add Screenshots
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="submit-btn" name="asset-submit" onsubmit="uploadAsset()" id="asset-submit">Save & View Page</button>
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


</body>



</html>