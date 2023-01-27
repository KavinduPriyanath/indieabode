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

    function showClassifiedGames($gameClassification)
    {

        if ($gameClassification == 'action') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='action'";
        } else if ($gameClassification == 'adventure') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='adventure'";
        } else if ($gameClassification == 'rpg') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='rpg'";
        } else if ($gameClassification == 'racing') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='racing'";
        } else if ($gameClassification == 'simulation') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='simulation'";
        } else if ($gameClassification == 'strategy') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='strategy'";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
