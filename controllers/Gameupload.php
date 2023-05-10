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

        $this->view->features = $this->model->FeatureTypes();

        $this->view->render('Forms/GameUpload');
    }

    function uploadGame()
    {

        $gameName = $_POST['game-title'];
        $releaseStatus = $_POST['game-status'];
        $gameDetails = $_POST['description'];

        $gameTrailor = (!empty($_POST['game-illustration-vedio'])) ? $_POST['game-illustration-vedio'] : null;


        $gameTagline = $_POST['game-tagline'];
        $gameClassification = $_POST['game-classification'];
        $gameDeveloperID = $_SESSION['id'];

        $gameType = $_POST['game-type'];

        //A name for how file type items will saved in database
        $TempFileName = $gameName . $gameDeveloperID;

        $gameCoverImg = $this->model->uploadCoverImg($TempFileName);
        $gameFile = $this->model->uploadGameFile($TempFileName);
        $gameScreenshots = $this->model->uploadScreenshots($TempFileName);


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

        $gameVisibility = $_POST['game-visibility'];

        $gameTags = $_POST['game-tags'];

        //getting platforms selected by the developer
        $platform = $_POST['platform'];

        $platformsCount = count($platform);
        $platforms = [];
        for ($i = 0; $i < $platformsCount; $i++) {
            array_push($platforms, $platform[$i]);
        }

        $chosenPlatforms = implode(',', $platforms);

        //getting features selected by the developer
        $feature = $_POST['game-features'];

        $featuresCount = count($feature);
        $features = [];
        for ($i = 0; $i < $featuresCount; $i++) {
            array_push($features, $feature[$i]);
        }

        $gameFeatures = implode(',', $features);

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
            $gamePrice,
            $gameVisibility
        );

        //For creating a record in Game_stats table to keep track of views, downloads, and revenues
        $addedGame = $this->model->UpdateGameStats($gameName, $_SESSION['id']);

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'game?id=' . $addedGame['gameID']);
    }

    // function file()
    // {
    //     if (isset($_FILES)) {
    //         $temp_file = $_FILES['file']['tmp_name'];
    //         $uploads_folder = "uploads/{$_FILES['file']['name']}";
    //         $upload = move_uploaded_file($temp_file, $uploads_folder);
    //         if ($upload == true) {
    //             echo $_FILES['file']['name'];
    //         }
    //     }
    // }

    function gameNameAvailabilityCheck()
    {

        $gameName = $_POST['gameName'];

        $nameAvailability = $this->model->GameNameAvailabilityCheck($gameName, $_SESSION['id']);

        $nameAvailabilityWhole = $this->model->CheckGameNameWholeSite($gameName, $_SESSION['id']);

        if ($nameAvailability == "false") {
            echo "unavailable";
        } else if (!empty($nameAvailabilityWhole)) {
            echo "warning";
        } else {
            echo "available";
        }
    }
}
