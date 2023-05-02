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
        include 'public/css/profile.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>


    <div class="flashMessage" id="flashMessage">Profile Updated</div>

    <div class="settings-content">
        <div class="top-row">
            Account Settings
        </div>
        <div class="settings-body">
            <div class="settings-menu">
                <div class="category">
                    <div class="topics">Basics</div>
                    <a href="/indieabode/settings/profile">
                        <div class="sub-topics">Profile</div>
                    </a>
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator" || $_SESSION['userRole'] == "game publisher") { ?>
                        <a href="/indieabode/settings/portfolio">
                            <div class="sub-topics">Portfolio</div>
                        </a>
                    <?php } ?>
                    <a href="/indieabode/settings/password">
                        <div class="sub-topics">Password</div>
                    </a>
                    <a href="/indieabode/settings/emailaddress">
                        <div class="sub-topics">Email Addresses</div>
                    </a>
                    <a href="/indieabode/settings/twofactorauth">
                        <div class="sub-topics">Two Factor Auth</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Payments</div>
                    <a href="">
                        <div class="sub-topics">Credit Cards</div>
                    </a>
                    <a href="/indieabode/settings/billingAddress">
                        <div class="sub-topics">Billing Address</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Payout Mode</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Tax Information</div>
                    </a>
                    <?php if ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator" || $_SESSION['userRole'] == "game publisher") { ?>
                        <a href="/indieabode/settings/revenueshare">
                            <div class="sub-topics">Revenue Sharing</div>
                        </a>
                    <?php } ?>
                    <a href="/indieabode/settings/paymentprocessors">
                        <div class="sub-topics">Payment Processors</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Support Email</div>
                    </a>
                </div>
                <div class="category">
                    <div class="topics">Contact</div>
                    <a href="/indieabode/settings/emailNotifications">
                        <div class="sub-topics">Email Notifications</div>
                    </a>
                    <a href="">
                        <div class="sub-topics">Website Support</div>
                    </a>
                </div>
                <div class="topics">Misc</div>
            </div>
            <div class="content-body">
                <h2>Portfolio</h2>
                <form id="portfoliodata" action="" method="post" enctype="multipart/form-data">
                    <div class="labels"><span>Display Name</span> - Used to show on your portfolio page, leave blank to default to username</div>
                    <input type="text" id="displayName" value="<?= $this->portfolioInfo['displayName']; ?>">

                    <div class="labels"><span>Display Image</span> - Shown next to your name on portfolio page (square dimensions)</div>
                    <div class="display-image">
                        <div class="image-box">
                            <img id="chosen-image" src="public/uploads/portfolio/<?= $this->portfolioInfo['profilePhoto']; ?>">
                        </div>
                        <div class="image-buttons">
                            <input type="file" id="upload-button" name="portfolio-img" accept=".jpg,.jpeg,.png">
                            <input type="hidden" id="old-portfolio-img" name="old-portfolio-img" value="<?= $this->portfolioInfo['profilePhoto']; ?>">
                            <label for="upload-button" id="upload-label">
                                Upload Photo
                            </label>

                            <div id="removeBtn">Remove Photo</div>
                        </div>
                    </div>

                    <div class="labels"><span>Website</span> - Optional URL to be shown on your portfolio page</div>
                    <input type="text" id="website" value="<?= $this->portfolioInfo['website']; ?>">

                    <div class="labels"><span>Twitter</span> - Twitter account to show on your portfolio</div>
                    <input type="text" id="twitter" value="<?= $this->portfolioInfo['twitter']; ?>">

                    <div class="labels"><span>LinkedIn</span> - LinkedIn account to show on your portfolio</div>
                    <input type="text" id="linkedin" value="<?= $this->portfolioInfo['linkedin']; ?>">

                    <div class="labels"><span>Location</span> - The country you currently reside in</div>
                    <input type="text" id="location" value="<?= $this->portfolioInfo['location']; ?>">

                    <div class="labels"><span>Telephone Number</span> - Your phone number</div>
                    <input type="text" id="phonenumber" value="<?= $this->portfolioInfo['phoneNumber']; ?>">

                    <div class="labels"><span>Showcase</span> - What you need to highlight?</div>

                    <div class="labels"><span>Introduction</span> - The content for your portfolio page</div>
                    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
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

                    <div class="labels"><span>Content</span> - What should be shown to your portfolio viewers?</div>
                    <div class="key-points">
                        <div class="key-point">
                            <input type="checkbox" name="point1" id="point1"> <label for="point1">Show only the items listed in my Showcase</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point2" id="point2"> <label for="point2">Display my location, and phone number</label>
                        </div>
                        <div class="key-point">
                            <input type="checkbox" name="point3" id="point3"> <label for="point3">Allow ads to display on my page</label>
                        </div>
                    </div>


                    <!-- <button type="submit" class="save">Save</button> -->
                    <div id="saveBtn">Save</div>
                </form>
            </div>
        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>



    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>

    <script>
        let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");
        let uploadLabel = document.getElementById("upload-label");

        let removeBtn = document.getElementById("removeBtn");

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

        removeBtn.onclick = () => {
            chosenImage.setAttribute("src", "");

        }
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
        $(document).ready(function() {

            var fileName = null;

            $('input[type="file"]').change(function(e) {
                fileName = e.target.files[0].name;
            });

            $("#saveBtn").click(function(e) {

                let imageName = null;
                let displayName = $("#displayName").val();

                if (fileName == null) {
                    imageName = $('#old-portfolio-img').val();
                } else {
                    imageName = fileName;
                }

                let displayImgName = imageName;
                let website = $("#website").val();
                let twitter = $("#twitter").val();
                let linkedin = $("#linkedin").val();
                let location = $("#location").val();
                let phoneNumber = $("#phonenumber").val();
                let description = $("#description").val();

                var data = {
                    displayName: displayName,
                    imgName: displayImgName,
                    website: website,
                    description: description,
                    twitter: twitter,
                    linkedin: linkedin,
                    location: location,
                    phoneNumber: phoneNumber,
                    save: true
                };

                $.ajax({
                    type: "POST",
                    url: "/indieabode/settings/updatePortfolioInfo",
                    data: data,
                    success: function(response) {
                        // alert("Changes Saved");

                        $("#flashMessage").fadeIn(500);

                        setTimeout(function() {
                            $("#flashMessage").fadeOut("slow");
                        }, 2000);

                    },
                });

            });

        });
    </script>

</body>



</html>