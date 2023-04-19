<?php

class Asset_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleAsset($id)
    {
        $sql = "SELECT * FROM freeasset WHERE assetID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        return $asset;
    }

    function getAssetsCreator($asset)
    {
        $assetCreatorID = $asset['assetCreatorID'];

        $sql = "SELECT * FROM gamer WHERE gamerID='$assetCreatorID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assetcreator = $stmt->fetch(PDO::FETCH_ASSOC);

        return $assetcreator;
    }

    function getScreenshots($id)
    {
        $sql = "SELECT * FROM freeasset WHERE assetID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $asset['assetScreenshots'];

        $screenshots = explode(',', $ss);

        return $screenshots;
    }

    function downloadFile($id)
    {

        $sql = "SELECT * FROM freeasset WHERE assetID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        $assetFile = $asset['assetFile'];

        return $assetFile;
    }

    public function currentUser($developerID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID = '$developerID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $developer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $developer;
    }

    function AddtoLibrary($assetID, $ownerID)
    {

        $sql = "INSERT INTO asset_library(developerID, assetID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$ownerID", "$assetID"]);
    }

    function AlreadyClaimed($assetID, $userID)
    {

        $sql = "SELECT * FROM asset_library WHERE assetID='$assetID' AND developerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($asset != null) {
            return true;
        } else {
            return false;
        }
    }

    function AssetStats($assetID)
    {

        $sql = "SELECT * FROM asset_stats WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $stats = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stats;
    }

    function AddtoCart($assetID, $ownerID)
    {

        $sql = "INSERT INTO asset_cart(userID, assetID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$ownerID", "$assetID"]);
    }

    function AlreadyInCart($assetID, $userID)
    {

        $sql = "SELECT * FROM asset_cart WHERE assetID='$assetID' AND userID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($asset != null) {
            return true;
        } else {
            return false;
        }
    }

    function PopularAssets()
    {
        $stmt = $this->db->prepare("SELECT * FROM freeasset LIMIT 4");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function updateAssetDownloadStat($assetID, $todayDate)
    {

        $sql = "SELECT * FROM asset_stats_history WHERE assetID='$assetID' AND created_at='$todayDate'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($record)) {
            $insertSQL = "INSERT INTO asset_stats_history (assetID, views, downloads, ratings, reviews, created_at) VALUES ('$assetID', 0, 1, 0, 0, '$todayDate')";

            $insertStmt = $this->db->prepare($insertSQL);

            $insertStmt->execute();
        } else {

            $viewCount = $record['views'];

            $downloadCount = $record['downloads'] + 1;

            $ratingsCount = $record['ratings'];

            $reviewCount = $record['reviews'];

            $updateSQL = "UPDATE asset_stats_history 
            SET assetID='$assetID', 
            views='$viewCount', 
            downloads='$downloadCount', 
            ratings = '$ratingsCount',
            reviews = '$reviewCount',
            created_at = '$todayDate' WHERE assetID = '$assetID' AND created_at='$todayDate'";

            $updateStmt = $this->db->prepare($updateSQL);

            $updateStmt->execute();
        }
    }


    // function findAsset($assetID)
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM freeasset WHERE assetID='$assetID' LIMIT 1");

    //     $stmt->execute();

    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

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

    function SuccessfulAssetPurchase($assetID, $userID, $paidPrice, $orderID)
    {

        $sql = "INSERT INTO asset_purchases(assetID, buyerID, purchasedPrice, orderID) VALUES ('$assetID', '$userID', '$paidPrice', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function AssetViewTracker($userID, $session, $assetID)
    {

        $sql = "SELECT * FROM asset_view_tracker WHERE assetID='$assetID' AND userID='$userID' AND sessionID='$session'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assetView = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($assetView)) {
            $viewSQL = "INSERT INTO asset_view_tracker(userID, sessionID, assetID) VALUES ('$userID', '$session', '$assetID')";

            $viewStmt = $this->db->prepare($viewSQL);

            $viewStmt->execute();
            return true;
        } else if (!empty($assetView)) {
            return false;
        }
    }

    // Used to update views count for each game on a single day
    function updateAssetViewStat($assetID, $todayDate)
    {
        // This block of code checks whether the current game we are viewing has a record made in the game_stats_history table
        // If someone had viewed the game or downloaded the game today there should be a record there.

        $sql = "SELECT * FROM asset_stats_history WHERE assetID='$assetID' AND created_at='$todayDate'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($record)) {
            //If such record do not exist then a record should have been made regarding this game and today's date

            $insertSQL = "INSERT INTO asset_stats_history (assetID, views, downloads, ratings, reviews, created_at) VALUES ('$assetID', 1, 0, 0, 0, '$todayDate')";

            $insertStmt = $this->db->prepare($insertSQL);

            $insertStmt->execute();
        } else {
            //If such record already exist then only the view attribute of that column should be updated by incrementing one

            $viewCount = $record['views'] + 1;

            $downloadCount = $record['downloads'];

            $ratingsCount = $record['ratings'];

            $reviewCount = $record['reviews'];

            $updateSQL = "UPDATE asset_stats_history 
            SET assetID='$assetID', 
            views='$viewCount', 
            downloads='$downloadCount', 
            ratings = '$ratingsCount',
            reviews = '$reviewCount',
            created_at = '$todayDate' WHERE assetID = '$assetID' AND created_at='$todayDate'";

            $updateStmt = $this->db->prepare($updateSQL);

            $updateStmt->execute();
        }
    }

    function updateAssetViews($assetID)
    {

        $sql = "SELECT * FROM asset_stats_history WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assetViews = $stmt->fetchAll();

        $totalViews = 0;

        foreach ($assetViews as $assetView) {
            $totalViews = $totalViews + $assetView['views'];
        }

        $updateSQL = "UPDATE asset_stats SET views='$totalViews' WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($updateSQL);

        $stmt->execute();
    }
}
