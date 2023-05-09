<?php

require_once('includes/tcpdf/tcpdf.php');

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

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'game?id=' . $gameID);
    }

    function editGameNameAvailability()
    {

        $gameName = $_POST['gameName'];
        $gameID = $_POST['gameID'];

        $nameAvailability = $this->model->GameNameAvailabilityCheck($gameName, $_SESSION['id'], $gameID);

        $nameAvailabilityWhole = $this->model->CheckGameNameWholeSite($gameName, $_SESSION['id']);

        if ($nameAvailability == "false") {
            echo "unavailable";
        } else if (!empty($nameAvailabilityWhole)) {
            echo "warning";
        } else {
            echo "available";
        }
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

        $coverimgName = $assetID . $foreignKey;

        $assetLicense = $_POST['asset-license'];
        $assetVideoUrl = $_POST['asset-illustration-video'];
        $assetVisibility = $_POST['asset-visibility'];
        $assetFile = $this->model->uploadAssetFile($assetID);
        $assetCoverImg = $this->model->uploadAssetCoverImg($coverimgName);

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
            $assetID,
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

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'asset?id=' . $assetID);
    }

    function editAssetNameAvailabilityCheck()
    {

        $assetName = $_POST['assetName'];
        $assetID = $_POST['assetID'];

        $nameAvailability = $this->model->AssetNameAvailabilityCheck($assetName, $_SESSION['id'], $assetID);

        $nameAvailabilityWhole = $this->model->CheckAssetNameWholeSite($assetName, $_SESSION['id']);

        if ($nameAvailability == "false") {
            echo "unavailable";
        } else if (!empty($nameAvailabilityWhole)) {
            echo "warning";
        } else {
            echo "available";
        }
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

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'gig?id=' . $gigID);
    }

    //Developer can delete his published gigs if they do not have any requests made by publishers
    function deleteGig()
    {
        if ($_POST['delete_gig'] == true) {

            $gigID = $_POST['gigID'];

            //Checks whether the gig has any requests
            $hasRequests = $this->model->OngoingRequestsOfThisGig($gigID);

            //Delete the gig if it dont have any requests. Otherwise display an alert message
            if (empty($hasRequests)) {

                $this->model->DeleteGig($gigID);
                echo "deleted";
            } else {
                echo "has requests";
            }
        }
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

    function gamegiveaways()
    {

        $this->view->hasGiveaway = $this->model->HasGiveAway($_GET['id']);

        $this->view->winners = $this->model->GiveawayWinners($_GET['id']);

        $this->view->game = $this->model->GetGameDetails($_GET['id']);

        $this->view->render('Dashboard/GameDashboards/GiveAways');
    }

    function addtoGiveaways()
    {

        if ($_POST['save_giveaway'] == true) {

            $gameID = $_POST['gameID'];
            $copiesCount = $_POST['copiesCount'];
            $pieceWorth = $_POST['copyWorth'];

            $this->model->AddGiveawayItems($gameID, $copiesCount, $pieceWorth);
        }
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

    function advertisements()
    {


        $this->view->render('Dashboard/PublisherDashboards/Dashboard-Advertisements');
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

    function certificates()
    {

        $this->view->allJams = $this->model->showAllMyJamsOrganizer($_SESSION['id']);

        $this->view->render('Dashboard/OrganizerDashboards/Add-Certificate');
    }

    function viewCertificate()
    {


        $certificationType = $_POST['certificate-type'];
        $participantName = $_POST['participant-name'];
        $reason = "For Winning the First Place in the";
        $jamName = $_POST['game-jam'];


        if ($certificationType == "PARTICIPATION") {
            $reason = "For his/her participation in the";
        } else if ($certificationType == "FINALIST") {
            $reason = "For achieving place in top 10 in the";
        } else if ($certificationType == "WINNER") {
            $partipantPlace = $_POST['participant-place'];
            if ($partipantPlace == "First Place") {
                $reason = "For Winning the First Place in the";
            } else if ($partipantPlace == "Second Place") {
                $reason = "For Winning the Second Place in the";
            } else if ($partipantPlace == "Third Place") {
                $reason = "For Winning the Third Place in the";
            }
        }

        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

        $pdf->setTitle("Certification of Completion");

        $pdf->SetPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->setFont('helvetica', '', 24);

        $pdf->Rect(0, 0, $pdf->getPageWidth(),    $pdf->getPageHeight(), 'DF', "",  array(184, 218, 253));
        $pdf->SetLineStyle(array('width' => 15, 'color' => array(69, 135, 202)));
        $pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());

        $html1 = <<<EOF
                        <!DOCTYPE html>
                        <html lang="en">

                        <body>
                        <style>
                            * {
                                text-align:center;
                            }
                        </style>
                        <img src="/indieabode/public/images/Certificate/logo.jpg" alt="test alt attribute" width="130" height="120" border="0" />
                        <div id="heading" style="color:black;font-size:xx-large;" ><b>CERTIFICATE OF 
                    EOF;

        $html2 = <<<EOF
                        </b></div>
                        <div style="font-size: x-small;">This certificate is proudly presented to </div>
                        <div style="font-weight:bold;background-color: rgb(50, 112, 175);color: rgb(255, 255, 255);">  
                    EOF;

        $html3 = <<<EOF
                        </div>
                        <div style="font-size: x-small;">
                    EOF;

        $html4 = <<<EOF
                        </div>
                        <div>
                    EOF;

        $html5 = <<<EOF
                        </div>
                        <small>September 12th, 2023</small><br/><br/>
                        <img src="/indieabode/public/images/Certificate/end.jpg" alt="test alt attribute" width="75" height="30" border="0" />
                        </body>

                        </html>
                    EOF;

        $html = $html1 . $certificationType . $html2 . $participantName . $html3 . $reason . $html4 . $jamName . $html5;

        $pdf->writeHTML($html);

        $pdf->Output("kavi.pdf", 'I');
    }

    function downloadCertificate()
    {


        $certificationType = $_POST['certificate-type'];
        $participantName = $_POST['participant-name'];
        $reason = "For Winning the First Place in the";
        $jamName = $_POST['game-jam'];


        if ($certificationType == "PARTICIPATION") {
            $reason = "For his/her participation in the";
        } else if ($certificationType == "FINALIST") {
            $reason = "For achieving place in top 10 in the";
        } else if ($certificationType == "WINNER") {
            $partipantPlace = $_POST['participant-place'];
            if ($partipantPlace == "First Place") {
                $reason = "For Winning the First Place in the";
            } else if ($partipantPlace == "Second Place") {
                $reason = "For Winning the Second Place in the";
            } else if ($partipantPlace == "Third Place") {
                $reason = "For Winning the Third Place in the";
            }
        }

        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

        $pdf->setTitle("Certification of Completion");

        $pdf->SetPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->setFont('helvetica', '', 24);

        $pdf->Rect(0, 0, $pdf->getPageWidth(),    $pdf->getPageHeight(), 'DF', "",  array(184, 218, 253));
        $pdf->SetLineStyle(array('width' => 15, 'color' => array(69, 135, 202)));
        $pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());

        $html1 = <<<EOF
                        <!DOCTYPE html>
                        <html lang="en">

                        <body>
                        <style>
                            * {
                                text-align:center;
                            }
                        </style>
                        <img src="/indieabode/public/images/Certificate/logo.jpg" alt="test alt attribute" width="130" height="120" border="0" />
                        <div id="heading" style="color:black;font-size:xx-large;" ><b>CERTIFICATE OF 
                    EOF;

        $html2 = <<<EOF
                        </b></div>
                        <div style="font-size: x-small;">This certificate is proudly presented to </div>
                        <div style="font-weight:bold;background-color: rgb(50, 112, 175);color: rgb(255, 255, 255);">  
                    EOF;

        $html3 = <<<EOF
                        </div>
                        <div style="font-size: x-small;">
                    EOF;

        $html4 = <<<EOF
                        </div>
                        <div>
                    EOF;

        $html5 = <<<EOF
                        </div>
                        <small>September 12th, 2023</small><br/><br/>
                        <img src="/indieabode/public/images/Certificate/end.jpg" alt="test alt attribute" width="75" height="30" border="0" />
                        </body>

                        </html>
                    EOF;

        $html = $html1 . $certificationType . $html2 . $participantName . $html3 . $reason . $html4 . $jamName . $html5;

        $pdf->writeHTML($html);

        $pdf->Output("kavi.pdf", 'D');
    }


    function submissions()
    {
        $this->view->allSubmissions = $this->model->submittedGames($_GET['id']);

        $this->view->jam = $this->model->GetJamDetails($_GET['id']);

        $this->view->render('Dashboard/JamDashboards/Submissions');
    }

    function results()
    {

        $this->view->jamResults = $this->model->FinalJamResult($_GET['id']);

        $this->view->jam = $this->model->GetJamDetails($_GET['id']);

        $this->view->render('Dashboard/JamDashboards/Results');
    }

    function reports()
    {

        $this->view->allReports = $this->model->AllJamSubmissionReports($_GET['id']);

        $this->view->jam = $this->model->GetJamDetails($_GET['id']);

        $this->view->render('Dashboard/JamDashboards/Report');
    }

    function prizes()
    {


        $this->view->jam = $this->model->GetJamDetails($_GET['id']);

        $this->view->render('Dashboard/JamDashboards/Prize');
    }

    public function deleteJam()
    {
        if(isset($_POST['gameJamID'])) {
            $gameJamID = $_POST['gameJamID'];
            
            $this->model->deleteJam($gameJamID);
        
        }
    }
}
