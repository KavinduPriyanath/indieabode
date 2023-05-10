<?php

class Crowdfundings_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllCrowdfundings()
    {
        $stmt = $this->db->prepare("SELECT * FROM crowdfund");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
