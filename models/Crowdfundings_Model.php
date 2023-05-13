<?php

class Crowdfundings_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllCrowdfundings($min, $max)
    {
        $sql = "SELECT crowdfund.crowdFundID, crowdfund.deadline, crowdfund.currentAmount, crowdfund.expectedAmount, crowdfund.crowdfundCoverImg, 
                freegame.gameName, gamer.username FROM (crowdfund INNER JOIN freegame ON freegame.gameID=crowdfund.gameName)
                INNER JOIN gamer ON gamer.gamerID=crowdfund.gameDeveloperName ORDER BY crowdfund.created_at DESC LIMIT $min, $max";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfunds = $stmt->fetchAll();

        return $crowdfunds;
    }

    function showAllSortedCrowdfundings($sort, $Sorder)
    {
        $sql = "SELECT crowdfund.crowdFundID, crowdfund.deadline, crowdfund.currentAmount, crowdfund.expectedAmount, crowdfund.crowdfundCoverImg, 
                freegame.gameName, gamer.username FROM (crowdfund INNER JOIN freegame ON freegame.gameID=crowdfund.gameName)
                INNER JOIN gamer ON gamer.gamerID=crowdfund.gameDeveloperName  ORDER BY crowdfund.$sort $Sorder";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfunds = $stmt->fetchAll();

        return $crowdfunds;
    }

    function totalCrowdfundsPageCount($maxLimit)
    {

        $sql = "SELECT count(crowdFundID) AS id FROM crowdfund";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfundsCount = $stmt->fetchAll();

        $totalCrowdfunds = $crowdfundsCount[0]['id'];

        $totalPages = ceil($totalCrowdfunds / $maxLimit);

        return $totalPages;
    }
}
