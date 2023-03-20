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

<!--Including Navbar-->

<?php
include 'includes/navbar.php';
?>




<div class="outer-box">
    <div class="form-box">
        <div class="upload-topic">
            Upload A New Asset
        </div>
        <hr>





        <!--upload assets form-->

        <form action="/indieabode/assetupload/uploadasset" method="POST" id="upload-asset-form" class="input-upload-group" enctype="multipart/form-data">
            <!--Display error Messages-->
            <div class="upload-row">

                <!--Display error Messages-->



                <div class="upload-col">
                    <label id="asset-title" for="asset-title">Title</label><br>
                    <input type="text" name="asset-title" id="asset-title" /><br><br>

                    <label id="asset-tagline" for="asset-tagline">Tagline</label><br>
                    <input type="text" name="asset-tagline" id="asset-tagline" placeholder="Optional" /><br><br>

                    <!--classification details-->
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

                    <!--Releasing status-->
                    <label id="asset-status" for="asset-status">Release Status</label><br>
                    <select id="asset-status" name="asset-status">
                        <option value="released" selected>Released</option>
                        <option value="Prototype">Prototype</option>
                        <option value="Upcoming">Upcoming</option>
                    </select><br><br>

                    <label for="asset-details">Details</label><br>
                    <p id="p">This will be the content of your assets page</p><br>
                    <!--<textarea id="asset-details" name="asset-details" rows="9" cols="50"></textarea>-->



                    <div class="main-content">
                        <div class="text-editor-header">
                            <button type="button" class="rbtn" data-element="bold">
                                <i class="fa fa-bold"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="italic">
                                <i class="fa fa-italic"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="underline">
                                <i class="fa fa-underline"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="insertUnorderedList">
                                <i class="fa fa-list-ul"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="insertOrderedList">
                                <i class="fa fa-list-ol"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="createLink">
                                <i class="fa fa-link"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="justifyLeft">
                                <i class="fa fa-align-left"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="justifyCenter">
                                <i class="fa fa-align-center"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="justifyRight">
                                <i class="fa fa-align-right"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="justifyFull">
                                <i class="fa fa-align-justify"></i>
                            </button>
                            <button type="button" class="rbtn" data-element="insertImage">
                                <i class="fa fa-image"></i>
                            </button>
                        </div>
                        <!--Content-->
                        <div class="content-box" id="redactor" contenteditable="true"></div>
                    </div>
                    <input type="hidden" name="asset-details" id="asset-details">









                    <br><br>



                    <label id="asset-price" for="asset-price">Pricing</label><br><br>
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










                    <label id="asset-tags" for="asset-tags">Tags</label><br>
                    <p id="p">Keywords that someone would search to find your assets</p><br>
                    <input type="text" id="asset-tags" name="asset-tags" /> <br><br>



                    <label id="upload-asset" for="upload-asset">Upload Assets</label><br>
                    <input type="file" id="upload-asset" name="upload-asset"><br><br>

                    <!--License-->
                    <label id="asset-license" for="asset-license">License</label><br>
                    <p>Decide when is your page ready for the public</p><br>
                    <select id="asset-license" name="asset-license">
                        <option value="open-source" selected>Open Source</option>
                        <option value="proprietary">Proprietary</option>
                        <option value="permissive">Permissive</option>
                        <option value="copyleft">Copy Left</option>
                    </select><br><br>

                    <!--AssetType-->
                    <label id="asset-type" for="asset-type">Type</label><br>
                    <p>Helps viewers to filter your asset. Select the most suitable one</p><br>
                    <select id="asset-type" name="asset-type">
                        <option value="sprite" selected>Sprite</option>
                        <option value="skybox">Skybox</option>
                        <option value="character">Character</option>
                        <option value="tileset">Tileset</option>
                    </select><br><br>

                    <!--AssetStyle-->
                    <label id="asset-style" for="asset-style">Style</label><br>
                    <p>Helps viewers to filter your asset. Select the most suitable one</p><br>
                    <select id="asset-style" name="asset-style">
                        <option value="pixelart" selected>Pixel Art</option>
                        <option value="8bit">8-Bit</option>
                        <option value="16bit">16-Bit</option>
                        <option value="lowpoly">Low Poly</option>
                        <option value="voxel">Voxel</option>
                    </select><br><br>

                    <label id="asset-visibility" for="asset-visibility">Visibility</label><br>
                    <p>Decide when is your page ready for the public</p><br>
                    <input type="radio" id="asset-draft" name="asset-visibility" value="draft" checked>
                    <label for="asset-draft">Draft - Only those who can edit the project can view the page</label><br>
                    <input type="radio" id="asset-public" name="asset-visibility" value="public">
                    <label for="asset-public">Public - Anyone can view the page, you can enable this after you've saved</label><br>

                </div>

                <div class="upload-col">

                    <label id="asset-upload-cover-img" for="asset-upload-cover-img">Upload Cover Image</label><br>
                    <p>This image will be shown and used to identify your asset</p><br>
                    <input type="file" id="asset-upload-cover-img" name="asset-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br>

                    <label id="asset-illustration-vedio" for="asset-illustration-vedio">Asset Illustration Video</label><br>
                    <p>Provide a link to youtube</p><br>
                    <input type="url" id="asset-illustration-vedio" name="asset-illustration-video" placeholder="eg: https://www.youtube.com/"><br><br>

                    <label id="asset-screenshots" for="asset-screenshots">Screenshots</label><br>
                    <p>These will appear on your asset's page. Optional but highly recommended. Upload 3 to 5 for best results</p><br>
                    <input type="file" id="asset-screenshots" name="asset-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br>
                </div>
            </div>
            <br><br>
            <button type="submit" class="submit-btn" name="asset-submit" onsubmit="uploadAsset()" id="asset-submit">Save & View Page</button>
        </form>
    </div>
</div>



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




<!--script-->
<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
<?php } else { ?>
    <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
<?php } ?>

</body>

</html>