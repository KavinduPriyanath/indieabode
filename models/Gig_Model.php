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
}
