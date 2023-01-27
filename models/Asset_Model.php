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

    function AlreadyClaimed($assetID)
    {

        $sql = "SELECT * FROM library WHERE itemID='$assetID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($asset != null) {
            return true;
        } else {
            return false;
        }
    }
}
