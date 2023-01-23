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

    function show2dAssets()
    {

        $stmt = $this->db->prepare("SELECT * FROM freeasset WHERE assetClassification='2d'");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
