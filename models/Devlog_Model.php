<?php

class Devlog_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleDevlog($id)
    {
        $sql = "SELECT * FROM devlog WHERE devLogID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        return $devlog;
    }

    function gameDetails($gameId)
    {

        $sql = "SELECT * FROM freegame WHERE gameID='$gameId'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
    }

    function AlreadyLiked($userID, $devlogID)
    {

        $sql = "SELECT * FROM devlog_likes WHERE devlogID='$devlogID' AND userID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();

        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }

    function GetGame($gameID)
    {

        $sql = "SELECT * FROM freegame WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
    }

    function DevlogViewTracker($userID, $session, $devlogID)
    {

        $sql = "SELECT * FROM devlog_view_tracker WHERE devlogID='$devlogID' AND userID='$userID' AND sessionID='$session'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlogView = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($devlogView)) {
            $viewSQL = "INSERT INTO devlog_view_tracker(userID, sessionID, devlogID) VALUES ('$userID', '$session', '$devlogID')";

            $viewStmt = $this->db->prepare($viewSQL);

            $viewStmt->execute();
            return true;
        } else if (!empty($devlogView)) {
            return false;
        }
    }

    function UpdateDevlogViews($devlogID)
    {

        $sql = "SELECT * FROM devlog WHERE devLogID='$devlogID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        $viewCount = $devlog['viewCount'] + 1;

        $updateSQL = "UPDATE devlog SET viewCount='$viewCount' WHERE devLogID='$devlogID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }
}
