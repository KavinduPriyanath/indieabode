<?php

class Admin_GigD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function getNoofGigs(){
        $sql = "SELECT COUNT(*) AS orderedGigs, (SELECT COUNT(*) FROM gig WHERE gigStatus=0) AS notorderedGigs 
        FROM gig WHERE gigStatus=0";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $total_ended_gigs = $row['orderedGigs'];
        $total_ongoing_gigs = $row['notorderedGigs'];

        return array('orderedGigs' => $total_ended_gigs, 'notorderedGigs' => $total_ongoing_gigs);
    }

    function getTotalTx() {
        $sql = "SELECT ROUND(SUM(publisherCost), 2) AS totalTx FROM gig_purchases";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalTx = $row['totalTx'];
        return $totalTx;
    }
}
