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




        $sql = "INSERT INTO game_cart (gameID,userID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$itemID", "$gamerID"]);
    }

    function AlreadyInCart($gameID, $userID)
    {

        $sql = "SELECT * FROM game_cart WHERE gameID='$gameID' AND userID='$userID' LIMIT 1";

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

        $sql = "INSERT INTO game_library(gamerID, gameID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$gamerID", "$gameID"]);
    }

    function AlreadyClaimed($gameID, $userID)
    {

        $sql = "SELECT * FROM game_library WHERE gameID='$gameID' AND gamerID='$userID' LIMIT 1";

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

    function reportSubmit($reason, $description, $id, $type)
    {
        $sql = "INSERT INTO complaint (reason,description,gamerID,type) VALUES (?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$reason", "$description", "$id", "$type"]);
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

    function GameViewTracker($userID, $session, $gameID)
    {

        $sql = "SELECT * FROM games_view_tracker WHERE gameID='$gameID' AND userID='$userID' AND sessionID='$session'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameView = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($gameView)) {
            $viewSQL = "INSERT INTO games_view_tracker(userID, sessionID, gameID) VALUES ('$userID', '$session', '$gameID')";

            $viewStmt = $this->db->prepare($viewSQL);

            $viewStmt->execute();
            return true;
        } else if (!empty($gameView)) {
            return false;
        }
    }

    // Used to update views count for each game on a single day
    function updateGameViewStat($gameID, $todayDate)
    {
        // This block of code checks whether the current game we are viewing has a record made in the game_stats_history table
        // If someone had viewed the game or downloaded the game today there should be a record there.

        $sql = "SELECT * FROM game_stats_history WHERE gameID='$gameID' AND created_at='$todayDate'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($record)) {
            //If such record do not exist then a record should have been made regarding this game and today's date

            $insertSQL = "INSERT INTO game_stats_history (gameID, views, downloads, ratings, reviews, created_at) VALUES ('$gameID', 1, 0, 0, 0, '$todayDate')";

            $insertStmt = $this->db->prepare($insertSQL);

            $insertStmt->execute();
        } else {
            //If such record already exist then only the view attribute of that column should be updated by incrementing one

            $viewCount = $record['views'] + 1;

            $downloadCount = $record['downloads'];

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

    function updateGameViews($gameID)
    {

        $sql = "SELECT * FROM game_stats_history WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameViews = $stmt->fetchAll();

        $totalViews = 0;

        foreach ($gameViews as $gameView) {
            $totalViews = $totalViews + $gameView['views'];
        }

        $updateSQL = "UPDATE game_stats SET views='$totalViews' WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($updateSQL);

        $stmt->execute();
    }




    function getUserBillingInfo($userID)
    {

        $sql = "SELECT * FROM billing_addresses WHERE userID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getUserDetails($userID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function SuccessfulGamePurchase($gameID, $userID, $paidPrice, $orderID)
    {

        $sql = "INSERT INTO game_purchases(gameID, buyerID, purchasedPrice, orderID) VALUES ('$gameID', '$userID', '$paidPrice', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function downloadGameFile($id)
    {

        $sql = "SELECT * FROM freegame WHERE gameID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $gameFile = $game['gameFile'];

        return $gameFile;
    }


    function updateGameDownloads($gameID)
    {

        $sql = "SELECT * FROM game_stats_history WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameDownloads = $stmt->fetchAll();

        $totalDownloads = 0;

        foreach ($gameDownloads as $gameDownload) {
            $totalDownloads = $totalDownloads + $gameDownload['downloads'];
        }

        $updateSQL = "UPDATE game_stats SET downloads='$totalDownloads' WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($updateSQL);

        $stmt->execute();
    }
}
