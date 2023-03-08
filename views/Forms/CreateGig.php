<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="upload-col">
                        <label id="gig-title" for="gig-title">Gig Title</label><br />
                        <input type="text" name="gig-title" id="gig-title" /><br /><br />

                        <label id="game-name" for="game-name">Game</label><br />
                        <p>Choose the game that you are finding a publisher for</p>
                        <select id="game-name" name="game-name" required>
                            <?php foreach ($this->games as $game) { ?>
                                <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                            <?php } ?>
                        </select><br /><br />

                        <label id="gig-tagline" for="gig-tagline">Tagline</label><br />
                        <p>Shown when we link your gig to other pages</p>
                        <input type="text" name="gig-tagline" id="gig-tagline" placeholder="Short Description about your game" required /><br /><br />

                        <!--classification details-->
                        <label id="current-stage" for="current-stage">Current Stage</label><br />
                        <p>How long have you been developing the game</p>
                        <select id="current-stage" name="current-stage">
                            <option value="adventure">1 month</option>
                            <option value="action" selected>2 month</option>
                            <option value="RPG">3 month</option>
                            <option value="racing">4 month</option>
                            <option value="simulation">5 month</option>
                            <option value="strategy">6 month</option>
                        </select><br /><br />

                        <!--Releasing status-->
                        <label id="planned-release" for="planned-release">Planned Release Date</label><br />
                        <input type="text" name="planned-release" id="planned-release" placeholder="21/03/2024" required />
                        <br />
                        <label id="gig-details" for="gig-details">Details</label><br />
                        <p id="p">This will be the content of your gig page</p>
                        <br />
                        <textarea id="gig-details" name="gig-details" rows="9" cols="50"></textarea><br /><br />

                        <label id="est-share" for="est-share">Estimated Share</label><br />
                        <p id="p">
                            The assumed share to be given after initial payment is completed
                        </p>
                        <br />
                        <input type="text" id="est-share" name="est-share" /> <br /><br />

                        <label id="expected-cost" for="expected-cost">Expected Cost</label><br />
                        <p id="p">
                            The assumed amount needed for the development of the game
                        </p>
                        <br />
                        <input type="text" id="expected-cost" name="expected-cost" />
                        <br /><br />

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

                    <div class="upload-col">
                        <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br />
                        <p>Used when we link your game with other parts of the site</p>
                        <br />
                        <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png" /><br /><br />

                        <label id="game-illustration-vedio" for="game-illustration-vedio">Game Illustration Video</label><br />
                        <p>Add the link to your Youtube video</p>
                        <br />
                        <input type="url" id="game-illustration-vedio" name="gig-trailer" placeholder="eg: https://www.youtube.com/" /><br /><br />



                        <label id="game-screenshots" for="game-screenshots">Screenshots</label><br />
                        <p>
                            These will appear on your game's page. Optional but highly
                            recommended. Upload 3 to 5 for best results
                        </p>
                        <br />
                        <input type="file" id="game-screenshots" name="gig-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple" /><br /><br />
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


</body>



</html>