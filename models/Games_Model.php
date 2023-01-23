<?php

class Games_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGames()
    {
        $stmt = $this->db->prepare("SELECT * FROM freegame");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
