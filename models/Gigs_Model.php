<?php

class Gigs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGigs()
    {
        $stmt = $this->db->prepare("SELECT * FROM gig");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
