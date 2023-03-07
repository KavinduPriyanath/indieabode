<?php

class Dashboard_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllMyGames($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID='$id'";

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
            array_push($myGameNames, $myGame['gameName']);
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

        return $stmt->fetchAll();
    }

    function showAllMyCrowdfundings($id)
    {
        $sql = "SELECT * FROM crowdfund WHERE gameDeveloperID='$id'";

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
        gameType = '$gameType'
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
}
