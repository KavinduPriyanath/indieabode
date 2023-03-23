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
}
