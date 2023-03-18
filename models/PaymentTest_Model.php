<?php

class PaymentTest_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function findAsset($asseID)
    {
        $stmt = $this->db->prepare("SELECT * FROM freeasset WHERE assetID='$asseID' LIMIT 1");

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
