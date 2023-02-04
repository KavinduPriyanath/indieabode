<?php

class Jams_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGameJams()
    {
        $stmt = $this->db->prepare("SELECT * FROM gamejam");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
