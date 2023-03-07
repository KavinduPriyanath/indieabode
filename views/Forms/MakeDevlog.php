<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>


    <style>
        <?php
        include 'public/css/devlogForm.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'includes/navbar.php';
    ?>

    <div class="form-container">
        <div class="page-tittle">
            <p>
            <h1>-Devlog Form-</h1>
            </p>
        </div>
        <form action="/indieabode/makedevlog/makeDevlog" method="POST" id="upload-game" class="input-upload-group" enctype="multipart/form-data">
            <div class="card-details">
                <div class="left">
                    <div class="card-box">
                        <span class="details">Title</span>
                        <input type="text" name="title" required>
                    </div>

                    <div class="card-box">
                        <span class="details">Tagline</span>
                        <p>One line summery of the devlog</p>
                        <input type="text" name="tagline" placeholder="tagline" required>
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
                        <textarea id="devLog-details" name="devLog-details" rows="9" cols="64"></textarea><br><br>
                    </div>

                    <div class="card-box">
                        <span class="details">Game Name</span>
                        <p>Game related with the devlog</p>
                        <!-- <input type="text" name="gname" placeholder="Game name" required> -->
                        <select id="type" name="gname" required>
                            <?php foreach ($this->games as $game) { ?>
                                <option value="<?= $game['gameID'] ?>"><?= $game['gameName'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="card-box">
                        <span class="details">Release Date</span>
                        <input type="text" name="rdate" placeholder="Optional">
                    </div>


                    <div class="circle-form">
                        <span class="circle-title">Visibility</span>
                        <p>Decide when is your page ready for the public.</p>
                        <div class="category">
                            <input type="radio" id="dev-draft" name="dev-visibility" value="draft">
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


    <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>


</body>



</html>