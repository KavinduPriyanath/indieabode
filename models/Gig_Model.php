<?php

class Gig_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleGig($id)
    {
        $sql = "SELECT * FROM gig WHERE gigID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gig;
    }

    function getGameDeveloper($game)
    {
        $gameDeveloperID = $game['gameDeveloperID'];

        $sql = "SELECT * FROM gamer WHERE gamerID='$gameDeveloperID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameDeveloper = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gameDeveloper;
    }



    function getScreenshots($id)
    {
        $sql = "SELECT * FROM gig WHERE gigID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $game['gigScreenshot'];

        $screenshots = explode(',', $ss);

        return $screenshots;
    }

    function RequestGig($gigId, $developerId, $publisherId, $cost, $share)
    {
        $token = $gigId . $publisherId;

        $sql = "INSERT INTO requestedGigs(gigID, developerID, publisherID, gigToken, cost, share) VALUES ('$gigId', '$developerId', '$publisherId', '$token', '$cost', '$share')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function HasRequested($gigId, $publisherId)
    {

        $sql = "SELECT * FROM requestedGigs WHERE gigID='$gigId' AND publisherID='$publisherId'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gigRequest = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($gigRequest)) {
            return true;
        } else {
            return false;
        }
    }

    function currentRequest($gigId, $token)
    {

        $sql = "SELECT * FROM requestedGigs WHERE gigID='$gigId' AND gigToken='$token'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updateCurrentRequest($gigToken, $cost, $share, $pubShareApproval, $devShareApproval, $pubCostApproval, $devCostApproval, $eligible)
    {


        $sql = "UPDATE requestedgigs SET
                cost = '$cost',
                share = '$share',
                publisherCostApproval = '$pubCostApproval',
                developerCostApproval = '$devCostApproval',
                publisherShareApproval = '$pubShareApproval',
                developerShareApproval = '$devShareApproval',
                eligible = '$eligible'
                WHERE gigToken = '$gigToken'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function UpdateEligibilityOfRequest($gigToken)
    {

        $sql = "UPDATE requestedgigs SET eligible = 1 WHERE gigToken = '$gigToken'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function InsertMessages($gigId, $senderID, $receiverID, $message)
    {

        $sql = "INSERT INTO gigmessages(senderID, receiverID, message, gigID) VALUES ('$senderID', '$receiverID', '$message', '$gigId')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function ViewMessages($currentUserId, $receiverId, $gigId)
    {

        $sql = "SELECT * FROM gigmessages LEFT JOIN gamer ON gamer.gamerID = gigmessages.senderID
                WHERE (senderID = $currentUserId AND receiverID = $receiverId AND gigID = $gigId)
                OR (senderID = $receiverId AND receiverID = $currentUserId AND gigID = $gigId) ORDER BY msgID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GigViewTracker($userID, $session, $gigID)
    {

        $sql = "SELECT * FROM gigs_views_tracker WHERE gigID='$gigID' AND userID='$userID' AND sessionID='$session'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameView = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($gameView)) {
            $viewSQL = "INSERT INTO gigs_views_tracker(userID, sessionID, gigID) VALUES ('$userID', '$session', '$gigID')";

            $viewStmt = $this->db->prepare($viewSQL);

            $viewStmt->execute();
            return true;
        } else if (!empty($gameView)) {
            return false;
        }
    }

    function UpdateGigViews($gigID)
    {

        $sql = "SELECT * FROM gig WHERE gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        $viewCount = $gig['viewCount'] + 1;

        $updateSQL = "UPDATE gig SET viewCount='$viewCount' WHERE gigID='$gigID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
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

    function successfulPurchase($gigID, $publisherID, $developerID, $publiserCost, $share, $orderID)
    {

        $sql = "INSERT INTO gig_purchases(gigID, developerID, publisherID, publisherCost, sharePercentage,orderID) 
                VALUES ('$gigID', '$developerID', '$publisherID', '$publiserCost', '$share', '$orderID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function gigPurchased($gigID)
    {

        $sql = "UPDATE gig SET gigStatus=1 WHERE gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function AddPublisherToGame($gigID, $publisherID)
    {

        $sql = "SELECT * FROM gig WHERE gigID='$gigID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        $gameID = $gig['game'];

        $updateSql = "UPDATE freegame SET gamePublisherID='$publisherID' WHERE gameID='$gameID'";

        $updateStmt = $this->db->prepare($updateSql);

        $updateStmt->execute();
    }

    function GetUser($gamerID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$gamerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}
