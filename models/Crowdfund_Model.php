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

    // function getGameDeveloper($game)
    // {
    //     $gameDeveloperID = $game['gameDeveloperID'];

    //     $sql = "SELECT * FROM gamer WHERE gamerID='$gameDeveloperID'";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $gameDeveloper = $stmt->fetch(PDO::FETCH_ASSOC);

    //     return $gameDeveloper;
    // }



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
}
