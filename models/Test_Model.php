<?php

class Test_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
        echo "Hellp test model";
    }

    function showAllAssets()
    {
        $stmt = $this->db->prepare("SELECT * FROM freeasset");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllGames()
    {
        $stmt = $this->db->prepare("SELECT * FROM freegame");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllGameJams()
    {
        $stmt = $this->db->prepare("SELECT * FROM gamejam");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
