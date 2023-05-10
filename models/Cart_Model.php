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

    public function currentUser($developerID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID = '$developerID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $developer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $developer;
    }

    function AddtoGameLibrary($gameID, $gamerID)
    {

        $sql = "INSERT INTO game_library(gamerID, gameID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$gamerID", "$gameID"]);
    }

    function SuccessfulGamePurchase($gameID, $userID, $paidPrice, $orderID)
    {

        $sql = "INSERT INTO game_purchases(gameID, buyerID, purchasedPrice, orderID) VALUES ('$gameID', '$userID', '$paidPrice', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    //Get Currently set revenue share of developer
    function GetGameRevenueShare($gameID)
    {

        $sql = "SELECT account.revenueShare FROM account INNER JOIN freegame ON freegame.gameDeveloperID=account.userID 
                WHERE freegame.gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Update revenue of game_stats table of a game after each game purchase
    function GameDeveloperShare($gameID, $revenueShare, $gamePrice)
    {

        $sql = "SELECT * FROM game_stats WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameStats = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentGameRevenue = $gameStats['revenue'];

        $developerShare = (floatval($gamePrice) / 100) * (100 - $revenueShare);

        $paymentGatewayCut = ($developerShare / 100) * (3.3);

        $finalDeveloperShare = $developerShare - $paymentGatewayCut;

        $updatedTotalRevenue = $currentGameRevenue + $finalDeveloperShare;

        $updateSQL = "UPDATE game_stats SET revenue='$updatedTotalRevenue' WHERE gameID='$gameID'";

        $updatedStmt = $this->db->prepare($updateSQL);

        $updatedStmt->execute();
    }

    //How much portion site gains from each game purchase
    function IndieabodeGameShare($gameID, $orderID, $revenueShare, $gamePrice)
    {

        $sitePortion = (floatval($gamePrice) / 100) * $revenueShare;

        $sql = "INSERT INTO sitegamesrevenue(gameID, orderID, siteShare) VALUES ('$gameID', '$orderID', '$sitePortion')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    //For checkouting assets from the cart
    //For checkouting assets from the cart
    //For checkouting assets from the cart
    //For checkouting assets from the cart
    //For checkouting assets from the cart
    //For checkouting assets from the cart
    //For checkouting assets from the cart

    function AddtoAssetLibrary($assetID, $ownerID)
    {

        $sql = "INSERT INTO asset_library(developerID, assetID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$ownerID", "$assetID"]);
    }

    function SuccessfulAssetPurchase($assetID, $userID, $paidPrice, $orderID)
    {

        $sql = "INSERT INTO asset_purchases(assetID, buyerID, purchasedPrice, orderID) VALUES ('$assetID', '$userID', '$paidPrice', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    //Get Currently set revenue share of asset creator
    function GetAssetRevenueShare($assetID)
    {

        $sql = "SELECT account.revenueShare FROM account INNER JOIN freeasset ON freeasset.assetCreatorID=account.userID 
                    WHERE freeasset.assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Update revenue of game_stats table of a game after each game purchase
    function AssetCreatorShare($assetID, $revenueShare, $assetPrice)
    {

        $sql = "SELECT * FROM asset_stats WHERE assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $assetStats = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentAssetRevenue = $assetStats['revenue'];

        $creatorShare = (floatval($assetPrice) / 100) * (100 - $revenueShare);

        $paymentGatewayCut = ($creatorShare / 100) * (3.3);

        $finalCreatorShare = $creatorShare - $paymentGatewayCut;

        $updatedTotalRevenue = $currentAssetRevenue + $finalCreatorShare;

        $updateSQL = "UPDATE asset_stats SET revenue='$updatedTotalRevenue' WHERE assetID='$assetID'";

        $updatedStmt = $this->db->prepare($updateSQL);

        $updatedStmt->execute();
    }

    //How much portion site gains from each asset purchase
    function IndieabodeAssetShare($assetID, $orderID, $revenueShare, $assetPrice)
    {

        $sitePortion = (floatval($assetPrice) / 100) * $revenueShare;

        $sql = "INSERT INTO site_assets_revenue(assetID, orderID, siteShare) VALUES ('$assetID', '$orderID', '$sitePortion')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
