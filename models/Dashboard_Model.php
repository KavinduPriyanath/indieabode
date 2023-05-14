<?php

class Dashboard_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllMyGames($id)
    {
        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameCoverImg, 
                game_stats.views, game_stats.downloads, game_stats.ratings, game_stats.revenue FROM freegame 
                INNER JOIN game_stats ON freegame.gameID = game_stats.gameID WHERE gameDeveloperID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllMyDevlogs($id)
    {

        $gamesSql = "SELECT * FROM freegame WHERE gameDeveloperID='$id'";

        $gamestmt = $this->db->prepare($gamesSql);

        $gamestmt->execute();

        $myGames = $gamestmt->fetchAll();

        $myGameNames = [];

        foreach ($myGames as $myGame) {
            array_push($myGameNames, $myGame['gameID']);
        }

        // return $myGameNames;

        $games = join("','", $myGameNames);

        $sql = "SELECT * FROM devlog WHERE `gameName` IN ('$games')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllMyGigs($id)
    {
        $sql = "SELECT gig.gigID, gig.gigName, gig.game, gig.viewCount, gig.requests, gig.gigCoverImg, freegame.gameName
                FROM gig INNER JOIN freegame ON freegame.gameID=gig.game WHERE gig.gameDeveloperID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gigs = $stmt->fetchAll();

        return $gigs;
    }

    function showAllMyGigRequests($devId)
    {

        $sql = "SELECT gig.gigName, gig.gigCoverImg, requestedgigs.gigID, requestedgigs.eligible,
                requestedgigs.gigToken, requestedgigs.created_at, gamer.firstName, gamer.lastName
                FROM (gamer INNER JOIN requestedgigs ON requestedgigs.publisherID=gamer.gamerID) INNER JOIN 
                gig ON requestedgigs.gigID = gig.gigID 
                WHERE developerID='$devId'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllMyCrowdfundings($id)
    {
        $sql = "SELECT * FROM crowdfund WHERE gameDeveloperName='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    //for updating a game info
    function GetGameDetails($gameID)
    {

        $sql = "SELECT * FROM freegame where gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
    }

    function GetDropdowns($filterType)
    {


        $sql = "SELECT * FROM games_filters WHERE type='$filterType'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function EditExistingGame(
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
        $gamePrice,
        $gameVisibility
    ) {
        $sql = "UPDATE freegame SET
        gameName = '$gameName', 
        releaseStatus = '$releaseStatus', 
        gameDetails = '$gameDetails', 
        gameTrailor = '$gameTrailor',
        gameTagline = '$gameTagline',
        gameClassification = '$gameClassification',
        gameTags = '$gameTags',
        gameFeatures = '$gameFeatures', 
        gameFile = '$gameFile',
        gameCoverImg = '$gameCoverImg',
        gameScreenshots = '$gameScreenshots',
        gameDeveloperID = '$gameDeveloperID',
        minOS = '$minGameOS',
        minProcessor = '$minGameProcessor', 
        minMemory = '$minGameMemory',
        minStorage = '$minGameStorage',
        minGraphics = '$minGameGraphics',
        recommendOS = '$GameOS',
        recommendProcessor = '$GameProcessor', 
        recommendMemory = '$GameMemory',
        recommendStorage = '$GameStorage',
        recommendGraphics = '$GameGraphics',
        other = '$GameOther',
        platform = '$platform',
        gameType = '$gameType',
        gamePrice = '$gamePrice',
        gameVisibility = '$gameVisibility'
        WHERE gameID ='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function GameNameAvailabilityCheck($gameName, $userID, $gameID)
    {

        $sql = "SELECT * FROM freegame WHERE gameName='$gameName' AND gameDeveloperID='$userID' AND gameID !='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($game)) {
            return "true";
        } else {
            return "false";
        }
    }

    function CheckGameNameWholeSite($gameName, $userID)
    {

        $Namesql = "SELECT * FROM freegame WHERE gameName='$gameName' AND NOT gameDeveloperID='$userID'";

        $Namestmt = $this->db->prepare($Namesql);

        $Namestmt->execute();

        return $Namestmt->fetch(PDO::FETCH_ASSOC);
    }

    function ThisGameDevlogs($gameID)
    {

        $sql = "SELECT * FROM devlog WHERE gameName='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetDevlogDetails($devlogID)
    {

        $sql = "SELECT * FROM devlog where devLogID='$devlogID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        return $devlog;
    }

    function DevlogPostTypes()
    {
        $sql = "SELECT * FROM devlog_posttype";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function EditExistingDevlog(
        $devlogID,
        $name,
        $tagline,
        $description,
        $type,
        $visibility,
        $devlogImg
    ) {
        $sql = "UPDATE devlog SET 
        `name` = '$name',
        `Tagline` = '$tagline',
        `description` = '$description',
        `Type` = '$type',
        `Visibility` = '$visibility', 
        `devlogImg` = '$devlogImg'
        WHERE devLogID = '$devlogID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function ThisGamesGigs($gameID)
    {

        $sql = "SELECT * FROM gig WHERE game='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gig;
    }

    public function EditExistingGig(
        $gigId,
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
        $gigTrailer,
    ) {

        $sql = "UPDATE gig SET
                gigName = '$gigName',
                gigTagline = '$tagline',
                gigDetails = '$description',
                currentStage = '$currentStage',
                plannedReleaseDate = '$plannedReleaseDate',
                estimatedShare = '$estimatedShare',
                expectedCost = '$expectedCost',
                gigTrailor = '$gigTrailer',
                gigCoverImg = '$gigCoverImg',
                gigScreenshot = '$gigScreenshots'
                WHERE gigID = '$gigId'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function GetGigDetails($gigID)
    {

        $sql = "SELECT * FROM gig where gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gig;
    }

    function OngoingRequestsOfThisGig($gigID)
    {

        $sql = "SELECT * FROM requestedgigs WHERE gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function DeleteGig($gigID)
    {

        $sql = "DELETE FROM gig WHERE gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function GetCrowdfundDetails($crowdfundID)
    {

        $sql = "SELECT * FROM crowdfund WHERE crowdFundID='$crowdfundID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfund = $stmt->fetch(PDO::FETCH_ASSOC);

        return $crowdfund;
    }

    function EditExistingCrowdfund(
        $crowdfundID,
        $crowdfundName,
        $crowdfundTagline,
        $crowdfundDetails,
        $coverImg,
        $crowdfundTrailer,
        $screenshots
    ) {

        $sql = "UPDATE crowdfund SET
                title = '$crowdfundName',
                tagline = '$crowdfundTagline',
                details = '$crowdfundDetails',
                crowdfundCoverImg = '$coverImg',
                crowdfundSS = '$screenshots',
                crowdfundTrailer = '$crowdfundTrailer'
                WHERE crowdFundID = '$crowdfundID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function GetGameStats($gameID)
    {

        $sql = "SELECT * FROM game_stats_history WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function FeatureTypes()
    {

        $sql = "SELECT * FROM games_filters WHERE type='features'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function ThisGamesCrowdfunds($gameID)
    {

        $sql = "SELECT * FROM crowdfund WHERE gameName='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfund = $stmt->fetch(PDO::FETCH_ASSOC);

        return $crowdfund;
    }

    public function UpdateGameCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['game-upload-cover-img']['name'];
        $oldImage = $_POST['old-game-upload-cover-img'];

        if ($newImage != '') {
            $image = $newImage;

            $game_cover_img_name = $image;


            $game_cover_img_temp_name = $_FILES['game-upload-cover-img']['tmp_name'];

            $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($game_cover_img_ext, $allowed_exts)) {
                $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
                $game_cover_upload_path = "public/uploads/games/cover/" . $new_game_cover_img_name;
                move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
            }

            return $new_game_cover_img_name;
        } else {
            $image = $oldImage;

            return $image;
        }
    }

    function UpdateGameFile($gameName)
    {

        $newFile = $_FILES['upload-game']['name'];
        $oldFile = $_POST['old-upload-game'];

        if ($newFile != '') {
            $file = $newFile;

            //Game File
            $game_file = $file;
            //$asset_file_size = $_FILES['upload-asset']['size'];
            $game_file_temp_name = $_FILES['upload-game']['tmp_name'];

            $game_file_ext = strtolower(pathinfo($game_file, PATHINFO_EXTENSION));

            $allowed_game_types = array("zip", "blend", "txt");

            if (in_array($game_file_ext, $allowed_game_types)) {
                $new_game_file_name = "Game-" . $gameName . '.' . $game_file_ext;
                $game_upload_path = 'public/uploads/games/file/' . $new_game_file_name;
                move_uploaded_file($game_file_temp_name, $game_upload_path);
            } else if (!in_array($game_file_ext, $allowed_game_types) && $game_file) {
                $incompatibleFileType = true;
            }

            return $new_game_file_name;
        } else {
            $file = $oldFile;

            return $file;
        }
    }

    function UpdateGameScreenshots($gameName)
    {

        $newScreenshots = $_FILES['game-screenshots']['name'];
        $ssArray = $newScreenshots;

        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($ssArray);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $ssArray[$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/games/ss/' . $newSSName;

                move_uploaded_file($_FILES['game-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    public function uploadGigCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['gig-upload-cover-img']['name'];
        $oldImage = $_POST['old-gig-upload-cover-img'];

        if ($newImage != '') {
            $image = $newImage;

            $game_cover_img_name = $image;


            $game_cover_img_temp_name = $_FILES['gig-upload-cover-img']['tmp_name'];

            $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($game_cover_img_ext, $allowed_exts)) {
                $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
                $game_cover_upload_path = "public/uploads/gigs/cover/" . $new_game_cover_img_name;
                move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
            }

            return $new_game_cover_img_name;
        } else {
            $image = $oldImage;
            return $image;
        }
    }

    function uploadGigScreenshots($gameName)
    {

        $newScreenshots = $_FILES['gig-screenshots']['name'];
        // $oldScreenshots = $_POST['old-game-screenshots'];

        // $oldSS = explode(",", $oldScreenshots);

        $ssArray = $newScreenshots;



        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($ssArray);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $ssArray[$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/gigs/screenshots/' . $newSSName;

                move_uploaded_file($_FILES['gig-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    public function uploadDevlogCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['devlog_ss']['name'];
        $oldImage = $_POST['old-devlog-ss'];

        if ($newImage != '') {
            $image = $newImage;

            $game_cover_img_name = $image;


            $game_cover_img_temp_name = $_FILES['devlog_ss']['tmp_name'];

            $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($game_cover_img_ext, $allowed_exts)) {
                $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
                $game_cover_upload_path = "public/uploads/devlogs/" . $new_game_cover_img_name;
                move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
            }

            return $new_game_cover_img_name;
        } else {
            $image = $oldImage;
            return $image;
        }
    }

    public function uploadCrowdfundCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['crowdfund-upload-cover-img']['name'];
        $oldImage = $_POST['old-crowdfund-upload-cover-img'];

        if ($newImage != '') {
            $image = $newImage;

            $game_cover_img_name = $image;


            $game_cover_img_temp_name = $_FILES['crowdfund-upload-cover-img']['tmp_name'];

            $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($game_cover_img_ext, $allowed_exts)) {
                $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
                $game_cover_upload_path = "public/uploads/crowdfundings/cover/" . $new_game_cover_img_name;
                move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
            }

            return $new_game_cover_img_name;
        } else {
            $image = $oldImage;
            return $image;
        }
    }

    function uploadCrowdfundScreenshots($gameName)
    {

        $newScreenshots = $_FILES['crowdfund-screenshots']['name'];

        $ssArray = $newScreenshots;

        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($ssArray);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $ssArray[$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/crowdfundings/screenshots/' . $newSSName;

                move_uploaded_file($_FILES['crowdfund-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    function AddGiveawayItems($gameID, $copiesCount, $pieceWorth)
    {

        $sql = "INSERT INTO giveaways(gameID, copiesCount, pieceWorth, copiesLeft) VALUES ('$gameID', '$copiesCount', '$pieceWorth', '$copiesCount')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function HasGiveAway($gameID)
    {

        $sql = "SELECT giveaways.gameID, giveaways.copiesCount, giveaways.pieceWorth, freegame.gameName, freegame.gameCoverImg, giveaways.copiesLeft
                FROM giveaways INNER JOIN freegame ON freegame.gameID=giveaways.gameID WHERE giveaways.gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function GiveawayWinners($gameID)
    {

        $sql = "SELECT giveaway_claims.won_date, freegame.gameName, gamer.username
                FROM (giveaway_claims INNER JOIN freegame ON freegame.gameID=giveaway_claims.gameID)
                INNER JOIN gamer ON giveaway_claims.winnerID=gamer.gamerID WHERE giveaway_claims.gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function JamsJoined($developerID)
    {

        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, 
                gamejam.jamType, gamejam.joinedCount, gamejam.submissionsCount, gamejam.jamCoverImg FROM gamejam
                INNER JOIN joinjam_gamedevs ON gamejam.gamejamID=joinjam_gamedevs.gameJamID 
                WHERE joinjam_gamedevs.gamerID = '$developerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function JamsSubmitted($developerID)
    {

        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, 
                gamejam.joinedCount, gamejam.submissionsCount, gamejam.jamCoverImg FROM gamejam 
                INNER JOIN submission ON gamejam.gameJamID = submission.gameJamID 
                WHERE submission.gamerID = '$developerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    //Game Publisher Queries
    //Game Publisher Queries
    //Game Publisher Queries
    //Game Publisher Queries
    //Game Publisher Queries

    function showAllMyGamesPublisher($currentUser)
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameCoverImg, 
                game_stats.views, game_stats.downloads, game_stats.ratings, game_stats.revenue FROM freegame 
                INNER JOIN game_stats ON freegame.gameID = game_stats.gameID WHERE gamePublisherID = '$currentUser'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllMyOrdersPublisher($currentUser)
    {

        $sql = "SELECT gig.gigID, gig.gigName, gig.game, gig.gigCoverImg, gig_purchases.publisherCost, 
                gig_purchases.sharePercentage, gig_purchases.publisherIncome, gig_purchases.purchasedDate FROM gig
                INNER JOIN gig_purchases ON gig.gigID=gig_purchases.gigID WHERE gig_purchases.publisherID='$currentUser'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllMyRequestsPublisher($currentUser)
    {

        $sql = "SELECT * FROM gig INNER JOIN requestedgigs ON gig.gigID = requestedgigs.gigID
                WHERE requestedgigs.publisherID='$currentUser'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    //Asset Creator Queries
    //Asset Creator Queries
    //Asset Creator Queries
    //Asset Creator Queries
    //Asset Creator Queries
    //Asset Creator Queries

    function showAllMyAssets($currentUser)
    {

        $sql = "SELECT freeasset.assetName, freeasset.assetCoverImg, freeasset.assetID, 
                asset_stats.views, asset_stats.downloads, asset_stats.ratings, asset_stats.revenue 
                FROM freeasset INNER JOIN asset_stats ON asset_stats.assetID = freeasset.assetID
                WHERE assetCreatorID = '$currentUser'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetAssetDetails($assetID)
    {

        $sql = "SELECT * FROM freeasset where assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        return $asset;
    }

    public function uploadAssetCoverImg($assetName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['asset-upload-cover-img']['name'];
        $oldImage = $_POST['old-asset-upload-cover-img'];

        if ($newImage != '') {
            $image = $newImage;
            $game_cover_img_name = $image;


            $game_cover_img_temp_name = $_FILES['asset-upload-cover-img']['tmp_name'];

            $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($game_cover_img_ext, $allowed_exts)) {
                $new_game_cover_img_name = "Cover-" . $assetName . '.' . $game_cover_img_ext;
                $game_cover_upload_path = "public/uploads/assets/cover/" . $new_game_cover_img_name;
                move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
            }

            return $new_game_cover_img_name;
        } else {
            $image = $oldImage;
            return $image;
        }
    }

    function uploadAssetFile($assetName)
    {

        $newFile = $_FILES['upload-asset']['name'];
        $oldFile = $_POST['old-upload-asset'];

        if ($newFile != '') {
            $file = $newFile;
        } else {
            $file = $oldFile;
        }



        //Game File
        $game_file = $file;
        //$asset_file_size = $_FILES['upload-asset']['size'];
        $game_file_temp_name = $_FILES['upload-asset']['tmp_name'];

        $game_file_ext = strtolower(pathinfo($game_file, PATHINFO_EXTENSION));

        $allowed_game_types = array("zip", "blend", "txt");

        if (in_array($game_file_ext, $allowed_game_types)) {
            $new_game_file_name = "Game-" . $assetName . '.' . $game_file_ext;
            $game_upload_path = 'public/uploads/assets/file/' . $new_game_file_name;
            move_uploaded_file($game_file_temp_name, $game_upload_path);
        } else if (!in_array($game_file_ext, $allowed_game_types) && $game_file) {
            $incompatibleFileType = true;
        }

        return $new_game_file_name;
    }


    function uploadAssetScreenshots($assetName)
    {

        $newScreenshots = $_FILES['asset-screenshots']['name'];
        // $oldScreenshots = $_POST['old-game-screenshots'];

        // $oldSS = explode(",", $oldScreenshots);

        $ssArray = $newScreenshots;



        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($ssArray);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $ssArray[$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $assetName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/assets/ss/' . $newSSName;

                move_uploaded_file($_FILES['asset-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    function EditExistingAsset(
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
    ) {

        $sql = "UPDATE freeasset SET
                assetName='$assetName',
        assetPrice = '$assetPrice',
        assetDetails = '$assetDetails',
        assetTagline = '$assetTagline',
        assetClassification = '$assetClassification',
        assetReleaseStatus = '$assetStatus',
        assetTags = '$assetTags',
        assetType = '$assetType',
        assetStyle = '$assetStyle',
        assetLicense = '$assetLicense', 
        assetVideoURL = '$assetVideoUrl',
        assetVisibility = '$assetVisibility',
        assetFile = '$assetFile',
        assetCoverImg = '$assetCoverImg',
        assetScreenshots = '$assetScreenshots' WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function DeleteAsset($assetID)
    {

        $sql = "DELETE FROM freeasset WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function GetAssetStats($assetID)
    {

        $sql = "SELECT * FROM asset_stats_history WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function AssetNameAvailabilityCheck($assetName, $userID, $assetID)
    {

        $sql = "SELECT * FROM freeasset WHERE assetName='$assetName' AND assetCreatorID='$userID' AND NOT assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($game)) {
            return "true";
        } else {
            return "false";
        }
    }

    function CheckAssetNameWholeSite($assetName, $userID)
    {

        $Namesql = "SELECT * FROM freeasset WHERE assetName='$assetName' AND NOT assetCreatorID='$userID'";

        $Namestmt = $this->db->prepare($Namesql);

        $Namestmt->execute();

        return $Namestmt->fetch(PDO::FETCH_ASSOC);
    }

    //GameJam Organizer Queries
    //GameJam Organizer Queries
    //GameJam Organizer Queries
    //GameJam Organizer Queries
    //GameJam Organizer Queries
    //GameJam Organizer Queries

    function showAllMyJamsOrganizer($hostID)
    {

        $sql = "SELECT * FROM gamejam WHERE jamHostID='$hostID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetJamDetails($jamID)
    {

        $sql = "SELECT * FROM gamejam where gameJamID='$jamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $jam = $stmt->fetch(PDO::FETCH_ASSOC);

        return $jam;
    }

    function editExistingJam(
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
    ) {
        $sql = "UPDATE gamejam SET
                jamTitle='$gamejamTitle',
                jamTagline = '$gamejamTagline',
                submissionStartDate = '$jamStartDate',
                submissionEndDate = '$jamEndtDate',
                votingEndDate = '$jamVEndDate',
                jamContent = '$jamContent',
                jamType='$jamType',
                jamCriteria='$jamCriteria',
                jamVisibility='$jamVisibility',
                jamVoters='$jamVoters',
                jamTwitter='$jamTwitterHashtag',
                jamCoverImg='$jamCoverImg',
                jamTheme='$jamTheme' WHERE gameJamID='$jamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function updateJamCoverImg($gamejamTitle)
    {

        $allowed_exts = array("jpg", "jpeg", "png");



        $newImage = $_FILES['coverImg']['name'];
        $oldImage = $_POST['old-coverImg'];

        if ($newImage != '') {
            $image = $newImage;

            $jam_cover_img_name = $image;
            $jam_cover_img_temp_name = $_FILES['coverImg']['tmp_name'];

            $jam_cover_img_ext = strtolower(pathinfo($jam_cover_img_name, PATHINFO_EXTENSION));

            if (in_array($jam_cover_img_ext, $allowed_exts)) {
                $new_jam_cover_img_name = "Cover-" . $gamejamTitle . '.' . $jam_cover_img_ext;
                $jam_cover_upload_path = "public/uploads/gamejams/covers/" . $new_jam_cover_img_name;
                move_uploaded_file($jam_cover_img_temp_name, $jam_cover_upload_path);
            }

            return $new_jam_cover_img_name;
        } else {
            $image = $oldImage;

            return $image;
        }
    }

    function submittedGames($jamID)
    {

        $sql = "SELECT submission.submissionID, submission.status, submission.rating, freegame.gameCoverImg,
                freegame.gameName, freegame.created_at from submission INNER JOIN freegame 
                ON freegame.gameID=submission.submissionID WHERE submission.gameJamID = '$jamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function FinalJamResult($jamID)
    {

        $sql = "SELECT submission.submissionID, submission.rating, freegame.gameName, freegame.gameCoverImg, gamer.username,
                gamer.firstName, gamer.lastName FROM (freegame INNER JOIN gamer ON gamer.gamerID=freegame.gameDeveloperID) 
                INNER JOIN submission ON freegame.gameID=submission.submissionID 
                WHERE gameJamID='$jamID' AND submission.status='qualified' ORDER BY rating DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function AllJamSubmissionReports($jamID)
    {

        $sql = "SELECT complaint_submissions.id, complaint_submissions.reason, complaint_submissions.description, 
                complaint_submissions.jamID, complaint_submissions.submissionID,
                gamer.username, freegame.gameName FROM (complaint_submissions INNER JOIN gamer ON gamer.gamerID=complaint_submissions.gamerID)
                INNER JOIN freegame ON freegame.gameID=complaint_submissions.submissionID WHERE complaint_submissions.jamID='$jamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function deleteJam($gameJamID)
    {
        $sql = "DELETE FROM gamejam WHERE gameJamID='$gameJamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
