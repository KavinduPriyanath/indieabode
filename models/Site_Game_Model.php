<?php

class Site_Game_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGame(){
        $sql = "SELECT f.*, gs.*
        FROM freegame f
        INNER JOIN game_stats gs ON f.gameID = gs.gameID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $games;
    }
}
