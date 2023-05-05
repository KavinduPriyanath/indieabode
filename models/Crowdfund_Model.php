<?php

class Crowdfund_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleCrowdfund($id)
    {
        $sql = "SELECT * FROM crowdfund WHERE crowdFundID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfund = $stmt->fetch(PDO::FETCH_ASSOC);

        return $crowdfund;
    }


    function getScreenshots($id)
    {
        $sql = "SELECT * FROM crowdfund WHERE crowdFundID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $game['crowdfundSS'];

        $screenshots = explode(',', $ss);

        return $screenshots;
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

    function successfulDonation($crowdfundID, $donorID, $donationAmount, $orderID)
    {

        $sql = "INSERT INTO crowdfund_donations(crowdfundID, donorID, donationAmount, orderID) VALUES ('$crowdfundID', '$donorID', '$donationAmount', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function UpdateCrowdfundProgress($crowdfundID, $amount)
    {

        $sql = "SELECT * FROM crowdfund WHERE crowdFundID='$crowdfundID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfund = $stmt->fetch(PDO::FETCH_ASSOC);

        $backersCount = $crowdfund['backers'] + 1;

        $currentAmount = $crowdfund['currentAmount'];

        $paymentGatewayCut = ($amount / 100) * (3.3);

        $lastDonationShare = $amount - $paymentGatewayCut;

        $updatedCurrentAmount = $currentAmount + $lastDonationShare;

        $updateSQL = "UPDATE crowdfund SET currentAmount='$updatedCurrentAmount', backers='$backersCount' WHERE crowdFundID='$crowdfundID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function AllBackers($crowdfundId)
    {

        $sql = "SELECT crowdfund_donations.crowdfundID, crowdfund_donations.donorID, crowdfund_donations.donationAmount, 
                crowdfund_donations.donatedDate, gamer.gamerID, gamer.username, gamer.avatar FROM crowdfund_donations
                INNER JOIN gamer ON crowdfund_donations.donorID = gamer.gamerID  
                WHERE crowdfund_donations.crowdfundID = $crowdfundId";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $backers = $stmt->fetchAll();

        return $backers;
    }

    function CrowdfundViewTracker($userID, $session, $crowdfundID)
    {

        $sql = "SELECT * FROM crowdfund_view_tracker WHERE crowdfundID='$crowdfundID' AND userID='$userID' AND sessionID='$session'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfundView = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($crowdfundView)) {
            $viewSQL = "INSERT INTO crowdfund_view_tracker(userID, sessionID, crowdfundID) VALUES ('$userID', '$session', '$crowdfundID')";

            $viewStmt = $this->db->prepare($viewSQL);

            $viewStmt->execute();
            return true;
        } else if (!empty($crowdfundID)) {
            return false;
        }
    }

    function UpdateCrowdfundViews($crowdfundID)
    {

        $sql = "SELECT * FROM crowdfund WHERE crowdfundID='$crowdfundID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        $viewCount = $gig['viewCount'] + 1;

        $updateSQL = "UPDATE crowdfund SET viewCount='$viewCount' WHERE crowdfundID='$crowdfundID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function IndieAbodeShare($crowdfundID, $CollectedTotal)
    {

        $siteShare = ($CollectedTotal / 100) * 5;

        $sql = "INSERT INTO site_crowdfund_revenue(crowdfundID, siteShare) VALUES ('$crowdfundID', ''$siteShare)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function SiteShareCollected($crowdfundID)
    {

        $sql = "UPDATE crowdfund SET siteShareCollected=1 WHERE crowdFundID='$crowdfundID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
