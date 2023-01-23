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
}
