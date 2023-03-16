<?php

class Cart_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showMyAssetCart($currentUserID)
    {
        $sql = "SELECT asset_cart.userID, asset_cart.assetID, 
                freeasset.assetName, freeasset.assetPrice, freeasset.assetID, freeasset.assetCoverImg, freeasset.assetClassification
                FROM asset_cart 
                INNER JOIN freeasset 
                ON asset_cart.assetID=freeasset.assetID 
                WHERE userID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function RemoveAssetFromCart($currentUserID, $assetID)
    {

        $sql = "DELETE FROM asset_cart WHERE userID='$currentUserID' AND assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function showMyGameCart($currentUserID)
    {
        $sql = "SELECT game_cart.userID, game_cart.gameID, 
                freegame.gameName, freegame.gamePrice, freegame.gameID, freegame.gameCoverImg, freegame.gameType
                FROM game_cart 
                INNER JOIN freegame 
                ON game_cart.gameID=freegame.gameID 
                WHERE userID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    function RemoveGameFromCart($currentUserID, $assetID)
    {

        $sql = "DELETE FROM game_cart WHERE userID='$currentUserID' AND gameID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
