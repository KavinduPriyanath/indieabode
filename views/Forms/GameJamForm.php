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
        include 'public/css/gamejamform.css';
        ?>
    </style>

</head>



<?php include 'includes/navbar.php' ?>


<!-- Submission form -->
<div class="form-container">
    <div class="heading">Host a New Jam</div>
    <hr id="topic-break" />

    <div class="form">
        <form action="/indieabode/GameJamForm/hostgamejam" method="POST" id="upload-jam" class="input-upload-group" enctype="multipart/form-data">
            <div class="card-details">

                <div class="left-form">
                    <div class="card-box">
                        <span class="details">Title*</span><br>
                        <p>Add unique name to stand out among other gamejams</p>
                        <input type="text" name="title" required>
                    </div>

                    <div class="card-box">
                        <span class="details">Jam Theme*</span><br>
                        <p>This will visible to the participants during the submission period</p>
                        <input type="text" name="jamTheme" required>
                    </div>

                    <div class="card-box">
                        <span class="details">Tagline</span><br>
                        <p>One line summery of the jam</p>
                        <input type="text" name="tagline" placeholder="Optional">
                    </div>

                    <div class="circle-form">
                        <span class="circle-title">Type*</span>
                        <p>Select the kind of gamejam you are going to host
                        <p>
                        <div class="category">
                            <input type="radio" name="ranking" value="Non-Ranked" id="Non-Ranked" /> <label for="Non-Ranked">Non-Ranked</label> - Entries are just submitted<br>
                            <input type="radio" name="ranking" value="Ranked" id="Ranked" checked /> <label for="Ranked">Ranked</label> - Entries are voted on and ranked
                        </div>
                        <br>
                    </div>

                    <div class="card-box">
                        <span class="details">Start Date & Time*</span><br>
                        <p>Date & time for the theme reveal and start submitting games</p>
                        <input type="datetime-local" name="Sdate" placeholder="yyyy/mm/dd 00:00" required>
                    </div>

                    <div class="card-box">
                        <span class="details">End Date & Time*</span><br>
                        <p>Date & time to close submissions, and start voting</p>
                        <input type="datetime-local" name="Edate" placeholder="yyyy/mm/dd 00:00" required>
                    </div>

                    <div class="card-box" id="voting-date">
                        <span class="details">Voting End Date & Time</span><br>
                        <p>Date & time to cease voting, and publish results</p>
                        <input type="datetime-local" name="V_E_Date" placeholder="yyyy/mm/dd 00:00">
                    </div>

                    <div class="card-box">
                        <span class="details" id="jamContent" for="jamContent">Content*</span>
                        <p>Makes up the content of your jam page</p>

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
                            <div class="jamContent" contenteditable="true"></div>
                            <input type="hidden" name="description" id="description">
                        </div>
                    </div>

                    <div class="circle-form" id="voting">
                        <span class="circle-title">Jam Type</span>
                        <p>who will be able to join the gamejam and see its submissions</p>
                        <div class="category">
                            <input type="radio" name="voters" id="Public" value="Public" checked><label for="Public">Public</label> - Anyone can vote. <br>
                            <input type="radio" name="voters" id="Private" value="Private"><label for="Private">Private</label> - Only users with passkey enter the jam
                        </div>
                        <br>
                    </div>

                    <div class="card-box" id="criteria">
                        <span class="details">Criteria</span>
                        <p>How should the entries of the jam should be ranked.</p>
                        <input type="text" name="criteria">
                    </div>

                    <div class="card-box">
                        <span class="details">Twitter Hashtag</span>
                        <p>Submitters will be prompted to tweet this tag after submitting.</p>
                        <input type="text" name="twitter" placeholder="Optional">
                    </div>


                    <div class="circle-form">
                        <span class="circle-title">Visibility</span>
                        <p>Decide when is your page ready for the public.</p>
                        <div class="category">
                            <input type="radio" name="visibility" value="Draft" id="Draft" checked><label for="Draft">Draft</label> - Only those who are added as moderators can view the page.<br>
                            <input type="radio" name="visibility" value="Public" id="Public-Vis"><label for="Public-Vis">Public</label> - Anyone can view the page, you can enable this after you've saved.
                        </div>
                    </div>
                </div>

                <div class="right-form">

                    <div class="card-box">

                        <span class="details">
                            <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br></span>
                        <p>Used to link your gamejam to the other parts of the site</p>

                        <div class="image-upload-box">
                            <figure class="image-container">
                                <img id="chosen-image">
                            </figure>

                            <input type="file" id="coverImg" name="coverImg" accept=".jpg,.jpeg,.png">
                            <label for="coverImg" id="upload-label">
                                Upload Photo
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <button class="submit" name="submit">Save & View Page</button>


            <div class="conditions">
                <p>* These Fields must be filled.
                <p>
            </div>
    </div>

    </form>
</div>
</div>


</div>

<?php
include 'includes/footer.php';
?>

<script src=" <?php echo BASE_URL; ?>public/js/navbar.js"></script>
<script src=" <?php echo BASE_URL; ?>public/js/richtext.js"> </script>

<script>
    $(document).ready(function() {
        $(".jamContent").click(function() {
            let text = $(".jamContent").html();
            $('#description').val(text);

        });

        $('input[name="ranking"]').on("click", function() {

            if ($(this).val() == "Ranked") {
                $('#voting-date').show();
                $('#criteria').show();
            } else if ($(this).val() == "Non-Ranked") {
                $('#voting-date').hide();
                $('#criteria').hide();
            }
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
    let uploadButton = document.getElementById("coverImg");
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



</html>