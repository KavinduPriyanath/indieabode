<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="/indieabode/dashboard/gamepublishers?id=<?= $this->game['gameID']; ?>">Publishers</a>
            <a href="/indieabode/dashboard/gamecrowdfunds?id=<?= $this->game['gameID']; ?>">Crowdfundings</a>
            <a href="/indieabode/dashboard/metadata?id=<?= $this->game['gameID']; ?>">Metadata</a>
            <a href="/indieabode/dashboard/gamegiveaways?id=<?= $this->game['gameID']; ?>">Giveaways</a>

        </div>
        <div class="content-row">

            <div class="outer-box"">
        <div class=" form-box">
                <div class="upload-topic">
                    Create a new project
                </div>
                <hr>

                <form action="/indieabode/dashboard/editGame?id=<?= $this->game['gameID']; ?>" method="POST" id="upload-game-form" class="input-upload-group" enctype="multipart/form-data">
                    <div class="upload-row">
                        <div class="upload-col">

                            <label id="game-title" for="game-title">Title</label><br>
                            <input type="text" name="game-title" id="game-title" value="<?= $this->game['gameName']; ?>" /><br><br>

                            <label id="game-tagline" for="game-tagline">Tagline</label><br>
                            <p>Shown when we link your game to other pages</p>
                            <input type="text" name="game-tagline" value="<?= $this->game['gameTagline']; ?>" id="game-tagline" minlength="40" maxlength="70" placeholder="Short Description about your game" /><br><br>

                            <!--classification details-->
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

                            <!--Releasing status-->
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

                            <!--Releasing status-->
                            <label id="" for="">Platform</label><br>
                            <select id="" name="game-platform">
                                <?php foreach ($this->platforms as $platform) { ?>
                                    <?php if ($platform['filter'] == $this->game['platform']) { ?>
                                        <option value="<?= $platform['filter']; ?>" selected><?= $platform['filter']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $platform['filter']; ?>"><?= $platform['filter']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select><br><br>

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
                            <div id="free-game-price-box">
                                <p id="p">This game will be available for free</p>
                            </div>
                            <div id="pwyw-game-price-box" style="display: none">
                                <p id="p">Someone downloading your game will be asked for a donation before getting access. They can skip to download for free.</p>
                                <br>
                                <p>Suggested donation — Default donation amount</p>
                                <input type="text" id="game-price-val" name="game-pwyw-default" value="$2.00" />
                            </div>
                            <div id="paid-game-price-box" style="display: none">
                                <p id="p">Set a price you need</p>
                                <input type="text" id="game-price-val" name="game-price-paid" />
                            </div>
                            <br><br>



                            <label id="game-details" for="game-details">Details</label><br>
                            <p id="p">This will be the content of your game page</p><br>
                            <textarea id="game-details" name="game-details" rows="9" cols="50"></textarea><br><br>

                            <label id="game-tags" for="game-tags">Tags</label><br>
                            <p id="p">Keywords that someone would search to find your game</p><br>
                            <input type="text" id="game-tags" name="game-tags" /> <br><br>



                            <label id="game-features" for="game-features">Features</label><br>
                            <p id="p">Special features your game has that players would prefer</p><br>
                            <input type="text" id="game-features" name="game-features" /> <br><br>
                            <!--
                    <label id="upload-game" for="upload-game">Upload Game</label><br>
                    <input type="file" id="upload-game" name="upload-game"><br><br>
-->
                            <label>Game Specification</label><br><br>
                            <div class="game-spec-type">
                                <p class="game-spec-item">Minimum</p>
                                <p class="game-spec-item">Recommended</p><br><br>
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

                            <label id="game-visibility" for="game-visibility">Visibility</label><br>
                            <div class="visibility">
                                <p>Decide when is your page ready for the public</p><br>
                                <input type="radio" id="game-draft" name="game-visibility" value="draft" checked>
                                <label for="game-draft">Draft - Only those who can edit the project can view the page</label><br>
                                <input type="radio" id="game-public" name="game-visibility" value="public">
                                <label for="game-public">Public - Anyone can view the page, you can enable this after you've saved</label><br><br>
                            </div>

                        </div>

                        <div class="upload-col">

                            <label id="game-upload-cover-img" for="game-upload-cover-img">Upload Cover Image</label><br>
                            <p>Used when we link your game with other parts of the site</p><br>
                            <input type="file" id="game-upload-cover-img" name="game-upload-cover-img" accept=".jpg,.jpeg,.png"><br><br>

                            <label id="game-illustration-vedio" for="game-illustration-vedio">Game Illustration Video</label><br>
                            <p>Add the link to your Youtube video</p><br>
                            <input type="url" id="game-illustration-vedio" name="game-illustration-vedio" placeholder="eg: https://www.youtube.com/"><br><br>

                            <label id="upload-game" for="upload-game">Upload Game</label><br>
                            <input type="file" id="upload-game" name="upload-game"><br><br>

                            <label id="game-screenshots" for="game-screenshots">Screenshots</label><br>
                            <p>These will appear on your game's page. Optional but highly recommended. Upload 3 to 5 for best results</p><br>
                            <input type="file" id="game-screenshots" name="game-screenshots[]" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="submit-btn" name="game-submit">Save & View Page</button>
                    <!-- <button type="submit" class="submit-btn" name="game-submit"><a href="singlegame.php?id=<?= $game['gameID']; ?>">Save & View Page</a></button> -->
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

    <!-- 
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
    </script> -->



</body>



</html>