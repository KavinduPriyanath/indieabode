<?php

class Site_Asset_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllAsset(){
        $sql = "SELECT f.*, s.*
        FROM freeasset f
        INNER JOIN asset_stats s ON f.assetID = s.assetID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $assets;
    }
}
