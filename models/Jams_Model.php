<?php

class Jams_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGameJams()
    {
        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
