<?php

class Dashboard_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllMyGames($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID='$id'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
