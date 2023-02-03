<?php

class Game_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleGame($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
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

    function getScreenshots($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $game['gameScreenshots'];

        $screenshots = explode(',', $ss);

        return $screenshots;
    }
}
