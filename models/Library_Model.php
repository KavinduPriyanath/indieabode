<?php

class Library_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showMyAssetLibrary($currentUserID)
    {
        $sql = "SELECT asset_library.developerID, asset_library.assetID, asset_library.createdAt, 
                freeasset.assetName , freeasset.assetID, freeasset.assetCoverImg, freeasset.assetType
                FROM asset_library 
                INNER JOIN freeasset 
                ON asset_library.assetID=freeasset.assetID 
                WHERE developerID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showMyGameLibrary($currentUserID)
    {
        $sql = "SELECT game_library.gamerID, game_library.gameID, game_library.createdAt, 
                freegame.gameName , freegame.gameID, freegame.gameCoverImg
                FROM game_library 
                INNER JOIN freegame 
                ON game_library.gameID=freegame.gameID 
                WHERE gamerID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
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

    function downloadAssetFile($id)
    {

        $sql = "SELECT * FROM freeasset WHERE assetID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $assetFile = $game['assetFile'];

        return $assetFile;
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

    function updateAssetDownloads($assetID)
    {

        $sql = "SELECT * FROM asset_stats_history WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assetDownloads = $stmt->fetchAll();

        $totalDownloads = 0;

        foreach ($assetDownloads as $assetDownload) {
            $totalDownloads = $totalDownloads + $assetDownload['downloads'];
        }

        $updateSQL = "UPDATE asset_stats SET downloads='$totalDownloads' WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($updateSQL);

        $stmt->execute();
    }
}
