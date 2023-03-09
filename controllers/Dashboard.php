<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session_start();
    }

    function index()
    {
        $currentUser = $_SESSION['id'];

        $this->view->games = $this->model->showAllMyGames($currentUser);

        $this->view->render('Dashboard/Dashboard');
    }

    function gigs()
    {
        $this->view->gigs = $this->model->showAllMyGigs($_SESSION['id']);

        $this->view->render('Dashboard/Dashboard-Gigs');
    }

    function devlogs()
    {
        $this->view->devlogs = $this->model->showAllMyDevlogs($_SESSION['id']);

        $this->view->render('Dashboard/Dashboard-Devlogs');
    }

    function gamejams()
    {
        $this->view->render('Dashboard/Dashboard-Jams');
    }

    function crowdfundings()
    {
        $this->view->crowdfundings = $this->model->showAllMyCrowdfundings($_SESSION['id']);

        $this->view->render('Dashboard/Dashboard-Crowdfunding');
    }

    function sales()
    {
        $this->view->render('Dashboard/Dashboard-Sales');
    }

    function analytics()
    {
        $this->view->render('Dashboard/Dashboard-Analytics');
    }

    function payouts()
    {
        $this->view->render('Dashboard/Dashboard-Payout');
    }


    function edit()
    {
        $this->view->classifications = $this->model->GetDropdowns('classification');

        $this->view->releaseStatus = $this->model->GetDropdowns('releaseStatus');

        $this->view->platforms = $this->model->GetDropdowns('platform');

        $this->view->gameTypes = $this->model->GetDropdowns('gametype');

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/Edit');
    }

    function editGame()
    {
        $gameID = $_GET['id'];
        $gameName = $_POST['game-title'];
        $releaseStatus = $_POST['game-status'];
        $gameDetails = $_POST['game-details'];
        $gameScreenshots = null;
        // $this->model->uploadScreenshots($gameName);
        $gameTrailor = $_POST['game-illustration-vedio'];
        $gameTagline = $_POST['game-tagline'];
        $gameClassification = $_POST['game-classification'];
        $gameTags = $_POST['game-tags'];
        $gameType = $_POST['game-type'];
        $gameFeatures = $_POST['game-features'];
        $gameFile = null;
        // $this->model->uploadGameFile($gameName);
        $gameCoverImg = null;
        // $this->model->uploadCoverImg($gameName);
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

        $platform = $_POST['game-platform'];

        if ($_POST['game-price'] == "Free") {
            $gamePrice = 0.00;
        } else if ($_POST['game-price'] == "PWYW") {
            $gamePrice = $_POST['game-pwyw-default'];
        } else if ($_POST['game-price'] == "Paid") {
            $gamePrice = $_POST['game-price-paid'];
        }

        $this->model->EditExistingGame(
            $gameID,
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
            $platform,
            $gameType,
            $gamePrice
        );

        header('location:/indieabode/');
    }

    function gamedevlogs()
    {

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->devlogs = $this->model->ThisGameDevlogs($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/GameDevlogs');
    }

    function editdevlog()
    {

        $this->view->games = $this->model->showAllMyGames($_SESSION['id']);

        $this->view->game = $this->model->GetGameDetails($_GET['gameid']);

        $this->view->devlog = $this->model->GetDevlogDetails($_GET['postid']);

        $this->view->render('Dashboard/GameDashboards/EditDevlog');
    }

    function editExistingDevlog()
    {
        $devlogID = $_GET['postid'];
        $name = $_POST['title'];
        $tagline = $_POST['tagline'];
        $description = $_POST['devLog-details'];
        $type = $_POST['type'];
        $visibility = $_POST['dev-visibility'];
        $gameName = $_POST['gname'];
        $devlogImg = null;
        // $this->model->uploadCoverImg($gameName);
        $releaseDate = $_POST['rdate'];

        $this->model->EditExistingDevlog(
            $devlogID,
            $name,
            $tagline,
            $description,
            $type,
            $visibility,
            $devlogImg,
            $gameName,
            $releaseDate
        );

        header('location:/indieabode/');
    }

    function publishers()
    {
        $this->view->gig = $this->model->ThisGamesGigs($_GET['id']);

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/Publishers');
    }

    function editgig()
    {
        $this->view->games = $this->model->showAllMyGames($_SESSION['id']);

        $this->view->game = $this->model->GetGameDetails($_GET['gameid']);

        $this->view->gig = $this->model->GetGigDetails($_GET['gigid']);

        $this->view->render('Dashboard/GameDashboards/EditGig');
    }

    function editExistingGig()
    {

        $gigID = $_GET['id'];
        $gigName = $_POST['gig-title'];
        $tagline = $_POST['gig-tagline'];
        $description = $_POST['gig-details'];
        $gameName = $_POST['game-name'];
        $currentStage = $_POST['current-stage'];
        $plannedReleaseDate = $_POST['planned-release'];
        $estimatedShare = $_POST['est-share'];
        $expectedCost = $_POST['expected-cost'];
        $visibility = $_POST['gig-visibility'];
        $gigCoverImg = $this->model->uploadCoverImg($gigName);
        $gigScreenshots = $this->model->uploadScreenshots($gameName);
        $gigTrailer = $_POST['gig-trailer'];
        $developerID = $_SESSION['id'];

        $this->model->EditExistingGig(
            $gigID,
            $gigName,
            $tagline,
            $description,
            $gameName,
            $currentStage,
            $plannedReleaseDate,
            $estimatedShare,
            $expectedCost,
            $visibility,
            $gigCoverImg,
            $gigScreenshots,
            $gigTrailer,
            $developerID
        );

        header('location:/indieabode/');
    }

    function gameanalytics()
    {
        $gameStats = $this->model->GetGameStats($_GET['id']);

        $downloads = [];
        $dates = [];

        foreach ($gameStats as $gameStat) {
            array_push($downloads, $gameStat['downloads']);
            array_push($dates, $gameStat['created_at']);
        }

        $this->view->alldownloads = $downloads;
        $this->view->labelDates = $dates;

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/Analytics');
    }
}
