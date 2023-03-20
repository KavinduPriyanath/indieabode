<?php

class PaymentTest_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function findAsset($assetID)
    {
        $stmt = $this->db->prepare("SELECT * FROM freeasset WHERE assetID='$assetID' LIMIT 1");

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    function SuccessfulAssetPurchase($assetID, $userID, $paidPrice, $orderID)
    {

        $sql = "INSERT INTO asset_purchases(assetID, buyerID, purchasedPrice, orderID) VALUES ('$assetID', '$userID', '$paidPrice', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
