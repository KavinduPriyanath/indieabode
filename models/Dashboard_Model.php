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
        $sql = "SELECT * FROM gig WHERE gameDeveloperID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gigs = $stmt->fetchAll();

        return $gigs;
    }

    function showAllMyGigRequests($devId)
    {

        $sql = "SELECT * FROM requestedgigs INNER JOIN gig ON requestedgigs.gigID = gig.gigID WHERE developerID='$devId'";

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
        $gamePrice
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
        gamePrice = '$gamePrice'
        WHERE gameID ='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
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

    public function EditExistingDevlog(
        $devlogID,
        $name,
        $tagline,
        $description,
        $type,
        $visibility,
        $devlogImg,
        $gameName,
        $releaseDate
    ) {
        $sql = "UPDATE devlog SET 
        `name` = '$name',
        `Tagline` = '$tagline',
        `description` = '$description',
        `Type` = '$type',
        `Visibility` = '$visibility', 
        `devlogImg` = '$devlogImg',
        `gameName` = '$gameName', 
        `ReleaseDate` = '$releaseDate' 
        WHERE devLogID = '$devlogID'
        ";

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
    ) {
        $sql = "INSERT INTO gig (gigName, gigTagline, gigDetails, game, currentStage, 
        plannedReleaseDate, estimatedShare, expectedCost, visibility, gigCoverImg, 
        gigScreenshot, gigTrailor, gameDeveloperID) VALUES 
        (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$gigName",
            "$tagline",
            "$description",
            "$gameName",
            "$currentStage",
            "$plannedReleaseDate",
            "$estimatedShare",
            "$expectedCost",
            "$visibility",
            "$gigCoverImg",
            "$gigScreenshots",
            "$gigTrailer",
            "$developerID"
        ]);
    }

    function GetGigDetails($gigID)
    {

        $sql = "SELECT * FROM gig where gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gig;
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

    public function uploadCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");

        $newImage = $_FILES['game-upload-cover-img']['name'];
        $oldImage = $_POST['old-game-upload-cover-img'];

        if ($newImage != '') {
            $image = $newImage;
        } else {
            $image = $oldImage;
        }

        $game_cover_img_name = $image;


        $game_cover_img_temp_name = $_FILES['game-upload-cover-img']['tmp_name'];

        $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($game_cover_img_ext, $allowed_exts)) {
            $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
            $game_cover_upload_path = "public/uploads/games/cover/" . $new_game_cover_img_name;
            move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
        }

        return $new_game_cover_img_name;
    }

    function uploadGameFile($gameName)
    {

        $newFile = $_FILES['upload-game']['name'];
        $oldFile = $_POST['old-upload-game'];

        if ($newFile != '') {
            $file = $newFile;
        } else {
            $file = $oldFile;
        }



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
    }

    function uploadScreenshots($gameName)
    {

        $newScreenshots = $_FILES['game-screenshots']['name'];
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
                $ss_upload_path = 'public/uploads/games/ss/' . $newSSName;

                move_uploaded_file($_FILES['game-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }
}
