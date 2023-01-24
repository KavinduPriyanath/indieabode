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
        $gameScreenshots = null;
        $gameTrailor = $_POST['game-illustration-vedio'];
        $gameTagline = $_POST['game-tagline'];
        $gameClassification = $_POST['game-classification'];
        $gameTags = $_POST['game-tags'];
        $gameFeatures = $_POST['game-features'];
        $gameFile = null;
        $gameCoverImg = $this->model->uploadCoverImg($gameName);
        $gameDeveloperID = $_SESSION['id'];

        $minGameOS = $_POST['min-game-OS'];
        $minGameProcessor = $_POST['min-game-processor'];
        $minGameMemory = $_POST['min-game-memory'];
        $minGameStorage = $_POST['min-game-storage'];
        $minGameGraphics = $_POST['min-game-graphics'];
        $minGameOther = $_POST['min-game-other'];
        $GameOS = $_POST['game-OS'];
        $GameProcessor = $_POST['game-processor'];
        $GameMemory = $_POST['game-memory'];
        $GameStorage = $_POST['game-storage'];
        $GameGraphics = $_POST['game-graphics'];
        $GameOther = $_POST['game-other'];

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
            $minGameOther,
            $GameOS,
            $GameProcessor,
            $GameMemory,
            $GameStorage,
            $GameGraphics,
            $GameOther
        );

        header('location:/indieabode/');
    }
}