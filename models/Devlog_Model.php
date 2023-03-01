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

    // function getGameDeveloper($game)
    // {
    //     $gameDeveloperID = $game['gameDeveloperID'];

    //     $sql = "SELECT * FROM gamer WHERE gamerID='$gameDeveloperID'";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $gameDeveloper = $stmt->fetch(PDO::FETCH_ASSOC);

    //     return $gameDeveloper;
    // }

    // function getScreenshots($id)
    // {
    //     $sql = "SELECT * FROM freeasset WHERE assetID='$id' LIMIT 1";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $asset = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $ss = $asset['assetScreenshots'];

    //     $screenshots = explode(',', $ss);

    //     return $screenshots;
    // }

    function gameDetails($gameName)
    {

        $sql = "SELECT * FROM freegame WHERE gameName='$gameName'";

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
}
