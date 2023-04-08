<?php

class Gameupload extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        $this->view->render('Forms/GameUpload');
    }

    function uploadGame()
    {

        $gameName = $_POST['game-title'];
        $releaseStatus = $_POST['game-status'];
        $gameDetails = $_POST['game-details'];
        $gameScreenshots = $this->model->uploadScreenshots($gameName);
        $gameTrailor = $_POST['game-illustration-vedio'];
        $gameTagline = $_POST['game-tagline'];
        $gameClassification = $_POST['game-classification'];
        $gameTags = $_POST['game-tags'];
        $gameType = $_POST['game-type'];
        $gameFeatures = $_POST['game-features'];
        $gameFile = $this->model->uploadGameFile($gameName);
        $gameCoverImg = $this->model->uploadCoverImg($gameName);
        $gameDeveloperID = $_SESSION['id'];

        $minGameOS = $_POST['min-game-OS'];
        $minGameProcessor = $_POST['min-game-processor'];
        $minGameMemory = $_POST['min-game-memory'];
        $minGameStorage = $_POST['min-game-storage'];
        $minGameGraphics = $_POST['min-game-graphics'];
        // $minGameOther = $_POST['min-game-other'];
        $GameOS = $_POST['game-OS'];
        $GameProcessor = $_POST['game-processor'];
        $GameMemory = $_POST['game-memory'];
        $GameStorage = $_POST['game-storage'];
        $GameGraphics = $_POST['game-graphics'];
        $GameOther = $_POST['game-other'];

        $platform = $_POST['platform'];

        $platformsCount = count($platform);
        $platforms = [];
        for ($i = 0; $i < $platformsCount; $i++) {
            array_push($platforms, $platform[$i]);
        }

        $chosenPlatforms = implode(',', $platforms);

        if ($_POST['game-price'] == "Free") {
            $gamePrice = 0.00;
        } else if ($_POST['game-price'] == "PWYW") {
            $gamePrice = $_POST['game-pwyw-default'];
        } else if ($_POST['game-price'] == "Paid") {
            $gamePrice = $_POST['game-price-paid'];
        }

        $this->model->uploadNewGame(
            $gameName,
            $releaseStatus,
            $gameDetails,
            $gameScreenshots,
            $gameTrailor,
            $gameTagline,
            $gameClassification,
            $gameTags,
            $gameFeatures,
            $gameFile,
            $gameCoverImg,
            $gameDeveloperID,
            $minGameOS,
            $minGameProcessor,
            $minGameMemory,
            $minGameStorage,
            $minGameGraphics,
            $GameOS,
            $GameProcessor,
            $GameMemory,
            $GameStorage,
            $GameGraphics,
            $GameOther,
            $chosenPlatforms,
            $gameType,
            $gamePrice
        );

        header('location:/indieabode/');
    }

    function file()
    {
        if (isset($_FILES)) {
            $temp_file = $_FILES['file']['tmp_name'];
            $uploads_folder = "uploads/{$_FILES['file']['name']}";
            $upload = move_uploaded_file($temp_file, $uploads_folder);
            if ($upload == true) {
                echo $_FILES['file']['name'];
            }
        }
    }
}
