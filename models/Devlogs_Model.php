<?php

class Devlogs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllDevlogs()
    {
        $stmt = $this->db->prepare("SELECT * FROM devlog");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
