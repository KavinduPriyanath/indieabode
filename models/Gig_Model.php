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

    function RequestGig($gigId, $developerId, $publisherId)
    {
        $token = $gigId . $publisherId;

        $sql = "INSERT INTO requestedGigs(gigID, developerID, publisherID, gigToken) VALUES ('$gigId', '$developerId', '$publisherId', '$token')";

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
}
