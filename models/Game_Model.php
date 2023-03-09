<?php

class Game_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleGame($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
    }

    function getGameDeveloper($game)
    {
        $gameDeveloperID = $game['gameDeveloperID'];

        $sql = "SELECT * FROM gamer WHERE gamerID='$gameDeveloperID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameDeveloper = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gameDeveloper;
    }

    // function getScreenshots($id)
    // {
    //     $sql = "SELECT * FROM freeasset WHERE assetID='$id' LIMIT 1";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $asset = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $ss = $asset['assetScreenshots'];

    //     $screenshots = explode(',', $ss);

    //     return $screenshots;
    // }

    function getScreenshots($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $game['gameScreenshots'];

        $screenshots = explode(',', $ss);

        return $screenshots;
    }

    function PopularGames()
    {
        $stmt = $this->db->prepare("SELECT * FROM freegame LIMIT 4");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function ComplaintReasons()
    {

        $stmt = $this->db->prepare("SELECT * FROM complaint_reasons_items");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function Reviews($data)
    {

        $sql = "INSERT INTO game_reviews(rating, review) VALUES (:rating, :review)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($data);
    }

    function FetchReviews()
    {

        $stmt = $this->db->prepare("SELECT * FROM game_reviews ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();
    }


    function report()
    {
        $sql1 = "SELECT * FROM complaint_reasons_items";

        $stmt1 = $this->db->prepare($sql1);

        $stmt1->execute();

        $reasons = $stmt1->fetch(PDO::FETCH_ASSOC);

        return $reasons;
    }

    // function getScreenshots($id)
    // {
    //     $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $game = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $ss = $game['gameScreenshots'];

    //     $screenshots = explode(',', $ss);

    //     return $screenshots;
    // }

    public function checkGame($gameID)
    {
        $sql = "SELECT * FROM games_cart WHERE itemID = '$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $count = $stmt->fetchAll();

        return $count;

        //add all types of validation testing here
    }


    public function AddtoCart($itemID, $gamerID)
    {

        // $itemID = 57;




        $sql = "INSERT INTO games_cart (itemID,gamerID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$itemID", "$gamerID"]);
    }
    function AlreadyInCart($gameID, $userID)
    {

        $sql = "SELECT * FROM games_cart WHERE itemID='$gameID' AND gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($game != null) {
            return true;
        } else {
            return false;
        }
    }

    function AddtoLibrary($gameID, $gamerID)
    {

        $sql = "INSERT INTO library(developerID, itemID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$gamerID", "$gameID"]);
    }

    function AlreadyClaimed($gameID, $userID)
    {

        $sql = "SELECT * FROM library WHERE itemID='$gameID' AND developerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($game != null) {
            return true;
        } else {
            return false;
        }
    }

    function free($gameIDC)
    {
        $sql = "SELECT gamePrice FROM freegame WHERE gameID='$gameIDC' AND gamePrice = 0";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $price = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($price != null) {
            return true;
        } else {
            return false;
        }
    }

    function downloadFile($id)
    {

        $sql = "SELECT * FROM freegame WHERE gameID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $gameFile = $game['gameFile'];

        return $gameFile;
    }

    public function currentUser($developerID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID = '$developerID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $developer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $developer;
    }

    function reportSubmit($reason, $des, $id, $email)
    {
        $sql = "INSERT INTO complaint (reason,description,gamerID,email) VALUES (?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$reason", "$des", "$id", "$email"]);
        // $stmt->execute(["df","gyujg","tujf","jfj"]);
    }

    function updateGameDownloadStat($gameID, $todayDate)
    {

        $sql = "SELECT * FROM game_stats_history WHERE gameID='$gameID' AND created_at='$todayDate'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($record)) {
            $insertSQL = "INSERT INTO game_stats_history (gameID, views, downloads, ratings, reviews, created_at) VALUES ('$gameID', 0, 1, 0, 0, '$todayDate')";

            $insertStmt = $this->db->prepare($insertSQL);

            $insertStmt->execute();
        } else {

            $viewCount = $record['views'];

            $downloadCount = $record['downloads'] + 1;

            $ratingsCount = $record['ratings'];

            $reviewCount = $record['reviews'];

            $updateSQL = "UPDATE game_stats_history 
            SET gameID='$gameID', 
            views='$viewCount', 
            downloads='$downloadCount', 
            ratings = '$ratingsCount',
            reviews = '$reviewCount',
            created_at = '$todayDate' WHERE gameID = '$gameID' AND created_at='$todayDate'";

            $updateStmt = $this->db->prepare($updateSQL);

            $updateStmt->execute();
        }
    }
}
