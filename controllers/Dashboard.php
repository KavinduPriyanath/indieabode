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

        if ($_SESSION['userRole'] == "game developer") {

            $this->view->games = $this->model->showAllMyGames($currentUser);

            $totalViews = 0;
            $totalDownloads = 0;
            $totalRevenue = 0;

            foreach ($this->model->showAllMyGames($currentUser) as $game) {
                $totalViews = $totalViews + $game['views'];
                $totalDownloads = $totalDownloads + $game['downloads'];
                $totalRevenue = $totalRevenue + $game['revenue'];
            }

            $this->view->totalViews = $totalViews;
            $this->view->totalDownloads = $totalDownloads;
            $this->view->totalRevenue = $totalRevenue;

            $this->view->render('Dashboard/Dashboard');
        } else if ($_SESSION['userRole'] == "game publisher") {


            $this->view->games = $this->model->showAllMyGamesPublisher($currentUser);

            $this->view->render('Dashboard/PublisherDashboard');
        } else if ($_SESSION['userRole'] == "asset creator") {

            $this->view->assets = $this->model->showAllMyAssets($currentUser);

            $totalViews = 0;
            $totalDownloads = 0;
            $totalRevenue = 0;

            foreach ($this->model->showAllMyAssets($currentUser) as $asset) {
                $totalViews = $totalViews + $asset['views'];
                $totalDownloads = $totalDownloads + $asset['downloads'];
                $totalRevenue = $totalRevenue + $asset['revenue'];
            }

            $this->view->totalViews = $totalViews;
            $this->view->totalDownloads = $totalDownloads;
            $this->view->totalRevenue = $totalRevenue;

            $this->view->render('Dashboard/CreatorDashboard');
        } else if ($_SESSION['userRole'] == "gamejam organizer") {

            $this->view->jams = $this->model->showAllMyJamsOrganizer($currentUser);

            $this->view->render('Dashboard/OrganizerDashboard');
        }
    }

    function gigs()
    {
        $this->view->gigs = $this->model->showAllMyGigs($_SESSION['id']);

        $this->view->ongoingrequests = $this->model->showAllMyGigRequests($_SESSION['id']);

        $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Gigs');
    }

    function devlogs()
    {
        $this->view->devlogs = $this->model->showAllMyDevlogs($_SESSION['id']);

        $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Devlogs');
    }

    function gamejams()
    {
        $this->view->gamejamsJoined = $this->model->JamsJoined($_SESSION['id']);

        $this->view->gamejamsSubmitted = $this->model->JamsSubmitted($_SESSION['id']);

        $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Jams');
    }

    function crowdfundings()
    {
        $this->view->crowdfundings = $this->model->showAllMyCrowdfundings($_SESSION['id']);

        $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Crowdfunding');
    }

    function sales()
    {


        if ($_SESSION['userRole'] == "game developer") {

            $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Sales');
        } else if ($_SESSION['userRole'] == "game publisher") {

            $this->view->render('Dashboard/PublisherDashboards/Dashboard-Sales');
        } else if ($_SESSION['userRole'] == "asset creator") {

            $this->view->render('Dashboard/CreatorDashboards/Dashboard-Sales');
        }
    }

    function analytics()
    {




        if ($_SESSION['userRole'] == "game developer") {

            $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Analytics');
        } else if ($_SESSION['userRole'] == "game publisher") {

            $this->view->render('Dashboard/PublisherDashboards/Dashboard-Analytics');
        } else if ($_SESSION['userRole'] == "asset creator") {

            $this->view->render('Dashboard/CreatorDashboards/Dashboard-Analytics');
        }
    }

    function payouts()
    {




        if ($_SESSION['userRole'] == "game developer") {

            $this->view->render('Dashboard/DeveloperDashboards/Dashboard-Payout');
        } else if ($_SESSION['userRole'] == "game publisher") {

            $this->view->render('Dashboard/PublisherDashboards/Dashboard-Payouts');
        } else if ($_SESSION['userRole'] == "asset creator") {

            $this->view->render('Dashboard/CreatorDashboards/Dashboard-Payouts');
        }
    }


    function edit()
    {

        if ($_SESSION['userRole'] == "game developer") {

            $this->view->classifications = $this->model->GetDropdowns('classification');

            $this->view->releaseStatus = $this->model->GetDropdowns('releaseStatus');

            $this->view->platforms = $this->model->GetDropdowns('platform');

            $this->view->gameTypes = $this->model->GetDropdowns('gametype');

            $this->view->features = $this->model->FeatureTypes();

            $this->view->game = $this->model->GetGameDetails($_GET['id']);

            $game = $this->model->GetGameDetails($_GET['id']);

            if ($game['gamePrice'] == "0") {
                $this->view->gamePrice = "Free";
            } else if ($game['gamePrice'] != "0") {
                $this->view->gamePrice = "Paid";
            }

            $this->view->platforms = explode(",", $game['platform']);

            $this->view->selectedFeatures = explode(",", $game['gameFeatures']);

            $this->view->gameTags = explode(",", $game['gameTags']);

            $this->view->gameScreenshots = explode(",", $game['gameScreenshots']);

            $this->view->render('Dashboard/GameDashboards/Edit');
        } else if ($_SESSION['userRole'] == "asset creator") {

            $this->view->asset = $this->model->GetAssetDetails($_GET['id']);

            $asset = $this->model->GetAssetDetails($_GET['id']);

            if ($asset['assetPrice'] == "0") {
                $this->view->assetPrice = "Free";
            } else if ($asset['assetPrice'] != "0") {
                $this->view->assetPrice = "Paid";
            }

            $this->view->assetTags = explode(",", $asset['assetTags']);

            $this->view->render('Dashboard/AssetDashboards/Edit');
        } else if ($_SESSION['userRole'] == "gamejam organizer") {

            $this->view->jam = $this->model->GetJamDetails($_GET['id']);

            $this->view->render('Dashboard/JamDashboards/Edit');
        }
    }

    function editGame()
    {
        $gameID = $_GET['id'];
        $gameName = $_POST['game-title'];
        $releaseStatus = $_POST['game-status'];
        $gameDetails = $_POST['description'];


        $gameTrailor = $_POST['game-illustration-vedio'];
        $gameTagline = $_POST['game-tagline'];
        $gameClassification = $_POST['game-classification'];
        $tags = $_POST['game-tags'];
        $gameDeveloperID = $_SESSION['id'];
        // $tags = implode(",", $gameTags);

        $gameType = $_POST['game-type'];
        $gameFeatures = $_POST['game-features'];

        $features = implode(",", $gameFeatures);

        $TempFileName = $gameName . $gameDeveloperID;

        $gameCoverImg = $this->model->UpdateGameCoverImg($TempFileName);
        $gameFile = $this->model->UpdateGameFile($TempFileName);
        $newScreenshots = $this->model->UpdateGameScreenshots($TempFileName);
        $oldScreenshots = $_POST['old-game-screenshots'];

        if (empty($newScreenshots)) {
            $gameScreenshots = $oldScreenshots;
        } else {
            $gameScreenshots = $newScreenshots;
        }





        $minGameOS = $_POST['min-game-OS'];
        $minGameProcessor = $_POST['min-game-processor'];
        $minGameMemory = $_POST['min-game-memory'];
        $minGameStorage = $_POST['min-game-storage'];
        $minGameGraphics = $_POST['min-game-graphics'];
        $GameOS = $_POST['game-OS'];
        $GameProcessor = $_POST['game-processor'];
        $GameMemory = $_POST['game-memory'];
        $GameStorage = $_POST['game-storage'];
        $GameGraphics = $_POST['game-graphics'];
        $GameOther = $_POST['game-other'];

        $gameVisibility = $_POST['game-visibility'];

        $platform = $_POST['platform'];

        $gamePlatforms = implode(",", $platform);

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
            $tags,
            $features,
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
            $gamePlatforms,
            $gameType,
            $gamePrice,
            $gameVisibility
        );

        header('location:/indieabode/');
    }

    function editAsset()
    {

        $assetID = $_GET['id'];
        $assetName = $_POST['asset-title'];
        $assetTagline = $_POST['asset-tagline'];
        $foreignKey = $_SESSION['id'];
        $assetClassification = $_POST['asset-classification'];
        $assetStatus = $_POST['asset-status'];
        $assetDetails = $_POST['description'];
        $assetTags = $_POST['asset-tags'];
        $assetType = $_POST['asset-type'];
        $assetStyle = $_POST['asset-style'];
        // $assetPricing = 
        $assetLicense = $_POST['asset-license'];
        $assetVideoUrl = $_POST['asset-illustration-video'];
        $assetVisibility = $_POST['asset-visibility'];
        $assetFile = $this->model->uploadAssetFile($assetID);
        $assetCoverImg = $this->model->uploadAssetCoverImg($assetID);

        $newScreenshots = $this->model->uploadAssetScreenshots($assetID);
        $oldScreenshots = $_POST['old-asset-screenshots'];

        if (empty($newScreenshots)) {
            $assetScreenshots = $oldScreenshots;
        } else {
            $assetScreenshots = $newScreenshots;
        }

        if ($_POST['asset-price'] == "Free") {
            $assetPrice = 0.00;
        } else if ($_POST['asset-price'] == "PWYW") {
            $assetPrice = trim($_POST['asset-pwyw-default'], "$");
        } else if ($_POST['asset-price'] == "Paid") {
            $assetPrice = $_POST['asset-price-paid'];
        }

        $this->model->EditExistingAsset(
            $assetName,
            $assetPrice,
            $assetDetails,
            $assetTagline,
            $foreignKey,
            $assetClassification,
            $assetStatus,
            $assetTags,
            $assetType,
            $assetStyle,
            $assetLicense,
            $assetVideoUrl,
            $assetVisibility,
            $assetFile,
            $assetCoverImg,
            $assetScreenshots
        );

        header('location:/indieabode/');
    }

    function gameanalytics()
    {
        $gameStats = $this->model->GetGameStats($_GET['id']);

        $downloads = [];
        $dates = [];
        $views = [];

        foreach ($gameStats as $gameStat) {
            array_push($downloads, $gameStat['downloads']);
            array_push($dates, $gameStat['created_at']);
            array_push($views, $gameStat['views']);
        }

        $this->view->alldownloads = $downloads;
        $this->view->labelDates = $dates;
        $this->view->allviews = $views;

        //for other views 
        $gig = $this->model->ThisGamesGigs($_GET['id']);
        $crowdfund = $this->model->ThisGamesCrowdfunds($_GET['id']);
        $devlogs = $this->model->ThisGameDevlogs($_GET['id']);
        $devlogViews = 0;

        foreach ($devlogs as $devlog) {
            $devlogViews = $devlogViews + $devlog['viewCount'];
        }

        $this->view->gigViews = !empty($gig) ? $gig['viewCount'] : 0;
        $this->view->crowdfundViews = !empty($crowdfund) ? $crowdfund['viewCount'] : 0;
        $this->view->devlogViews = $devlogViews;

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/Analytics');
    }

    function gamedevlogs()
    {

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->devlogs = $this->model->ThisGameDevlogs($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/GameDevlogs');
    }

    function editdevlog()
    {
        $this->view->posttypes = $this->model->DevlogPostTypes();

        $this->view->game = $this->model->GetGameDetails($_GET['gameid']);

        $this->view->devlog = $this->model->GetDevlogDetails($_GET['postid']);

        $this->view->render('Dashboard/GameDashboards/EditDevlog');
    }

    function editExistingDevlog()
    {
        $devlogID = $_GET['id'];
        $name = $_POST['title'];
        $tagline = $_POST['tagline'];
        $description = $_POST['devLog-details'];
        $type = $_POST['type'];
        $visibility = $_POST['dev-visibility'];
        $devlogImg = $this->model->uploadDevlogCoverImg($devlogID);

        $this->model->EditExistingDevlog(
            $devlogID,
            $name,
            $tagline,
            $description,
            $type,
            $visibility,
            $devlogImg
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
        // $this->view->games = $this->model->showAllMyGames($_SESSION['id']);

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

        $currentStage = $_POST['current-stage'];
        $plannedReleaseDate = $_POST['planned-release'];
        $estimatedShare = $_POST['est-share'];
        $expectedCost = $_POST['expected-cost'];
        $visibility = $_POST['gig-visibility'];
        $gigCoverImg = $this->model->uploadGigCoverImg($gigID);
        // $gigScreenshots = $this->model->uploadScreenshots($gameName);
        $gigTrailer = $_POST['gig-trailer'];
        $developerID = $_SESSION['id'];

        $newScreenshots = $this->model->uploadGigScreenshots($gigID);
        $oldScreenshots = $_POST['old-gig-screenshots'];

        if (empty($newScreenshots)) {
            $gigScreenshots = $oldScreenshots;
        } else {
            $gigScreenshots = $newScreenshots;
        }

        $this->model->EditExistingGig(
            $gigID,
            $gigName,
            $tagline,
            $description,
            $currentStage,
            $plannedReleaseDate,
            $estimatedShare,
            $expectedCost,
            $visibility,
            $gigCoverImg,
            $gigScreenshots,
            $gigTrailer
        );

        header('location:/indieabode/');
    }

    function gamecrowdfunds()
    {
        $this->view->crowdfund = $this->model->ThisGamesCrowdfunds($_GET['id']);

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/Crowdfunds');
    }

    function editCrowdfund()
    {

        $this->view->game = $this->model->GetGameDetails($_GET['gameid']);

        $this->view->crowdfund = $this->model->GetCrowdfundDetails($_GET['crowdfundid']);

        $this->view->render('Dashboard/GameDashboards/EditCrowdfund');
    }

    function editExistingCrowdfund()
    {
        $crowdfundID = $_GET['id'];
        $crowdfundName = $_POST['crowdfund-title'];
        $crowdfundTagline = $_POST['crowdfund-tagline'];
        $crowdfundDetails = $_POST['crowdfund-details'];
        $crowdfundTrailer = $_POST['crowdfund-trailer'];
        $coverImg = $this->model->uploadCrowdfundCoverImg($crowdfundID);

        $newScreenshots = $this->model->uploadCrowdfundScreenshots($crowdfundID);
        $oldScreenshots = $_POST['old-crowdfund-screenshots'];

        if (empty($newScreenshots)) {
            $screenshots = $oldScreenshots;
        } else {
            $screenshots = $newScreenshots;
        }


        $this->model->EditExistingCrowdfund(
            $crowdfundID,
            $crowdfundName,
            $crowdfundTagline,
            $crowdfundDetails,
            $coverImg,
            $crowdfundTrailer,
            $screenshots
        );

        header('location:/indieabode/');
    }


    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items
    //Game Publisher Dashboard Items

    function orders()
    {
        $currentUser = $_SESSION['id'];

        $this->view->gigs = $this->model->showAllMyOrdersPublisher($currentUser);

        $this->view->render('Dashboard/PublisherDashboards/Dashboard-Orders');
    }

    function requests()
    {
        $this->view->ongoingrequests = $this->model->showAllMyRequestsPublisher($_SESSION['id']);

        $this->view->render('Dashboard/PublisherDashboards/Dashboard-Requests');
    }

    //Asset Creator Dashboard Items
    //Asset Creator Dashboard Items
    //Asset Creator Dashboard Items
    //Asset Creator Dashboard Items
    //Asset Creator Dashboard Items

    function reviews()
    {
        $this->view->asset = $this->model->GetAssetDetails($_GET['id']);

        $this->view->render('Dashboard/AssetDashboards/Reviews');
    }

    function assetanalytics()
    {
        $this->view->asset = $this->model->GetAssetDetails($_GET['id']);


        $assetStats = $this->model->GetAssetStats($_GET['id']);

        $downloads = [];
        $dates = [];
        $views = [];

        foreach ($assetStats as $assetStat) {
            array_push($downloads, $assetStat['downloads']);
            array_push($dates, $assetStat['created_at']);
            array_push($views, $assetStat['views']);
        }

        $this->view->alldownloads = $downloads;
        $this->view->labelDates = $dates;
        $this->view->allviews = $views;


        $this->view->render('Dashboard/AssetDashboards/Analytics');
    }

    function deleteAsset()
    {

        if ($_POST['delete_asset'] == true) {

            $assetID = $_POST['assetID'];

            $this->model->DeleteAsset($assetID);
        }
    }


    //GameJam Organizer Items
    //GameJam Organizer Items
    //GameJam Organizer Items
    //GameJam Organizer Items
    //GameJam Organizer Items
    //GameJam Organizer Items

    function EditJam()
    {
        $jamID = $_GET['id'];
        $gamejamTitle = $_POST['title'];
        $gamejamTagline = $_POST['tagline'];
        $jamType = $_POST['ranking'];
        $jamStartDate = $_POST['Sdate'];
        $jamEndtDate = $_POST['Edate'];
        $jamVEndDate = ($_POST['ranking'] == "Ranked") ? $_POST['V_E_Date'] : null;
        $jamContent = $_POST['description'];
        $jamCriteria = ($_POST['ranking'] == "Ranked") ? $_POST['criteria'] : null;
        $jamVisibility = $_POST['visibility'];
        $jamHostID = $_SESSION['id'];
        $jamVoters = $_POST['voters'];
        $jamTwitterHashtag = $_POST['twitter'];
        $jamTheme = $_POST['jamTheme'];


        $jamCoverImg = $this->model->updateJamCoverImg($gamejamTitle);


        $this->model->editExistingJam(
            $gamejamTitle,
            $gamejamTagline,
            $jamStartDate,
            $jamEndtDate,
            $jamVEndDate,
            $jamContent,
            $jamType,
            $jamCriteria,
            $jamVisibility,
            $jamHostID,
            $jamVoters,
            $jamTwitterHashtag,
            $jamCoverImg,
            $jamTheme,
            $jamID
        );

        header('location:/indieabode/');
    }
}
