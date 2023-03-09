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

        $sql = "INSERT INTO library(developerID, itemID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$ownerID", "$assetID"]);
    }

    function AlreadyClaimed($assetID, $userID)
    {

        $sql = "SELECT * FROM library WHERE itemID='$assetID' AND developerID='$userID' LIMIT 1";

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

        $sql = "INSERT INTO cart(userID, itemID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$ownerID", "$assetID"]);
    }

    function AlreadyInCart($assetID, $userID)
    {

        $sql = "SELECT * FROM cart WHERE itemID='$assetID' AND userID='$userID' LIMIT 1";

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
}
