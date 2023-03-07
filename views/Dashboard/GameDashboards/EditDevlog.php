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
        include 'public/css/editDevlogForm.css';
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
            <a href="/indieabode/dashboard/devlogs">Analytics</a>
            <a href="/indieabode/dashboard/gamedevlogs?id=<?= $this->game['gameID']; ?>">Devlogs</a>
            <a href="/indieabode/dashboard/crowdfundings">Publishers</a>
            <a href="/indieabode/dashboard/sales">Crowdfundings</a>
            <a href="/indieabode/dashboard/gamejams">Metadata</a>

        </div>
        <div class="content-row">

            <div class="form-container">
                <div class="page-tittle">
                    <p>
                    <h1>-Devlog Form-</h1>
                    </p>
                </div>
                <form action="/indieabode/dashboard/editExistingDevlog?postid=<?= $this->devlog['devLogID']; ?>" method="POST" id="upload-game" class="input-upload-group" enctype="multipart/form-data">
                    <div class="card-details">
                        <div class="left">
                            <div class="card-box">
                                <span class="details">Title</span>
                                <input type="text" name="title" value="<?= $this->devlog['name']; ?>" required>
                            </div>

                            <div class="card-box">
                                <span class="details">Tagline</span>
                                <p>One line summery of the devlog</p>
                                <input type="text" name="tagline" placeholder="tagline" value="<?= $this->devlog['Tagline']; ?>" required>
                            </div>


                            <div class="card-box">

                                <span class="details">Type</span>
                                <select id="type" name="type" required>
                                    <option value="Game Design">Game Design</option>
                                    <option value="Tutorial">Tutorial</option>
                                    <option value="Major Update">Major Update</option>

                                </select><br><br>

                            </div>


                            <div class="card-box">
                                <span class="details">Content</span>
                                <p>Write your content</p>
                                <textarea id="devLog-details" name="devLog-details" value="<?= $this->devlog['description']; ?>" rows="9" cols="64"></textarea><br><br>
                            </div>

                            <div class="card-box">
                                <span class="details">Game Name</span>
                                <p>Game related with the devlog</p>
                                <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                                <select id="type" name="gname" required>
                                    <?php foreach ($this->games as $game) { ?>
                                        <?php if ($game['gameID'] == $this->devlog['gameName']) { ?>
                                            <option value="<?= $game['gameID'] ?>" selected><?= $game['gameName'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="card-box">
                                <span class="details">Release Date</span>
                                <input type="text" name="rdate" placeholder="Optional" value="<?= $this->devlog['ReleaseDate']; ?>">
                            </div>


                            <div class="circle-form">
                                <span class="circle-title">Visibility</span>
                                <p>Decide when is your page ready for the public.</p>
                                <div class="category">
                                    <input type="radio" id="dev-draft" name="dev-visibility" value="draft" checked>
                                    <label for="dev-draft">Draft - Only those who can edit the project can view the page</label><br>
                                    <input type="radio" id="dev-public" name="dev-visibility" value="public">
                                    <label for="dev-public">Public - Anyone can view the page, you can enable this after you've saved</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" id="devsubmit" value="Save & View Page">
                        </div>
                        <div class="right">

                            <div class="card-box">
                                <p>These will appear on your asset's page. Optional but highly recommended. Upload 3 to 5 for best results <br> (Accept *.jpg,.jpeg,.png* formats files only)</p><br>
                                <input type="file" id="devlog_ss" name="devlog_ss" accept=".jpg,.jpeg,.png" multiple="multiple"><br><br>
                            </div>
                        </div>

                    </div>


                </form>
            </div>


        </div>
    </div>




    <?php
    include 'includes/footer.php';
    ?>

    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>