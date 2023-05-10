<?php

class Jam_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleJam($id)
    {
        $sql = "SELECT * FROM gamejam WHERE gameJamID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gamejam = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gamejam;
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
}
