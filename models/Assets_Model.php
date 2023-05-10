<?php

class Assets_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllAssets()
    {
        $stmt = $this->db->prepare("SELECT * FROM freeasset");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showClassifiedAssets($assetClassification)
    {

        if ($assetClassification == '2d') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='2d'";
        } else if ($assetClassification == '3d') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='3d'";
        } else if ($assetClassification == 'audio') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='audio'";
        } else if ($assetClassification == 'visual-effects') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='visualeffects'";
        } else if ($assetClassification == 'textures') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='textures'";
        } else if ($assetClassification == 'maps') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='maps'";
        } else if ($assetClassification == 'tools') {
            $sql = "SELECT * FROM freeasset WHERE assetClassification='tools'";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
